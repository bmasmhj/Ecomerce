<?php 

require '../connection.php';

    if(isset($_POST['deleteorder'])){
        $id = $_POST['deleteorder'];
        $sql = "UPDATE  `tbl_order` SET `status`='deleted' WHERE id = '$id' ";
        if ($con->query($sql)) {
            echo "deleted"; 
       }
    }
    if(isset($_POST['cancelorder'])){
        $id = $_POST['cancelorder'];
        $sql = "UPDATE  `tbl_order` SET `status`='canceled' WHERE id = '$id' ";
        if ($con->query($sql)) {
            echo "cancel"; 
       }
    }

?>