  <!-- Form Lupa Password Section -->
  <section>
    <div class="mt-5 container">
      <form action="aplication/auth/auth.php" method="POST" class="form-group login border">
        <h2 class="text-center mb-3">ACCOUNT RECOVERY</h2>
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
        <h6>Lupa password ? Masukkan email anda pada form berikut. Anda akan
          menerima email untuk reset password.</h6>
        <label for="email">Email</label><span style="color: red;"> *</span>
        <input type="email" id="email" name="email" class="form-control" required />

        <button type="submit" name="reset_pw" class="mt-2 mb-2">RESET PASSWORD</button>
        <p>Sudah Punya Akun ?<a href="index.php?page=login" class="text-decoration-none"> Login di sini</a></p><br />
      </form>
    </div>
  </section>
  <!-- End form Lupa Password Section -->