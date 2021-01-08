<?php
session_start();
if (isset($_SESSION['id_admin']) && isset($_SESSION['user_admin'])) {
  require_once "header.php";
  require_once "../../config/koneksi.php";
?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Layanan</h1>

      <nav aria-label="breadcrumb shadow">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Layanan</li>
        </ol>
      </nav>
    </div>

    <!-- DataTales Example -->
    <div class="card mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Layanan Tersedia</h6>
      </div>
      <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahdata">
          Tambah Layanan
        </button>

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

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th hidden>id Layanan</th>
                <th>Jenis Layanan</th>
                <th>Layanan</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th hidden>id Layanan</th>
                <th>Jenis Layanan</th>
                <th>Layanan</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
              $query = $koneksi->query("SELECT * FROM layanan LEFT JOIN jenis_layanan ON layanan.id_jenis_layanan=jenis_layanan.id_jenis_layanan ORDER BY layanan.id_jenis_layanan ASC");
              $no = 1;
              while ($data = mysqli_fetch_assoc($query)) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td hidden><?= $data['id_layanan']; ?></td>
                  <td><?= $data['jenis_layanan']; ?></td>
                  <td><?= $data['nama_layanan']; ?></td>
                  <td>Rp. <?= $data['harga_layanan']; ?></td>
                  <td style="text-align: center;"><img src="../../assets/img/gambar_layanan/<?php echo $data['gambar']; ?>" style="width: 120px;"></td>
                  <td>
                    <a href="edit_layanan.php?&id=<?= $data['id_layanan'] ?>" class="editbtn border-0 btn-transition btn btn-outline-warning" type="button"> <i class="fa fa-edit"></i> </a>
                    <button class="deletebtn border-0 btn-transition btn btn-outline-danger" type="button"> <i class="fa fa-trash"></i> </button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal TAMBAH DATA -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Layanan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="fungsi/fungsi_layanan.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group">
                <label>Jenis Layanan</label>
                <?php
                $qjl = $koneksi->query("SELECT * FROM jenis_layanan");
                ?>
                <select class="form-control" name="jenis_layanan">
                  <?php
                  while ($row = mysqli_fetch_assoc($qjl)) {
                  ?>
                    <option class="form-control" value="<?= $row['id_jenis_layanan']; ?>"><?= $row['jenis_layanan']; ?></option>
                  <?php } ?>

                </select>
              </div>

              <div class="form-group">
                <label>Nama Layanan</label>
                <input type="text" name="nama_layanan" class="form-control" placeholder="Nama Layanan" required>
              </div>

              <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Harga" required>
              </div>

              <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control" required>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="addLayanan" class="btn btn-primary">Simpan</button>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- ======================================================================= -->

    <!-- DELETE DATA -->
    <div class="modal fade" id="deleteLayanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <form action="fungsi/fungsi_layanan.php" method="POST">
            <div class="modal-body">
              <input type="hidden" name="delete_id" id="delete">
              <h5> Apakah anda yakin akan menghapus data?</h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
              <button type="submit" name="deleteLayanan" class="btn btn-danger"> Hapus </button>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- ======================================================================================== -->



  </div>
  <!-- /.container-fluid -->



  <?php
  require_once "footer.php";
  ?>

  <!-- SCRIPT HAPUS DATA -->
  <script>
    $(document).ready(function() {
      $('#dataTable tbody').on('click', '.deletebtn', function() {
        //alert("you activate the event");
        $('.deletebtn').on('click', function() {
          $('#deleteLayanan').modal('show');
          $tr = $(this).closest('tr');
          var data = $tr.children("td").map(function() {
            return $(this).text();
          }).get();

          console.log(data);

          $('#delete').val(data[1]);
        });
      });
    });
  </script>
<?php
} else {
  header("Location: login.php");
  exit();
}
?>