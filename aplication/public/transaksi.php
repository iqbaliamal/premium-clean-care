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
  <!DOCTYPE html>
  <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office">
  
  <head>
      <meta charset="utf-8"> <!-- utf-8 works for most cases -->
      <meta name="viewport" content="width=device-width">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="x-apple-disable-message-reformatting">
      <title></title>
  
      <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
  
      <!-- CSS Reset : BEGIN -->
      <style>
          html,
          body {
              margin: 0 auto !important;
              padding: 0 !important;
              height: 100% !important;
              width: 100% !important;
              background: #f1f1f1;
              -ms-text-size-adjust: 100%;
              -webkit-text-size-adjust: 100%;
          }
  
  
          div[style*="margin: 16px 0"] {
              margin: 0 !important;
          }
  
  
          table,
          td {
              -mso-table-lspace: 0pt !important;
              -mso-table-rspace: 0pt !important;
          }
  
  
          table {
              /* border: 1px solid black; */
              border-spacing: 0 !important;
              border-collapse: collapse !important;
              table-layout: fixed !important;
              margin: 0 auto !important;
          }
  
  
          img {
              -ms-interpolation-mode: bicubic;
          }
  
  
          a {
              text-decoration: none;
          }
  
  
          *[x-apple-data-detectors],
          .unstyle-auto-detected-links *,
          .aBn {
              border-bottom: 0 !important;
              cursor: default !important;
              color: inherit !important;
              text-decoration: none !important;
              font-size: inherit !important;
              font-family: inherit !important;
              font-weight: inherit !important;
              line-height: inherit !important;
          }
  
  
          .a6S {
              display: none !important;
              opacity: 0.01 !important;
          }
  
  
          .im {
              color: inherit !important;
          }
  
  
          img.g-img+div {
              display: none !important;
          }
  
  
  
  
          @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
              u~div .email-container {
                  min-width: 320px !important;
              }
          }
  
          @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
              u~div .email-container {
                  min-width: 375px !important;
              }
          }
  
          @media only screen and (min-device-width: 414px) {
              u~div .email-container {
                  min-width: 414px !important;
              }
          }
      </style>
  
      <!-- CSS Reset : END -->
  
      <!-- Progressive Enhancements : BEGIN -->
      <style>
          .primary {
              background: #17bebb;
          }
  
          .bg_white {
              background: #ffffff;
          }
  
          .bg_light {
              background: #f7fafa;
          }
  
          .bg_black {
              background: #000000;
          }
  
          .bg_dark {
              background: rgba(0, 0, 0, .8);
          }
  
          .email-section {
              padding: 2.5em;
          }
  
          /*BUTTON*/
          .btn {
              padding: 10px 15px;
              display: inline-block;
          }
  
          .btn.btn-primary {
              border-radius: 5px;
              background: #17bebb;
              color: #ffffff;
          }
  
          .btn.btn-white {
              border-radius: 5px;
              background: #ffffff;
              color: #000000;
          }
  
          .btn.btn-white-outline {
              border-radius: 5px;
              background: transparent;
              border: 1px solid #fff;
              color: #fff;
          }
  
          .btn.btn-black-outline {
              border-radius: 0px;
              background: transparent;
              border: 2px solid #000;
              color: #000;
              font-weight: 700;
          }
  
          .btn-custom {
              color: rgba(0, 0, 0, .3);
              text-decoration: underline;
          }
  
          h1,
          h2,
          h3,
          h4,
          h5,
          h6 {
              font-family: "Work Sans", sans-serif;
              color: #000000;
              margin-top: 0;
              font-weight: 400;
          }
  
          body {
              font-family: "Work Sans", sans-serif;
              font-weight: 400;
              font-size: 15px;
              line-height: 1.8;
              color: rgba(0, 0, 0, .4);
          }
  
          a {
              color: #17bebb;
          }
  
          /*LOGO*/
  
          .logo h1 {
              margin: 0;
          }
  
          .logo h1 a {
              color: #17bebb;
              font-size: 24px;
              font-weight: 700;
              font-family: "Work Sans", sans-serif;
          }
  
          /*HERO*/
          .hero {
              position: relative;
              z-index: 0;
          }
  
          .hero .text {
              color: rgba(0, 0, 0, .3);
          }
  
          .hero .text h2 {
              color: #000;
              font-size: 34px;
              margin-bottom: 15px;
              font-weight: 300;
              line-height: 1.2;
          }
  
          .hero .text h3 {
              font-size: 24px;
              font-weight: 200;
          }
  
          .hero .text h2 span {
              font-weight: 600;
              color: #000;
          }
  
  
          /*PRODUCT*/
          .product-entry {
              display: block;
              position: relative;
              float: left;
              padding-top: 20px;
          }
  
          .product-entry .text {
              width: calc(100% - 125px);
              padding-left: 20px;
          }
  
          .product-entry .text h3 {
              margin-bottom: 0;
              padding-bottom: 0;
          }
  
          .product-entry .text p {
              margin-top: 0;
          }
  
          .product-entry img,
          .product-entry .text {
              float: left;
          }
  
          ul.social {
              padding: 0;
          }
  
          ul.social li {
              display: inline-block;
              margin-right: 10px;
          }
  
          /*FOOTER*/
  
          .footer {
              border-top: 1px solid rgba(0, 0, 0, .05);
              color: rgba(0, 0, 0, .5);
          }
  
          .footer .heading {
              color: #000;
              font-size: 20px;
          }
  
          .footer ul {
              margin: 0;
              padding: 0;
          }
  
          .footer ul li {
              list-style: none;
              margin-bottom: 10px;
          }
  
          .footer ul li a {
              color: rgba(0, 0, 0, 1);
          }
  
  
          @media screen and (max-width: 500px) {}
      </style>
  
  
  </head>
  
  <body width="100%" style="margin: 0; padding: 0 !important; -mso-line-height-rule: exactly; background-color: #f1f1f1;">
      <center style="width: 100%; background-color: #f1f1f1;">
          <div
              style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; -mso-hide: all; font-family: sans-serif;">
              &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
          </div>
          <div style="max-width: 600px; margin-top: 50px;" class="email-container">
              <!-- BEGIN BODY -->
              <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                  style="margin: auto;">
                  <tr>
                      <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                              <tr>
                                  <td class="logo" style="text-align: center;">
                                      <h1><a href="#">ORDER DETAILS</a></h1>
                                  </td>
                              </tr>
                          </table>
                      </td>
                  </tr><!-- end tr -->
                  <tr>
                      <td valign="middle" class="hero bg_white" style="padding: 2em 0 2em 0;">
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                              <tr>
                                  <td style="padding: 0 2.5em; text-align: left;">
                                      <div class="text">
                                          <h2>Detail Transaksi Anda</h2>
                                      </div>
                                  </td>
                              </tr>
                          </table>
                      </td>
                  </tr><!-- end tr -->
                  <table class="bg_white" role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tr style="border-bottom: 1px solid rgba(0,0,0,.05); border-top: 1px solid rgba(0,0,0,.05);">
                          <th width="50%"
                              style="text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 10px; padding-top: 10px; border-right: 1px solid rgba(0,0,0,.05); ">
                              Nomor Nota :</th>
                          <td width="50%"
                              style="text-align:center; padding: 0 2.5em; color: #000; padding-bottom: 10px; padding-top: 10px;">
                              ' . $id_order . '</td>
                      </tr>
                      <tr style="border-bottom: 1px solid rgba(0,0,0,.05); border-top: 1px solid rgba(0,0,0,.05);">
                          <th width="50%"
                              style="text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 10px; padding-top: 10px; border-right: 1px solid rgba(0,0,0,.05); ">
                              Tanggal Pemesanan :</th>
                          <td width="50%"
                              style="text-align:center; padding: 0 2.5em; color: #000; padding-bottom: 10px; padding-top: 10px;">
                              ' . $tgl . '</td>
                      </tr>
                      <tr style="border-bottom: 1px solid rgba(0,0,0,.05); border-top: 1px solid rgba(0,0,0,.05);">
                          <th width="50%"
                              style="text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 10px; padding-top: 10px; border-right: 1px solid rgba(0,0,0,.05); ">
                              Total :</th>
                          <td width="50%"
                              style="text-align:center; padding: 0 2.5em; color: #000; padding-bottom: 10px; padding-top: 10px;">
                              Rp ' . $harga . '</td>
                      </tr>
                      <tr style="border-bottom: 1px solid rgba(0,0,0,.05); border-top: 1px solid rgba(0,0,0,.05);">
                          <th width="50%"
                              style="text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 10px; padding-top: 10px; border-right: 1px solid rgba(0,0,0,.05); ">
                              Nama Pelanggan :</th>
                          <td width="50%"
                              style="text-align:center; padding: 0 2.5em; color: #000; padding-bottom: 10px; padding-top: 10px;">
                              ' . $nama . '</td>
                      </tr>
                      <tr style="border-bottom: 1px solid rgba(0,0,0,.05); border-top: 1px solid rgba(0,0,0,.05);">
                          <th width="50%"
                              style="text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 10px; padding-top: 10px; border-right: 1px solid rgba(0,0,0,.05); ">
                              No Telepon :</th>
                          <td width="50%"
                              style="text-align:center; padding: 0 2.5em; color: #000; padding-bottom: 10px; padding-top: 10px;">
                              ' . $no_hp . '</td>
                      </tr>
                      <tr style="border-bottom: 1px solid rgba(0,0,0,.05); border-top: 1px solid rgba(0,0,0,.05);">
                          <th width="50%"
                              style="text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 10px; padding-top: 10px; border-right: 1px solid rgba(0,0,0,.05); ">
                              Lokasi Penjemputan :</th>
                          <td width="50%"
                              style="text-align:center; padding: 0 2.5em; color: #000; padding-bottom: 10px; padding-top: 10px;">
                              ' . $lokasi . '</td>
                      </tr>
                      <tr style="border-bottom: 1px solid rgba(0,0,0,.05); border-top: 1px solid rgba(0,0,0,.05);">
                          <th width="50%"
                              style="text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 10px; padding-top: 10px; border-right: 1px solid rgba(0,0,0,.05); ">
                              Waktu Penjemputan :</th>
                          <td width="50%"
                              style="text-align:center; padding: 0 2.5em; color: #000; padding-bottom: 10px; padding-top: 10px;">
                              ' . $waktu . '</td>
                      </tr>
                      <tr>
                          <th width="50%"
                              style="text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 30px; padding-top: 30px; ">
                          </th>
                          <td width="50%"
                              style="text-align:center; padding: 0 2.5em; color: #000; padding-bottom: 30px; padding-top: 30px;">
                          </td>
                      </tr>
                      <tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
                          <td valign="middle" width="50%" style="text-align:left; padding: 0 2.5em;">
                              <span class="price" style="color: #000; font-size: 20px;">Layanan</span>
                          </td>
                          <td valign="middle" width="50%" style="text-align:left; padding: 0 2.5em;">
                              <span class="price" style="color: #000; font-size: 20px;">' . $layanan . '</span>
                          </td>
                      </tr>
                      <tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
                          <td valign="middle" width="50%" style="text-align:left; padding: 0 2.5em;">
                              <span class="price" style="color: #000; font-size: 20px;">Merk Sepatu</span>
                          </td>
                          <td valign="middle" width="50%" style="text-align:left; padding: 0 2.5em;">
                              <span class="price" style="color: #000; font-size: 20px;">' . $merk . '</span>
                          </td>
                      </tr>
                      <tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
                          <td valign="middle" width="50%" style="text-align:left; padding: 0 2.5em;">
                              <span class="price" style="color: #000; font-size: 20px;">Ukuran Sepatu</span>
                          </td>
                          <td valign="middle" width="50%" style="text-align:left; padding: 0 2.5em;">
                              <span class="price" style="color: #000; font-size: 20px;">' . $ukuran . '</span>
                          </td>
                      </tr>
                      <tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
                          <td valign="middle" width="50%" style="text-align:left; padding: 0 2.5em;">
                              <span class="price" style="color: #000; font-size: 20px;">Warna</span>
                          </td>
                          <td valign="middle" width="50%" style="text-align:left; padding: 0 2.5em;">
                              <span class="price" style="color: #000; font-size: 20px;">' . $warna . '</span>
                          </td>
                      </tr>
                      <tr>
                          <th width="50%"
                              style="text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 20px; padding-top: 20px; ">
                          </th>
                          <td width="50%"
                              style="text-align:center; padding: 0 2.5em; color: #000; padding-bottom: 20px; padding-top: 20px;">
                          </td>
                      </tr>
                      <tr style="padding-top: 50px;">
                          <td valign="middle" style="text-align:left; padding: 1em 2.5em;" colspan="2">
                              <div style="padding: 0.75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: 0.25rem; color: #856404; background-color: #fff3cd; border-color: #ffeeba;">
                                  Kami akan segera mengkonfirmasi pesanan anda. <br>
                                  Kontak kami : <strong>082123123123 | Mita </strong>
                              </div>
                          </td>
                          <td>
  
                          </td>
                      </tr>
                      <tr>
                          <td valign="middle" style="text-align:left; padding: 1em 2.5em;">
                              <p><a href="http://localhost/premium-clean-care" class="btn btn-primary">Continur your order</a></p>
                          </td>
                      </tr>
                  </table>
                  </tr><!-- end tr -->
                  <!-- 1 Column Text + Button : END -->
          </div>
      </center>
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
