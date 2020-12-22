<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gp Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Gp - v2.1.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <section>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
      <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-white navbar-up py-0">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="#beranda">Beranda</a>
              </li>
              <li class="nav-item">
                <span class="nav-link" href="#">|</span>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Hubungi Kami</a>
              </li>
              <li class="nav-item">
                <span class="nav-link" href="#">|</span>
              </li>
              <li class="nav-item">
                <a href="login.html" class="nav-link">Login</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="container d-flex align-items-center justify-content-between">


        <h1 class="logo"><a href="../../index.php">LOGO<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block m-auto">
          <ul>
            <li class="active"><a href="../../index.php">BERANDA</a></li>
            <li><a href="#favorit">FAVORIT</a></li>
            <li><a href="#layanan">LAYANAN</a></li>
            <li><a href="#testimonials">TESTIMONI</a></li>
            <li><a href="#ceknota">CEK NOTA</a></li>
          </ul>
        </nav><!-- .nav-menu -->
    </header><!-- End Header -->
  </section>
  <div class="container">

    <h2>MY ACCOUNT</h2><br>
    <div class="row">
      <div class="col-2">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">DASBOARD</a><br>
          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">PROFILE</a><br>
          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">ORDER</a><br>
          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">LOG OUT</a><br>
        </div>
      </div>
      <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <h3 class="display-4">Hallo Iqbal Ikhlasul Amal</h3>
                <p class="lead">Pada halaman ini anda bisa mengubah profile, melihat order terakhir, dan melihat proses order.</p>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list" href="profile_order.html">
            <div class="row border">
              <div class="col">
                <form action="#" class="form-group login">
                  <h4>PROFILE</h4>
                  <div class="row">
                    <div class="col">
                      <label for="nama_depan">Nama Depan</label>
                      <input type="text" name="nama_depan" id="nama_depan" class="form-control" />
                      <label for="no">Nomor HP</label>
                      <input type="text" name="no" id="no" class="form-control" />
                    </div>
                    <div class="col">
                      <label for="nama_belakang">Nama Belakang</label>
                      <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" />
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control" />
                    </div>
                  </div>
                  <h4 class="mt-3 mb-2">Ubah Password</h4>
                  <div class="row">
                    <div class="col">
                      <label for="password">Password Baru</label>
                      <input type="password" name="password" id="password" class="form-control" />
                    </div>
                    <div class="col">
                      <label for="password">Ulangi Password</label>
                      <input type="password" name="password" id="password" class="form-control" />
                    </div>
                  </div>
                  <button type="submit" class="float-right my-5">submit</button>
                </form>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
            <div class="row border mb-2 p-2" style="border-left: 6px solid lightblue!important;">
              <div class="col">
                <h6>Deep clean</h6>
                <p>lorem</p>
              </div>
              <div class="col text-right">
                <p>19 september 2999</p>
                <h6>Proses ngumbah</h6>
              </div>
            </div>
            <div class="row border mb-2 p-2" style="border-left: 6px solid green!important;;">
              <div class="col">
                <h6>Deep clean</h6>
                <p>lorem</p>
              </div>
              <div class="col text-right">
                <p>19 september 2999</p>
                <h6>Proses ngumbah</h6>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Proses logout</div>
        </div>
      </div>
    </div>
  </div>


  <section>
    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-4 col-md-6">
              <div class="footer-info">
                <h3>LOGO<span>.</span></h3>

              </div>
            </div>

            <div class="col-lg-5 col-md-2 footer-newsletter">
              <h4>About</h4>
              <p>
                Premium Clean And Care merupakan usaha yang bergerak dibidang jasa laundry cuci sepatu berkualitas yang
                berasal dari Kabupaten Jember.
                <br> <br>
                Berbagai layanan seperti pencucian dan pewarnaan ulang pada sepatu dan tas kami tawarkan.
              </p>
            </div>

            <div class="col-lg-3 col-md-6 footer-newsletter">
              <h4>Contact</h4>
              <p>Premium Clean And Care<br>
                Jl. Mastrip no. 4 <br>
                Jember – Indonesia <br>
                Phone : 0812-2222-3333 <br>
                Whatsapp : 0812-9999-6666</p>
              <p>
                <h4>Jam Operasional</h4>
                <p>Senin – Jumat : 10.00 – 20.00 <br>
                  Sabtu - Minggu : 11.00 – 19.00
                </p>
                <p>
            </div>

          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="copyright">
              &copy; Copyright <strong><span>Premium Clean And Care</span></strong> All Rights Reserved
            </div>
            <!-- <div class="credits">
      <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
            <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            <!-- </div> -->
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="social-links social-media">
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../../assets/vendor/php-email-form/validate.js"></script>
    <script src="../../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../../assets/vendor/venobox/venobox.min.js"></script>
    <script src="../../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="../../assets/vendor/counterup/counterup.min.js"></script>
    <script src="../../assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
  </section>

</body>

</html>