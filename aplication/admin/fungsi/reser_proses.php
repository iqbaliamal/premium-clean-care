<?php
session_start();
require_once "../../config/koneksi.php";

// RESET PASSWORD ====================================================================================
if (isset($_POST['simpan_reset_pw'])) {
  if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
    $pass1 = $_POST["password"];
    $pass2 = $_POST["retypePassword"];
    $email = $_POST["email"];
    $token = $_POST["token"];
    $aksi = $_POST["aksi"];
    $curDate = date("Y-m-d H:i:s");
    if (empty($pass1 && $pass2)) {
      header('Location: ../../index.php?page=resetpw&token=' . $token . '&email=' . $email . '&action=' . $aksi . '&error=Password is required!');
    } else {
      if ($pass1 != $pass2) {
        // echo '<script>alert("Password tidak sesuai");</script>';
        header('Location: ../../index.php?page=resetpw&token=' . $token . '&email=' . $email . '&action=' . $aksi . '&error=Password tidak cocok!');
      } else {
        $passwordEnc = password_hash($pass1, PASSWORD_DEFAULT);
        $qupdate = $koneksi->query("UPDATE `admin` SET password='$passwordEnc', date_time='$curDate' WHERE email='$email'");

        if (!$qupdate) {
          header('Location: ../../index.php?page=resetpw&token=' . $token . '&email=' . $email . '&action=' . $aksi . '&error=query tidak jalan!');
        } else {
          $q_del_temp = $koneksi->query("DELETE FROM reset_pw_admin WHERE email='$email'");

          header('Location: ../../index.php?page=login&sukses=Selamat, password anda berhasil di update!');
        }
      }
    }
  }
}
// END OF RESET PASSWORD ====================================================================================
