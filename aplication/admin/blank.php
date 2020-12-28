<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['nama'])) {
  require_once "header.php";
?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Blank</h1>

      <nav aria-label="breadcrumb shadow">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Blank</li>
        </ol>
      </nav>
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