<?php
    session_start();
    require_once "../dbcontroller.php";
    $db = new DB;
    if (!isset($_SESSION['user'])) {
        header("location:login.php");
    }
    if (isset($_GET['log'])) {
        session_destroy();
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page | Aplikasi restoran</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>RESTORAN</h2>
                <h3>Admin page</h3>
            </div>
            <div class="col-md-9">
                <div class="float-end mt-3"><a class="nav-link" href="?log=logout">logout</a></div>
                <div class="float-end mt-4 me-4">user : <a href="?f=user&m=updateuser&id=<?php echo $_SESSION['iduser'] ?>"><?php echo $_SESSION['user'] ?></a></div>
            </div>
        </div>
        <!-- menu -->
        <div class="row">
            <div class="col-md-3">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="?f=kategori&m=select">kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=menu&m=select">menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=pelanggan&m=select">pelanggan</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=order&m=select">order</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=orderdetail&m=select">order detail</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=user&m=select">user</a></li>
                </ul>
            </div>
            <!-- koneksi ke masing" file menu -->
            <div class="col-md-9">
                <?php
                    if (isset($_GET['f']) && isset($_GET['m'])) {
                        $f = $_GET['f'];
                        $m = $_GET['m'];
                        $file = '../'.$f.'/'.$m.'.php';
                        require_once $file;
                    }
                ?>
            </div>
        </div>
        <!-- copyright -->
        <div class="row mt-5">
            <div class="col">
                <p class="text-center">2021 copyright @fahmiwahyuda | SMKN Pasirian </p>
            </div>
        </div>
    </div>
</body>
</html>
<!--Author fhmiwhyuda-->