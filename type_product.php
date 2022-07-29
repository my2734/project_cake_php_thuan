<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        <?php
                            $sql_select_cat = "select * from type_product";
                            $resul_select_cat  = mysqli_query($conn,$sql_select_cat);
                            if(mysqli_num_rows($resul_select_cat)){
                                while($row_select_cat = mysqli_fetch_assoc($resul_select_cat)){ ?>
                                    <li><a href="index.php?page=type_product&id=<?php echo $row_select_cat['id'] ?>"><?php echo $row_select_cat['name'] ?></a></li>
                        <?php }  }  ?>
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                        <?php 
                            $id_cat = $_GET['id'];
                            $sql_pro_byCat = "select * from product where id_type = '$id_cat' order by id desc limit 3";
                            $result_pro_byCat = mysqli_query($conn,$sql_pro_byCat);
                            if(mysqli_num_rows($result_pro_byCat)>0){
                                while( $row_pro_byCat = mysqli_fetch_assoc($result_pro_byCat)){ ?>
                           <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header" style="height: 320px;">
                                        <a href="index.php?page=product&id=<?php echo $row_pro_byCat['id']; ?>"><img class="custom_height_img" src="<?php echo $row_pro_byCat['image'] ?>" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title"><?php echo $row_pro_byCat['name'] ?></p>
                                        <?php 
                                            if($row_pro_byCat['promotion_price']!=0){?>
                                        <p class="single-item-price">
                                            <span class="flash-del"><?php echo number_format($row_pro_byCat['unit_price'],0,'.','.') ?> đ</span>
                                            <span class="flash-sale"><?php echo number_format($row_pro_byCat['promotion_price'],0,'.','.') ?> đ</span>
                                        </p>
                                        <?php }else{ ?>
                                        <p class="single-item-price">
                                            <span><?php echo number_format($row_pro_byCat['unit_price'],0,'.','.') ?> đ</span>
                                        </p>
                                        <?php } ?>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="index.php?page=product&id=<?php echo $row_pro_byCat['id'] ?>">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                    <!-- .beta-products-list -->
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>Hot Products</h4>
                        <div class="row">
                        <?php 
                            $id_cat = $_GET['id'];
                            $sql_pro_byCat = "select * from product where id_type = '$id_cat' ";
                            $result_pro_byCat = mysqli_query($conn,$sql_pro_byCat);
                            if(mysqli_num_rows($result_pro_byCat)>0){
                                while( $row_pro_byCat = mysqli_fetch_assoc($result_pro_byCat)){ ?>
                           <div class="col-sm-4">
                                <div class="single-item" style="margin-top: 42px;">
                                    <div class="single-item-header" style="height: 320px;">
                                        <a href="index.php?page=product&id=<?php echo $row_pro_byCat['id'] ?>"><img class="custom_height_img" src="<?php echo $row_pro_byCat['image'] ?>" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title"><?php echo $row_pro_byCat['name'] ?></p>
                                        <?php 
                                            if($row_pro_byCat['promotion_price']!=0){?>
                                        <p class="single-item-price">
                                            <span class="flash-del"><?php echo number_format($row_pro_byCat['unit_price'],0,'.','.') ?> đ</span>
                                            <span class="flash-sale"><?php echo number_format($row_pro_byCat['promotion_price'],0,'.','.') ?> đ</span>
                                        </p>
                                        <?php }else{ ?>
                                        <p class="single-item-price">
                                            <span><?php echo number_format($row_pro_byCat['unit_price'],0,'.','.') ?> đ</span>
                                        </p>
                                        <?php } ?>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="index.php?page=product&id=<?php echo $row_pro_byCat['id'] ?>">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                        <div class="space40">&nbsp;</div>
                    </div>
                    <!-- .beta-products-list -->
                </div>
            </div>
            <!-- end section with sidebar and main content -->
        </div>
        <!-- .main-content -->
    </div>
    <!-- #content -->
</div>