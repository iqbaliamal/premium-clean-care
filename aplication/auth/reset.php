<?php
if (
  isset($_GET["token"]) && isset($_GET["email"])
  && isset($_GET["action"]) && ($_GET["action"] == "reset")
  && !isset($_POST["action"])
) {
  $token = $_GET["token"];
  $email = $_GET["email"];
  $action = $_GET["action"];
  $curDate = date("Y-m-d H:i:s");
  $query = $koneksi->query("SELECT * FROM `reset_pw_temp` WHERE token='$token' AND email='$email'");
  $row = mysqli_num_rows($query);
  if ($row == "") {
    header('Location: index.php?page=forgot&error=Link tidak cocok/kadaluarsa. silahkan reset ulang password anda!');
  } else {
    $row = mysqli_fetch_assoc($query);
    $expDate = $row['expdate'];
    if ($expDate >= $curDate) {
?>
      <!-- Form Lupa Password Section -->
      <section>
        <div class="mt-5 container">
          <form action="aplication/auth/reset_proses.php" method="POST" class="form-group login border">
            <h2 class="text-center mb-3">RESET PASSWORD</h2>
            <!-- ALERT -->
            <?php if (isset($_GET['error'])) { ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error'] ?>
              </div>
            <?php } ?>
            <?php if (isset($_GET['sukses'])) { ?>
              <div class="alert alert-success" role="alert">
                <?php echo $_GET['sukses'] ?>
              </div>
            <?php } ?>
            <!-- END OF ALERT -->

            <!-- aksi untuk update -->
            <input type="hidden" name="token" value="<?= $token; ?>" />
            <input type="hidden" name="email" value="<?= $email; ?>" />
            <input type="hidden" name="aksi" value="<?= $action; ?>" />
            <input type="hidden" name="action" value="update" />

            <!-- input password baru -->
            <label for="password1">New Password</label> <span style="color: red;"> *</span>
            <input type="password" id="password1" name="password" class="form-control" />
            <label for="password2">Re Type Password</label> <span style="color: red;"> *</span>
            <input type="password" id="password2" name="retypePassword" class="form-control" />

            <!-- ambil email -->
            <input type="text" name="email" value="<?php echo $email; ?>" hidden />

            <button type="submit" name="simpan_reset_pw" class="mt-2 mb-2">SIMPAN</button>
            <p>Sudah Punya Akun ?<a href="index.php?page=login" class="text-decoration-none"> Login di sini</a></p><br />
          </form>
        </div>
      </section>
      <!-- End form Lupa Password Section -->
<?php
    } else {
      header('Location: index.php?page=forgot&error=Link kadaluarsa. silahkan reset ulang password anda!');
    }
  }
}
?>