<?php 
    include('./connection.php');
    session_start();
    ob_start();

    if(isset($_GET['id_pro'])){
        $id_pro = $_GET['id_pro'];
        if(array_key_exists($id_pro,$_SESSION['cart'])){
            unset($_SESSION['cart'][$id_pro]);
            
        }
    }
    
?>