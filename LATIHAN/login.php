<?php
    session_start();
    require_once "../dbcontroller.php";
    $db = new DB;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto mt-4">
                <div class="form-group">
                    <div>
                        <h2>LOGIN RESTORAN</h2>
                    </div>
                    <form action="" method="post">
                        <div class="form-group w-50">
                            <label for="">EMAIL</label><br></br>
                            <input class="form-control" type="email" name="email" required placeholder="Email"><br>
                        </div>
                        <div class="form-group w-50">
                            <label for="">PASSWORD</label><br></br>
                            <input class="form-control" type="password" name="password" required placeholder="Password"><br>
                        </div>
                        <div>
                            <input type="submit" name="login" value="Login" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM tbluser WHERE email='$email' AND '$password'";
        $count = $db->rowCOUNT($sql);

        if ($count == 0) {
            echo '<div class="col-4 mx-auto">Email atau Password salah!</div>';
        }else {
            $sql = "SELECT * FROM tbluser WHERE email='$email' AND '$password'";
            $row = $db->getITEM($sql);
            $_SESSION['user']=$row['email'];
            $_SESSION['level']=$row['level'];
            header("location:index.php");
        }
    }
?>