<div class="container">
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs mb-3">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Detail Layanan</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Detail Layanan</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <?php
  $id = $_GET['idl'];
  $query = $koneksi->query("SELECT * FROM layanan LEFT JOIN jenis_layanan ON layanan.id_jenis_layanan=jenis_layanan.id_jenis_layanan WHERE id_layanan='$id'");
  $data = mysqli_fetch_assoc($query);
  ?>
  <div class="gbr-detail fill">
    <img src="assets/img/gambar_layanan/<?= $data['gambar']; ?>" class="img-fluid" alt="">
  </div>


  <h3>Keterangan</h3>
  <ol type="1">
    <li>Pengerjaan dapat ditunggu di workshop.</li>
    <li>Kami melayani antar jemput barang laundry untuk wilayah Jember Kota.</li>
    <li>Dilakukan secara manual sehingga aman untuk semua jenis sepatu,tas, dan topi.</li>
    <li>Aman untuk semua bahan material dan warna sepatu karena menggunakan bahan alami dan teknik yang benar.</li>
    <li>Bagian yang di treatment : upper, midsole.</li>
    <li>Durasi pengerjaan +- 45 menit.</li>
  </ol>

  <h3>NOTE</h3>
  <ol type="i">
    <li>Jangan biarkan noda melekat terlalu lama dan merusak bahan dari sepatu kesayanganmu.</li>
    <li>Jangan lupa untuk follow instagram kita untuk mendapatkan info promo-promo menarik untuk anda.</li>
  </ol>

  <h3>Order Now !</h3>
  <!-- ALERT -->
  <?php if (isset($_GET['sukses'])) { ?>
    <div class="alert alert-success" role="alert">
      <?php echo $_GET['sukses'] ?>
    </div>
  <?php } ?>
  <?php if (isset($_GET['error'])) { ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $_GET['error'] ?>
    </div>
  <?php } ?>
  <!-- END OF ALERT -->
  <div class="my-5">
    <div class="container">
      <div class="border">
        <form action="aplication/public/transaksi.php" method="POST" class="form-group login">
          <div class="row">
            <div class="col">
              <h4>Layanan</h4>
              <input type="hidden" name="id" value="<?= $data['id_layanan'] ?>">
              <label for="layanann">Layanan</label>
              <input type="text" name="layanan" id="layanann" class="form-control mb-2" value="<?= $data['jenis_layanan']; ?> || <?= $data['nama_layanan']; ?>" readonly />

              <label for="harga">Harga</label>
              <input type="text" name="harga" id="harga" class="form-control mb-2" value="<?= $data['harga_layanan']; ?>" readonly />

              <?php
              $jenis = $data['jenis_layanan'];
              if ($jenis === "Sepatu") {
              ?>
                <label for=" merk">Merk Sepatu</label>
                <input type="text" name="merk" id="merk" class="form-control mb-2" />

                <label for="ukuran">Ukuran Sepatu</label>
                <input type="text" name="ukuran" id="ukuran" class="form-control mb-2" />

                <label for="warna">Warna Sepatu</label>
                <input type="text" name="warna" id="warna" class="form-control mb-2" />
              <?php } ?>

              <label for="waktu">Tanggal dan Waktu Pick Up</label>
              <input type="datetime-local" name="waktu" id="waktu" class="form-control mb-2" />

              <label for="lokasi">Alamat Pick Up</label>
              <input type="text" name="lokasi" id="lokasi" class="form-control mb-2" required />
              <p style="color: red; font-size: 10px;">Jika COD, tulis COD pada form alamat</p>

            </div>
            <div class="col">
              <h4>Contact Detail</h4>
              <label for="nama">Nama Lengkap</label>
              <input type="text" name="nama" id="nama" class="form-control mb-2" required />

              <label for="email">Email</label>
              <input type="email" name="" id="email" class="form-control mb-2" required />

              <label for="no">Nomor HP</label>
              <input type="number" name="no" id="no" class="form-control mb-2" required />
              <br>
              <p>setelah klik submit silahkan cek email anda, dan pastikan data yang dikirimkan ke email anda sudah benar.
                kami akan segera menghubungi anda untuk melakukan konfirmasi
              </p>
              <button class="float-right btn" type="submit">SUBMIT</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>