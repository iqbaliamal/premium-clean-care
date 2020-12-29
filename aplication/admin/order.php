<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['nama'])) {
  require_once "header.php";
  require_once "../../config/koneksi.php";
?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Order</h1>

      <nav aria-label="breadcrumb shadow">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Order</li>
        </ol>
      </nav>
    </div>

    <div class="card mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Order</h6>
      </div>
      <div class="card-body">

        <!-- ALERT -->
        <div class="alert alert-success" role="alert">
          Get alert sukses
        </div>
        <div class="alert alert-danger" role="alert">
          Get alert danger
        </div>
        <!-- END OF ALERT -->

        <div class="col mb-2">
          <div class="card border-left-primary shadow">
            <div class="card-body">
              <div class="row d-flex">
                <div class="text-s mr-auto font-weight-bold text-uppercase mb-2">Deep Clean</div>
                <div class="text-s mr-3 text-uppercase">19-12-2020 : 14.35</div>
                <div class="text-s text-uppercase">
                  <span class="badge badge-primary">Penjemputan</span>
                </div>
              </div>
              <div class="row d-flex">
                <div class="text-s mr-auto text-uppercase mb-2">Budi</div>
                <div class="text-s mr-5 text-uppercase">Rp. 20.000</div>
                <div class="text-s font-weight-bold text-uppercase">
                  <a href="detail_order.php" class="badge badge-dark">detail</a>
                </div>
              </div>
              <div class="row d-flex">
                <div class="text-s mr-auto font-italic mb-2">Nike Air Jordan | Merah | 42</div>
                <div class="text-s font-weight-bold">
                  <button class="deletebtn border-0 btn-transition btn-sm btn-outline-danger" type="button"> <i class="fa fa-trash"></i> </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col mb-2">
          <div class="card border-left-warning shadow">
            <div class="card-body">
              <div class="row d-flex">
                <div class="text-s mr-auto font-weight-bold text-uppercase mb-2">Deep Clean</div>
                <div class="text-s mr-3 text-uppercase">19-12-2020 : 14.35</div>
                <div class="text-s text-uppercase">
                  <span class="badge badge-warning">Pencucian</span>
                </div>
              </div>
              <div class="row d-flex">
                <div class="text-s mr-auto text-uppercase mb-2">Budi</div>
                <div class="text-s mr-5 text-uppercase">Rp. 20.000</div>
                <div class="text-s font-weight-bold text-uppercase">
                  <a href="detail_order.php" class="badge badge-dark">detail</a>
                </div>
              </div>
              <div class="row d-flex">
                <div class="text-s mr-auto font-italic mb-2">Nike Air Jordan | Merah | 42</div>
                <div class="text-s font-weight-bold">
                  <button class="deletebtn border-0 btn-transition btn-sm btn-outline-danger" type="button"> <i class="fa fa-trash"></i> </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col mb-2">
          <div class="card border-left-success shadow">
            <div class="card-body">
              <div class="row d-flex">
                <div class="text-s mr-auto font-weight-bold text-uppercase mb-2">Deep Clean</div>
                <div class="text-s mr-3 text-uppercase">19-12-2020 : 14.35</div>
                <div class="text-s text-uppercase">
                  <span class="badge badge-success">Pengantaran</span>
                </div>
              </div>
              <div class="row d-flex">
                <div class="text-s mr-auto text-uppercase mb-2">Budi</div>
                <div class="text-s mr-5 text-uppercase">Rp. 20.000</div>
                <div class="text-s font-weight-bold text-uppercase">
                  <a href="detail_order.php" class="badge badge-dark">detail</a>
                </div>
              </div>
              <div class="row d-flex">
                <div class="text-s mr-auto font-italic mb-2">Nike Air Jordan | Merah | 42</div>
                <div class="text-s font-weight-bold">
                  <button class="deletebtn border-0 btn-transition btn-sm btn-outline-danger" type="button"> <i class="fa fa-trash"></i> </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col mb-2">
          <div class="card border-left-secondary shadow">
            <div class="card-body">
              <div class="row d-flex">
                <div class="text-s mr-auto font-weight-bold text-uppercase mb-2">Deep Clean</div>
                <div class="text-s mr-3 text-uppercase">19-12-2020 : 14.35</div>
                <div class="text-s text-uppercase">
                  <span class="badge badge-secondary">Selesai</span>
                </div>
              </div>
              <div class="row d-flex">
                <div class="text-s mr-auto text-uppercase mb-2">Budi</div>
                <div class="text-s mr-5 text-uppercase">Rp. 20.000</div>
                <div class="text-s font-weight-bold text-uppercase">
                  <a href="detail_order.php" class="badge badge-dark">detail</a>
                </div>
              </div>
              <div class="row d-flex">
                <div class="text-s mr-auto font-italic mb-2">Nike Air Jordan | Merah | 42</div>
                <div class="text-s font-weight-bold">
                  <button class="deletebtn border-0 btn-transition btn-sm btn-outline-danger" type="button"> <i class="fa fa-trash"></i> </button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>


    <!-- DELETE DATA -->
    <div class="modal fade" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <form action="" method="POST">
            <div class="modal-body">
              <input type="hidden" name="delete_id" id="delete_id">
              <h5> Apakah anda yakin akan menghapus data?</h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
              <button type="submit" name="deleteOrderStatus" class="btn btn-danger"> Hapus </button>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- ======================================================================================== -->

  </div>
  <!-- /.container-fluid -->
  <?php
  require_once "footer.php";
  ?>

  <!-- SCRIPT HAPUS DATA -->
  <script>
    $(document).ready(function() {
      $('.deletebtn').on('click', function() {
        $('#deleteData').modal('show');
        // script disini
      });
    });
  </script>
<?php
} else {
  header("Location: login.php");
  exit();
}
?>