<div class="header-bottom" style="background-color: #0277b8;">
    <div class="container">
        <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
        <div class="visible-xs clearfix"></div>
        <nav class="main-menu">
            <ul class="l-inline ov">
                <li><a href="index.php">Trang chủ</a></li>
                <li>
                    <a href="#">Sản phẩm</a>
                    <ul class="sub-menu">
                        <?php
                            $sql_select_cat = "select * from type_product";
                            $result_select_cat = mysqli_query($conn,$sql_select_cat);
                            if(mysqli_num_rows($result_select_cat)>0){
                                while($row_select_cat = mysqli_fetch_assoc($result_select_cat)){ ?>

                                <li><a href="index.php?page=type_product&id=<?php echo $row_select_cat['id'] ?>"><?php echo $row_select_cat['name']; ?></a></li>
                        <?php }  } ?>
                    </ul>
                </li>
                <li><a href="about.html">Giới thiệu</a></li>
                <li><a href="index.php?page=contacts">Liên hệ</a></li>
            </ul>
            <div class="clearfix"></div>
        </nav>
    </div>
    <!-- .container -->
</div>