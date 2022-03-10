<h3>Insert Kategori</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">kategori</label><br></br>
            <input class="form-control" type="text" name="kategori" required placeholder="isi kategori"><br>
        </div>
        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div>
    </form>
</div>
<?php
    if (isset($_POST['simpan'])) {
        $kategori = $_POST['kategori'];
        $sql = "INSERT INTO tblkategori VALUE ('','$kategori')";
        $db->runSQL($sql);
        header("location:?f=kategori&m=select");
    }
?>
<!--Author fhmiwhyuda-->