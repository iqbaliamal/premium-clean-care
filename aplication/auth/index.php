  <!-- Form Login Section -->
  <section>
    <div class="mt-5 container">
      <form action="login_process.php" method="POST" class="form-group login border">
        <h2 class="text-center mb-3">LOGIN</h2>
        <!-- ALERT -->
        <?php
                  if( isset($_GET['pesan'])) {
                    $pesan = $_GET['pesan'];
                    if ($pesan == "gagal") {
                      ?>
                      <div class="alert alert-danger">
                        <strong>Danger!</strong> Anda Gagal Login Coba Cek Email atau Password Anda.
                      </div>
                      <?php 
                    }
                  } 
                  ?>
        
        <!-- END OF ALERT -->
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" />
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" />
        <input type="checkbox" name="" id="remember" /><label for="remember" class="ml-1">Remember me</label><br />
        <button type="submit" name="login">Login</button>
        <a href="index.php?page=register" class="ml-2 text-decoration-none text-dark">Register</a><br />
        <a href="index.php?page=forgot" class="text-decoration-none">Lupa Password?</a>
      </form>
    </div>
    </div>
  </section><!-- End Form Login Section -->