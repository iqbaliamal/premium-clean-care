  <!-- Section Form Registrasi -->
  <section>
    <div class="mt-5 container">
      <form action="aplication/auth/auth.php" method="POST" class="form-group login border">
        <h2 class="text-center mb-3">REGISTER</h2>
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
        <label for="nama">NAMA Lengkap</label>
        <input type="text" id="nama" name="nama" class="form-control" />
        <label for="no">No Handphone</label>
        <input type="integer" id="no" name="no_hp" class="form-control" />
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" />
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" />
        <!-- <input type="checkbox" name="" id="remember" /> -->
        <!-- <label for="remember" class="ml-1">Remember me</label><br /> -->
        <button type="submit" name="register">Register</button>
        <p>Sudah Punya Akun ?<a href="index.php?page=login" class="text-decoration-none">Login di sini</a></p><br />
      </form>
    </div>
  </section>
  <!-- End of Form Registrasi -->