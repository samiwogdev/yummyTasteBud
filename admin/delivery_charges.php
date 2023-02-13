<?php
$timezone = date_default_timezone_set('Africa/Lagos');
$date = date('m/d/Y h:i:s a', time());
$page = "transaction";
$primary_page = "canceled_orders";

include_once '../includes/admin-header.php';
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
                <h2><i class="fas fa-credit-card  mr-2"></i>Delivery Payment
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid mx-auto">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card shadow ">
                    <div class="header">
                        <h2> <small>This option enables you to view all Delivery Payment </small></h2>
                    </div>
                </div>
            </div>
            <div class="col-12 p-5">
                <?php $all_orders = $order->getAllOrders(); ?>
                <div class="table-responsive text-center">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable " style="width: 100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Order ID</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Delivery Method</th>
                            </tr>
                        </thead>                            
                        <tbody>
                            <?php
                            $count = 1;
                            if ($all_orders != 0) {
                                foreach ($all_orders as $all_order) {
                                    if ($all_order['delivery_id'] != 0) {
                                    $shop_item_details = $shop->get_menu_by_id($all_order['shop_id']);
                                    $delivery_detail = $delivery->get_by_id($all_order['delivery_id']);
                                ?>
                                <tr>
                                    <td><?php echo $count ?></td> 
                                    <td><?php echo $all_order['trans_ref'] ?></td> 
                                    <td><?php echo $shop_item_details['name'] ?></td> 
                                    <td><?php echo $all_order['qty'] ?></td> 
                                    <td><?php echo $delivery_detail['amount'] ?></td> 
                                    <td><?php echo $all_order['order_date'] ?></td>
                                    <?php
                                    if ($all_order['delivery_id'] == 0) {
                                        $del_method = "Pick up";
                                    } else {
                                        $del_method = "Door delivery";
                                    }
                                    ?>
                                    <td><?php echo $del_method ?></td>   
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
<?php include_once '../includes/admin-footer.php'; ?>