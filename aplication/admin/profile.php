<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['nama'])) {
  require_once "header.php";
  require_once "../../config/koneksi.php";
?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Profile</h1>

      <nav aria-label="breadcrumb shadow">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
      </nav>
    </div>

    <div class="row">
      <!-- Account details card-->
      <div class="col-xl-12">
        <!-- Account details card-->
        <div class="card mb-4">
          <div class="card-header">Account Details</div>
          <div class="card-body">

            <!-- ALERT -->
            <?php if (isset($_GET['sukses'])) { ?>
              <div class="alert alert-success mb-3" role="alert">
                <?php echo $_GET['sukses'] ?>
              </div>
            <?php } ?>
            <?php if (isset($_GET['error'])) { ?>
              <div class="alert alert-danger mb-3" role="alert">
                <?php echo $_GET['error'] ?>
              </div>
            <?php } ?>
            <!-- END OF ALERT -->
            
            <?php
            $id = $_SESSION['id'];
            $query = $koneksi->query("SELECT * FROM admin WHERE id_admin='$id'");
            $row = mysqli_fetch_array($query);
            ?>

            <form action="fungsi/fungsi_profile.php" method="POST">
            <input type="text" name="id_admin" value="<?= $row['id_admin']; ?>" hidden>
              <!-- Form Group (username)-->
              <div class="form-group">
                <label class="mb-1" for="inputUsername">Username</label>
                <input class="form-control" id="inputUsername" type="text" name="username" value="<?= $row['username']; ?>" required />
              </div>
              <!-- Form Group (nama)-->
              <div class="form-group">
                <label class="mb-1" for="inputFirstName">Nama Lengkap</label>
                <input class="form-control" id="inputFirstName" type="text" name="nama" placeholder="Nama Lengkap" value="<?= $row['nama_admin']; ?>" required />
              </div>
              <!-- Form Group (email address)-->
              <div class="form-group">
                <label class="mb-1" for="inputEmailAddress">Email address</label>
                <input class="form-control" id="inputEmailAddress" type="email" name="email" placeholder="Email address" value="<?= $row['email']; ?>" required />
              </div>
              <!-- Form Row-->
              <div class="form-row">
                <!-- Form Group New Password-->
                <div class="form-group col-md-6">
                  <label class="mb-1" for="NewPassword">New Password</label>
                  <input class="form-control" id="NewPassword" type="password" name="password1" placeholder="New Password" value="" />
                </div>
                <!-- Form Group Retype Password-->
                <div class="form-group col-md-6">
                  <label class="mb-1" for="retype">Retype Password</label>
                  <input class="form-control" id="retype" type="password" name="retypePassword" placeholder="Retype Password" value="" />
                </div>
              </div>
              <!-- Save changes button-->
              <button class="btn btn-primary" type="submit" name="simpan">Save changes</button>
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