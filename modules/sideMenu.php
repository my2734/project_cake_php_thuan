<div class="col-sm-3 aside">
    <div class="widget">
        <h3 class="widget-title">Best Sellers</h3>
        <div class="widget-body">
            <div class="beta-sales beta-lists">
                <?php
                    $sql_pro_hot = "select * from product where hot = 1 limit 15";
                    $result_pro_hot = mysqli_query($conn,$sql_pro_hot);
                    if(mysqli_num_rows($result_pro_hot)>0){
                        while($row_pro_hot = mysqli_fetch_assoc($result_pro_hot)){ ?>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="index.php?page=product&id=<?php echo $row_pro_hot['id'] ?>"><img style="height: 58px;" src="<?php echo $row_pro_hot['image'] ?>" alt=""></a>
                                <div class="media-body">
                                   <a href="index.php?page=product&id=<?php echo $row_pro_hot['id']; ?>">
                                        <?php echo $row_pro_hot['name'] ?> <br>
                                   </a>
                                    <span><?php echo number_format($row_pro_hot['unit_price'],0,'.','.') ?> đ</span>
                                </div>
                            </div>

                        <?php } } ?>
                
            </div>
        </div>
    </div>
    <!-- best sellers widget -->
    <div class="widget">
        <h3 class="widget-title">New Products</h3>
        <div class="widget-body">
            <div class="beta-sales beta-lists">
                <?php
                $sql_pro_new = "select * from product order by id desc limit 15";
                $result_pro_new = mysqli_query($conn,$sql_pro_new);
                if(mysqli_num_rows($result_pro_new)){
                    while($row_pro_new = mysqli_fetch_assoc($result_pro_new)){ ?>
                    <div class="media beta-sales-item">
                        <a class="pull-left" href="index.php?page=product&id=<?php echo $row_pro_new['id'] ?>"><img style="height: 58px;" src="<?php echo $row_pro_new['image'] ?>" alt=""></a>
                        <div class="media-body">
                            <a href="index.php?page=product&id=<?php echo $row_pro_new['id']; ?>">
                                <?php echo $row_pro_new['name'] ?>
                            </a>
                            <span><?php echo number_format($row_pro_new['unit_price'],0,'.','.') ?> đ</span>
                        </div>
                    </div>
                   <?php  } }  ?>
            </div>
        </div>
    </div>
    <!-- best sellers widget -->
</div>