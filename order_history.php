<div class="container">
    <div class="content">
        <h2>Lịch sử đơn hàng</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Địa chỉ nhận hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Thời gian</th>
                    <th>Trạng thái</th>
                    
                    <th>Sản phẩm</th>
                    <th>Thanh toán</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql_select_order =  "select * from tbl_order";
                    $result_select_order =  mysqli_query($conn,$sql_select_order);
                    if(mysqli_num_rows($result_select_order)>0){
                        $i=0;
                        while($row_select_order = mysqli_fetch_assoc($result_select_order)){ 
                            $i++;
                            $status = $row_select_order['status'];
                            if( $status == 0 ){
                                $trang_thai = "Đang tạo đơn hàng";
                            }else if($status == 1){
                                $trang_thai = "Đang giao hàng";
                            }else if($status == 2){
                                $trang_thai = "Giao hàng thành công";
                            }

                    
                            ?>

                        
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row_select_order['full_name'] ?></td>
                    <td><?php echo $row_select_order['address'] ?></td>
                    <td><?php echo $row_select_order['email'] ?></td>
                    <td><?php echo $row_select_order['phone'] ?></td>
                    <td><?php echo $row_select_order['date_create'] ?></td>
                    <td>
                        <?php echo $trang_thai; ?><br>
                        <?php 
                            if($status ==1 ){ ?>
                                <button id="<?php echo $row_select_order['id']; ?>" class="change_status_order btn btn-primary btn-sm" style="margin-top: 10px;outline:none;">Nhận hàng</button>
                            <?php } ?>
                    </td>
                    <td>
                        <?php
                            $order_id =  $row_select_order['id'];
                            $sql_order_detail = "select * from tbl_order_detail where order_id = '$order_id'";
                            $resutl_order_detail = mysqli_query($conn,$sql_order_detail);
                            if(mysqli_num_rows($resutl_order_detail)>0){
                                $total = 0;
                                while($row_order_detail = mysqli_fetch_assoc($resutl_order_detail)){ 
                                    $total = $total + $row_order_detail['pro_quantity']*$row_order_detail['pro_price'];
                                    ?>
                        <div class="media">
                            <img height="50" src="<?php echo $row_order_detail['pro_image'] ?>" alt="" class="pull-left">
                            <div class="media-body">
                                <p class="font-large"><?php echo $row_order_detail['pro_name'] ?></p>
                                <span class="color-gray your-order-info">Color: <?php echo $row_order_detail['pro_color'] ?></span>
                                <span class="color-gray your-order-info">Size: <?php echo $row_order_detail['pro_size'] ?></span>
                                <span class="color-gray your-order-info">Quantity: <?php echo $row_order_detail['pro_quantity'] ?></span>
                                <span class="color-gray your-order-info">Price: <?php echo number_format($row_order_detail['pro_price'],0,'.','.') ?>đ</span>

                            </div>
                        </div>
                        <?php } } ?>
                    </td>
                    <td><?php echo number_format($total,0,'.','.') ?>đ</td>
                </tr>
                <?php }  } ?>
            </tbody>
        </table>
    </div>
</div>