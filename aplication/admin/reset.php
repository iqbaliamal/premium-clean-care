<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin - Dashboard</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">
	<div class="container">
		<div class="row vh-100 d-flex justify-content-center align-items-center auth">
			<div class="col-md-7 col-lg-5">
				<div class="card">
					<div class="card-body">
						<h3 class="mb-5">RESET PASSWORD</h3>
		
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
						<form action="aplication/admin/fungsi/reset_proses.php" method="POST" class="form-group login border">
							<!-- aksi untuk update -->
                            <input type="hidden" name="token" value="<?= $token; ?>" />
                            <input type="hidden" name="email" value="<?= $email; ?>" />
                            <input type="hidden" name="aksi" value="<?= $action; ?>" />
                            <input type="hidden" name="action" value="update" />

                            <div class="form-group">
                            <label for="password1">New Password</label> <span style="color: red;"> *</span>
                            <input type="password" id="password1" name="password" class="form-control" />
							</div>
                            <div class="form-group">
                            <label for="password2">Re Type Password</label> <span style="color: red;"> *</span>
                            <input type="password" id="password2" name="retypePassword" class="form-control" />
							</div>

                             <!-- ambil email -->
                            <input type="text" name="email" value="<?php echo $email; ?>" hidden />
                            
							<div class="form-group my-4">
								<button type="submit" name="forgotadmin" class="btn btn-linear-primary btn-rounded px-5">Submit</button>
							</div>
							<p><a href="login.php" id="create_account">Already have an account? Login!</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	require_once "footer.php";
	?>