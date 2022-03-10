<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $row = $db->getITEM("SELECT * FROM tblpelanggan WHERE idpelanggan=$id");
        if ($row['status']==0) {
            $status = 1;
        }else {
            $status = 0;
        }
        $sql = "UPDATE tblpelanggan SET status=$status WHERE idpelanggan=$id";
        $db->runSQL($sql);
        header("location:?f=pelanggan&m=select");
    }
?>
<!--Author fhmiwhyuda-->