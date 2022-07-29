<?php
	ob_start();
	if(!isset($_SESSION['user'])){
		header('Location: index.php?page=login');
	}
?>
<div class="container">
	
		<div id="content">
			<?php 
				if(isset($_POST['newOrder'])){
					// Table Order
					$full_name = $_POST['full_name'];
					$gender = $_POST['gender'];
					$email = $_POST['email'];
					$address =  $_POST['address'];
					$phone = $_POST['phone'];
					$status = 0;
					$note =$_POST['note'];
					$date_create = date('Y-m-d H:i:s');
					$sql_insert_order = "insert into tbl_order value('','$full_name','$gender','$email','$address','$phone','$status','$note','$date_create')";
					mysqli_query($conn,$sql_insert_order);
					$order_id1 = mysqli_insert_id($conn);
					// Table Order Detail
					if(isset($_SESSION['cart'])){
						foreach($_SESSION['cart'] as $key => $value){
							$order_id = $order_id1;
							$pro_id = $key;
							$pro_name = $value['pro_name'];
							$pro_image = $value['pro_image'];
							$pro_price = $value['pro_price'];
							$pro_color = $value['pro_color'];
							$pro_size = $value['pro_size'];
							$pro_quantity =  $value['pro_quantity'];
							$date_create = date('Y-m-d H:i:s');
							$sql_insert_oder_detail =  "insert into tbl_order_detail value('','$order_id','$pro_id','$pro_name','$pro_image','$pro_price','$pro_color','$pro_size','$pro_quantity','$date_create')";
							mysqli_query($conn,$sql_insert_oder_detail) or die("Loi cau lenh insert order_detail");
						}
						unset($_SESSION['cart']);
						header('location: index.php?page=order_history');
					}
					// 
				}
			?>
			<?php
			
				$email = "";
				$full_name = "";
				$address =  "";
				$phone = "";
				if(isset($_SESSION['user'])){
					$full_name = $_SESSION['user']['full_name'];
					$email = $_SESSION['user']['email'];
					$address = $_SESSION['user']['address'];
					$phone = $_SESSION['user']['phone'];
				}
			?>
			<form action="" method="post" class="beta-form-checkout">
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" id="name" name="full_name" value="<?php echo $full_name; ?>"  placeholder="Họ tên" required>
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" name="email" value="<?php echo $email; ?>" id="email" required placeholder="expample@gmail.com">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" name="address" value="<?php echo $address; ?>" id="adress" placeholder="Street Address" required>
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" name="phone" value="<?php echo $phone; ?>" id="phone" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea name="note" id="notes"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
                                    <?php
                                    if(isset($_SESSION['cart'])){
										$total = 0;
                                        foreach($_SESSION['cart'] as $key => $value){ 
											$total = $total + $value['pro_price']*$value['pro_quantity'];  
											?>
                                        <div class="media">
                                            <img  style="height: 80px;" src="<?php echo $value['pro_image']; ?>" alt="" class="pull-left">
                                            <div class="media-body">
                                                <p class="font-large"><?php echo $value['pro_name'] ?></p>
												<span class="badge delete_pro" id="<?php echo $key; ?>" style="float:right;margin-right: 20px;cursor:pointer;">Xóa</span>
                                                <span class="color-gray your-order-info">Color: <?php echo $value['pro_color']; ?></span>
                                                <span class="color-gray your-order-info">Size: <?php echo $value['pro_size']; ?></span>
                                                <span class="color-gray your-order-info">Quantity: <?php echo $value['pro_quantity']; ?></span>
                                                <span class="color-gray your-order-info">Price: <?php echo number_format($value['pro_price'],0,'.','.'); ?>đ</span>

                                            </div>
                                        </div>
                                        <?php } }  ?>
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black"><?php echo number_format($total,0,'.','.') ?>đ</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- <label for="">Số tài khoản:</label> <input type="text" placeholder="Số tài khoản">
											<br>- <label for="">Chủ tài khoản:</label> <input type="text" placeholder="Nguyễn Văn A">
											<br>- <label for="">Ngân hàng:</label> <input type="text" placeholder="ABC">
											<br>- <label>Chi nhánh:</label> <input type="text" placeholder="Thành phố Hồ Chí Minh">										</div>						
									</li>
									
								</ul>
							</div>
							<div class="text-center">
								<button type="submit"  class="bg-primary" style="padding: 8px 10px;" name="newOrder" >Đặt hàng</button>
							</div>
							<!-- <div class="text-center"><a name="newOrder" type="submit" class="beta-btn primary" href="">Đặt hàng <i class="fa fa-chevron-right"></i></a></div> -->
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->