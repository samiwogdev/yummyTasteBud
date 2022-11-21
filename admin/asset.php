<?php 
include_once '../includes/admin-header.php';
$page = "def";
if (!isset($_SESSION['username'])) {
    header("location: signin");
    exit;
}
include_once '../includes/admin-nav-bar.php';
include_once '../includes/admin-sidebar.php';
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 style="font-size: 16px">Add New Assets               
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
                        <h2><strong>List of </strong> Assets </h2>
                    </div>
                </div>
            </div>
            <div class="col-12 p-5">
                <div class="table-responsive text-center">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable " style="width: 100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Total Price (&#8358;)</th>
                                <th>Initial Payment (&#8358;)</th>
                                <th>Monthly Payment (&#8358;)</th>
                                <th>Location</th>
                                <th>Tenure (Years)</th>
                                <th>Action</th>
                            </tr>
                        </thead>                            
                        <tbody>
                            <?php
                            $count = 1;
                            $result = $assets->getAll();
                            if($result != 0){
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $count ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo number_format($row['total_price']) ?>.00</td>
                                    <td><?php echo number_format($row['initial_payment']) ?>.00</td>
                                    <td><?php echo number_format($row['monthly_payment']) ?>.00</td>
                                    <td><?php echo $row['location'] ?></td>
                                    <td><?php echo $row['tenure'] ?></td>
                                    <td>
                                        <a href="updateFee?n=<?php echo $row['id'] ?>"><i class="zmdi zmdi-edit m-r-15 text-success"></i></a>
                                        <a href="../controller/deleteFee?n=<?php echo $row['id'] ?>"><i class="zmdi zmdi-delete"></i></a>
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
            <form action="../controller/assets-def" method="post">
                <div class="modal-header">
                    <h4 class="title" id="smallModalLabel">Add New Asset</h4>
                </div>
                <div class="modal-body"> 
                    <div class="col-lg-12 col-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-home"></i>
                            </span>
                            <input type="text" value="<?php
                            if (isset($_POST['name'])) {
                                echo $_POST['name'];
                            }
                            ?>" name="name" class="form-control" placeholder="Enter Asset Name ">
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-hotel"></i>
                            </span>
                            <input type="number" value="<?php
                            if (isset($_POST['total_price'])) {
                                echo $_POST['total_price'];
                            }
                            ?>" name="total_price" class="form-control" placeholder="Enter Property Price">
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-home"></i>
                            </span>
                            <input type="number" value="<?php
                            if (isset($_POST['initial_payment'])) {
                                echo $_POST['initial_payment'];
                            }
                            ?>" name="initial_payment" class="form-control" placeholder="Enter Initial Payment">
                        </div>
                    </div>
                         <div class="col-lg-12 col-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-home"></i>
                            </span>
                            <input type="number" value="<?php
                            if (isset($_POST['monthly_payment'])) {
                                echo $_POST['monthly_payment'];
                            }
                            ?>" name="monthly_payment" class="form-control" placeholder="Enter Monthly Payment">
                        </div>
                    </div>
                     <div class="col-lg-12 col-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-calendar"></i>
                            </span>
                            <input type="number" value="<?php
                            if (isset($_POST['tenure'])) {
                                echo $_POST['tenure'];
                            }
                            ?>" name="tenure" class="form-control" placeholder="Enter Tenure">
                        </div>
                    </div>
                    <div class="col-lg-12 col-12 mb-3" id="bigcontainer">
                        <select name="location" class="form-control m-b-15">
                            <option value="0" selected="selected">--Select Location--</option>
                                <option value="AKR">Akure</option>
                                <option value="OSG">Oshogbo</option>
                        </select> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="asset_def" class="btn btn-default btn-round waves-effect" style="background-color: #ed5a0b">SAVE CHANGES</button>
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
                title: "Sorry! something went wrong"
            })
        });
    </script>  
<?php } ?>
</body>
</html>