<?php 
include_once '../includes/dash-header.php';
$page = "def";
//if (!isset($_SESSION['username'])) {
//    header("location: signin");
//    exit;
//}
include_once '../includes/dash-nav-bar.php';
include_once '../includes/dash-aside.php';
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 style="font-size: 16px"><i class="fas fa-utensils mr-2"></i>Menu               
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
                <div class="card shadow ">
                    <div class="header">
                        <h2><strong>List of </strong> Menu </h2>
                    </div>
                </div>
            </div>
            <div class="col-12 p-5">
                <div class="table-responsive ">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable " style="width: 100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>                            
                        <tbody>
                            <?php
                            $count = 1;
                            $menus = $menu->get_all();
                            if($menus != 0){
                            foreach ($menus as $menu) {
                                ?>
                                <tr>
                                    <td><?php echo $count ?></td>
                                    <td><?php echo $menu['name'] ?></td>
                                    <td>
                                        <a href="update_menu?n=<?php echo $menu['id'] ?>"><i class="fa fa-edit m-r-15 text-info" title="update Menu"></i></a>
                                           <div class="dropdown" style="display: inline !important">
                                                <a class="dropdown-toggle" href="#" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-trash-alt m-r-15 text-danger" title="delete menu"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a href="../controller/delete_menu?n=<?php echo $menu['id']  ?> " class="dropdown-item"><i class="fa fa-trash m-r-15 text-danger"></i>Delete Menu</a>
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
            <form action="../controller/menu_def" method="post">
                <div class="modal-header">
                    <h4 class="title" id="smallModalLabel">Add New Menu</h4>
                </div>
                <div class="modal-body"> 
                    <div class="col-lg-12 col-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fas fa-utensils"></i>
                            </span>
                            <input type="text" value="<?php
                            if (isset($_POST['name'])) {
                                echo $_POST['name'];
                            }
                            ?>" name="name" class="form-control" placeholder="Enter Menu Name ">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="menu_def" class="btn btn-default btn-round waves-effect" style="background-color: #ed5a0b">ADD MENU</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once '../includes/dash-footer.php'; ?>
  
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