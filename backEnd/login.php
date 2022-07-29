<?php
  include('../connection.php');
  session_start();
  $error = "";
  if(isset($_SESSION['login'])){
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php
                if(isset($_POST['login'])){
                  $email = $_POST['email'];
                  $password = md5($_POST['password']);
                  $sql_select_userEmail = "select * from user where email = '$email'";
                  $result_select_userEmail = mysqli_query($conn,$sql_select_userEmail);
                  if(mysqli_num_rows($result_select_userEmail)<1){
                    $error = "Tài khoản không tồn tại";
                  }else{
                    $row_select_userEmail = mysqli_fetch_assoc($result_select_userEmail);
                    if($password != $row_select_userEmail['password']){
                      $error = "Mật khẩu không chính xác";
                    }else{
                     
                      $_SESSION['login'] = $row_select_userEmail;
                      if(isset($_SESSION['login'])){
                        // echo "Ton tai session";
                        header('Location: index.php');
                      }
                      // echo "<pre>";
                      // print_r($_SESSION);
                     
                    }
                  }
                }
            ?>
            <form method="POST">
              <h1>Login Form</h1>
              <?php
                if(!$error == ""){?>
                  <p class="text-white bg-danger p-2" style="font-size:16px;"><?php echo $error; ?></p>
                <?php } ?>
                <div>
                <?php
                  $email = "";
                  $password = "";
                  if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql_select_user = "select * from user where id = '$id'";
                    $result_select_user = mysqli_query($conn,$sql_select_user);
                    $row_select_user = mysqli_fetch_assoc($result_select_user);
                    $email = $row_select_user['email'];
                  }
                  
                ?>
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email ?>" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password"   required="" />
              </div>
              <div>
                <button class="btn btn-secondary submit" name="login" href="index.html">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="register.php" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
       
        
      </div>
    </div>
    <script>
      // function validate(){
      // //  var full_name = document.getElementById('full_name').value;
      // //  var email = document.getElementById('email').value;
      //  var password = trim(document.getElementById('password').value);
      //  var re_password = trim(document.getElementById('re_password').value);
        
      // }
    </script>
  </body>
</html>