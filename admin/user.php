<?php
$page = "user";
$primary_page = "canceled_orders";

include_once '../includes/admin-header.php';
include_once '../includes/admin-nav-bar.php';
include_once '../includes/admin-sidebar.php';
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2><i class="fas fa-user-friends  mr-2"></i>User Management
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
                        <h2> <small>This option enables you to manage Admin Users </small></h2>
                    </div>
                </div>
            </div>
            <div class="col-12 p-5">
                <?php $users = $user_admin->getAll(); ?>
                <div class="table-responsive text-center">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable " style="width: 100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>                            
                        <tbody>
                            <?php
                            $count = 1;
                            if ($users != 0) {
                                foreach ($users as $user) {
                                ?>
                                <tr>
                                    <td><?php echo $count ?></td> 
                                    <td><?php echo $user['username'] ?></td> 
                                    <?php 
                                    if($user['role'] == "1"){
                                        $role = "Super Admin";
                                    }elseif($user['role'] == '2'){
                                       $role = "Admin";  
                                    }else{
                                        $role = "User";  
                                    } ?>
                                    <td><?php echo $role ?></td> 
                                    <td>
                                              <div class="dropdown" style="display: inline !important">
                                                <a class="dropdown-toggle" href="#" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-trash-alt m-r-15 text-danger" title="delete"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a href="../controller/delete_user?n=<?php echo $user['id']  ?> " class="dropdown-item"><i class="fa fa-trash m-r-15 text-danger"></i>Delete User</a>
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
            <form action="../controller/role" method="post">
                <div class="modal-header">
                    <h4 class="title" id="smallModalLabel">Add New Menu</h4>
                </div>
                <div class="modal-body"> 
                    <div class="col-lg-12 col-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" value="<?php
                            if (isset($_POST['username'])) {
                                echo $_POST['name'];
                            }
                            ?>" name="username" class="form-control" placeholder="Enter Username " required="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fas fa-key"></i>
                            </span>
                            <input type="password" value="<?php
                            if (isset($_POST['password'])) {
                                echo $_POST['name'];
                            }
                            ?>" name="password" class="form-control" placeholder="Enter Password " required="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-12 mb-3" id="bigcontainer">
                        <select name="role" class="form-control m-b-15" required>
                            <option value="0" selected="selected">--Select User Role--</option>
                            <option value="3">User</option>
                            <option value="2">Admin</option>
                            <option value="1">Super Admin</option>
                        </select> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="user" class="btn btn-default btn-round waves-effect" style="background-color: #ed5a0b">ADD MENU</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once '../includes/admin-footer.php'; ?>
<?php if (isset($_GET['info']) && $_GET['info'] == "del_success") { ?>
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
                title: "user deleted successfully"
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
                title: "Delivery info Added Successfully"
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
                title: "Delivery info deleted successfully"
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