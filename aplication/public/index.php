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

        <!-- LAYANAN TERFAVORIT  ==== BELUM FIX ==== -->
        <?php
        //$qsql = $koneksi->query("SELECT id_layanan COUNT(id_layanan) AS best FROM order GROUP BY id_layanan LEFT JOIN layanan ON order.id_layanan=layanan.id_layanan ORDER BY best DESC LIMIT 3");
        $query = $koneksi->query("SELECT * FROM layanan LEFT JOIN jenis_layanan ON layanan.id_jenis_layanan=jenis_layanan.id_jenis_layanan ORDER BY layanan.id_layanan ASC LIMIT 3");
        while ($fav = mysqli_fetch_assoc($query)) {

        ?>
          <div class="col-lg-4 col-md-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <img src="assets/img/gambar_layanan/<?= $fav['gambar']; ?>" class="img-fluid mb-3" alt="">
              <h4><a href="index.php?page=detail"><?= $fav['nama_layanan']; ?></a></h4>
            </div>
          </div>
        <?php } ?>
      </div>
      <!-- END OF LAYANAN TERFAVORIT -->

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

        <?php
        $q = $koneksi->query("SELECT * FROM layanan LEFT JOIN jenis_layanan ON layanan.id_jenis_layanan=jenis_layanan.id_jenis_layanan ORDER BY layanan.id_layanan ASC");
        while ($row = mysqli_fetch_assoc($q)) {
        ?>
          <div class="col-lg-3 col-md-6 portfolio-item filter-<?= $row['jenis_layanan']; ?>">
            <div class="member">
              <div class="member-img portfolio-wrap">
                <img src="assets/img/gambar_layanan/<?= $row['gambar']; ?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?= $row['nama_layanan']; ?></h4>
                  <p><?= $row['harga_layanan']; ?></p>
                  <div class="portfolio-links">
                    <a href="index.php?page=detail&idl=<?= $row['id_layanan']; ?>" title="More Details">
                      <i class="ri-search-2-line"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>

      </div>

    </div>
  </section><!-- End Layanan Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container" data-aos="zoom-in">

      <div class="owl-carousel testimonials-carousel">
        
      <?php
        $query = $koneksi->query("SELECT * FROM testimoni ORDER BY id_testimoni ASC");
        $NO = 1;
        WHILE ($data = mysqli_fetch_assoc($query)) {
        ?>

        <div class="testimonial-item">
        
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            <?= $data['testimoni']; ?>
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
          <h3><? $data['akun_ig']; ?></h3>
        </div>
        <?php
        }
        ?>

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