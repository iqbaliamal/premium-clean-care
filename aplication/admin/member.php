<?php
require_once "header.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Member</h1>

    <nav aria-label="breadcrumb shadow">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Member</li>
      </ol>
    </nav>
  </div>

  <!-- DataTales Example -->
  <div class="card mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Member</h6>
    </div>
    <div class="card-body">

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th hidden>id member</th>
              <th>Nama Member</th>
              <th>Email</th>
              <th>Nomor HP</th>
              <th>Status</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th hidden>id member</th>
              <th>Nama Member</th>
              <th>Email</th>
              <th>Nomor HP</th>
              <th>Status</th>
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <td>1</td>
              <td hidden>idlayanan</td>
              <td>Budi</td>
              <td>budi@member.com</td>
              <td>08123456780</td>
              <td>
                <span class="badge badge-success">Aktif</span>
                <span class="badge badge-danger">Tidak Aktif</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- DELETE DATA -->
  <div class="modal fade" id="deleteLayanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <form action="" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_id" id="delete_id">
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