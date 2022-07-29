<?php
ob_start();
session_start();
include('./connection.php');
    echo "<pre>";
    print_r($_SESSION['cart']);
    if(isset($_SESSION['cart'])){
        if(isset($_GET['id_pro'])){
            $id_pro = $_GET['id_pro'];
            $pro_quantity =  $_GET['pro_quantity'];
            $_SESSION['cart'][$id_pro]['pro_quantity'] = $pro_quantity;
        }
    }

    echo "<pre>";
    print_r($_SESSION['cart']);
?>