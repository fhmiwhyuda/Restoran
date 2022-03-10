<?php
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $row = $db->getITEM ("SELECT * FROM tbluser WHERE iduser=$id");
        if ($row['status']==0) {
            $aktif = 1;
        } else {
            $aktif = 0;
        }
        $sql = "UPDATE tbluser SET status=$aktif WHERE iduser=$id";
        $db->runSQL($sql);
        header("location:?f=user&m=select");
    }
?>
<!--Author fhmiwhyuda-->