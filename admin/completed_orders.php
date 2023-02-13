<?php
$timezone = date_default_timezone_set('Africa/Lagos');
$date = date('m/d/Y h:i:s a', time());
$page = "transaction";
include_once '../includes/admin-header.php';
include_once '../includes/admin-nav-bar.php';
include_once '../includes/admin-sidebar.php';
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2><i class="fas fa-check-circle  mr-2 text-success"></i>Completed Order
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid mx-auto">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card shadow ">
                    <div class="header">
                        <h2> <small>This option enables you to view all Completed order </small></h2>
                    </div>
                </div>
            </div>
            <div class="col-12 p-5">
                <?php $all_new_orders = $order->getAllCompletedOrders(); ?>
                <div class="table-responsive text-center">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable " style="width: 100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Status</th>
                                <th>Order ID</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Delivery Method</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                            </tr>
                        </thead>                            
                        <tbody>
                            <?php
                            $count = 1;
                            if ($all_new_orders != 0) {
                                foreach ($all_new_orders as $all_new_order) {
                                    $shop_item_details = $shop->get_menu_by_id($all_new_order['shop_id']);
                                    $delivery_detail = $delivery->get_by_id($all_new_order['delivery_id']);
                                ?>
                                <tr>
                                    <td><?php echo $count ?></td> 
                                    <td>
                                          <div class="dropdown" style="display: inline !important">
                                                <a class="dropdown-toggle" href="#" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-check-circle m-r-15 text-success" title="attachment"></i>
                                                </a>
                                            </div>
                                    </td>
                                    <td><?php echo $all_new_order['trans_ref'] ?></td> 
                                   <td><?php echo $shop_item_details['name'] ?></td> 
                                    <td><?php echo $all_new_order['qty'] ?></td> 
                                    <td><?php echo $all_new_order['amount_paid'] ?></td> 
                                    <td><?php echo $all_new_order['order_date'] ?></td>
                                    <?php
                                    if ($all_new_order['delivery_id'] == 0) {
                                        $del_method = "Pick up";
                                    } else {
                                        $del_method = "Door delivery";
                                    }
                                    ?>
                                    <td><?php echo $del_method ?></td> 
                                    <?php
                                    $cus_details = $customer->get_user_by_email($all_new_order['user_email']);
                                    ?>
                                    <td><?php echo $cus_details['fullname'] ?></td> 
                                    <td><?php echo $cus_details['phone'] ?></td>
                                    <td><?php echo $cus_details['email'] ?></td> 
                                    <td><?php echo $cus_details['address'] ?></td>  
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
<?php include_once '../includes/admin-footer.php'; ?>