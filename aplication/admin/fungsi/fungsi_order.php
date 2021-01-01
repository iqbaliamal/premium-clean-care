<?php

require_once "../../../config/koneksi.php";

if (isset($_POST['detail_order'])) {
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $id = validate($_POST['id']);
  $id_status = validate($_POST['order_status']);

  $query = $koneksi->prepare("UPDATE `order` SET id_order_status='$id_status' WHERE id_order='$id'");
  $query->execute();
  if (!$query) {
    header("location: ../order.php?error=Data order gagal di update!");
    //DEBUG
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
  } else {
    header("location: ../order.php?sukses=Data Order berhasil di update!");
  };
}
