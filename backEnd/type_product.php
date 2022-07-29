<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <?php
                    if(isset($_GET['del']) && isset($_GET['id'])){
                        $id = $_GET['id'];
                        $sql_delete_cat = "delete from type_product where id = '$id'";
                        mysqli_query($conn,$sql_delete_cat) or die("Loi cau lenh xoa");
                    } 
                ?>
                <h2 class="font-weight-bold">Danh sách loại sản phẩm</h2>
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
            <a href="index.php?page=add_type_product" class="btn btn-primary mb-3 mt-3 text-white">Thêm mói danh mục<i class="fa fa-plus"></i></a>
            <div class="x_content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>image</th>
                            <th>Date create</th>
                            <th>Date update</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_select_cat = "select * from type_product order by id desc";
                        $result_select_cat = mysqli_query($conn,$sql_select_cat);
                        $i=0;
                        if(mysqli_num_rows($result_select_cat)>0){
                            while($row_cat = mysqli_fetch_assoc($result_select_cat)){ 
                                $i++;
                                ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $row_cat['name'] ?></td>
                            <td>
                                <img class="custom_img" src="<?php echo $row_cat['image'] ?>" alt="">
                            </td>
                            <td><?php echo $row_cat['created_at'] ?></td>
                            <td><?php echo $row_cat['updated_at'] ?></td>
                            <td>
                                <a href="index.php?page=add_type_product&id=<?php echo $row_cat['id'] ?>&edit=1" class="btn btn-sm btn-warning">Sửa</a>
                                <a href="index.php?page=type_product&id=<?php echo $row_cat['id'] ?>&del=1" class="btn btn-sm btn-danger" onclick="return confirm('Ban muốn xóa danh mục này?');">Xóa</a>
                            </td>
                        </tr>
                        <?php  }}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>