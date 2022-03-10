<?php
    //koneksi ke file function.php
    require_once "../function.php";
    //mengambil data dari tabel kategori dengan id yang sudah ditentukan difile select.php
    $sql = "SELECT * FROM tblkategori WHERE idkategori = $id";
    //koneksi ke database
    $result = mysqli_query($koneksi,$sql);
    $row = mysqli_fetch_assoc($result);
    echo "<br>";
?>
<!--from update html-->
<form action="" method="post">
    kategori :
    <input type="text" name="kategori" value="<?php echo $row['kategori'] ?>">
    <br>
    <input type="submit" name="simpan" value="simpan">
</form>
<?php
    //update data
    if (isset($_POST['simpan'])) {
        $kategori = $_POST['kategori'];
        $sql = "UPDATE tblkategori SET kategori='$kategori' WHERE idkategori=$id";
        $result = mysqli_query($koneksi,$sql);
        header("location:http://localhost/restoran/kategori/select.php");
    }
?>
<!--Author fhmiwhyuda-->