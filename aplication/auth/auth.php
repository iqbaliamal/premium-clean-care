<?php
session_start();
require_once "../../config/koneksi.php";

// REGISTER MEMBER ============================================================================
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
// END OF REGISTER MEMBER ============================================================================

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


// RESET PASSWORD ====================================================================================
if (isset($_POST['simpan_reset_pw'])) {
  if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
    $pass1 = $_POST["password1"];
    $pass2 = $_POST["password2"];
    $email = $_POST["email"];
    $curDate = date("Y-m-d H:i:s");
    if (isset($pass1, $pass2)) {
      if ($pass1 != $pass2) {
        echo '<script>alert("Password tidak sesuai");</script>';
        // header('Location: ../../index.php?page=resetpw&error=Password tidak cocok!');
      } else {
        $password = password_hash($pass1, PASSWORD_DEFAULT);
        $qupdate = $koneksi->query("UPDATE member SET password='$pass1', datetime='$curDate' WHERE email='$email'");

        $q_del_temp = $koneksi->query("DELETE FROM reset_pw_temp WHERE email='$email'");

        header('Location: ../../index.php?page=login&sukses=Selamat, password anda berhasil di update!');
      }
    }
  }
}
// END OF RESET PASSWORD ====================================================================================