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
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nama = validate($_POST['nama']);
    $no_hp = validate($_POST['no_hp']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $token = md5($email . date('Y-m-d'));
    // $date = date('Y-m-d H:i:s');

    $query = $koneksi->query("SELECT * FROM member WHERE email='$email'");
    if (mysqli_num_rows($query) > 0) {
        header("Location: ../../index.php?page=register&error=Email sudah terdaftar");
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
        $mail->SMTPSecure = 'tls';
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
        $mail->Username = '';

        //Password to use for SMTP authentication
        $mail->Password = '';

        //Set who the message is to be sent from
        $mail->setFrom('no-reply@premium.com', 'Premium Clean And Care');

        //Set who the message is to be sent to
        $mail->addAddress($email, $nama);

        //Set the subject line
        $mail->Subject = 'Verification Account - Premium Clean And Care';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $body = '
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
                                    <h1><a href="#">Verifikasi Akun</a></h1>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr><!-- end tr -->
                <tr>
                    <td valign="middle" class="hero bg_white" style="padding: 3em 0 2em 0;">
                        <img src="https://i.pinimg.com/originals/bb/18/bd/bb18bdbbef437b2d50518db5a8292c94.png" style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;">
                    </td>
                </tr><!-- end tr -->
                <tr>
                    <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
                        <table>
                            <tr>
                                <td>
                                    <div class="text" style="padding: 0 2.5em; text-align: center;">
                                        <h2>Please verify your email</h2>
                                        <p><a href="http://premium-care.workshopjti.com/index.php?page=confirm&token=' . $token . '" class="btn btn-primary">Verify</a></p>
                                        <h3>Jika tombol tidak berfungsi klik link berikut</h3>
                                        http://premium-care.workshopjti.com/index.php?page=confirm&token=' . $token . '
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

        //Replace the plain text body with one created manually
        $mail->IsHTML(true);
        $mail->Body = $body;
        $mail->AltBody = 'Verification Account!';

        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            // echo '<script>alert("Registrasi berhasil! silahkan login");</script>';
            header('Location: ../../index.php?page=register&sukses=Registrasi berhasil!, verifikasi berhasil dikirim ke email anda, silahkan aktivasi akun anda!');
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
            #    echo "Message saved!";
            #}
        }
    }
};
// END OF REGISTER MEMBER ============================================================================
