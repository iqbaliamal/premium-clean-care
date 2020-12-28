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
						<h3 class="mb-5 text-center text-bold">SIGN IN</h3>

						<!-- ALERT -->
						<div class="alert alert-danger" role="alert">
							Get alert danger
						</div>
						<!-- END OF ALERT -->

						<form action="fungsi/auth.php" method="POST">
							<div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Username or Email">
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
							<div class="row">
								<div class="col-6 text-left">
								</div>
								<div class="col-6 text-right">
									<a href="forgot.php">Forgot your password?</a>
								</div>
							</div>
							<div class="form-group my-4">
								<button type="submit" class="btn btn-linear-primary btn-rounded px-5">Log in</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	require_once "footer.php";
	?>