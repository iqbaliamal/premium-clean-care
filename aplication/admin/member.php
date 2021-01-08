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
              <?php
              $query = $koneksi->query("SELECT * FROM member ORDER BY id_member ASC");
              $no = 1;
              while ($data = mysqli_fetch_assoc($query)) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td hidden><?= $data['id_member']; ?></td>
                  <td><?= $data['nama_member']; ?></td>
                  <td><?= $data['email']; ?></td>
                  <td><?= $data['nomor_hp']; ?></td>
                  <td>
                    <?php
                    $status = $data['is_active'];
                    if ($status == 1) {
                    ?>
                      <span class="badge badge-success">Aktif</span>
                    <?php } else { ?>
                      <span class="badge badge-danger">Belum verifikasi akun</span>
                    <?php } ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
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