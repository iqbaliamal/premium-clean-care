<?php

// $koneksi = mysqli_connect("localhost", "root", "", "db_premium");
$koneksi = mysqli_connect("localhost", "u1011496_premium-care", "kelompok15bisa", "u1011496_premium-care");

if (mysqli_connect_error()) {
  echo "Koneksi database gagal :" . mysqli_connect_error();
};
