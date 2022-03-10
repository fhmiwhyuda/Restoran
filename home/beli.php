<h3 class="mt-4">Keranjang belanja</h3>
<?php
    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        unset ($_SESSION['_'.$id]);
    }
    if (!isset($_SESSION['pelanggan'])) {
        header("location:?f=home&m=login");
    }else {
        if (isset($_GET['id'])) {
        $id = $_GET['id'];
        isi($id);
        header("location:?f=home&m=beli");
    }else {
        keranjang();
    }
    }
    function isi($id){
        if (isset($_SESSION['_'.$id])) {
        $_SESSION['_'.$id]++;
        }else {
            $_SESSION['_'.$id]=1;
        }
    }
    function keranjang(){
        global $db;
        echo '
        <table class="table table-bordered w-75">
            <tr>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Hapus</th>
            </tr>
        ';
        foreach ($_SESSION as $key => $value) {
            if ($key<>'pelanggan' && $key<>'idpelanggan') {
                $id = substr($key,1);
                $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";
                $row = $db->getALL($sql);
                foreach ($row as $r) {
                    echo '<tr>';
                    echo '<td>'.$r['menu'].'</td>';
                    echo '<td>'.$r['harga'].'</td>';
                    echo '<td>'.$value.'</td>';
                    echo '<td>'.$r['harga'] * $value.'</td>';
                    echo '<td><a href="?f=home&m=beli&hapus='.$r['idmenu'].'">Hapus</a></td>';
                    echo '</tr>';
                }
            }
        }
        echo '</table>';
    }
?>
<!--Author fhmiwhyuda-->