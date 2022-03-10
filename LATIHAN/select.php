<div style = "margin: auto; width:900px">
<?php 
    require_once "../function.php";
    $banyak = 4;
    $sql = "SELECT idkategori FROM tblkategori";
    $result = mysqli_query($koneksi,$sql);
    $jumlahdata = mysqli_num_rows($result);
    $halaman = ceil($jumlahdata/$banyak);

    //Paging
    if (isset($_GET['p'])) {
        $p = $_GET['p'];
        $mulai = ($p * $banyak)-$banyak;
    }
    else {
        $mulai = 0;
    }

    //Hapus data
    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        require_once "delete.php";
    }

    //Update data
    if (isset($_GET['update'])) {
        $id = $_GET['update'];
        require_once "update.php";
    }

    //Mengatur jumlah data yang akan ditampilkan
    $sql = "SELECT * FROM tblkategori LIMIT $mulai,$banyak";
    $result = mysqli_query($koneksi,$sql);
    $jumlah = mysqli_num_rows($result);

    //Table
    echo '<table border=1px>
    <tr>
        <th>NO</th>
        <th>KATEGORI</th>
        <th>HAPUS</th>
        <th>UPDATE</th>
    </tr>
    ';

    $no = $mulai+1;
    if($jumlah > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
            echo '<td>'.$no++.'</td>';
            echo '<td>'.$row['kategori'].'</td>';
            echo '<td><a href="?hapus='.$row['idkategori'].'">'.'Hapus'.'</a></td>';
            echo '<td><a href="?update='.$row['idkategori'].'">'.'Update'.'</a></td>';
            echo '</tr>';
        }
    }
    echo '</table>';

    //Paging
    echo "<br></br>";
    for ($i=1; $i <= $halaman ; $i++) { 
        echo '<a href="?p='.$i.'">'.$i.'</a>';
        echo "&nbsp &nbsp";
    }

    //Tambah data
    echo '<h3><a href="http://localhost/restoran/kategori/insert.php">TAMBAH DATA</a></h3>';

?>
</div>
<!--Author fhmiwhyuda-->