<?php 
    include('./connection.php');
?>

<?php 

    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $sql_order = "update tbl_order set status = 2 where id = '$order_id'";
        mysqli_query($conn,$sql_order);
        
    }
?>