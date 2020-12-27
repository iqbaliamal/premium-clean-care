<?php
require_once "header.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jenis Layanan</h1>

    <nav aria-label="breadcrumb shadow">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Jenis Layanan</li>
      </ol>
    </nav>
  </div>

  <!-- DataTales Example -->
  <div class="card mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Jenis Layanan</h6>
    </div>
    <div class="card-body">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahdata">
        Tambah Jenis Layanan
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
              <th hidden>id Jenis Layanan</th>
              <th>Jenis Layanan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th hidden>id Jenis Layanan</th>
              <th>Jenis Layanan</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <td>1</td>
              <td hidden>id</td>
              <td>Deep Clean</td>
              <td>
                <button class="editbtn border-0 btn-transition btn btn-outline-warning" type="button"> <i class="fa fa-edit"></i> </button>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Layanan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <label>Jenis Layanan</label>
              <input type="text" name="jenis_layanan" class="form-control" placeholder="Jenis Layanan" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addJenisLayanan" class="btn btn-primary">Simpan</button>
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
        <form action="" method="POST">
          <div class="modal-body">

            <input type="hidden" name="update_id" id="update_id">
            <div class="form-group">
              <label>Jenis Layanan</label>
              <input type="text" name="jenis_layanan" id="jenis_layanan" class="form-control" placeholder="Jenis Layanan" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="editOrderStatus" class="btn btn-primary">Update</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- =============================================================================================== -->

  <!-- DELETE DATA -->
  <div class="modal fade" id="deleteJenisLayanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <form action="" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_id" id="delete_id">
            <h5> Apakah anda yakin akan menghapus data?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
            <button type="submit" name="deleteJenisLayanan" class="btn btn-danger"> Hapus </button>
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
        $('#deleteJenisLayanan').modal('show');
        //script disini
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
        $('#jenis_layanan').val(data[2]);
      });
    });
  });
</script>