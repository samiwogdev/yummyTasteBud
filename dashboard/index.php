<?php 
include_once '../includes/dash-header.php';
include_once '../includes/dash-nav-bar.php';
include_once '../includes/dash-aside.php';
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 style="font-size: 16px"><i class="fas fa-cart-plus mr-2"></i>Order               
                </h2>
            </div>
<!--            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button" data-toggle="modal" data-target="#smallModal">
                    <i class="zmdi zmdi-plus"></i>
                </button>
            </div>-->
        </div>
    </div>
    <div class="container-fluid mx-auto">
        <div class="row shadow">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card shadow ">
                    <div class="header">
                        <h2><strong>List of </strong> Orders </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 p-5 d-xl-block d-lg-block d-md-block  d-sm-none d-none">
                <div class="table-responsive ">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable " style="width: 100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Picture</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Order ID</th>
                                <th>Amount paid</th>
                                <th>Status</th>
<!--                                <th>Action</th>-->
                            </tr>
                        </thead>                            
                        <tbody>
                            <?php
                            $myOrders = $order->getOrderPayed($_SESSION['email']);
                            if ($myOrders != 0) {
                                $counter = 1;
                                foreach ($myOrders as $myOrder) {
                                    $shop_item = $shop->get_menu_by_id($myOrder['shop_id']);
                                    $shop_imgs = $shop_pic->get_shop_pics_by_id_2($myOrder['shop_id']);
                                    ?>
                                    <tr>
                                        <td><?php echo $counter ?></td>
                                        <td><?php echo $shop_item['name'] ?></td>
                                        <td> <div class="product-image">
                                    <img src="../uploads/shop_item_img/<?php echo $shop_imgs['picture'] ?>" alt="alt" style="width: 80px"/>
                                            </div></td>
                                <td><?php echo $shop_item['description'] ?></td>
                                <td><?php echo $myOrder['qty'] ?></td>
                                <td><?php echo $myOrder['trans_ref'] ?></td>
                                <td><?php echo $myOrder['amount_paid'] ?></td>            
                                <?php if ($myOrder['order_status'] == 1) { ?>
                                    <td><span class=" bg-warning text-white p-2">...Waiting</span></td> 
                                <?php } elseif ($myOrder['order_status'] == 2) { ?>
                                    <td><span class=" bg-success text-white p-2">Completed</span></td>         
                                <?php } else { ?>
                                    <td><span class=" bg-danger text-white p-2">Cancelled</span></td> 
                                <?php } ?>
<!--                                    <td></td>-->
                                </tr>
                                <?php
                                $counter++;
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 p-5  d-block d-sm-block d-md-none d-lg-none d-xl-none">
                <div class="table-responsive">
                    <table class="table table-borderless" style="width: 100%; ">
                        <?php
                         $myOrders = $order->getOrderPayed($_SESSION['email']);
                        if ($myOrders != 0) {
                            $counter = 1;
                            foreach ($myOrders as $myOrder) {
                                $shop_item = $shop->get_menu_by_id($myOrder['shop_id']);
                                $shop_imgs = $shop_pic->get_shop_pics_by_id_2($myOrder['shop_id']);
                                ?>
                                <tbody>
                                    <tr class="text-dark" style="border: solid 2px #036494"> 
                                        <td><?php echo $counter. '.'. " ". $shop_item['name'] ?> </td>
                                    </tr>
                                    <tr> 
                                        <td>
                                            <div class="product-image">
                                                <img src="../uploads/shop_item_img/<?php echo $shop_imgs['picture'] ?>" alt="alt" style="width: 80px"/>
                                            </div>
                                        </td>
                                    </tr>
                                      <tr>
                                        <td><span class="font-weight-bold">Description:</span> <?php echo $shop_item['description']?></td> 
                                    </tr>
                                    <tr>
                                        <td><span class="font-weight-bold">Quantity:</span> <?php echo $myOrder['qty']?></td> 
                                    </tr>
                                    <tr>
                                        <td><span class="font-weight-bold">Order ID:</span> <?php echo $myOrder['trans_ref']?></td> 
                                    </tr>
                                    <tr>
                                        <td><span class="font-weight-bold">Amount paid:</span> <?php echo $myOrder['amount_paid']?></td> 
                                    </tr>
                                    <tr>
                                        <?php
                                        if($myOrder['order_status'] == 1){ ?>
                                            <td><span class="font-weight-bold mr-2">Status:</span><span class=" bg-warning text-white p-2">... In progress</span></td> 
                                      <?php  }elseif ($myOrder['order_status'] == 2) { ?>
                                            <td><span class="font-weight-bold mr-2">Status:</span><span class=" bg-success text-white p-2">Completed</span></td>         
                                              <?php      }else{  ?>
                                                  <td><span class="font-weight-bold mr-2">Status:</span><span class=" bg-danger text-white p-2">Cancelled</span></td> 
                                              <?php } ?>
                                        
                                    </tr>
<!--                                    <tr>
                                        <th><a href="pay_summary?auth=1" class="btn btn-sm">Select</a></th>

                                    </tr>-->
                                </tbody>
                            <?php 
                            $counter ++;
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

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