<?php
session_start();
require_once "../../../config/koneksi.php";
// TAMBAH DATA JENIS LAYANAN
if (isset($_POST['addJenisLayanan'])) {
  $jenis_layanan = htmlspecialchars($_POST['jenis_layanan']);

  $query = $koneksi->query("INSERT INTO jenis_layanan SET jenis_layanan='$jenis_layanan'");
  if (!$query) {
    header("location: ../jenis_layanan.php?error=Data Gagal Di Tambahkan");
    //DEBUG
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
  } else {
    //tampil alert dan akan redirect ke halaman jenis layanan.php
    header("location: ../jenis_layanan.php?sukses=Data Berhasil Di Tambahkan");
  }
};
// END OF TAMBAH DATA JENIS LAYANAN ==========================


// HAPUS DATA JENIS LAYANAN
if (isset($_POST['deleteJenisLayanan'])) {
  $id = $_POST['delete_id'];

  $query = $koneksi->query("DELETE FROM jenis_layanan WHERE id_jenis_layanan='$id'");

  if ($query) {
    header("location: ../jenis_layanan.php?sukses=Data Berhasil Di Hapus");
  } else {
    header("location: ../jenis_layanan.php");
    $_SESSION['status'] = "Failed!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Data Anda Gagal Di Hapus!";
  }
}
// END OF HAPUS DATA JENIS LAYANAN ===========================

// EDIT DATA JENIS LAYANAN
if (isset($_POST['editJenisLayanan'])) {
  $id             = $_POST['update_id'];
  $jenis_layanan  = $_POST['jenis_layanan'];

  $query = $koneksi->query("UPDATE jenis_layanan SET jenis_layanan='$jenis_layanan' WHERE id_jenis_layanan='$id'");

  if ($query) {
    header("location: ../jenis_layanan.php?sukses=Data Berhasil Di Update");
  } else {
    header("location: ../jenis_layanan.php");
    $_SESSION['status'] = "Failed!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Data Anda Gagal Di Update!";
  }
}
// END OF EDIT DATA JENIS LAYANAN ===========================