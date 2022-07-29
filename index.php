<?php
	include('./connection.php');
	ob_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
    session_start();
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel </title>
        <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/dest/vendors/colorbox/example3/colorbox.css">
        <link rel="stylesheet" href="assets/dest/rs-plugin/css/settings.css">
        <link rel="stylesheet" href="assets/dest/rs-plugin/css/responsive.css">
        <link rel="stylesheet" title="style" href="assets/dest/css/style.css">
        <link rel="stylesheet" href="assets/dest/css/animate.css">
        <link rel="stylesheet" title="style" href="assets/dest/css/huong-style.css">
        <link rel="stylesheet" href="assets/dest/css/main.css">
    </head>
    <body>
        <div id="header">
            
            <!-- .header-body -->
			<?php
				include('./modules/header.php');
				include('./modules/topNav.php');
			?>
            <!-- .header-bottom -->
        </div>
        <!-- #header -->
        <?php
			if(!isset($_GET['page'])){
				include('./modules/slide.php');
			}
		?>
        <?php
			if(isset($_GET['page'])){
				$namePage = $_GET['page'].'.php';
				include($namePage);
			}else{
				include('home.php');
			}
		?>
       <?php
	   		include('./modules/footer.php');
	   ?>
        <!-- include js files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="assets/dest/js/jquery.js"></script>
        <script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
        <script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
        <script src="assets/dest/vendors/animo/Animo.js"></script>
        <script src="assets/dest/vendors/dug/dug.js"></script>
        <script src="assets/dest/js/scripts.min.js"></script>
        <script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script src="assets/dest/js/waypoints.min.js"></script>
        <script src="assets/dest/js/wow.min.js"></script>
        <!--customjs-->
        <script src="assets/dest/js/custom2.js"></script>
        <script>
            $(document).ready(function($) {    
            	$(window).scroll(function(){
            		if($(this).scrollTop()>150){
            		$(".header-bottom").addClass('fixNav')
            		}else{
            			$(".header-bottom").removeClass('fixNav')
            		}}
            	)
            })
        </script>
        <script>
           $(document).ready(function(){
            var color = $('#color').select().val();
            var quantity = $('#quantity').select().val();
            var size = $('#size').select().val();
            $('#size').change(function(){
                size =  $(this).find(':selected').val();
            });
            $('#color').change(function(){
                color =  $(this).find(':selected').val();
            });
            $('#quantity').change(function(){
                quantity =  $(this).find(':selected').val();
            });
            var id_pro = $('.test').attr('id');
           
           
            $('#addPro').click(function(){
                $.post({
                    url: './addNew.php',
                    data:{color:color,quantity:quantity,size:size,id_pro:id_pro},
                    success: function(){
                        alert('Thêm vào vỏ hàng thành công');
                        location.reload();
                    }
                });
            });

            $('#buyPro').click(function(){
                $.post({
                    url: './addNew.php',
                    data:{color:color,quantity:quantity,size:size,id_pro:id_pro},
                    success: function(){
                        
                    }
                });
            });
           });
            
           
        </script>

        <script>
            $(document).ready(function(){
                $('.delete_pro').click(function(){
                    var id_pro = $(this).attr('id');
                    $.get({
                        url: './delete_pro.php',
                        data:{id_pro : id_pro},
                        success: function(){
                            location.reload();
                        }
                    });
                });
            });
        </script>


        <script>
            $(document).ready(function(){
                $('.delete_cart').click(function(){
                    var id_pro = $(this).attr('id');
                    $.get({
                        url:'./delete_cart.php',
                        data:{id_pro:id_pro},
                        success: function(){
                            alert("xóa thành công");
                            location.reload();
                        }
                    });
                });
            });

        </script>

        <script>
            $(document).ready(function(){
                $('.update_pro_shoppping').change(function(){
                   var pro_quantity = $(this).find(":selected").val();
                    var id_pro = $(this).attr("id");
                    $.get({
                        url: './update_pro.php',
                        data: {id_pro: id_pro, pro_quantity: pro_quantity},
                        success: function(){
                            alert('Cập nhật giỏ hàng thành công');
                            location.reload();
                        }
                    });
                });
            });
        </script>

        <script>
            $(document).ready(function(){
                $('.change_status_order').click(function(){
                    var order_id = $(this).attr('id');
                    
                    $.get({
                        url: './change_status_order.php',
                        data: {order_id:order_id},
                        success: function(){
                            location.reload();
                        }
                    });
                });
            });
        </script>
    </body>
</html>