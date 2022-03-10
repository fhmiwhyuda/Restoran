<?php
    $row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC")
?>
<h3>Insert Menu</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group w-50">
            <label for="">kategori</label><br></br>
            <select name="idkategori" id="">
                <?php foreach ($row as $r): ?>
                    <option value="<?php echo $r['idkategori'] ?>"><?php echo $r['kategori'] ?></option>
                <?php endforeach ?>
            </select>
        </div><br>
        <div class="form-group w-50">
            <label for="">Nama Menu</label><br></br>
            <input class="form-control" type="text" name="menu" required placeholder="isi menu"><br>
        </div>
        <div class="form-group w-50">
            <label for="">Harga</label><br></br>
            <input class="form-control" type="text" name="harga" required placeholder="isi harga"><br>
        </div>
        <div class="form-group w-50">
            <label for="">Gambar</label><br></br>
            <input type="file" name="gambar"><br></br>
        </div>
        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div><br>
    </form>
</div>
<?php
    if (isset($_POST['simpan'])) {
        $idkategori = $_POST['idkategori'];
        $menu = $_POST['menu'];
        $harga = $_POST['harga'];
        $gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];

        if (empty($gambar)) {
            echo '<h5>Gambar tidak boleh kosong!</h5>';
        }else {
            $sql = "INSERT INTO tblmenu VALUE ('',$idkategori,'$menu','$gambar',$harga)";
            move_uploaded_file($temp,'../upload/'.$gambar);
            $db->runSQL($sql);
            header("location:?f=menu&m=select");
        }
    }
?>
<!--Author fhmiwhyuda-->