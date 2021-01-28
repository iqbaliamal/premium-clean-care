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
    $token = $key . $addKey;
    $output = '    
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
                    </div>
                    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
                        <!-- BEGIN BODY -->
                        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                            style="margin: auto;">
                            <tr>
                                <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td class="logo" style="text-align: center;">
                                                <h1><a href="#">Password Verify</a></h1>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="text" style="padding: 0 2.5em; text-align: center;">
                                                    <h2>Silahkan klik tombol berikut untuk reset password!</h2>
                                                    <p><a href="http://premium-care.wsjti.com/index.php?page=resetpw&token=' . $token . '&email=' . $email . '&action=reset" class="btn btn-primary">Ubah</a></p>
                                                    <h3>Jika tombol tidak berfungsi klik di sini</h3>
                                                    http://premium-care.wsjti.com/index.php?page=resetpw&token=' . $token . '&email=' . $email . '&action=reset
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr><!-- end tr -->
                            <!-- 1 Column Text + Button : END -->
                        </table>
                            </tr><!-- end: tr -->
                        </table>
              
                    </div>
                </center>
              </body>
                
                </html>
                  ';
    // cek kondisi apakah token sudah ada atau tidak
    $queryCek = $koneksi->query("SELECT * FROM `reset_pw_temp` WHERE email='$email'");
    if (mysqli_num_rows($queryCek) > 0) {
        // update token yang baru
        $queryUpdate = $koneksi->query("UPDATE `reset_pw_temp` SET expdate='$expDate', token='$token' WHERE email='$email'");
        //DEBUG
        // if (!$queryUpdate) {
        //     echo "gagal";
        //     die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        //         " - " . mysqli_error($koneksi));
        // } else {
        //     echo "berhasil";
        // };

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
        // Insert ke reset temp table
        $queryInsert = $koneksi->query("INSERT INTO reset_pw_temp SET email='$email', expdate='$expDate', token='$token'");

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
    }
} else {
    header('Location: ../../index.php?page=forgot&error=Masukkan email terlebih dahulu!');
}
// END OF RESET PASSWORD ====================================================================================
