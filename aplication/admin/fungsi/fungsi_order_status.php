<?php
session_start();
require_once "../../../config/koneksi.php";

// TAMBAH DATA STATUS ORDER
if (isset($_POST['addOrderStatus'])) {
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $nama_status = validate($_POST['nama_status']);

  $query = $koneksi->query("INSERT INTO order_status SET order_status='$nama_status'");
  if (!$query) {
    header("location: ../order_status.php?error=Data Gagal Di Tambahkan");
    //DEBUG
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
  } else {
    header("location: ../order_status.php?sukses=Data Berhasil Di Tambahkan");
  }
};
// END OF TAMBAH DATA STATUS ORDER ==========================

// HAPUS DATA STATUS ORDER
if (isset($_POST['deleteOrderStatus'])) {
  $id = $_POST['delete_id'];

  $query = $koneksi->query("DELETE FROM order_status WHERE id_order_status='$id'");

  if ($query) {
    header("location: ../order_status.php?sukses=Data Berhasil Di Hapus");
  } else {
    header("location: ../order_status.php");
    $_SESSION['status'] = "Failed!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Data Anda Gagal Di Hapus!";
  }
}
// END OF HAPUS DATA STATUS ORDER ===========================

// EDIT DATA STATUS ORDER
if (isset($_POST['editOrderStatus'])) {
  $id             = $_POST['update_id'];
  $nama_status  = $_POST['nama_status'];

  $query = $koneksi->query("UPDATE order_status SET order_status='$nama_status' WHERE id_order_status='$id'");

  if ($query) {
    header("location: ../order_status.php?sukses=Data Berhasil Di Update");
  } else {
    header("location: ../order_status.php");
    $_SESSION['status'] = "Failed!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Data Anda Gagal Di Update!";
  }
}
// END OF EDIT DATA STATUS ORDER ===========================