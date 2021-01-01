<?php
session_start();
require_once "../../config/koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../../assets/vendor/autoload.php';


// RESET PASSWORD ====================================================================================
if (isset($_POST['reset_pw'])) {
  $email = $_POST["email"];
  $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
  $expDate = date("Y-m-d H:i:s", $expFormat);
  $key = md5(2418 * 2 + $email);
  $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
  $key = $key . $addKey;
  // Insert ke temp table
  $query = $koneksi->query("INSERT INTO reset_pw_temp SET email='$email', expdate='$expDate', token='$key'");

  // Email kirim
  $output = '<p>Halo,</p>';
  $output .= '<p>silahkan klik tombol berikut untuk reset password!</p>';
  $output .= '<p>-------------------------------------------------------------</p>';
  $output .= '<p><a href="http://localhost/premium-clean-care/index.php?page=resetpw&token=' . $key . '&email=' . $email . '&action=reset" target="_blank">Klik disini</a></p>';
  $output .= '<br><br>';
  $output .= '<p>Jika tombol tidak berfungsi, klik link berikut!</p> <br>';
  $output .= 'http://localhost/premium-clean-care/index.php?page=resetpw&token=' . $key . '&email=' . $email . '&action=reset <br>';
  $output .= '<p>-------------------------------------------------------------</p>';
  $output .= '<p>Link ini hanya berlaku 1 hari.';
  $output .= '<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';
  $body = $output;
  $subject = "Account Recovery - Premium Clean And Care";

  $email_to = $email;
  $fromserver = "no-reply@premium.com";
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->Host = "smtp.gmail.com"; // Enter your host here
  $mail->SMTPAuth = true;
  $mail->Username = "iqbalakunsendmail@gmail.com"; // Enter your email here
  $mail->Password = "Iqbal2000"; //Enter your passwrod here
  $mail->Port = 587;
  $mail->IsHTML(true);
  $mail->setFrom('no-reply@premium.com', 'Premium Clean And Care');
  $mail->FromName = "Premium Clean And Care";
  $mail->Sender = $fromserver; // indicates ReturnPath header
  $mail->Subject = $subject;
  $mail->Body = $body;
  $mail->AddAddress($email_to);
  if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
    //     echo "<div class='error'>
    // <p>An email has been sent to you with instructions on how to reset your password.</p>
    // </div><br /><br /><br />";
    header('Location: ../../index.php?page=forgot&sukses=Account Recovery telah dikirim, silahkan cek email anda untuk reset password!');
  }
} else {
  header('Location: ../../index.php?page=forgot&error=Masukkan email terlebih dahulu!');
}
// END OF RESET PASSWORD ====================================================================================
