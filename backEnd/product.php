<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <?php
                if(isset($_GET['id']) && isset($_GET['del'])){
                    $id = $_GET['id'];
                    $sql_delete_pro = "delete from product where id = '$id'";
                    mysqli_query($conn,$sql_delete_pro) or die("Loi cau lenh xoa");
                }
            ?>
            <div class="x_title">
                <h2 class="font-weight-bold">Danh sách sản phẩm</h2>
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
            <a href="index.php?page=add_product" class="btn btn-primary text-white mt-3 mb-3">Thêm mới <i class="fa fa-plus"></i></a>
            <div class="x_content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Hot</th>
                            <th>Unit Price</th>
                            <th>Promotion Price</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <!-- <th>Update Date</th> -->
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql_select_pro = "select * from product order by id desc";
                            $result_select_pro = mysqli_query($conn,$sql_select_pro);
                            $i=0;
                            if(mysqli_num_rows($result_select_pro)>0){
                                while($row_select_pro = mysqli_fetch_assoc($result_select_pro)){
                                    $i++;
                                    ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td style="width: 150px;"><?php echo $row_select_pro['name']; ?></td>
                            <td><img src="<?php echo '../'.$row_select_pro['image'] ?>" class="custom_img" alt=""></td>
                            <td>
                                <?php
                                    $id = $row_select_pro['id_type'];
                                    $sql_select_cat = "select * from type_product where id = '$id'";
                                    $result_select_cat = mysqli_query($conn,$sql_select_cat);
                                    $row_select_cat = mysqli_fetch_assoc($result_select_cat);
                                    echo $row_select_cat['name'];
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($row_select_pro['hot']==1)
                                    echo  "Hot";
                                ?>
                            </td>
                            <td><?php echo number_format($row_select_pro['unit_price'],0,'.',' ') ?> vnđ</td>
                            <td><?php echo number_format($row_select_pro['promotion_price'],0,'.',' ') ?> vnđ</td>
                            <td style="width: 200px;"><?php echo $row_select_pro['description'] ?></td>
                            <td><?php echo $row_select_pro['unit'] ?></td>
                            <!-- <td></td> -->
                            <td style="width: 120px;">
                                <a href="index.php?page=add_product&id=<?php echo $row_select_pro['id'] ?>&edit=1" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                <a href="index.php?page=product&id=<?php echo $row_select_pro['id'] ?>&del=1" onclick="return confirm('Bạn chắc chắn xóa sản phẩm này?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php }  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>