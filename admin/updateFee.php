<?php
include_once '../configuration.php';
if (!isset($_SESSION['username'])) {
    header("location: signin");
    exit;
}
$page = "definition";
if (!isset($_GET['n'])) {
    header("location: fees?auth=invalid");
} else {
    $id = Fees::sanitize_input($_GET['n']);
    if (!is_numeric($id)) {
        header("location: fees?auth=invalid");
    }
}
include_once '../includes/admin-header.php';
if (isset($_POST['fee_update'])) {
    $errorMsg = "";
    $info = "";
    //sanitize input
    $fees = Fees::sanitize_input($_POST['fee']);
    $amount = Fees::sanitize_input($_POST['amount']);
    $dept_code = Fees::sanitize_input($_POST['dept_code']);
    $level = Fees::sanitize_input($_POST['level']);
// validate Inputs
    if (empty($fees)) {
        $errorMsg = "fee_empty";
    } elseif (empty($amount)) {
        $errorMsg = "amount_empty";
    } elseif (!is_numeric($amount)) {
        $errorMsg = "amount_invalid";
    } elseif (empty($dept_code)) {
        $errorMsg = "dept_empty";
    } elseif (empty($level)) {
        $errorMsg = "level_empty";
    } else {
        $fee->setFee($fees);
        $fee->setAmount($amount);
        $fee->setSession($sess['session']);
        $fee->setDept_code($dept_code);
        $fee->setLevel($level);
        $fee->setId($id);
        if ($fee->update()) {
            header("location: fees?auth=success");
        } else {
            $errorMsg = "failed";
        }
    }
}
include_once '../includes/admin-nav-bar.php';
include_once '../includes/admin-sidebar.php';
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 style="font-size: 16px">Update School Fees               
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
                                <?php $old_fee = $fee->get_fee_by_id($id); ?>
                                <form action="updateFee?n=<?php echo $id; ?>" method="post" class="form-inline">
                                    <div class="col-lg-3 col-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="zmdi zmdi-labels"></i>
                                            </span>
                                            <input type="text" value=" <?php echo $old_fee['fee'] ?>" name="fee" class="form-control" placeholder="Enter Fee ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="zmdi zmdi-mall"></i>
                                            </span>
                                            <input type="text" value="<?php echo $old_fee['amount'] ?>" name="amount" class="form-control" placeholder="Enter amount">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="zmdi zmdi-account-circle"></i>
                                            </span>
                                            <input type="text" value="<?php echo $old_fee['dept_code'] ?>" name="dept_code" class="form-control" placeholder="Enter Department">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-12 ">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="zmdi zmdi-account-circle"></i>
                                            </span>
                                            <input type="text" value="<?php echo $old_fee['level'] ?>" name="level" class="form-control" placeholder="Enter Level code eg: 1">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-12">
                                        <div class="input-group">
                                            <button type="submit" name="fee_update" class="btn btn-raised btn-round btn-primary">Update</button>
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
<?php include_once '../includes/footer.php'; ?>
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