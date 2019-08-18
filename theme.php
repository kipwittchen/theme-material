<?php

global $Wcms;

if($Wcms->currentPage == $Wcms->get("config")->defaultPage) {

    $heading = getEditableArea("heading", $Wcms->page('title'));
    $subtitle = getEditableArea("subtitle", "<p>
      <strong>Ipsum minima, dolores quidem quaerat in iure</strong>
    </p>

    <p class=\"mb-4 d-none d-md-block\">
      <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus nihil quo doloribus sint dolorem sapiente consectetur rem ipsum quia nulla possimus amet, totam quas animi optio cupiditate molestiae quibusdam obcaecati!</strong>
    </p>

    <a target=\"_blank\" href=\"#\" class=\"btn btn-outline-light btn-lg ml-0\">Dolores quidem quaerat
      <i class=\"fas fa-wand-magic ml-2\"></i>
    </a>");

}

$page_image = $Wcms->asset('img/default.jpg');

if(isset($Wcms->get("pages", $Wcms->currentPage)->background) && $Wcms->get("pages", $Wcms->currentPage)->background != "") {
    $page_image = "data/files/" . $Wcms->get("pages", $Wcms->currentPage)->background;
}

$footer1 = getEditableArea("footer1", "    <h4>Lorem ipsum dolor sit amet</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus nihil quo doloribus sint dolorem sapiente consectetur rem ipsum quia nulla possimus amet, totam quas animi optio cupiditate molestiae quibusdam obcaecati!</p>
    <p>Ipsum minima, dolores quidem quaerat in iure excepturi praesentium officia quam et distinctio error tempore quibusdam cumque facilis amet sapiente deserunt voluptatem pariatur. Fugit optio eligendi, officiis quam exercitationem. Vero.</p>
");

$footer2 = getEditableArea("footer2", "    <h4>Lorem ipsum dolor sit amet</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus nihil quo doloribus sint dolorem sapiente consectetur rem ipsum quia nulla possimus amet, totam quas animi optio cupiditate molestiae quibusdam obcaecati!</p>
    <p>Ipsum minima, dolores quidem quaerat in iure excepturi praesentium officia quam et distinctio error tempore quibusdam cumque facilis amet sapiente deserunt voluptatem pariatur. Fugit optio eligendi, officiis quam exercitationem. Vero.</p>
");

$social = getEditableArea("social", '
  <a href="#" target="_blank">
    <i class="fab fa-facebook-f mr-3"></i>
  </a>

  <a href="#" target="_blank">
    <i class="fab fa-twitter mr-3"></i>
  </a>

  <a href="#" target="_blank">
    <i class="fab fa-youtube mr-3"></i>
  </a>

  <a href="#" target="_blank">
    <i class="fab fa-google-plus-g mr-3"></i>
  </a>

  <a href="#" target="_blank">
    <i class="fab fa-dribbble mr-3"></i>
  </a>

  <a href="#" target="_blank">
    <i class="fab fa-pinterest mr-3"></i>
  </a>

  <a href="#" target="_blank">
    <i class="fab fa-github mr-3"></i>
  </a>

  <a href="#" target="_blank">
    <i class="fab fa-codepen mr-3"></i>
  </a>');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $Wcms->get('config', 'siteTitle') ?> - <?= $Wcms->page('title') ?></title>
  <meta name="description" content="<?= $Wcms->page('description') ?>">
  <meta name="keywords" content="<?= $Wcms->page('keywords') ?>">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?= $Wcms->asset('css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?= $Wcms->asset('css/mdb.min.css') ?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?= $Wcms->asset('css/style.min.css') ?>" rel="stylesheet">
  <?= $Wcms->css() ?>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark <?= $Wcms->currentPage == $Wcms->get("config")->defaultPage ? "scrolling-navbar" : "unique-color-dark" ?>">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="<?= $Wcms->url() ?>" target="_blank">
        <strong><?= $Wcms->get('config', 'siteTitle') ?></strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Right -->
        <ul class="ml-auto navbar-nav">
          <?= $Wcms->menu() ?>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <?php if($Wcms->currentPage == $Wcms->get("config")->defaultPage): ?>

  <!-- Full Page Intro -->
  <div class="view full-page-intro" style="background-image: url('<?=$page_image?>'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-md-9 col-lg-6 mb-4 white-text text-center text-md-left">

            <h1 class="display-4 font-weight-bold"><?=$heading?></h1>

            <hr class="hr-light my-4">

            <?=$subtitle?>

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </div>
      <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->

  </div>
  <!-- Full Page Intro -->
<?php endif; ?>
<?= $Wcms->loggedIn && $Wcms->currentPage !== $Wcms->get("config")->defaultPage ? "<div style='height:55px'></div>" : "" ?>
    <?= $Wcms->alerts() ?>
  <?= $Wcms->settings() ?>

  <!--Main layout-->
  <main>
    <div class="container">




              <!--Section: Not enough-->
              <section class="mt-15 mb-15">

                  <?= $Wcms->page('content') ?>

              </section>
    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-10 container">
        <div class="row">
            <div class="col-md-6 text-left"> <?=$footer1?>
            </div>
            <div class="col-md-6 text-left"> <?=$footer2?>
            </div>
        </div>
    </div>
    <!--/.Call to action-->

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4"> <?=$social?>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      <?= $Wcms->footer() ?>
    </div>
    <!--/.Copyright-->
  </footer>
  <!--/.Footer-->
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="<?= $Wcms->asset('js/jquery-3.4.1.min.js') ?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?= $Wcms->asset('js/popper.min.js') ?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?= $Wcms->asset('js/bootstrap.min.js') ?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?= $Wcms->asset('js/mdb.min.js') ?>"></script>

  <?= $Wcms->js() ?>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>
