<?php
session_start();
require_once "../../../config/koneksi.php";

// TAMBAH DATA ADMIN
if (isset($_POST['simpan'])) {
  # code...
  $id = htmlspecialchars($_POST['id_admin']);
  $nama_admin = htmlspecialchars($_POST['nama']);
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password1']);
  $password2 = htmlspecialchars($_POST['retypePassword']);

  if (isset($password, $password2)) {
    if ($password !== $password2) {
      header("location: ../profile.php?error=Password tidak sesuai");
    } else {
      $encPassword = password_hash($password, PASSWORD_DEFAULT);
      $query = $koneksi->query("UPDATE admin SET nama_admin='$nama_admin', username='$username', email='$email', password='$encPassword' WHERE id_admin='$id'");
      if (!$query) {
        header("location: ../profile.php?error=Profile anda gagal di ubah!");
        //DEBUG
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
          " - " . mysqli_error($koneksi));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        header("location: ../profile.php?sukses=Profile anda berhasil di ubah!");
      };
    };
  } else {
    $query = $koneksi->query("UPDATE admin SET nama_admin='$nama_admin', username='$username', email='$email' WHERE id_admin='$id'");
    if (!$query) {
      header("location: ../profile.php?error=Profile anda gagal di ubah!");
      //DEBUG
      die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      header("location: ../profile.php?sukses=Profile anda berhasil di ubah!");
    };
  };
};
// END OF TAMBAH DATA ADMIN ==========================