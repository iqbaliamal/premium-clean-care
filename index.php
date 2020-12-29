<?php

include("aplication/public/header.php");
include("config/koneksi.php");

// KONTEN
if (isset($_GET['page'])) {
  $page = $_GET['page'];

  switch ($page) {
    case 'home':
      include "aplication/public/index.php";
      break;
    case 'login':
      include "aplication/auth/index.php";
      break;
    case 'detail':
      include "aplication/public/detail_transaksi.php";
      break;
    case 'register':
      include "aplication/auth/register.php";
      break;
      case 'profile':
        include "aplication/public/profile_dasboard.php";
        break;
    case 'forgot':
      include "aplication/auth/lupa_password.php";
      break;
    case 'confirm':
      include "aplication/auth/confirm_email.php";
      break;
    case 'resetpw':
      include "aplication/auth/reset.php";
      break;
    case 'detail':
      include "aplication/public/detail_transaksi.php";
      break;
      // case 'testimoni':
      //   include "testimoni.php";
      //   break;
      // case 'blank':
      //   include "blank.php";
      //   break;
      // case '404':
      //   include "404.php";
      //   break;
      // case 'tables':
      //   include "tables.php";
      //   break;
    default:
      include "aplication/public/404.php";
      break;
  }
} else {
  include "aplication/public/index.php";
}
// END OF KONTEN

include("aplication/public/footer.php");
