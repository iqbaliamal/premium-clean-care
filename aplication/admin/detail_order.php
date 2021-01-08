<?php
session_start();
if (isset($_SESSION['id_admin']) && isset($_SESSION['user_admin'])) {
  require_once "header.php";
  require_once "../../config/koneksi.php";

  $id     = $_GET['id'];
  $query  = $koneksi->query("SELECT * FROM `order` INNER JOIN `layanan` ON order.id_layanan=layanan.id_layanan INNER JOIN order_status ON order.id_order_status=order_status.id_order_status WHERE id_order='$id'");
  $data   = mysqli_fetch_array($query);
?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Detail Order</h1>

      <nav aria-label="breadcrumb shadow">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail Order</li>
        </ol>
      </nav>
    </div>

    <!--Start Form-->
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Detail Order</h4>
        <a href="order.php" class="btn btn-secondary mr-1 mb-1"><i class="fas fa-arrow-left"></i> Kembali</a>
      </div>
      <div class="card-content">
        <div class="card-body">
          <form class="form form-horizontal" action="fungsi/fungsi_order.php" method="POST">
            <div class="form-body">
              <input type="hidden" name="id" value="<?= $data['id_order']; ?>">

              <div class="row">
                <div class="col-md-2">
                  <label>Nama Layanan</label>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="nama_layanan" id="nama_layanan" class="form-control" value="<?= $data['nama_layanan']; ?>" readonly>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Order Status</label>
                </div>
                <div class="col-md-5 form-group">
                  <select name="order_status" id="order_status" class="form-control">
                    <?php
                    $qsql = $koneksi->query("SELECT * FROM order_status");
                    while ($row = mysqli_fetch_assoc($qsql)) {
                    ?>
                      <option value="<?= $row['id_order_status']; ?>" <?php if ($row['id_order_status'] == $data['id_order_status']) echo 'selected'; ?>><?php echo $row['order_status']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Order Date</label>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="order_date" id="order_date" class="form-control" value="<?= $data['order_date']; ?>" readonly>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Harga</label>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="harga" id="harga" class="form-control" value="<?= $data['harga']; ?>" readonly>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Merk</label>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="merk" id="merk" class="form-control" value="<?= $data['merk']; ?>" readonly>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Ukuran</label>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="ukuran" id="ukuran" class="form-control" value="<?= $data['ukuran']; ?>" readonly>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Warna</label>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="warna" id="warna" class="form-control" value="<?= $data['warna']; ?>" readonly>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Tanggal Ambil Barang</label>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="tanggal_pick" id="tanggal_pick" class="form-control" value="<?= $data['tanggal_pick']; ?>" readonly>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Lokasi</label>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="lokasi" id="lokasi" class="form-control" value="<?= $data['lokasi_pick']; ?>" readonly>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-md-2">
                  <label>Nama Pelanggan</label>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" value="<?= $data['nama_pelanggan']; ?>" readonly>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Email</label>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="email" id="email" class="form-control" value="<?= $data['email']; ?>" readonly>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Nomor Hp</label>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" value="<?= $data['nomor_hp']; ?>" readonly>
                </div>
              </div>


              <div class="col-sm-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-1" name="detail_order">Simpan</button>
                <a href="order.php" class="btn btn-light-secondary mr-1 mb-1">Batal</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
<?php
  require_once "footer.php";
} else {
  header("Location: login.php");
  exit();
}
?>