<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
       
            <div class="x_title">
            <?php 
            if(isset($_POST['addNew'])){
                $path = "Uploads";
                $link = $_POST['link'];
                $image="";
                if(isset($_FILES['image'])){
                    if($_FILES['image']['type']=='image/jpeg' || $_FILES['image']['type']=='image/jpg' || $_FILES['image']['type']=='image/png'){
                        if($_FILES['image']['error']==0){
                            if($_FILES['image']['size']<2000000){
                                $file = $path.'/'.$_FILES['image']['name'];
                                move_uploaded_file($_FILES['image']['tmp_name'],'../'.$file);
                                $image = $file;
                            }else die("size");
                        }else die('error');
                    }else die("type");
                }else die('Ton tai');
                $sql_insert_slide = "insert into slide values ('','$link','$image')";
                mysqli_query($conn,$sql_insert_slide) or die("Loi lenh them moi slide");
                header('location: index.php?page=slide');
            }    
            if(isset($_GET['id']) && isset($_GET['del'])){
                $id = $_GET['id'];
                $sql_delete_slide = "delete from slide where id = '$id'";
                mysqli_query($conn,$sql_delete_slide) or die("Loi cau lenh xoa");
                header('location: index.php?page=slide');
            }
           
        
        ?>
                <h2 class="font-weight-bold">Thêm mới slider </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="#">Settings 1</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form id="demo-form2" method="POST" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" >
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên slide
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="first-name" name="link" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Hình ảnh
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" id="last-name" name="image" required="required" class="form-control-file">
                        </div>
                    </div>
                    
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a href="index.php" class="btn btn-primary" type="button">Cancel</a>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" name="addNew" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2 class="font-weight-bold">Danh sách Slide</h2>
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
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Slide</th>
                        <th>Image</th>
                        <th>Cập nhật</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql_select_slide = "select * from slide order by id desc";
                        $result_select_slide = mysqli_query($conn,$sql_select_slide);
                        if(mysqli_num_rows($result_select_slide)>0){
                            $i=0;
                            while($row_select_slide = mysqli_fetch_assoc($result_select_slide)){
                                $i++;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><?php echo $row_select_slide['link'] ?></td>
                                    <td>
                                        <img class="custom_img" src="<?php echo '../'.$row_select_slide['image'] ?>" alt="">
                                    </td>
                                    <td><a href="index.php?page=slide&id=<?php echo $row_select_slide['id'] ?>&del=1" onclick="return confirm('Bạn muốn xóa slide này?');" class="btn btn-sm btn-danger text-white text-center">Xóa</a></td>
                                </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>