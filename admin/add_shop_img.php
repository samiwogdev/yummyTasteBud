<?php 
include_once '../includes/admin-header.php';
$page = "def";
//if (!isset($_SESSION['username'])) {
//    header("location: signin");
//    exit;
//}
include_once '../includes/admin-nav-bar.php';
include_once '../includes/admin-sidebar.php';
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 style="font-size: 16px">  <i class="fa fa-image mr-2"></i>Shop Item Picture               
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button" data-toggle="modal" data-target="#smallModal">
                    <i class="zmdi zmdi-plus"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid mx-auto">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card shadow ">
                    <div class="header">
                        <h2><strong>List of </strong> Shop Item Pictures </h2>
                    </div>
                </div>
            </div>
            <div class="col-12 p-5">
                <div class="table-responsive ">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable " style="width: 100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Picture</th>
                                <th>Action</th>
                            </tr>
                        </thead>                            
                        <tbody>
                            <?php
//                            $count = 1;
//                            $shops = $shop->get_all();
//                            if ($shops != 0) {
//                                foreach ($shops as $shop) {
                                    ?>
                                    <tr>
                                        <td><?php // echo $count ?></td>
                                        <td><?php // echo $menus['name'] ?></td>
                                        <td>
                                            <div class="dropdown" style="display: inline !important">
                                                <a class="dropdown-toggle" href="#" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-folder-open m-r-15 text-info" title="attachment"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="add_shop_img?n=<?php // echo $shop['id'] ?>"><i class="fa fa-plus m-r-15 text-info"></i>Add new image</a>
                                                    <a class="dropdown-item" href="#"><i class="fa fa-location-arrow m-r-15 text-info"></i>View all images</a>
                                                </div>
                                            </div>
                                             <a href="update_shop?n=<?php // echo $menu['id']  ?>"><i class="fa fa-edit m-r-15 text-success" title="update shop item"></i></a>
                                            <div class="dropdown" style="display: inline !important">
                                                <a class="dropdown-toggle" href="#" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-trash-alt m-r-15 text-danger" title="delete item"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a href="../controller/delete_menu?n=<?php // echo $menu['id']  ?> " class="dropdown-item"><i class="fa fa-trash m-r-15 text-danger"></i>Delete item</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
//                                    $count++;
//
//                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="../controller/add_shop_item_pics" method="post">
                <div class="modal-header">
                    <h4 class="title" id="smallModalLabel">Add New Shop Item Picture</h4>
                </div>
                <?php $menus = $menu->get_all(); ?>
                <div class="modal-body"> 
                    <div class="col-lg-12 col-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-upload"></i>
                            </span>
                            <input type="file" value="<?php
                            if (isset($_POST['name'])) {
//                                echo $_POST['name'];
                            }
                            ?>" name="name" class="form-control" placeholder="Select Picture">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="shop_def" class="btn btn-default btn-round waves-effect" style="background-color: #ed5a0b">ADD SHOP ITEM PICTURE</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include_once '../includes/admin-footer.php'; ?>
<?php if (isset($auth) && $auth == "deleted") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'success',
                title: " Asset Deleted!"
            })
        });
    </script> 
<?php } if (isset($auth) && $auth == "success") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'success',
                title: " Asset Updated Successfully!"
            })
        });
    </script> 
<?php }if (isset($auth) && $auth == "invalid") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'error',
                title: "Auth failed"
            })
        });
    </script> 
<?php }if (isset($errorMsg) && $errorMsg == "fee_empty") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'error',
                title: "Fee is Empty"
            })
        });
    </script> 
<?php }if (isset($errorMsg) && $errorMsg == "amount_invalid") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'error',
                title: "Invalid amount"
            })
        });
    </script>
<?php } elseif (isset($errorMsg) && $errorMsg == "amount_empty") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'error',
                title: "Invalid Amount"
            })
        });
    </script>  
<?php } elseif (isset($errorMsg) && $errorMsg == "dept_empty") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'error',
                title: "Invalid Department"
            })
        });
    </script>  
<?php } elseif (isset($_GET['info']) && $_GET['info'] == "upt_success") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'success',
                title: "Menu updated successfully"
            })
        });
    </script>  
<?php } elseif (isset($_GET['info']) && $_GET['info'] == "success") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'success',
                title: "Item Added Successfully"
            })
        });
    </script>  
<?php } elseif (isset($_GET['info']) && $_GET['info'] == "del_success") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'success',
                title: "Menu deleted successfully"
            })
        });
    </script>  
<?php } ?>
</body>
</html>