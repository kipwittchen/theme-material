<?php
global $Wcms;

function getEditableArea($block, $default) {
    global $Wcms;

	$value = null;
	if (empty($Wcms->get('blocks',$block))) {
		$Wcms->set('blocks',$block, 'content', $default);
	} else {
		$value = $Wcms->get('blocks',$block,'content');
	}
	if ($Wcms->loggedIn) {
        // Do a not so nice reload to make `$Wcms->block($block)` return any content.
        if($value === null) return "<script>history.go(0)</script>";

		return $Wcms->block($block);
	}

	// If not logged in, return block in non-editable mode
	return $value;
}

function alterAdmin($args) {
    global $Wcms;

    if(!$Wcms->loggedIn) return $args;
    if($Wcms->currentPage !== $Wcms->get("config")->defaultPage) return $args;

    $doc = new DOMDocument();
    @$doc->loadHTML($args[0]);

    /* Input element for background */

    $label = $doc->createElement("p");
    $label->setAttribute("class", "subTitle");
    $label->nodeValue = "Background image";

    $doc->getElementById("currentPage")->insertBefore($label, $doc->getElementById("currentPage")->lastChild->previousSibling->previousSibling);

	$form_group = $doc->createElement("div");
    $form_group->setAttribute("class", "form-group");

    $wrapper = $doc->createElement("div");
    $wrapper->setAttribute("class", "change");

    $input = $doc->createElement("select");
    $input->setAttribute("class", "form-control");
    $input->setAttribute("onchange", "fieldSave('background',this.value,'pages');");
    $input->setAttribute("name", "backgroundSelect");

	$option = $doc->createElement("option");
	$option->setAttribute("value", "");
	$option->nodeValue = "Theme default";
	$input->appendChild($option);

	$files = glob($Wcms->filesPath . "/*");
	foreach($files as $file) {
		if(!in_array(getimagesize($file)[2], array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) continue;

		$file = basename($file);

		$option = $doc->createElement("option");
	    $option->setAttribute("value", $file);
		$option->nodeValue = $file;

		if(isset($Wcms->get("pages", $Wcms->currentPage)->background) && $Wcms->get("pages", $Wcms->currentPage)->background == $file)
			$option->setAttribute("selected", "selected");

		$input->appendChild($option);
	}

    $wrapper->appendChild($input);
    $form_group->appendChild($wrapper);

    $doc->getElementById("currentPage")->insertBefore($form_group, $doc->getElementById("currentPage")->lastChild->previousSibling->previousSibling);


    $args[0] = preg_replace('~<(?:!DOCTYPE|/?(?:html|body))[^>]*>\s*~i', '', $doc->saveHTML());
    return $args;
}
$Wcms->addListener('settings', 'alterAdmin');

?>
