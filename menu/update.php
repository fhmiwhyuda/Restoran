<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";
        $item = $db->getITEM($sql);
        $idkategori = $item['idkategori'];
        $gambar = $item['gambar'];
    }
    $row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC")
?>
<h3>Update Menu</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group w-50">
            <label for="">kategori</label><br></br>
            <select name="idkategori" id="">
                <?php foreach ($row as $r): ?>
                    <option <?php if ($idkategori==$r['idkategori']) echo "selected"?> value="<?php echo $r['idkategori'] ?>"><?php echo $r['kategori'] ?></option>
                <?php endforeach ?>
            </select>
        </div><br>
        <div class="form-group w-50">
            <label for="">Nama Menu</label><br></br>
            <input class="form-control" type="text" name="menu" required value="<?php echo $item['menu'] ?>"><br>
        </div>
        <div class="form-group w-50">
            <label for="">Harga</label><br></br>
            <input class="form-control" type="text" name="harga" required value="<?php echo $item['harga'] ?>"><br>
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
        $gambar = $item['gambar'];
        $temp = $_FILES['gambar']['tmp_name'];

        if (!empty($temp)) {
            $gambar = $_FILES['gambar']['name'];
            move_uploaded_file($temp,'../upload/'.$gambar);
        }

        $sql = "UPDATE tblmenu SET idkategori=$idkategori, menu='$menu', gambar='$gambar', harga=$harga WHERE idmenu=$id";
        $db->runSQL($sql);
        header("location:?f=menu&m=select");
    }
?>
<!--Author fhmiwhyuda-->