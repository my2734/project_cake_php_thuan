<?php
    session_start();
    ob_start();
    unset($_SESSION['login']);
    header("location: index.php");
    if(isset($_SESSION['login'])){
        echo "Ton tai session";
    }else {
        echo "Khong ton tai session";
    }
?>