<div class="container">
    <div id="content">
        <?php
            if(isset($_POST['login'])){
                // echo "pre";
                // print_r($_POST);
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $sql_select_user =  "select * from user where email = '$email'";
                $result_select_user = mysqli_query($conn,$sql_select_user);
                if(mysqli_num_rows($result_select_user)>0){
                    $row_select_user = mysqli_fetch_assoc($result_select_user);
                    $password_new = $row_select_user['password'];
                    if($password != $password_new){
                        $error = "Mật khẩu không chính xác";
                    }else{
                        $_SESSION['user'] = $row_select_user;
                        header('Location: index.php');
                    }
                }else {
                    $error = "Tài khoản không tồn tại";
                }
            }
        ?>
        <?php 
            $email = "";
            $password = "";
            if(isset($_SESSION['user'])){
                $email = $_SESSION['user']['email'];
                $password = $_SESSION['user']['password'];
                
            }
        ?>
        <?php
            if(isset($error)){ ?>
                <span class="bg-danger" style="font-size: 16px;"><?php echo $error; ?></span>
           <?php } ?>
        <form  method="post" class="beta-form-checkout">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>
                    
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" id="email" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="password" class="form-control" name="password" value="<?php  echo $password; ?>" id="phone" required>
                    </div>
                    <div class="form-block" style="display: flex; justify-content: center;">
                        <a href="index.php?page=register"><button type="button" class="btn btn-secondary">Register</button></a>
                        <button type="submit" name="login" class="btn btn-primary" style="margin-left: 20px;">Login</button>
                    </div>
                    
                </div>
                <div class="col-sm-3"></div>
                
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->