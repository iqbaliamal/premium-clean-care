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
  $tgl  = date('d/m/Y', time());

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
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col" style="text-align: center;">
          <h2>ORDER DETAILS</h2>
        </div>
      </div>
      <div class="row" style="border:1px solid black">
        <div class="col">
          <b>No Nota :' . $id_order . '</b> <br>
          Tanggal Pemesanan : ' . $tgl . ' <br>
          Total : Rp ' . $harga . '
        </div>
        <div class="col">
          <b> Pelanggan :  </b> <br>
          Nama Pelanggan : ' . $nama . ' <br>
          No Telepon : ' . $no_hp . ' <br>
        </div>
        <div class="col">
          <b>Penjemputan : </b> <br>
          Lokasi Penjemputan : ' . $lokasi . ' <br>
          Waktu Penjemputan : ' . $waktu . ' <br>
        </div>
      </div>
      <div class="row mt-1">
        <table class="table table-md table-bordered">
          <tr>
            <th>Layanan</th>
            <td>' . $layanan . '</td>
          </tr>
          <tr>
            <th>Merk Sepatu</th>
            <td>' . $merk . '</td>
          </tr>
          <tr>
            <th>Ukuran Sepatu</th>
            <td>' . $ukuran . '</td>
          </tr>
          <tr>
            <th>Warna</th>
            <td>' . $warna . '</td>
          </tr>
        </table>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="alert alert-warning">
            Kami akan segera mengkonfirmasi pesanan anda. <br>
            Kontak kami : <strong>082123123123 | Mita </strong>
          </div>
        </div>
      </div>
    </div>
  </body>
  
  </html>
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
