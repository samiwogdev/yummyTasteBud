<?php 
include_once '../includes/admin-header.php';
$page = "settings";
include_once '../includes/admin-nav-bar.php';
include_once '../includes/admin-sidebar.php';
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 style="font-size: 16px"><i class="fas fa-cog mr-2"></i>Settings               
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
                        <h2><strong>List of  </strong> Settings </h2>
                    </div>
                </div>
            </div>
            <div class="col-12 p-5">
                <div class="table-responsive ">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable  " style="width: 100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th>Definition</th>
                                <th>Action</th>
                            </tr>
                        </thead>                            
                        <tbody>
                            <?php
                            $count = 1;
                            $sets = $settings->get_all();
                            if($sets != 0){
                            foreach ($sets as $set) {
                                ?>
                                <tr>
                                    <td><?php echo $count ?></td>
                                    <td><?php echo $set['title'] ?></td>
                                    <td><?php echo $set['definition'] ?></td>
                                    <td>
                                        <a href="update_settings?n=<?php echo $set['id'] ?>"><i class="fa fa-edit m-r-15 text-info" title="update delivery"></i></a>
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
            <form action="../controller/settings_def" method="post">
                <div class="modal-header">
                    <h4 class="title" id="smallModalLabel">Add New Settings</h4>
                </div>
                <div class="modal-body"> 
                     <div class="col-lg-12 col-12">
                         <select name="title" class="form-control m-b-15">
                           <option value="0" selected="selected">-- Select Title --</option>
                            <option value="email">Email</option>
                            <option value="phone">Phone</option>
                            <option value="phone">Address</option>
                            <option value="facebook">Facebook</option>
                            <option value="instagram">Instagram</option>
                            <option value="twitter">Twitter</option>
                        </select> 
                    </div>
                    <div class="col-lg-12 col-12 mt-3">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fas fa-cogs"></i>
                            </span>
                            <input type="text" name="definition" class="form-control" placeholder="Enter Definition ">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="settings_def" class="btn btn-default btn-round waves-effect" style="background-color: #ed5a0b">Submit</button>
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
                title: "Settings updated successfully"
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
                title: "Settings Added Successfully"
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
                title: "Settings deleted successfully"
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