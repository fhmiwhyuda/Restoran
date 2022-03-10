<!doctype html>
<html lang="en">
<head>
	<title>Login Restoran</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="bootstrap/css/style.css">
</head>
<body>
	<div class="mt-5 mb-4">
		<div class="row justify-content-center">
			<div class="col-md-7 col-lg-5">
				<div class="login-wrap p-4 p-md-5">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="fa fa-user-o"></span>
					</div>
						<h3 class="text-center mb-4">Login pelanggan</h3>
						<form action="" method="post" class="login-form">
							<div class="form-group">
								<input type="email" class="form-control rounded-left" name="email" placeholder="Email" required>
							</div>
							<div class="form-group d-flex">
								<input type="password" class="form-control rounded-left" name="password" placeholder="Password" required>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary rounded submit px-3" name="login" value="Login">Login</button>
							</div>
							<?php
								if (isset($_POST['login'])) {
									$email = $_POST['email'];
									$password = $_POST['password'];
									$sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND status=1";
									$count = $db->rowCOUNT($sql);

									if ($count == 0) {
										echo '<center class="text-danger">Email atau Password salah!</center>';
									}else {
										$sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND status=1";
										$row = $db->getITEM($sql);
										$_SESSION['pelanggan']=$row['email'];
										$_SESSION['idpelanggan']=$row['idpelanggan'];
										header("location:index.php");
									}
								}
							?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<!--Author fhmiwhyuda-->