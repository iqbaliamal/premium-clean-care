<?php
session_start();
include_once 'config/koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];
$querySql = mysqli_query($koneksi,"SELECT * FROM member WHERE email='$email' and password='$password'");
$data = mysqli_fetch_array($querySql);

    if ($email == $data['email']) {
        if ($password == $data['password']) {
            header("location:../../index.php?pesan=Berhasil Login");
        }else {
            header("location:index.php?pesan=password salah");
        }      
    }else {
        header("location:index.php?pesan=email salah");
    }
?>