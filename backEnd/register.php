<?php
  include('../connection.php');
  ob_start();
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  // session_start();
  $error = "";
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
          
                  if(isset($_POST['addNew'])){
                    $full_name = $_POST['full_name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $re_password = $_POST['re_password'];
                    $created_at = date("Y-m-d H:i:s");
                    if($password != $re_password){
                      $error = "Mật khẩu không giống nhau";
                    }else{
                      $password = md5($password);
                      $sql_insert_user = "insert into user values ('','$full_name','$email','$password','$created_at','')";
                      mysqli_query($conn,$sql_insert_user) or die("loi cau lenh insert");
                      $id = mysqli_insert_id($conn);
                      header('Location: login.php?id='.$id);
                    }
                  } 
              ?>
            <form method="POST">
              <h1>Register Form</h1>
              <?php
                if(!$error == ""){?>
                  <p class="text-white bg-danger p-2" style="font-size:16px;"><?php echo $error; ?></p>
                <?php } ?>
              <div>
                <input type="text" class="form-control" name="full_name" placeholder="Full name" required="" />
              </div>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="re_password" minlength="6" placeholder="Password again" required="" />
              </div>
              <div>
                
                <button type="submit" name="addNew" class="btn btn-secondary">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
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