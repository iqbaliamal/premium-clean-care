<div class="container">

  <?php
  $id     = $_SESSION['id'];
  $queryProfile  = $koneksi->query("SELECT * FROM `member` WHERE id_member='$id'");
  $data   = mysqli_fetch_assoc($queryProfile);
  ?>
  <section class="my_account">
    <h2>MY ACCOUNT</h2><br>
    <!-- ALERT -->
    <?php if (isset($_GET['sukses'])) { ?>
      <div class="alert alert-success mb-3" role="alert">
        <?php echo $_GET['sukses']; ?>
      </div>
    <?php } ?>
    <?php if (isset($_GET['error'])) { ?>
      <div class="alert alert-danger mb-3" role="alert">
        <?php echo $_GET['error']; ?>
      </div>
    <?php } ?>
    <!-- END OF ALERT -->
    <br>
    <div class="row">
      <div class="col-2">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">DASBOARD</a><br>
          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">PROFILE</a><br>
          <!-- <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">ORDER</a><br> -->
          <a class="list-group-item list-group-item-action" id="list-settings-list" href="aplication/auth/logout.php">LOG OUT</a><br>
        </div>
      </div>
      <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <p class="display-4">Hallo <?= $data['nama_member']; ?></p>
                <p class="lead">Pada halaman ini anda bisa mengubah profile, melihat order terakhir, dan melihat proses order.</p>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list" href="profile_order.html">
            <div class="row border">
              <div class="col">
                <form action="aplication/public/ubah_profil.php" method="POST" class="form-group login">
                  <h4>PROFILE</h4>

                  <div class="row">
                    <div class="col">
                      <input type="hidden" name="id" id="id" class="form-control" value="<?= $data['id_member']; ?>" />
                      <label for="nama_lengkap">Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $data['nama_member']; ?>" />
                      <label for="no">Nomor HP</label>
                      <input type="text" name="no" id="no" class="form-control" value="<?= $data['nomor_hp']; ?>" />
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control" value="<?= $data['email']; ?>" />
                    </div>
                  </div>
                  <h4 class="mt-3 mb-2">Ubah Password</h4>
                  <div class="row">
                    <div class="col">
                      <label for="password">Password Baru</label>
                      <input type="password" name="password" id="password" class="form-control" />
                    </div>
                    <div class="col">
                      <label for="password">Ulangi Password</label>
                      <input type="password" name="retypePassword" id="password" class="form-control" />
                    </div>
                  </div>
                  <button type="submit" name="simpanProfile" class="float-right my-5">SIMPAN</button>
                </form>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
            <div class="row border mb-2 p-2" style="border-left: 6px solid lightblue!important;">
              <div class="col">
                <h6>Deep clean</h6>
                <p>lorem</p>
              </div>
              <div class="col text-right">
                <p>19 september 2999</p>
                <h6>Proses ngumbah</h6>
              </div>
            </div>
            <div class="row border mb-2 p-2" style="border-left: 6px solid green!important;;">
              <div class="col">
                <h6>Deep clean</h6>
                <p>lorem</p>
              </div>
              <div class="col text-right">
                <p>19 september 2999</p>
                <h6>Proses ngumbah</h6>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Proses logout</div>
        </div>
      </div>
    </div>
  </section>
</div>