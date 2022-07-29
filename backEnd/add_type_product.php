<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <?php
                if(isset($_POST['addNew'])){
                    $path = "../Uploads";
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $created_at = date("Y-m-d H:i:s");
                    $image="";
                    if(isset($_FILES['image'])){
                        if($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type']== "image/jpg" ||$_FILES['image']['type']== "image/png"){
                            if($_FILES['image']['error']==0){
                                if($_FILES['image']['size'] < 2000000000){
                                    $file = $path.'/'.$_FILES['image']['name'];
                                    move_uploaded_file($_FILES["image"]["tmp_name"], $file);
                                    $image = $file;
                                }
                            }
                        } 
                    }

                    if(isset($_GET['id']) && isset($_GET['edit'])){
                        // sua danh muc 
                        $id = $_GET['id'];
                        $updated_at = $created_at;
                        if($image == ""){
                            $sql_select_cat = "select * from type_product where id = '$id'";
                            $result_select_cat = mysqli_query($conn,$sql_select_cat);
                            $row_select_cat  = mysqli_fetch_assoc($result_select_cat);
                            $image = $row_select_cat['image']; 
                        }
                        $sql_update_cat = "update type_product set name = '$name', description = '$description', image = '$image', updated_at = '$updated_at' where id = '$id'";
                        mysqli_query($conn,$sql_update_cat);
                        header("location: index.php?page=type_product");

                    }else{
                        // Them moi danh muc
                        $sql_insert_cat = "insert into type_product value ('','$name','$description','$image','$created_at','')";
                        mysqli_query($conn,$sql_insert_cat) or die("Loi cau lenh them moi");
                        header("location: index.php?page=type_produc");
                    }   
                    
                }
            ?>
            <div class="x_title">
                <h2 class="font-weight-bold">Thêm mới danh mục</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <!-- Dien thong tin -->
                <?php
                    $name = "";
                    $image = "";
                    
                    $description = "";
                    if(isset($_GET['id']) && isset($_GET['edit'])){
                        $id = $_GET['id'];
                        $sql_select_byid = "select * from type_product where id = '$id'";
                        $result_select_byid  = mysqli_query($conn,$sql_select_byid);
                        if(mysqli_num_rows($result_select_byid)){
                            $row_select_byid = mysqli_fetch_assoc($result_select_byid);
                            $name = $row_select_byid['name'];
                            $image = $row_select_byid['image'];
                            
                            $image2 = $image; 
                            
                            $description = $row_select_byid['description'];
                        }
                    }
                ?>
                <form class="form-label-left input_mask" method="POST" enctype="multipart/form-data">
                   
                    <div class="form-group row">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Tên danh mục...</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="name" value="<?php echo $name ?>" placeholder="Nhập tên danh mục">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Ảnh danh mục</label>
                        <div class="col-md-9 col-sm-9 ">
                        <input type="file" name="image"  class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Mô tả</label>
                        <div class="col-md-9 col-sm-9 ">
                            <textarea id="description"  class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10" style="height: 122px;"><?php echo $description ?></textarea>
                        </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <a href="index.php?page=type_product"><button type="button" class="btn btn-primary">Cancel</button></a>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" name="addNew" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>