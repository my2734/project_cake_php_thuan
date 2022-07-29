<div class="container">
		<div id="content">
			<?php
                if(isset($_POST['addNew'])){
                
                    $full_name = $_POST['full_name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $address = $_POST['address'];
                    $phone =  $_POST['phone'];
                    $re_password = $_POST['re_password'];
                    $created_at = date('Y-m-d H:i:s');
                    $updated_at = date('Y-m-d H:i:s');
                    if($password != $re_password){
                        $error = "Mật khẩu không hợp lệ";
                    }else{
                        $password = md5($password);
    
                        $sql_insert_user = "insert into user value('','$full_name','$email','$password','$address','$phone','$created_at','$updated_at')";
                        mysqli_query($conn,$sql_insert_user) or die("<h1>Tài khoản đã tồn tại</h1><br><a href='index.php?page=register'><button class = 'btn btn-primary'>Quay lại</button></a>");
                        
                        $id = mysqli_insert_id($conn);
                        $sql_get_user = "select * from user where id = '$id'";
                        $result_get_user = mysqli_query($conn,$sql_get_user);
                        $_SESSION['user'] = mysqli_fetch_assoc($result_get_user);
                        $_SESSION['user']['password'] = $re_password; 
                        // echo "pre";
                        // print_r($_SESSION['user']);
                        header('location: index.php?page=login');
                    }
                   
                    
                } 
            ?>
            <?php if(isset($error)){ ?>
                <h5 class="text-center text-danger"><?php echo $error; ?></h5>
            <?php } ?>
			<form method="post" class="beta-form-checkout">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email"  class="form-control" id="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text"  class="form-control" id="full_name" name="full_name" required>
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text"  class="form-control" id="address" name="address" placeholder="Street Address" required>
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" id="phone" class="form-control" name="phone" required>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" class="form-control" id="password" name="password" required>
						</div>
						<div class="form-block">
							<label for="phone">Re password*</label>
							<input type="password" class="form-control" id="re_password" name="re_password" required>
						</div>
						<div class="form-block">
							<button type="submit" name="addNew" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

    