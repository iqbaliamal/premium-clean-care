<?php
session_start();
require_once "../../koneksi.php";

// TAMBAH DATA ADMIN
if (isset($_POST['addAdmin'])) {
  # code...
  $nama_admin = htmlspecialchars($_POST['nama_admin']);
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $password = password_hash($password, PASSWORD_DEFAULT);

  $cek = $koneksi->query("SELECT * FROM admin WHERE email='$email' OR username='$username'");
  if (mysqli_num_rows($cek) > 0) {
    header("location: ../admin.php?error=Username atau Email Sudah terdaftar!");
  } else {
    $query = $koneksi->query("INSERT INTO admin SET nama_admin='$nama_admin', username='$username', email='$email', password='$password'");
    if (!$query) {
      header("location: ../admin.php?error=Data Gagal Di Tambahkan");
      //DEBUG
      die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      header("location: ../admin.php?sukses=Data Berhasil Di Tambahkan");

      //SWEAT ALERT
      // $_SESSION['status'] = "Success!";
      // $_SESSION['status_code'] = "success";
      // $_SESSION['status_text'] = "Data Anda Berhasil Di Tambahkan!";
    }
  }
};
// END OF TAMBAH DATA ADMIN ==========================

// HAPUS DATA ADMIN
if (isset($_POST['deleteAdmin'])) {
  $id = $_POST['delete_id'];

  $query = $koneksi->query("DELETE FROM admin WHERE id_admin='$id'");

  if ($query) {
    header("location: ../admin.php?sukses=Data Berhasil Di Hapus");
    // $_SESSION['status'] = "Success!";
    // $_SESSION['status_code'] = "success";
    // $_SESSION['status_text'] = "Data Anda Berhasil Di Hapus!";
  } else {
    header("location: ../admin.php");
    $_SESSION['status'] = "Failed!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Data Anda Gagal Di Hapus!";
  }
}
// END OF HAPUS DATA ADMIN ==========================