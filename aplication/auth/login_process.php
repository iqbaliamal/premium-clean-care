<?php
session_start();
include_once '../../config/koneksi.php';

$email = $_POST['email'];
$pass = $_POST['password'];
$query = mysqli_query($koneksi, "SELECT * FROM member WHERE email='$email'");
if (!$query) {
  //DEBUG
  die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
    " - " . mysqli_error($koneksi));
} else {
  $data = mysqli_fetch_assoc($query);
  $password = $data['password'];

  if (password_verify($pass, $password)) {

    header("Location:../../index.php?page=home&pesan=Berhasil Login");
    exit;
  } else {
    header("Location:../../index.php?page=login&pesan=gagal");
    exit();
  }
}
