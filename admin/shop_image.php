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
                      <?php
                         if(null != filter_input(INPUT_GET, "n")){
                               $n = filter_input(INPUT_GET, "n"); 
                        $shops = $shop->get_menu_by_id($n); 
                             ?>
                <h2 style="font-size: 16px">  <i class="fa fa-image mr-2"></i><?php  echo $shops['name']. " "  ?> Picture               
                </h2>
                         <?php } ?>
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
                        <?php
                         if(null != filter_input(INPUT_GET, "n")){
                          $n = filter_input(INPUT_GET, "n"); 
                        $shops = $shop->get_menu_by_id($n); ?>
                        <h2><strong><?php echo $shops['name']. ":"?> </strong><span style="font-size: 13px"> <?php echo $shops['description'] ?> </span></h2>
                         <?php } ?>
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
                            if (isset($_GET['n'])){
                            $n = filter_input(INPUT_GET, "n");
                            $count = 1;
                            $shop_pics = $shop_pic->get_shop_pics_by_id($n);
                            if ($shop_pics != 0) {
                                foreach ($shop_pics as $shop_picture) {
                                    ?>
                                    <tr>
                                        <td><?php  echo $count ?></td>
                                        <td><img src="../uploads/shop_item_img/<?php echo $shop_picture['picture'] ?>" width="110px"></td>
                                        <td>
                                            <div class="dropdown" style="display: inline !important">
                                                <a class="dropdown-toggle" href="#" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-trash-alt m-r-15 text-danger" title="delete item"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a href="../controller/delete_shop_image?n2=<?php echo $shop_picture['shop_id'] ?>&n=<?php echo $shop_picture['id']  ?> " class="dropdown-item"><i class="fa fa-trash m-r-15 text-danger"></i>Delete picture</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    $count++;
                                }
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
            <form action="../controller/add_shop_item_pics?n=<?php echo $n ?>" method="post" enctype="multipart/form-data">
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
                            ?>" name="shop_item_photo" class="form-control" placeholder="Select Picture">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="shop_image" class="btn btn-default btn-round waves-effect" style="background-color: #ed5a0b">ADD SHOP ITEM PICTURE</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include_once '../includes/admin-footer.php'; ?>
<?php if (isset($_GET['info']) && $_GET['info'] == "success") { ?>
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
                title: " Picture added successfully"
            })
        });
    </script> 
<?php } if (isset($_GET['info']) && $_GET['info'] ==  "invalid") { ?>
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
                title: "Picture deleted successfully"
            })
        });
    </script>  
<?php } ?>
</body>
</html>