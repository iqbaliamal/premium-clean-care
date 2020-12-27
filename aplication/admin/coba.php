<?php
require_once "header.php";
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
      <div class="alert alert-success" role="alert">
        Get alert sukses
      </div>
      <div class="alert alert-danger" role="alert">
        Get alert danger
      </div>
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
            <tr>
              <td>1</td>
              <td hidden>id testimoni</td>
              <td>@Budi2020</td>
              <td>Budi</td>
              <td>
                <a href="edit_testimoni.php" class="border-0 btn-transition btn btn-outline-warning" type="button"> <i class="fa fa-edit"></i> </a>
                <button class="deletebtn border-0 btn-transition btn btn-outline-danger" type="button"> <i class="fa fa-trash"></i> </button>
              </td>
            </tr>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Testimoni</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="POST">
          <div class="modal-body">

            <div class="form-group">
              <label>Nama User</label>
              <input type="text" name="nama_user" class="form-control" placeholder="Nama User" required>
            </div>

            <div class="form-group">
              <label>akun IG</label>
              <input type="text" name="akun IG" class="form-control" placeholder="akun IG" required>
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

  <!-- DELETE DATA -->
  <div class="modal fade" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <form action="" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_id" id="delete_id">
            <h5> Apakah anda yakin akan menghapus data?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
            <button type="submit" name="deleteOrderStatus" class="btn btn-danger"> Hapus </button>
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
        // script disini
      });
    });
  });
</script>