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
      <h1 class="h3 mb-0 text-gray-800">Testimoni</h1>

      <nav aria-label="breadcrumb shadow">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Testimoni</li>
        </ol>
      </nav>
    </div>

    <!-- DataTales Example -->
    <div class="card mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Testimoni</h6>
      </div>
      <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahdata">
          Tambah Data
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
                <th hidden>id admin</th>
                <th>Akun IG</th>
                <th>Testimoni</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th hidden>id testimoni</th>
                <th>Akun IG</th>
                <th>Testimoni</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
              $query = $koneksi->query("SELECT * FROM testimoni ORDER BY id_testimoni ASC");
              $no = 1;
              while ($data = mysqli_fetch_assoc($query)) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td hidden><?= $data['id_testimoni']; ?></td>
                  <td><?= $data['akun_ig']; ?></td>
                  <td><?= $data['testimoni']; ?></td>
                  <td>
                    <button class="editbtn border-0 btn-transition btn btn-outline-warning" type="button"> <i class="fa fa-edit"></i> </button>
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="fungsi/fungsi_testimoni.php" method="POST">
            <div class="modal-body">

              <div class="form-group">
                <label>akun IG</label>
                <input type="text" name="akun_ig" class="form-control" placeholder="akun IG" required>
              </div>

              <div class="form-group">
                <label>Testimoni</label>
                <textarea type="text" name="testimoni" class="form-control" placeholder="Testimoni" required></textarea>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="addTestimoni" class="btn btn-primary">Simpan</button>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- ======================================================================= -->

    <!-- EDIT DATA -->
    <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="fungsi/fungsi_testimoni.php" method="POST">
            <div class="modal-body">

              <input type="hidden" name="update_id" id="update_id">

              <div class="form-group">
                <label>akun IG</label>
                <input type="text" name="akun_ig" id="akunIG" class="form-control" placeholder="akun IG" required>
              </div>

              <div class="form-group">
                <label>Testimoni</label>
                <textarea type="text" name="testimoni" id="testimoni" class="form-control" placeholder="Testimoni" required></textarea>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="editTestimoni" class="btn btn-primary">Update</button>
            </div>
          </form>

        </div>
      </div>
    </div>

    <!-- =============================================================================================== -->


    <!-- DELETE DATA -->
    <div class="modal fade" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <form action="fungsi/fungsi_testimoni.php" method="POST">
            <div class="modal-body">
              <input type="hidden" name="delete_id" id="delete">
              <h5> Apakah anda yakin akan menghapus data?</h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
              <button type="submit" name="deleteTestimoni" class="btn btn-danger"> Hapus </button>
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
          $('#deleteData').modal('show');
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

  <!-- SCRIPT EDIT DATA -->
  <script>
    $(document).ready(function() {
      $('#dataTable tbody').on('click', '.editbtn', function() {
        $('.editbtn').on('click', function() {
          $('#editData').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function() {
            return $(this).text();
          }).get();

          console.log(data);

          $('#update_id').val(data[1]);
          $('#akunIG').val(data[2]);
          $('#testimoni').val(data[3]);
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