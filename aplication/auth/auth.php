<?php
session_start();
require_once "../../config/koneksi.php";

// REGISTER MEMBER
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../../assets/vendor/autoload.php';

if (isset($_POST['register'])) {

  $nama = htmlspecialchars($_POST['nama']);
  $no_hp = htmlspecialchars($_POST['no_hp']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $password = password_hash($password, PASSWORD_DEFAULT);
  $token = md5($email . date('Y-m-d'));
  // $date = date('Y-m-d H:i:s');

  $query = $koneksi->query("SELECT * FROM member WHERE email='$email'");
  if (mysqli_num_rows($query) > 0) {
    header("Location: index.php?page=register?error=Email sudah terdaftar");
  } else {
    $sql = $koneksi->query("INSERT INTO member SET nama_member='$nama', email='$email', nomor_hp='$no_hp', password='$password', token='$token'");

    //Create a new PHPMailer instance
    $mail = new PHPMailer();

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    // SMTP::DEBUG_OFF = off (for production use)
    // SMTP::DEBUG_CLIENT = client messages
    // SMTP::DEBUG_SERVER = client and server messages
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

    //Set the encryption mechanism to use - STARTTLS or SMTPS
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'iqbalakunsendmail@gmail.com';

    //Password to use for SMTP authentication
    $mail->Password = 'Iqbal2000';

    //Set who the message is to be sent from
    $mail->setFrom('no-reply@premium.com', 'Premium Clean And Care');

    //Set who the message is to be sent to
    $mail->addAddress($email, $nama);

    //Set the subject line
    $mail->Subject = 'Verification Account - Premium Clean And Care';

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $body = "Hi, " . $nama . "<br>Plase verif your email before access our website : <br> <a href='http://localhost/premium-clean-care/index.php?page=confirm&token=" . $token . "'>Klik disini</a> <br><br>
      Jika tombol tidak berfungsi, klik link berikut <br> http://localhost/premium-clean-care/index.php?page=confirm&token=" . $token;

    //Replace the plain text body with one created manually
    $mail->Body = $body;
    $mail->AltBody = 'Verification Account!';

    //send the message, check for errors
    if (!$mail->send()) {
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
      // echo '<script>alert("Registrasi berhasil! silahkan login");</script>';
      header('Location: ../../index.php?page=register&sukses=Registrasi berhasil!, silahkan verifikasi akun anda!');
      //Section 2: IMAP
      //Uncomment these to save your message in the 'Sent Mail' folder.
      #if (save_mail($mail)) {
      #    echo "Message saved!";
      #}
    }
  }
}
