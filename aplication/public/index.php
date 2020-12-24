<?php

include("header.php");
include("config/koneksi.php");
?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white navbar-up py-0">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Beranda</a>
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
          <li class="nav-item">
            <a href="aplication/auth" class="nav-link">Login</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo"><a href="index.php">LOGO<span>.</span></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav class="nav-menu d-none d-lg-block m-auto">
      <ul>
        <li class="active"><a href="index.php">BERANDA</a></li>
        <li><a href="#favorit">FAVORIT</a></li>
        <li><a href="#layanan">LAYANAN</a></li>
        <li><a href="#testimonials">TESTIMONI</a></li>
        <li><a href="#ceknota">CEK NOTA</a></li>
      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header><!-- End Header -->


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
  <div class="container" data-aos="fade-up">

    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
      <div class="col-xl-6 col-lg-8">
        <h1>Premium Clean And Care<span>.</span></h1>
        <h2>We clean and care your shoes</h2>
      </div>
    </div>

  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= Layanan Terfavorit Section ======= -->
  <section id="favorit" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Favorit</h2>
        <p>Layanan Terfavorit</p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <img src="assets/img/s1.jpeg" class="img-fluid" alt="">
            <h4><a href="aplication/public/detail_transaksi.php">FAST CLEAN</a></h4>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
          <img src="assets/img/s2.jpeg" class="img-fluid" alt="">
            <h4><a href="aplication/public/detail_transaksi.php">DEEP CLEAN</a></h4>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
          <img src="assets/img/T2.jpeg" class="img-fluid" alt="">
            <h4><a href="aplication/public/detail_transaksi.php">HAT CLEAN</a></h4>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Layanan Terfavorit Section -->

  <!-- ======= Layanan Section ======= -->
  <section id="layanan" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Layanan</h2>
        <p>Layanan Tersedia</p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-sepatu">Sepatu</li>
            <li data-filter=".filter-tas">Tas</li>
            <li data-filter=".filter-topi">Topi</li>
            <li data-filter=".filter-sepatu-wanita">Sepatu Wanita</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container team" data-aos="fade-up" data-aos-delay="200">

        <div class="col-lg-3 col-md-6 portfolio-item filter-sepatu">
          <div class="member">
            <div class="member-img portfolio-wrap">
              <img src="assets/img/s1.jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Layanan 1</h4>
                <p>Jenis layanan</p>
                <div class="portfolio-links">
                  <a href="aplication/public/portfolio-details.php" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-tas">
          <div class="member">
            <div class="member-img portfolio-wrap">
              <img src="assets/img/t3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Layanan 1</h4>
                <p>Rp 30.000</p>
                <div class="portfolio-links">
                  <a href="aplication/public/portfolio-details.php" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-topi">
          <div class="member">
            <div class="member-img portfolio-wrap">
              <img src="assets/img/t2.jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Layanan 1</h4>
                <p>Rp 25.000</p>
                <div class="portfolio-links">
                  <a href="aplication/public/portfolio-details.php" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 portfolio-item filter-sepatu-wanita">
          <div class="member">
            <div class="member-img portfolio-wrap">
              <img src="assets/img/s3.jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Layanan 1</h4>
                <p>Jenis layanan</p>
                <div class="portfolio-links">
                  <a href="aplication/public/portfolio-details.php" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Layanan Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container" data-aos="zoom-in">

      <div class="owl-carousel testimonials-carousel">

        <div class="testimonial-item">
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium
            quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
          <h3>@sumanto69</h3>
        </div>

        <div class="testimonial-item">
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium
            quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
          <h3>@suhadak</h3>
        </div>

        <div class="testimonial-item">
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium
            quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
          <h3>@jainul</h3>
        </div>

        <div class="testimonial-item">
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium
            quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
          <h3>@sukron</h3>
        </div>

        <div class="testimonial-item">
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium
            quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
          <h3>@naam</h3>
        </div>

      </div>

    </div>
  </section><!-- End Testimonials Section -->

  <!-- Cek Nota Section -->
  <section id="ceknota">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Cek Nota</h2>
        <p>CEK STATUS</p>
      </div>

      <div class="row mt-3 m-auto">
        <form action="#" method="post" role="form" class="ceknota w-100">
          <div class="form-group row w-100">
            <div class="col pr-0">
              <input type="text" class="form-control" name="ceknota" id="ceknota" placeholder="Cek Nota" />
            </div>
            <div class="col-2 pl-0" style="max-width: 13%;">
              <div>
                <div class="loading"></div>
                <div class="error-message"></div>
                <div class="sent-message"></div>
                <button type="submit" class="btn btn-secondary float-right">Cek Status</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- End of cek nota section -->

</main><!-- End #main -->
<?php

include("footer.php");
?>