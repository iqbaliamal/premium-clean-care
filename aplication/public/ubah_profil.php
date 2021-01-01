<?php
session_start();
require_once "../../config/koneksi.php";

// TAMBAH DATA ADMIN
if (isset($_POST['simpanProfile'])) {
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $id         = validate($_POST['id']);
  $nama       = validate($_POST['nama_lengkap']);
  $email      = validate($_POST['email']);
  $no_hp      = validate($_POST['no']);
  $password   = validate($_POST['password']);
  $password2  = validate($_POST['retypePassword']);

  if (empty($password && $password2)) {
    $query = $koneksi->query("UPDATE member SET nama_member='$nama', email='$email', nomor_hp='$no_hp' WHERE id_member='$id'");
    if (!$query) {
      header("location: ../../index.php?page=profile&error=Profile anda gagal di ubah!");
      //DEBUG
      die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {
      header("location: ../../index.php?page=profile&sukses=Profile anda berhasil di ubah!");
    };
  } else {
    if ($password !== $password2) {
      header("location: ../../index.php?page=profile&error=Password tidak sesuai");
    } else {
      $encPassword = password_hash($password, PASSWORD_DEFAULT);
      $query = $koneksi->query("UPDATE member SET nama_member='$nama', email='$email', nomor_hp='$no_hp', password='$encPassword' WHERE id_member='$id'");
      if (!$query) {
        header("location: ../../index.php?page=profile&error=Profile anda gagal di ubah!");
        //DEBUG
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
          " - " . mysqli_error($koneksi));
      } else {
        header("location: ../../index.php?page=profile&sukses=Profile anda berhasil di ubah!");
      };
    };
  };
};
// END OF TAMBAH DATA ADMIN ==========================