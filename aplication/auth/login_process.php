<?php
session_start();
include_once '../../config/koneksi.php';

$email = $_POST['email'];
$pass = $_POST['password'];
$querySql = mysqli_query($koneksi,"SELECT * FROM member WHERE email='$email' and password='$pass'");
$data = mysqli_fetch_array($querySql);
$password = $data['password'];

 if ($email == $data['email']) {

    if (password_verify($pass, $password)) {

        header("Location:../../index.php?page=home&pesan=Berhasil Login");
        exit;
      } else {
        header("Location:../../index.php?page=login&pesan=password salah");
        exit();
      }
    //  if ($password == $data['password']) {
    //     header("location:../../index.php?page=home&pesan=Berhasil Login");
    // }else {
    //     header("location:../../index.php?page=login&pesan=password salah");
    //  }      
 }else {
     header("location:../../index.php?page=login&pesan=email salah");
 }
 ?>