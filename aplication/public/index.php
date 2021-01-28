<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
  <div class="container" data-aos="fade-up">

    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
      <div class="col-xl-6 col-lg-8">
        <h1>Premium Clean And Care<span>.</span></h1>
        <h2>Your Pleasure Is Our Priority</h2>
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
        // $query = $koneksi->query("SELECT * FROM layanan LEFT JOIN jenis_layanan ON layanan.id_jenis_layanan=jenis_layanan.id_jenis_layanan ORDER BY layanan.id_layanan ASC LIMIT 3");
        $query = $koneksi->query("SELECT COUNT(order.id_layanan) AS fav, order.id_layanan, nama_layanan AS nama, gambar AS gbr_produk FROM `layanan` JOIN `order` ON layanan.id_layanan=order.id_layanan GROUP BY order.id_layanan ORDER BY fav DESC LIMIT 3;");

        if (!$query) {
          echo "gagal";
          echo (mysqli_errno($koneksi));
          echo " -  ";
          echo (mysqli_error($koneksi)); 
        };
        
        while ($fav = mysqli_fetch_assoc($query)) {

        ?>
          <div class="col-lg-4 col-md-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <img src="assets/img/gambar_layanan/<?= $fav['gbr_produk']; ?>" class="img-fluid mb-3" alt="">
              <h4><a href="index.php?page=detail&idl=<?= $fav['id_layanan']; ?>"><?= $fav['nama']; ?></a></h4>
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
        while ($data = mysqli_fetch_assoc($query)) {
        ?>

          <div class="testimonial-item">

            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              <?= $data['testimoni']; ?>
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <h3>
              <?= $data['akun_ig']; ?>
            </h3>
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
        <h2>Cek Status</h2>
        <p>CEK STATUS TRANSAKSI</p>
      </div>

      <!-- END OF ALERT -->
      <div class="row mt-3 m-auto">
        <form action="#ceknota" method="POST" class="ceknota w-100">
          <div class="form-group row w-100">
            <div class="col pr-0">
              <input type="text" class="form-control" name="nota" placeholder="Cek Nota" />
            </div>
            <div class="col-2 pl-0" style="max-width: 13%;">
              <button type="submit" name="submit" class="btn btn-dark float-right">Cek </button>
            </div>
          </div>
          <?php
          if (isset($_POST['submit'])) {
            $nota = $_POST['nota'];
            $query = $koneksi->query("SELECT * FROM `order` LEFT JOIN layanan ON order.id_layanan=layanan.id_layanan WHERE id_order='$nota'");
            $data = mysqli_fetch_assoc($query);
            if (!$query) {
              die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
            }
            if (!mysqli_num_rows($query)) {
          ?>
              <div class="alert alert-danger" role="alert">
                Nomor Nota tidak valid!
              </div>
            <?php
            } else {


            ?>
        </form>
      </div>
      <div class="row justify-content-md-center">
        <?php
              //$qs = $koneksi->query("SELECT * FROM ")
              $status = $data['id_order_status'];
        ?>
        <ul class="bulat-proses">
          <li class="<?php if ($status == "1") {
                        echo "active";
                      }; ?>">Penjemputan</li>
          <li class="<?php if ($status == "2") {
                        echo "active";
                      }; ?>">Proses Cuci</li>
          <li class="<?php if ($status == "3") {
                        echo "active";
                      }; ?>">Pengantaran</li>
          <li class="<?php if ($status == "4") {
                        echo "active";
                      }; ?>">Selesai</li>
        </ul>
      </div>
      <div class="row justify-content-center mt-4">
        <table class="detail_cek">
          <tr>
            <td><b>NOMOR NOTA</b></td>
            <td>:</td>
            <td><?= $data['id_order']; ?></td>
          </tr>
          <tr>
            <td><b>LAYANAN</b></td>
            <td>:</td>
            <td><?= $data['nama_layanan']; ?></td>
          </tr>
          <tr>
            <td><b>NAMA CUSTOMER</b></td>
            <td>:</td>
            <td><?= $data['nama_pelanggan']; ?></td>
          </tr>
          <tr>
            <td><b>MERK SEPATU</b></td>
            <td>:</td>
            <td><?= $data['merk']; ?></td>
          </tr>
          <tr>
            <td><b>UKURAN SEPATU</b></td>
            <td>:</td>
            <td><?= $data['ukuran']; ?></td>
          </tr>
          <tr>
            <td><b>WARNA SEPATU</b></td>
            <td>:</td>
            <td><?= $data['warna']; ?></td>
          </tr>
        </table>
      </div>

  <?php
            }
          }
  ?>


    </div>
  </section>
  <!-- End of cek nota section -->

</main><!-- End #main -->