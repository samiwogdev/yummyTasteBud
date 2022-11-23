<?php
//include_once '../convig.php';
//if (!isset($_SESSION['username'])) {
//    header("location: signin");
//    exit;
//}
$page = "definition";
if (!isset($_GET['n'])) {
    header("location: shop?info=invalid");
}
$id = filter_input(INPUT_GET, "n");
if (!is_numeric($id)) {
    header("location: shop?info=invalid");
}
include_once '../includes/admin-header.php';
include_once '../includes/admin-nav-bar.php';
include_once '../includes/admin-sidebar.php';
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 style="font-size: 16px">Update Shop Item              
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><small>All fields are required</small> </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <?php $menus = $menu->get_menu_by_id($id); ?>
                                <form action="../controller/update_shop_it?n=<?php echo $id; ?>" method="post" class="form-inline">
                                    <div class="col-lg-5 col-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="zmdi zmdi-pizza"></i>
                                            </span>
                                            <input type="text" value=" <?php echo $menus['name'] ?>" name="name" class="form-control" placeholder="Enter menu name ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="input-group">
                                            <button type="submit" name="menu_update" class="btn btn-raised btn-round btn-primary">Update Menu</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once '../includes/admin-footer.php'; ?>
<?php if (isset($errorMsg) && $errorMsg == "wrong_id") { ?>
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
                title: "Invalid Param"
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
                title: "Fee Empty"
            })
        });
    </script> 

<?php } if (isset($errorMsg) && $errorMsg == "param_invalid") { ?>
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
                title: "Invalid Fee"
            })
        });
    </script>
<?php } if (isset($errorMsg) && $errorMsg == "amount_invalid") { ?>
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
<?php } elseif (isset($errorMsg) && $errorMsg == "level_empty") { ?>
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
                title: "Invalid Level"
            })
        });
    </script>  
<?php } elseif (isset($info) && $info == "success") { ?>
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
                title: "Fee Added Successfully"
            })
        });
    </script>  
<?php } elseif (isset($errorMsg) && $errorMsg == "failed") { ?>
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
                title: "Sorry! something went wrong. Try again"
            })
        });
    </script>  
<?php } ?>
</body>
</html>