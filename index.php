<?php
    session_start();
    require_once "dbcontroller.php";
    $db = new DB;
    $sql = "SELECT * FROM tblkategori ORDER BY kategori";
    $row=$db->getALL($sql);
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
    <title>Aplikasi restoran | fhmiwhyuda</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3  mt-4">
                <h2><a href="index.php">RESTORAN</a></h2>
            </div>
            <div class="col-md-9">
                <?php
                    if (isset($_SESSION['pelanggan'])) {
                        echo '
                            <div class="float-end mt-3"><a class="nav-link" href="?log=logout">logout</a></a></div>
                            <div class="float-end mt-4 me-4">Pelanggan : <a href="?f=home&m=beli">'.$_SESSION['pelanggan'].'</a></div>
                        ';
                    }else {
                        echo '
                            <div class="float-end mt-4"><a class="nav-link" href="?f=home&m=login">Login</a></div>
                            <div class="float-end mt-4 me-2"><a class="nav-link" href="?f=home&m=daftar">Daftar</a></div>
                        ';
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <h2>DAFTAR MENU</h2>
                <hr>
                <?php if(!empty($row)){?>
                <ul class="nav flex-column">
                <?php foreach($row as $r): ?>
                    <li class="nav-item"><a class="nav-link" href="?f=home&m=produk&id=<?php echo $r['idkategori'] ?>"><?php echo $r['kategori'] ?></a></li>
                <?php endforeach?>
                </ul>
                <?php }?>
            </div>
            <div class="col-md-9">
                <?php
                    if (isset($_GET['f']) && isset($_GET['m'])) {
                        $f = $_GET['f'];
                        $m = $_GET['m'];
                        $file = $f.'/'.$m.'.php';
                        require_once $file;
                    }else{
                        require_once "home/produk.php";
                    }
                ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <p class="text-center">2021 copyright @fahmiwahyuda | SMKN Pasirian </p>
            </div>
        </div>
    </div>
</body>
</html>
<!--Author fhmiwhyuda-->