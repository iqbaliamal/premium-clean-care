<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Premium Clean And Care</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/404.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">


  <!-- =======================================================
  * Template Name: Gp - v2.1.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div>
      <nav class="navbar navbar-expand-lg navbar-light bg-white navbar-up py-0">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=home">Beranda</a>
            </li>
            <!-- <li class="nav-item">
            <span class="nav-link" href="">|</span>
          </li> -->
            <!-- <li class="nav-item">
            <a class="nav-link" href="aplication/public/contact.php">Hubungi Kami</a>
          </li> -->
            <li class="nav-item">
              <span class="nav-link" href="">|</span>
            </li>
            <?php
            if (isset($_SESSION['id']) && isset($_SESSION['nama'])) {
            ?>
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama'] ?></span>
                  <i class="fas fa-sort-down"></i>
                  <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="aplication/auth/logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
            <?php
            } else {
            ?>
              <li class="nav-item">
                <a href="index.php?page=login" class="nav-link">Login</a>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </nav>
    </div>

    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php?page=home">LOGO<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block m-auto">
        <ul>
          <li class="active"><a href="index.php?page=home">BERANDA</a></li>
          <li><a href="#favorit">FAVORIT</a></li>
          <li><a href="#layanan">LAYANAN</a></li>
          <li><a href="#testimonials">TESTIMONI</a></li>
          <li><a href="#ceknota">CEK NOTA</a></li>
        </ul>
      </nav><!-- .nav-menu -->
      <?php
      if (isset($_SESSION['id']) && isset($_SESSION['nama'])) {
      ?>
        <a href="aplication/auth/logout.php" class="get-started-btn">Logout</a>
      <?php } else { ?>
        <a href="index.php?page=login" class="get-started-btn">Login</a>
      <?php } ?>
    </div>
  </header><!-- End Header -->