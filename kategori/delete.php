<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tblkategori WHERE idkategori=$id";
        $row = $db->getITEM($sql);
        $sql = "DELETE FROM tblkategori WHERE idkategori =$id";
        $db->runSQL($sql);
        header("location:?f=kategori&m=select");
    }
?>
<!--Author fhmiwhyuda-->