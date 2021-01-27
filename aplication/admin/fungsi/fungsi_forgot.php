<?php
session_start();
require_once '../../../config/koneksi.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../../../assets/vendor/autoload.php';

if (isset($_POST['forgotadmin'])) {
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $email      = validate($_POST['email']);
  $expFormat  = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
  $expDate    = date("Y-m-d H:i:s", $expFormat);
  $key        = md5(2418 * 2);
  $addKey     = substr(md5(uniqid(rand(), 1)), 3, 10);
  $token      = $key . $addKey;

  $output     = '
  <h2 style="text-align: center; margin: auto;">RESET PASSWORD ADMIN</h2>              
  <p>klik link berikut untuk reset password</p><br>
  <a href="http://premium-care.wsjti.com/aplication/admin/reset.php?token=' . $token . '&email=' . $email . '&reset=resetAdmin">klik disini</a><br><br>
  <p>jika tombol tidak berfungsi, klik url berikut:</p><br>
  <p>http://premium-care.wsjti.com/aplication/admin/reset.php?token=' . $token . '&email=' . $email . '&reset=resetAdmin</p>
                ';

  // cek kondisi email apakah sudah terdaftar sebagai admin
  $queryCekAdmin = $koneksi->query("SELECT * FROM `admin` WHERE email='$email'");
  if (mysqli_num_rows($queryCekAdmin) == 0) {
    header("Location: ../forgot.php?error=Username atau Email Belum Terdaftar!");
  } else {
    // cek kondisi apakah token sudah ada atau tidak
    $queryCek = $koneksi->query("SELECT * FROM `reset_pw_admin` WHERE email='$email'");
    if (mysqli_num_rows($queryCek) > 0) {
      $updatePW = $koneksi->query("UPDATE `reset_pw_admin` SET expdate='$expDate', token='$token' WHERE email='$email'");

      $body = $output;
      $subject = "Account Recovery - ADMIN Premium Clean And Care";

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
      $mail->setFrom('no-reply@premium.com', 'ADMIN Premium Clean And Care');
      $mail->FromName = "ADMIN Premium Clean And Care";
      $mail->Sender = $fromserver; // indicates ReturnPath header
      $mail->Subject = $subject;
      $mail->Body = $body;
      $mail->AddAddress($email_to);
      if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
        header('Location: ../../index.php?page=forgot&sukses=Account Recovery telah dikirim, silahkan cek email anda untuk reset password!');
      }
    } else {
      $insertTokenBaru = $koneksi->query("INSERT INTO reset_pw_admin SET email='$email', expdate='$expDate', token='$token'");

      $body = $output;
      $subject = "Account Recovery - ADMIN Premium Clean And Care";

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
      $mail->setFrom('no-reply@premium.com', 'ADMIN Premium Clean And Care');
      $mail->FromName = "ADMIN Premium Clean And Care";
      $mail->Sender = $fromserver; // indicates ReturnPath header
      $mail->Subject = $subject;
      $mail->Body = $body;
      $mail->AddAddress($email_to);
      if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
        header('Location: ../../index.php?page=forgot&sukses=Account Recovery telah dikirim, silahkan cek email anda untuk reset password!');
      }
    }
  }
} else {
  echo "halo";
}