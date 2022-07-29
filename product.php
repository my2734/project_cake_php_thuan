<div class="container">
    <div id="content">
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql_select_proID = "select * from product where id = '$id'";
                $result_select_proID = mysqli_query($conn,$sql_select_proID);
                $row_select_proID = mysqli_fetch_assoc($result_select_proID);
                $name = $row_select_proID['name'];
            }
            
        ?>
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="<?php echo $row_select_proID['image']; ?>" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title"><?php echo $name ?></p>
                            <?php 
                                if($row_select_proID['promotion_price']!=0){?>
                                <p class="single-item-price">
                                    <span class="flash-del"><?php echo number_format($row_select_proID['unit_price'],0,'.','.') ?> đ</span>
                                    <span class="flash-sale"><?php echo number_format($row_select_proID['promotion_price'],0,'.','.') ?> đ</span>
                                </p>
                                <?php }else{ ?>
                                <p class="single-item-price">
                                    <span><?php echo number_format($row_select_proID['unit_price'],0,'.','.') ?> đ</span>
                                </p>
                            <?php } ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>
                        <div class="single-item-desc">
                            <p><?php echo $row_select_proID['description'] ?></p>
                        </div>
                        <div class="space20">&nbsp;</div>
                        <p class="test" id="<?php echo $_GET['id']; ?>">Options:</p>
                        <div class="single-item-options">
                            <label style="margin-top: 8px; margin-right: 10px;">Size:</label>
                            <select class="wc-select" required id="size" name="size">
                                
                                <option selected value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <div class="form-group">
                                <label style="margin-top: 8px; margin-right: 10px;">Color:</label>
                                <select class="wc-select" required id="color" name="color">
                                    <option selected value="Red">Red</option>
                                    <option value="Green">Green</option>
                                    <option value="Yellow">Yellow</option>
                                    <option value="Black">Black</option>
                                    <option value="White">White</option>
                                </select>
                            </div>
                            <label style="margin-top: 8px; margin-right: 10px;">Quantity:</label>
                            <select class="wc-select"  required id="quantity"  name="quantity">
                                <option selected value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div style="margin-top: 20px;">
                            <btn class="btn btn-primary" id="addPro"  type="button">Thêm vào giỏ hàng</btn>
                            <a href="index.php?page=shopping_cart"><btn class="btn btn-warning" id="buyPro"  style="margin-left: 20px;" type="button">Mua hàng</btn></a>
                        </div>
                    </div>
                </div>
                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Description</a></li>
                        <li><a href="#tab-reviews">Reviews (0)</a></li>
                    </ul>
                    <div class="panel" id="tab-description">
                        <p><?php echo $row_select_proID['description'] ?></p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>No Reviews</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Related Products</h4>
                    <div class="row">
                        <?php
                            if(isset($_GET['id'])){
                                $id_pro = $_GET['id'];
                                $sql_pro_byCatid = "select * from product where id = '$id_pro'";
                                $result_pro_byCatid = mysqli_query($conn,$sql_pro_byCatid);
                                $row_pro_byCatid = mysqli_fetch_assoc($result_pro_byCatid);
                                $id_cat = $row_pro_byCatid['id_type'];
                                $sql_pro = "select * from product where id_type = '$id_cat' and id != '$id_pro' limit 4"; 
                                $result_pro =  mysqli_query($conn,$sql_pro);
                                if(mysqli_num_rows($result_pro)>0){
                                    while($row_pro = mysqli_fetch_assoc($result_pro)){ ?>
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        <div class="single-item-header" style="height: 320px;">
                                            <a class="custom_height_img" href="index.php?page=product&id=<?php echo $row_pro['id']; ?>"><img src="<?php echo $row_pro['image'] ?>" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title"><?php echo $row_pro['name'] ?></p>
                                            <p class="single-item-price">
                                                <span>$34.55</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="index.php?page=product&id=<?php echo $row_pro['id']; ?>">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                                    <?php }  } } ?>
                        
                    </div>
                </div>
                <!-- .beta-products-list -->
            </div>
            <?php
            include('./modules/sideMenu.php') 
            ?>
        </div>
    </div>
    <!-- #content -->
</div>