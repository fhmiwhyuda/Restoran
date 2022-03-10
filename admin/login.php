<?php
    session_start();
    require_once "../dbcontroller.php";
    $db = new DB;
?>
<!doctype html>
<html lang="en">
<head>
	<title>Login Restoran</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../bootstrap/css/style.css">
</head>
<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">RESTORAN</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
							<h3 class="text-center mb-4">Login admin</h3>
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
										$sql = "SELECT * FROM tbluser WHERE email='$email' AND password='$password'";
										$count = $db->rowCOUNT($sql);

										if ($count == 0) {
											echo '<center class="text-danger">Email atau Password salah!</center>';
										}else {
											$sql = "SELECT * FROM tbluser WHERE email='$email' AND password='$password'";
											$row = $db->getITEM($sql);
											$_SESSION['user']=$row['email'];
											$_SESSION['level']=$row['level'];
											$_SESSION['iduser']=$row['iduser'];
											header("location:index.php");
										}
									}
								?>
								<!-- <div class="form-group d-md-flex">
									<div class="w-50">
										<label class="checkbox-wrap checkbox-primary">Remember Me
											<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div> -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>