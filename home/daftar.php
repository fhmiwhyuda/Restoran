<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>register</title>
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
                            <h3 class="text-center mb-4">Registrasi pelanggan</h3>
                            <form action="" method="post" class="login-form">
                                <div class="form-group">
                                    <input type="text" name="pelanggan" required placeholder="nama pelanggan" class="form-control">
                                </div>
                                <div class="form-group d-flex">
                                    <input type="text" name="alamat" required placeholder="alamat pelanggan" class="form-control">
                                </div>
                                <div class="form-group d-flex">
                                    <input type="text" name="telp" required placeholder="no telp" class="form-control">
                                </div>
                                <div class="form-group d-flex">
                                    <input type="email" name="email" required placeholder="Masukkan Email" class="form-control">
                                </div>
                                <div class="form-group d-flex">
                                    <input type="password" name="password" required placeholder="Masukkan password" class="form-control">
                                </div>
                                <div class="form-group d-flex">
                                    <input type="password" name="konfirmasi" required placeholder="Ulangi password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3" name="daftar" value="daftar">Daftar</button>
                                </div>
                                <?php
                                    if (isset($_POST['daftar'])) {
                                        $pelanggan = $_POST['pelanggan'];
                                        $alamat = $_POST['alamat'];
                                        $telp = $_POST['telp'];
                                        $email = $_POST['email'];
                                        $password = $_POST['password'];
                                        $konfirmasi = $_POST['konfirmasi'];

                                        if ($password == $konfirmasi) {
                                            $sql = "INSERT INTO tblpelanggan VALUES ('','$pelanggan', '$alamat', '$telp', '$email', '$password',1)";
                                            $db->runSQL($sql);
                                            echo'<center class="text-success">Registrasi berhasil silahkan login!</center>
                                                <div class="form-group">
                                                    <button class="form-control btn btn-primary rounded submit px-3 mt-3"><a class="text-white" href="?f=home&m=login">Login</a></button>
                                                </div>
                                            ';
                                        } else {
                                            echo '<center class="text-danger">Pastikan password sama!</center>';
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