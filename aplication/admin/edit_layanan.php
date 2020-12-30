<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['nama'])) {
  require_once "header.php";
  require_once "../../config/koneksi.php";
  $query = $koneksi->query("SELECT * FROM layanan WHERE id_layanan='$_GET[id]'");
  $data = mysqli_fetch_array($query);
?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Edit Layanan</h1>

      <nav aria-label="breadcrumb shadow">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Layanan</li>
        </ol>
      </nav>
    </div>

    <!--Start Form-->
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Data Layanan</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <form class="form form-horizontal" action="fungsi/fungsi_layanan.php" method="POST" enctype="multipart/form-data">
            <div class="form-body">
              <div class="row">
                <div class="col-md-2">
                  <label>Jenis Layanan</label>
                </div>
                <input type="hidden" name="id" value="<?= $data['id_layanan'] ?>">
                <div class="col-md-5 form-group">
                  <select name="jenis_layanan" id="jl" class="form-control">
                    <?php
                    $qjl = $koneksi->query("SELECT * FROM jenis_layanan");
                    while ($row = mysqli_fetch_assoc($qjl)) {
                    ?>
                      <option value="<?= $row['id_jenis_layanan']; ?>" <?php if ($row['id_jenis_layanan'] == $data['id_jenis_layanan']) echo 'selected'; ?>><?php echo $row['jenis_layanan']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label>Nama Layanan</label>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="nama_layanan" id="nama_layanan" class="form-control" value="<?= $data['nama_layanan']; ?>" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label>Harga</label>
                </div>
                <div class="col-md-5 form-group">
                  <input type="number" name="harga" id="harga" class="form-control" value="<?= $data['harga_layanan']; ?>" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label>Gambar</label>
                </div>
                <div class="col-md-5 form-group">
                  <div class="col-md-5 form-group">
                    <div class="col-md-4 pb-3">
                      <img src="../../assets/img/gambar_layanan/<?php echo $data['gambar']; ?>" style="width: 200px;border-radius:10px;">
                      <?php
                      // $idhapus = $_GET['id'];
                      ?>
                      <!-- <a href="" class="btn btn-block btn-danger btn-sm mt-2">Hapus</a> -->
                    </div>
                    <input type="file" name="img" class="form-control">
                    <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
                  </div>
                </div>
                <div class="col-sm-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mr-1 mb-1" name="editLayanan">Simpan</button>
                  <a href="layanan.php" class="btn btn-light-secondary mr-1 mb-1">Batal</a>
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