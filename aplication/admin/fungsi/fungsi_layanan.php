<?php

require_once "../../../config/koneksi.php";
session_start();

// TAMBAH DATA LAYANAN
if (isset($_POST['addLayanan'])) {
  # code...
  $jenis_layanan = htmlspecialchars($_POST['jenis_layanan']);
  $nama_layanan = htmlspecialchars($_POST['nama_layanan']);
  $harga = htmlspecialchars($_POST['harga']);
  $gambar = $_FILES['gambar']['name'];

  //cek dulu jika ada gambar produk jalankan coding ini
  if ($gambar != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar; //menggabungkan angka acak dengan nama file sebenarnya
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
      move_uploaded_file($file_tmp, '../img/gambar_layanan/' . $nama_gambar_baru); //memindah file gambar ke folder gambar layanan
      // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
      $query = $koneksi->query("INSERT INTO layanan SET id_jenis_layanan='$jenis_layanan', nama_layanan='$nama_layanan', harga_layanan='$harga', gambar='$nama_gambar_baru'");
      // periska query apakah ada error
      if (!$query) {
        header("location: ../layanan.php?error=Data Gagal Di Tambahkan");
        // DEBUG
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
          " - " . mysqli_error($koneksi));
      } else {
        //tampil alert dan akan redirect ke halaman layanan.php
        header("location: ../layanan.php?sukses=Data Berhasil Di Tambahkan");
      }
    } else {
      //jika file ekstensi bukan jpg dan png maka alert ini yang tampil
      header("location: ../layanan.php?error=File harus ber extensi .jpg / .png");
    }
  } else {
    $query = $koneksi->query("INSERT INTO layanan SET id_jenis_layanan='$jenis_layanan', nama_layanan='$nama_layanan', harga_layanan='$harga', gambar=NULL");
    // periska query apakah berjalan
    if (!$query) {
      header("location: ../layanan.php?error=Data Gagal Di Tambahkan");
      //DEBUG
      die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman layanan.php
      header("location: ../layanan.php?sukses=Data Berhasil Di Tambahkan");
    }
  }
};
// END OF TAMBAH DATA LAYANAN ==========================

// HAPUS DATA LAYANAN
if (isset($_POST['deleteLayanan'])) {
  $id = $_POST['delete_id'];

  $query = $koneksi->query("DELETE FROM layanan WHERE id_layanan='$id'");

  if ($query) {
    header("location: ../layanan.php?sukses=Data Berhasil Di Hapus");
  } else {
    header("location: ../layanan.php?error=Data Gagal Di Hapus");
  }
}
// END OF HAPUS DATA LAYANAN ===========================

// EDIT DATA LAYANAN
if (isset($_POST['editLayanan'])) {
  # code...
  $id             = $_POST['id'];
  $id_jenis       = $_POST['jenis_layanan'];
  $nama_layanan   = $_POST['nama_layanan'];
  $harga_layanan  = $_POST['harga'];
  $gambar         = $_FILES['img']['name'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  if ($gambar != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['img']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar; //menggabungkan angka acak dengan nama file sebenarnya
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
      if (move_uploaded_file($file_tmp, '../img/gambar_layanan/' . $nama_gambar_baru)) { //memindah file gambar ke folder gambar layanan
        // jalankan query UPDATE berdasarkan ID layanan kita edit
        $query  = $koneksi->query("UPDATE layanan SET 
      id_jenis_layanan = '$id_jenis', 
      nama_layanan = '$nama_layanan', 
      harga_layanan = '$harga_layanan', 
      gambar = '$nama_gambar_baru'
      WHERE id_layanan = '$id'");
        // periska query apakah berjalan
        if (!$query) {
          header("location: ../layanan.php?error=Data Gagal Di Update");
          //DEBUG
          die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
        } else {
          //tampil alert dan akan redirect ke halaman layanan.php
          header("location: ../layanan.php?sukses=Data Berhasil Di Update");
        }
      } else {
        header("location: ../layanan.php?error=Data Gagal Di Update");
      }
    } else {
      //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
      header("location: ../layanan.php?error=File harus ber extensi .jpg / .png");
    }
  } else {
    // jalankan query UPDATE berdasarkan ID layanan kita edit
    $query  = $koneksi->query("UPDATE layanan SET 
      id_jenis_layanan = '$id_jenis', 
      nama_layanan = '$nama_layanan', 
      harga_layanan = '$harga_layanan'
      WHERE id_layanan = '$id'");
    // periska query apakah ada error
    if (!$query) {
      header("location: ../layanan.php?error=Data Gagal Di Update");
      //DEBUG
      die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman layanan.php
      header("location: ../layanan.php?sukses=Data Berhasil Di Update");
    }
  }
}
// END OF EDIT DATA LAYANAN ===========================