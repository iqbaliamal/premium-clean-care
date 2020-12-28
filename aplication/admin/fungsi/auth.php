<?php
session_start();
require_once '../../../config/koneksi.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $user = validate($_POST['username']);
  $pass = validate($_POST['password']);


  if (empty($user)) {
    header("Location: ../login.php?error=Username or Email is required");
    exit();
  } else if (empty($pass)) {
    header("Location: ../login.php?error=Password is required");
    exit();
  } else {
    $query = $koneksi->query("SELECT * FROM admin WHERE (username='$user' OR email = '$user')");

    if (mysqli_num_rows($query) == 0) {
      header("Location: ../login.php?error=Username atau Email Belum Terdaftar!");
    } else {
      $row = mysqli_fetch_assoc($query);
      $password = $row['password'];

      if (password_verify($pass, $password)) {
        $_SESSION['nama'] = $row['nama_admin'];
        $_SESSION['id'] = $row['id_admin'];
        $_SESSION['user'] = $row['username'];
        $_SESSION['email'] = $row['email'];

        header("Location: ../index.php");
        exit;
      } else {
        header("Location: ../login.php?error=Password is Incorrect");
        exit();
      }
    }
  }
} else {
  header("Location: ../login.php");
  exit();
}
