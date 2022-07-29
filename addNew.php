<?php
    ob_start();
    session_start();
    include('./connection.php');
    if(isset($_POST['id_pro'])){
        $size = $_POST['size'];
        $color = $_POST['color'];
        $quantity = $_POST['quantity'];
        $id_pro = $_POST['id_pro'];
        $sql_detail_pro = "select * from product where id = '$id_pro'";
        $result_detail_pro = mysqli_query($conn,$sql_detail_pro);
        $row = mysqli_fetch_assoc($result_detail_pro) or die("loi cau lenh select");
        if($row['promotion_price']!=0){
            $price = $row['promotion_price'];
        }else{
            $price = $row['unit_price'];
        }
        
        if(!isset($_SESSION['cart'])){
            $cart = array(
                $id_pro => array(
                    "pro_name" => $row['name'],
                    "pro_price" => $price,
                    "pro_image" => $row['image'],
                    "pro_color" => $color, 
                    "pro_size" => $size,
                    "pro_quantity" => $quantity
                )
            );
        }else{
            $cart = $_SESSION['cart'];
            if(array_key_exists($id_pro,$cart)){
                $cart[$id_pro] = array(
                    "pro_name" => $row['name'],
                    "pro_price" => $price,
                    "pro_image" => $row['image'],
                    "pro_color" => $color, 
                    "pro_size" => $size,
                    "pro_quantity" => $cart[$id_pro]['pro_quantity']+$quantity
                );
            }else{
                $cart[$id_pro] = array(
                    "pro_name" => $row['name'],
                    "pro_price" => $price,
                    "pro_image" => $row['image'],
                    "pro_color" => $color, 
                    "pro_size" => $size,
                    "pro_quantity" => $quantity
                );
            }
        }
        $_SESSION['cart'] = $cart;
        echo "pre";
        print_r($_SESSION['cart']);
    }
?>