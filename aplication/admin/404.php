<?php
session_start();
if (isset($_SESSION['id_admin']) && isset($_SESSION['user_admin'])) {
  require_once "header.php";
?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
      <div class="error mx-auto" data-text="404">404</div>
      <p class="lead text-gray-800 mb-5">Page Not Found</p>
      <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
      <a href="index.php">&larr; Back to Dashboard</a>
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