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
                <h2 style="font-size: 16px">  <i class="fa fa-shopping-bag mr-2"></i>Shop               
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
        <div class="row shadow">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>List of </strong> Shop Item </h2>
                    </div>
                </div>
            </div>
            <div class="col-12 p-5">
                <div class="table-responsive ">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable " style="width: 100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Alias</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>                            
                        <tbody>
                            <?php
                            $count = 1;
                            $shops = $shop->get_all();
                            if ($shops != 0) {
                                foreach ($shops as $shop_) {
                                    $menus = $menu->get_menu_by_id($shop_['category']);
                                    ?>
                                    <tr>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $menus['name'] ?></td>
                                        <td><?php echo $shop_['name'] ?></td>
                                        <td><?php echo $shop_['alias'] ?></td>
                                        <td><?php echo $shop_['description'] ?></td>
                                        <td><?php echo $shop_['price'] ?></td>
                                        <td>
                                            <div class="dropdown" style="display: inline !important">
                                                <a class="dropdown-toggle" href="#" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-folder-open m-r-15 text-info" title="attachment"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="shop_image?n=<?php echo $shop_['id'] ?>"><i class="fa fa-plus m-r-15 text-info"></i>Add new image</a>
                                                    <a class="dropdown-item" href="shop_image?n=<?php echo $shop_['id'] ?>"><i class="fa fa-location-arrow m-r-15 text-info"></i>View all images</a>
                                                </div>
                                            </div>
                                             <a href="update_shop?n=<?php  echo $shop_['id']  ?>"><i class="fa fa-edit m-r-15 text-success" title="update shop item"></i></a>
                                            <div class="dropdown" style="display: inline !important">
                                                <a class="dropdown-toggle" href="#" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-trash-alt m-r-15 text-danger" title="delete item"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a href="../controller/delete_shop_item?n=<?php echo $shop_['id']  ?> " class="dropdown-item"><i class="fa fa-trash m-r-15 text-danger"></i>Delete item</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    $count++;
                                }
                            }
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
            <form action="../controller/shop_def" method="post">
                <div class="modal-header">
                    <h4 class="title" id="smallModalLabel">Add New Shop Item</h4>
                </div>
                <?php $menus = $menu->get_all(); ?>
                <div class="modal-body"> 
                    <div class="col-lg-12 col-12 mb-3">
                        <select name="category" class="form-control m-b-15">
                           <option value="0" selected="selected">--Select Category--</option>
                            <?php foreach ($menus as $menu_){ ?>
                            <option value="<?php echo $menu_['id']?>"><?php echo $menu_['name'] ?></option>
                            <?php } ?>
                        </select> 
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fas fa-utensils"></i>
                            </span>
                            <input type="text" value="<?php
                            if (isset($_POST['name'])) {
//                                echo $_POST['name'];
                            }
                            ?>" name="name" class="form-control" placeholder="Enter Name ">
                        </div>
                    </div>
                    <div class="col-lg-12 col-12 mb-3" id="bigcontainer">
                        <select name="alias" class="form-control m-b-15">
                            <option value="0" selected="selected">--Select Alias--</option>
                            <option value="Regular">Regular</option>
                            <option value="Special">Special</option>
                        </select> 
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea rows="4" name="description" class="form-control no-resize" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-coins"></i>
                            </span>
                            <input type="number" value="<?php
                            if (isset($_POST['price'])) {
//                                echo $_POST['name'];
                            }
                            ?>" name="price" class="form-control" placeholder="Enter Price ">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="shop_def" class="btn btn-default btn-round waves-effect" style="background-color: #ed5a0b">ADD SHOP ITEM</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include_once '../includes/admin-footer.php'; ?>
<?php if (isset($_GET['info']) && $_GET['info'] == "empty") { ?>
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
                title: "fill all input!"
            })
        });
    </script> 
<?php } if (isset($_GET['info']) && $_GET['info'] == "del_success") { ?>
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
                title: " Shop item deleted Successfully!"
            })
        });
    </script> 

<?php }if (isset($_GET['info']) && $_GET['info'] == "invalid") { ?>
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
                title: "Something went wrong, check your internet!"
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