<?php
require_once "config/koneksi.php";

if (isset($_GET['token'])) {
  $token = $_GET['token'];
  $query = $koneksi->query("SELECT * FROM member WHERE token = '$token'");
  if (mysqli_num_rows($query) > 0) {
    $member = mysqli_fetch_assoc($query);
    $id = $member['id_member'];
    $query = $koneksi->query("UPDATE member SET is_active=1, token=NULL WHERE id_member=$id");
    if ($query) {
      header("location: index.php?page=login&sukses=Akun anda sudah aktif, silahkan login!");
    } else {
      header("location: index.php?page=register&error=Verifikasi gagal! Error:" . $query);
    }
  } else {
    header("location: index.php?page=register&error=Token tidak valid!");
  }
} else {
  header("location: index.php?page=register&error=Token tidak valid!");
}

?>
