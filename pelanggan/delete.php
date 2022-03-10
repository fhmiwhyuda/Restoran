<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tblpelanggan WHERE idpelanggan=$id";
        $row = $db->getITEM($sql);
        $sql = "DELETE FROM tblpelanggan WHERE idpelanggan =$id";
        $db->runSQL($sql);
        header("location:?f=pelanggan&m=select");
    }
?>
<!--Author fhmiwhyuda-->