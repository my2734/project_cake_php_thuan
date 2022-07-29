<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <!-- NEW PRODUCT -->
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">438 styles found</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <?php
                                $sql_select_pro = "select * from product order by id desc limit 4";
                                $result_select_pro = mysqli_query($conn,$sql_select_pro);
                                if(mysqli_num_rows($result_select_pro)>0){
                                    while($row_select_pro = mysqli_fetch_assoc($result_select_pro)){ ?>
                            <div class="col-sm-3">
                                <div class="single-item" style="margin-top: 42px;">
                                    <?php
                                        if($row_select_pro['promotion_price']!=0){ ?>
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    <?php } ?>
                                    <div class="single-item-header" style="height: 350px;">
                                        <a href="index.php?page=product&id=<?php echo $row_select_pro['id'] ?>">
                                        <img class="custom_height_img" src="<?php echo $row_select_pro['image'] ?>"  alt="">
                                        </a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title" style="text-transform: uppercase; font-weight: 500;"><?php echo $row_select_pro['name'] ?></p>
                                        <?php 
                                            if($row_select_pro['promotion_price']!=0){?>
                                        <p class="single-item-price">
                                            <span class="flash-del"><?php echo number_format($row_select_pro['unit_price'],0,'.','.') ?> đ</span>
                                            <span class="flash-sale"><?php echo number_format($row_select_pro['promotion_price'],0,'.','.') ?> đ</span>
                                        </p>
                                        <?php }else{ ?>
                                        <p class="single-item-price">
                                            <span><?php echo number_format($row_select_pro['unit_price'],0,'.','.') ?> đ</span>
                                        </p>
                                        <?php } ?>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="index.php?page=product&id=<?php echo $row_select_pro['id'] ?>">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <?php  }  }  ?>
                        </div>
                    </div>
                    <!-- .beta-products-list -->
                    <!-- BEST PRODUCT -->
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>Top Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">438 styles found</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <?php
                                $sql_select_pro = "select * from product";
                                $result_select_pro = mysqli_query($conn,$sql_select_pro);
                                if(mysqli_num_rows($result_select_pro)>0){
                                    while($row_select_pro = mysqli_fetch_assoc($result_select_pro)){ ?>
                            <div class="col-sm-3">
                                <div class="single-item" style="margin-top: 42px;">
                                    <?php
                                        if($row_select_pro['promotion_price']!=0){ ?>
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    <?php } ?>
                                    <div class="single-item-header" style="height: 350px;">
                                        <a href="index.php?page=product&id=<?php echo $row_select_pro['id'] ?>">
                                        <img class="custom_height_img" src="<?php echo $row_select_pro['image'] ?>"  alt="">
                                        </a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title"><?php echo $row_select_pro['name'] ?></p>
                                        <?php 
                                            if($row_select_pro['promotion_price']!=0){?>
                                        <p class="single-item-price">
                                            <span class="flash-del"><?php echo number_format($row_select_pro['unit_price'],0,'.','.') ?> đ</span>
                                            <span class="flash-sale"><?php echo number_format($row_select_pro['promotion_price'],0,'.','.') ?> đ</span>
                                        </p>
                                        <?php }else{ ?>
                                        <p class="single-item-price">
                                            <span><?php echo number_format($row_select_pro['unit_price'],0,'.','.') ?> đ</span>
                                        </p>
                                        <?php } ?>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="index.php?page=product&id=<?php echo $row_select_pro['id'] ?>">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <?php  }  }  ?>
                        </div>
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