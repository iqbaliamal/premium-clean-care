<?php
session_start();
require_once "../../../config/koneksi.php";

// TAMBAH DATA ADMIN
if (isset($_POST['simpan'])) {
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $id = validate($_POST['id_admin']);
  $nama_admin = validate($_POST['nama']);
  $password = validate($_POST['password1']);
  $password2 = validate($_POST['retypePassword']);

  if (empty($password && $password2)) {
    $query = $koneksi->query("UPDATE admin SET nama_admin='$nama_admin' WHERE id_admin='$id'");
    if (!$query) {
      header("location: ../profile.php?error=Profile anda gagal di ubah!");
      //DEBUG
      die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {
      header("location: ../profile.php?sukses=Profile anda berhasil di ubah!");
    };
  } else {
    if ($password !== $password2) {
      header("location: ../profile.php?error=Password tidak sesuai");
    } else {
      $encPassword = password_hash($password, PASSWORD_DEFAULT);
      $query = $koneksi->query("UPDATE admin SET nama_admin='$nama_admin', password='$encPassword' WHERE id_admin='$id'");
      if (!$query) {
        header("location: ../profile.php?error=Profile anda gagal di ubah!");
        //DEBUG
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
          " - " . mysqli_error($koneksi));
      } else {
        header("location: ../logout.php?sukses=Profile anda berhasil di ubah!");
      };
    };
  };
};
// END OF TAMBAH DATA ADMIN ==========================