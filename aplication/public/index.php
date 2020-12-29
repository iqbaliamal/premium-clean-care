<?php
      if(isset($_GET['pesan'])){
        $pesan = $_GET['pesan'];
        if ($pesan == "berhasil") {
          ?>
          <div class="alert alert-success">
          <strong>Success!</strong>Anda berhasil login.
          </div>
          <?php
        }
      }
      ?>
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

        <div class="col-lg-4 col-md-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <img src="assets/img/s1.jpeg" class="img-fluid mb-3" alt="">
            <h4><a href="index.php?page=detail">FAST CLEAN</a></h4>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <img src="assets/img/s2.jpeg" class="img-fluid mb-3" alt="">
            <h4><a href="index.php?page=detail">DEEP CLEAN</a></h4>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <img src="assets/img/T2.jpeg" class="img-fluid mb-3" alt="">
            <h4><a href="index.php?page=detail">HAT CLEAN</a></h4>
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
            <?php
            $query = $koneksi->query("SELECT * FROM jenis_layanan ORDER BY id_jenis_layanan ASC");
            while ($data = mysqli_fetch_assoc($query)) {
            ?>
              <li data-filter=".filter-<?= $data['jenis_layanan']; ?>"><?= $data['jenis_layanan']; ?></li>
            <?php } ?>
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
                  <a href="index.php?page=detail" title="More Details"><i class="bx bx-link"></i></a>
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
                  <a href="index.php?page=detail" title="More Details"><i class="bx bx-link"></i></a>
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
                  <a href="index.php?page=detail" title="More Details"><i class="bx bx-link"></i></a>
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
                  <a href="index.php?page=detail" title="More Details"><i class="bx bx-link"></i></a>
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
                <button type="submit" class="btn btn-dark float-right">Cek Status</button>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="row justify-content-md-center">
        <ul class="bulat-proses">
          <li class="active">Penjemputan</li>
          <li>Proses Cuci</li>
          <li>Pengantaran</li>
          <li>Selesai</li>
        </ul>
      </div>
      <div class="row justify-content-center mt-4">
        <ul class="detail_cek">
          <li><b>NOMOR NOTA : </b> PCAC001</li>
          <li>Nomor Nota : PCAC001</li>
          <li>Nomor Nota : PCAC001</li>
          <li>Nomor Nota : PCAC001</li>
          <li>Nomor Nota : PCAC001</li>
        </ul>
      </div>



    </div>
  </section>
  <!-- End of cek nota section -->

</main><!-- End #main -->