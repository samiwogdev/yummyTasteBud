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
                <h2 style="font-size: 16px"><i class="fas fa-utensils mr-2"></i>Delivery               
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
                        <h2><strong>List of </strong> Delivery Price </h2>
                    </div>
                </div>
            </div>
            <div class="col-12 p-5">
                <div class="table-responsive ">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable shadow " style="width: 100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>City</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>                            
                        <tbody>
                            <?php
                            $count = 1;
                            $delivers = $delivery->get_all();
                            if($delivers != 0){
                            foreach ($delivers as $deliver) {
                                ?>
                                <tr>
                                    <td><?php echo $count ?></td>
                                    <td><?php echo $deliver['city'] ?></td>
                                    <td><?php echo $deliver['amount'] ?></td>
                                    <td>
                                        <a href="update_delivery?n=<?php echo $deliver['id'] ?>"><i class="fa fa-edit m-r-15 text-info" title="update delivery"></i></a>
                                           <div class="dropdown" style="display: inline !important">
                                                <a class="dropdown-toggle" href="#" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-trash-alt m-r-15 text-danger" title="delete delivery"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a href="../controller/delete_delivery?n=<?php echo $deliver['id']  ?> " class="dropdown-item"><i class="fa fa-trash m-r-15 text-danger"></i>Delete</a>
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
            <form action="../controller/delivery_def" method="post">
                <div class="modal-header">
                    <h4 class="title" id="smallModalLabel">Add New Delivery</h4>
                </div>
                <div class="modal-body"> 
                    <div class="col-lg-12 col-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fas fa-home"></i>
                            </span>
                            <input type="text" value="<?php
                            if (isset($_POST['name'])) {
                                echo $_POST['name'];
                            }
                            ?>" name="location" class="form-control" placeholder="Enter Location Name ">
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fas fa-coins"></i>
                            </span>
                            <input type="number" value="<?php
                            if (isset($_POST['amount'])) {
                                echo $_POST['amount'];
                            }
                            ?>" name="amount" class="form-control" placeholder="Enter Delivery Amount ">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="delivery_def" class="btn btn-default btn-round waves-effect" style="background-color: #ed5a0b">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once '../includes/admin-footer.php'; ?>
  
<?php if (isset($_GET['info']) && $_GET['info'] == "upt_success") { ?>
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
                title: "Menu Added Successfully"
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
    <?php } elseif (isset($_GET['info']) && $_GET['info'] == "name_empty") { ?>
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
                title: "fill all input"
            })
        });
    </script> 
<?php } ?>
</body>
</html>