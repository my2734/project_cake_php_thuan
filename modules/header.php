
<div class="header-top">
    <div class="container">
        <div class="pull-left auto-width-left">
            <ul class="top-menu menu-beta l-inline">
                <li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
            </ul>
        </div>
        <div class="pull-right auto-width-right">
            <ul class="top-details menu-beta l-inline">
                <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
                <?php if(isset($_SESSION['user'])){?>
                    <li><a href="logout.php">Đăng xuất</a></li>
                <?php }else { ?>
                    <li><a href="index.php?page=register">Đăng kí</a></li>
                    <li><a href="index.php?page=login">Đăng nhập</a></li>
               <?php } ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- .container -->
</div>
<!-- .header-top -->
<div class="header-body">
    <div class="container beta-relative">
        <div class="pull-left">
            <a href="index.html" id="logo"><img src="assets/dest/images/logo-cake.png" width="200px" alt=""></a>
        </div>
        <div class="pull-right beta-components space-left ov">
            <div class="space10">&nbsp;</div>
            <div class="beta-comp">
                <form role="search" method="get" id="searchform" action="/">
                    <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
                    <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                </form>
            </div>
            <div class="beta-comp">
                <div class="cart">
                    
                    <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng <?php if(!isset($_SESSION['cart'])) echo "(trống)"; ?> <i class="fa fa-chevron-down"></i></div>
                    <div class="beta-dropdown cart-body">
                    <?php
                    if(isset($_SESSION['cart'])){
                        $cart = $_SESSION['cart'];
                        $total = 0;
                        foreach($cart as $key => $value){ 
                            $total = $total + $value['pro_price']*$value['pro_quantity']; ?>
                            <div class="cart-item">
                                <div class="media">
                                    <a class="pull-left" href="#"><img style="height: 50px;" src="<?php echo $value['pro_image'] ?>" alt=""></a>
                                    <span class="badge badge-success delete_cart" id="<?php echo $key; ?>"  style="float:right; margin-top: 20px;">Xóa</span>
                                    <div class="media-body">
                                        <span style="font-weight: 500;" class="cart-item-title"><?php echo $value['pro_name'] ?></span>
                                        <span class="cart-item-options">Size: <?php echo $value['pro_size'] ?>; Color: <?php echo $value['pro_color'] ?></span>
                                        <span class="cart-item-amount"><?php echo $value['pro_quantity'] ?>*<span><?php echo number_format($value['pro_price'],0,'.','.') ?>đ</span></span>
                                    </div>
                                </div>
                            </div>
                        <?php  } }  ?>
                        <?php if(isset($_SESSION['cart'])){ ?>
                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value"><?php echo number_format($total,0,'.','.'); ?> đ</span></div>
                                <div class="clearfix"></div>
    
                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="index.php?page=shopping_cart" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                       <?php } ?>
                    </div>
                </div>
                <!-- .cart -->
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- .container -->
</div>