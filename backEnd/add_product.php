<div class="row">
<div class="col-md-12">
    <div class="x_panel">
        <?php 
            if(isset($_POST['addNew'])){
                $name = $_POST['name'];
                $id_type = (int)$_POST['id_type'];
                $description = trim($_POST['description']);
                $hot = $_POST['hot'];
                
                $unit_price = (float)$_POST['unit_price'];
                $promotion_price = (float)$_POST['promotion_price'];
                $unit = $_POST['unit']; 
                $created_at = date("Y-m-d H:i:s");
                $path = "Uploads";
                $image = "";

                // echo "<pre>";
                // print_r($_FILES['image']);
                if(isset($_FILES['image'])){
                    if($_FILES['image']['type']=='image/jpeg' || $_FILES['image']['type']=='image/jpg' || $_FILES['image']['type']=='image/png'){
                        if($_FILES['image']['error']==0){
                            if($_FILES['image']['size']<20000000){
                                $file = $path.'/'.$_FILES['image']['name'];
                                move_uploaded_file($_FILES['image']['tmp_name'],'../'.$file);
                                $image = $file;
                            }
                        }
                    }
                }
                

                if(isset($_GET['id']) && isset($_GET['edit'])){
                    //Sua san pham
                    $id = $_GET['id'];
                    $sql_select_idPro1 = "select * from product where id = '$id'";
                    $result_select_idPro1 = mysqli_query($conn, $sql_select_idPro1);
                    $row_select_idPro1 = mysqli_fetch_assoc($result_select_idPro1);
                    $updated_at = $created_at;
                    echo "<pre>";
                    print_r($_GET);
                    if($unit == ""){    
                        $unit = $row_select_idPro1['unit'];
                    }
                    if($id_type == ""){
                        $id_type = $row_select_idPro1['id_type'];
                    }
                    if($image == ""){
                        $image = $row_select_idPro1['image'];
                    }

                    $sql_insert_pro = "update product set name = '$name', id_type = '$id_type',description = '$description',hot = '$hot', unit_price = '$unit_price', promotion_price = '$promotion_price', image = '$image',unit = '$unit' , updated_at = '$updated_at' where id = '$id'" ;
                    // echo "<pre>";
                    // print_r($sql_insert_pro);
                //    die($hot);
                    mysqli_query($conn,$sql_insert_pro) or die("loi cau lenh update");
                    

                }else{
                    //Them moi san pham
                    $sql_insert_pro = "insert into product values ('','$name','$id_type','$description','$hot','$unit_price','$promotion_price','$image','$unit','$created_at','')";
                    mysqli_query($conn,$sql_insert_pro) or die("Loi cau lenh insert"); 
                }

                header("location: index.php?page=product");
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
            <?php
                $name = "";
                $description = "";
                $unit_price = "";
                $promotion_price = "";
                if(isset($_GET['id']) && isset($_GET['edit'])){
                    $id = $_GET['id'];
                    $sql_select_idPro = "select * from product where id = '$id'";
                    $result_select_idPro = mysqli_query($conn,$sql_select_idPro);
                    $row_select_idPro = mysqli_fetch_assoc($result_select_idPro);
                    $name = $row_select_idPro['name'];
                    $description = $row_select_idPro['description'];
                    $unit_price = $row_select_idPro['unit_price'];
                    $promotion_price = $row_select_idPro['promotion_price'];
                    $hot = $row_select_idPro['hot'] or 1 ;
                }

            ?>
            <form class="form-label-left input_mask" method="POST" enctype="multipart/form-data">
                   
                    <div class="form-group row">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Tên sản phẩm</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Nhập tên sản phẩm">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Danh mục</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="form-control" name="id_type">
                                <option value="">-- Danh mục --</option>
                                <?php 
                                    $sql_select_cat = "select * from type_product";
                                    $resutl_select_cat = mysqli_query($conn,$sql_select_cat);
                                    if(mysqli_num_rows($resutl_select_cat)>0){
                                        while($row_select_cat = mysqli_fetch_assoc($resutl_select_cat)){?>

                                            <option value="<?php echo $row_select_cat['id']?>"><?php echo $row_select_cat['name']?></option>
                                      <?php  }  } ?>
                                   
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Ảnh sản phẩm</label>
                        <div class="col-md-9 col-sm-9 ">
                        <input type="file" name="image"  class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Giá bán</label>
                        <div class="col-md-3 col-sm-3">
                            <input type="text" name="unit_price" value="<?php echo $unit_price; ?>" class="form-control">
                        </div>
                        <span style="font-size: 16px;">vnđ</span>
                    </div>

                    <div class="form-group row">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Giá khuyến mãi </label>
                        <div class="col-md-3 col-sm-3">
                            <input type="text" name="promotion_price" value="<?php echo $promotion_price; ?>" class="form-control">
                        </div>
                        <span style="font-size: 16px;">vnđ</span>
                    </div>

                    <div class="form-group row">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Đơn vị sản phẩm</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="form-control" name="unit">
                                <option value="">-- Đơn vị --</option>
                                <option value="Hộp">Hộp</option>
                                <option value="Cái">Cái</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Sản phẩm hot</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="form-control" name="hot">
                                <option <?php if($hot==1) { ?> selected <?php } ?> value="1">Hot</option>
                                <option <?php if($hot==0) { ?> selected <?php } ?> value="0">Bình thường</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Mô tả sản phẩm </label>
                        <div class="col-md-9 col-sm-9 ">
                            <textarea id="description"  class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10" style="height: 122px;">
                            <?php echo $description; ?></textarea>
                        </div>
                        
                    </div>


                    
                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <a href="index.php?page=product"><button type="button" class="btn btn-primary">Cancel</button></a>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" name="addNew" class="btn btn-success">
                                <?php  
                                if(isset($_GET['id']) && isset($_GET['edit'])){
                                    echo "Update";
                                }else echo "Submit";
                                    
                                ?>  
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
    
</div>
</div>