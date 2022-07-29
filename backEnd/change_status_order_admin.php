<?php 
    include('../connection.php');
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $update_status = "update tbl_order set status = 1 where id = '$order_id'";
        mysqli_query($conn,$update_status);
    }
?>