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
}
if (mysqli_num_rows($query) == 0) {
  header("Location:../../index.php?page=login&error=Email belum terdaftar!");
} else {
  $data = mysqli_fetch_assoc($query);
  $password = $data['password'];

  if (password_verify($pass, $password)) {
    $_SESSION['nama']   = $data['nama_member'];
    $_SESSION['id']     = $data['id_member'];
    $_SESSION['user']   = $data['username'];
    $_SESSION['no']     = $data['nomor_hp'];
    $_SESSION['email']  = $data['email'];
    header("Location:../../index.php?page=profile&sukses=Berhasil Login");
    exit;
  } else {
    header("Location:../../index.php?page=login&error=Password yang anda masukkan salah!");
    exit();
  }
}
