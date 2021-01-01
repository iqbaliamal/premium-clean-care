<?php
session_start();
require_once "../../../config/koneksi.php";

// TAMBAH DATA TESTIMONI
if (isset($_POST['addTestimoni'])) {
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $akun_ig = validate($_POST['akun_ig']);
  $testimoni = validate($_POST['testimoni']);

  $query = $koneksi->query("INSERT INTO testimoni SET akun_ig='$akun_ig', testimoni='$testimoni'");
  if (!$query) {
    header("location: ../testimoni.php?error=Data Gagal Di Tambahkan");
    //DEBUG
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
  } else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    header("location: ../testimoni.php?sukses=Data Berhasil Di Tambahkan");
  }
};
// END OF TAMBAH DATA TESTIMONI ==========================


// HAPUS DATA TESTIMONI
if (isset($_POST['deleteTestimoni'])) {
  $id = $_POST['delete_id'];

  $query = $koneksi->query("DELETE FROM testimoni WHERE id_testimoni='$id'");

  if ($query) {
    header("location: ../testimoni.php?sukses=Data Berhasil Di Hapus");
  } else {
    header("location: ../testimoni.php");
    $_SESSION['status'] = "Failed!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Data Anda Gagal Di Hapus!";
  }
}
// END OF HAPUS DATA TESTIMONI===========================

// EDIT DATA TESTIMONI
if (isset($_POST['editTestimoni'])) {
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $id             = validate($_POST['update_id']);
  $akun_ig        = validate($_POST['akun_ig']);
  $testimoni      = validate($_POST['testimoni']);

  $query = $koneksi->query("UPDATE testimoni SET akun_ig='$akun_ig', testimoni='$testimoni' WHERE id_testimoni='$id'");

  if ($query) {
    header("location: ../testimoni.php?sukses=Data Berhasil Di Update");
  } else {
    header("location: ../testimoni.php");
    $_SESSION['status'] = "Failed!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Data Anda Gagal Di Update!";
  }
}
// END OF EDIT DATA TESTIMONI ===========================