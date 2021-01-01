<?php
session_start();
include "../../config/koneksi.php";

$message = "";

function clean_text($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
};

function auto_nota()
{
  include "../../config/koneksi.php";
  $num      = "";
  $prefix   = "P-";
  $query    = "SELECT MAX(id_order) AS nota FROM `order`";
  $run      = mysqli_query($koneksi, $query);
  $data     = mysqli_fetch_array($run);
  $row      = mysqli_fetch_row($run);
  $num      = $data['nota'];
  $number   = (int)substr($num, 2, 5);
  $number++;
  if ($row > 0) {
    return "kode telah digunakan";
  } else {
    $value  = $prefix . sprintf("%05s", $number);
  }
  return $value;
};

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../../assets/vendor/autoload.php';

if (isset($_POST["transaksi"])) {
  $id_layanan = clean_text($_POST['id']);
  $layanan = clean_text($_POST['layanan']);
  $harga = clean_text($_POST['harga']);
  $merk = clean_text($_POST['merk']);
  $ukuran = clean_text($_POST['ukuran']);
  $warna = clean_text($_POST['warna']);
  $waktu = clean_text($_POST['waktu']);
  $lokasi = clean_text($_POST['lokasi']);

  $nama = clean_text($_POST['nama']);
  $email = clean_text($_POST['email']);
  $no_hp = clean_text($_POST['no_hp']);

  $id_order = auto_nota();

  $query = $koneksi->prepare("INSERT INTO `order` 
  (`id_order`, `id_layanan`, `id_order_status`, `harga`, `merk`, `ukuran`, `warna`, `tanggal_pick`, `lokasi_pick`, `nama_pelanggan`, `email`, `nomor_hp`) VALUE 
  ('$id_order', '$id_layanan', 1 , '$harga', '$merk', '$ukuran', '$warna', '$waktu', '$lokasi', '$nama', '$email', '$no_hp' )");
  $query->execute();

  // if ($query) {
  //   echo "halo berhasil";
  // } else {
  //   echo "halo gagal";
  //   die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
  //     " - " . mysqli_error($koneksi));
  // }

  $message = '
    <h3 align="center">Order Details</h3>
    <table border="1" width="100%" cellpadding="5" cellspacing="5">
     <tr>
      <td width="30%">Nomor Nota</td>
      <td width="70%"></td>
     </tr>
     <tr>
      <td width="30%">Layanan</td>
      <td width="70%">' . $layanan . '</td>
     </tr>
     <tr>
      <td width="30%">Harga</td>
      <td width="70%">' . $harga . '</td>
     </tr>
     <tr>
      <td width="30%">Merk Sepatu</td>
      <td width="70%">' . $merk . '</td>
     </tr>
     <tr>
      <td width="30%">Warna</td>
      <td width="70%">' . $warna . '</td>
     </tr>
     <tr>
      <td width="30%">Ukuran</td>
      <td width="70%">' . $ukuran . '</td>
     </tr>
     <tr>
      <td width="30%">Waktu Pemjemputan</td>
      <td width="70%">' . $waktu . '</td>
     </tr>
     <tr>
      <td width="30%">Lokasi Pemjemputan</td>
      <td width="70%">' . $lokasi . '</td>
     </tr>
    </table>
   ';

  $mail = new PHPMailer;
  $mail->IsSMTP();        //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
  $mail->Port = '587';        //Sets the default SMTP server port
  $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
  $mail->Username = 'iqbalakunsendmail@gmail.com';     //Sets SMTP username
  $mail->Password = 'Iqbal2000';     //Sets SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->setFrom('no-reply@premium.com', 'Premium Clean And Care');
  $mail->addAddress($email, $nama);  //Adds a "To" address
  $mail->IsHTML(true);       //Sets message type to HTML
  $mail->Subject = 'ORDER DETAILS';    //Sets the Subject of the message
  $mail->Body = $message;       //An HTML or plain text message body
  if ($mail->Send())        //Send an Email. Return true on success or false on error
  {
    $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
    header("location: ../../index.php?page=detail&idl=" . $id_layanan . "&sukses=Transaksi berhasil! Silahkan cek email anda");
  } else {
    $message = '<div class="alert alert-danger">There is an Error</div>';
  }
}
