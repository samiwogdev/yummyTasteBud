<?php
$timezone = date_default_timezone_set('Africa/Lagos'); 
$date = date('m/d/Y h:i:s a', time());
$page = "dash";

include_once '../includes/admin-header.php';
include_once '../includes/admin-nav-bar.php';
include_once '../includes/admin-sidebar.php';

?>
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Admin Dashboard</h2><br>
            </div>            
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12">
                <div class="row clearfix">
                   <div class="col-lg-6 col-12">
                        <div class="card top_counter shadow">
                            <div class="body">
                                <?php $pending_order = $order->getPendingOrderCount() ?>
                                <a href="" style="color: black">
                                    <div class="icon xl-slategray"><i class="fa fa-shopping-bag text-info"></i> </div>
                                    <div class="content">
                                        <div class="text font-weight-bold">Pending Order</div>
                                        <h5 class="number font-weight-light"><?php echo $pending_order ?></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                       <div class="col-lg-6 col-12">
                        <div class="card top_counter shadow">
                            <div class="body">
                                <?php $ongoing_order = $order->getOngoingOrderCount() ?>
                                <a href="" style="color: black">
                                    <div class="icon xl-slategray"><i class="fa fa-cart-plus text-warning"></i> </div>
                                    <div class="content">
                                        <div class="text font-weight-bold">Ongoing Order</div>
                                        <h5 class="number"><?php  echo $ongoing_order ?></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card student-list">
                    <div class="header">
                        <?php $all_new_orders = $order->getAllOrders(); ?>             
                        <h2><strong>Recent</strong> Order List </h2>
                    </div>
                    <div class="body shadow">
                        <div class="table-responsive">
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
                            if ($all_new_orders != 0) {
                                foreach ($all_new_orders as $all_new_order) {
                                    $shop_item_details = $shop->get_menu_by_id($all_new_order['shop_id']);
                                    $delivery_detail = $delivery->get_by_id($all_new_order['delivery_id']);
                                ?>
                                <tr>
                                    <td><?php echo $count ?></td>  
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
             <div class="col-lg-4 col-md-12">
                             <div class="tab-content m-t-10">
                <div class="tab-pane " id="chart-view">
                    <div id="m_bar_chart" class="graph"></div> 
                </div>
            </div>
         <!-- Total payment-->
         <?php 
         $total_payment = $order->getTotalOrderPayment();
         $completed_order_count = $order->getCompletedOrderCount();
         $canceled_order_count = $order->getCanceledOrderCount();
         $all_order = $pending_order + $ongoing_order + $canceled_order_count + $completed_order_count ;
         $performance = ($completed_order_count/$all_order)* 100;
          $satisfaction = "none";
                                if ($performance >= 70) {
                                    $satisfaction = "Excellent";
                                }
                                if ($performance >= 60 && $performance < 70) {
                                    $satisfaction = "Good";
                                } 
                                if ($performance >= 50 && $performance < 60) {
                                    $satisfaction = "Average";
                                } 
                                if ($performance >= 40 && $performance < 50) {
                                    $satisfaction = "Below Average";
                                } elseif ($performance <=1 && $performance <=39) {
                                    $satisfaction = "Poor";
                                }
         ?>
                      <div class="card tasks_report shadow">
                            <div class="header">
                                <h2><strong><i class="fa fa-calendar"></i></strong> 2022</h2>
                            </div>
                            <div class="body text-center">
                                <h4 class="margin-0">&#8358; <span data-speed="2500" data-fresh-interval="700"><?php echo number_format($total_payment) ?></span></h4>
                                <h6 class="m-b-20">Total Payment</h6>
                                <input type="text" class="knob dial1" value="<?php echo $performance ?>" data-width="100" data-height="100" data-thickness="0.3" data-fgColor="#4caf50" readonly>
                                <h6 class="m-t-20">Satisfaction Rate</h6>
                                <small class="displayblock"> <?php echo $satisfaction ?> <i class="zmdi zmdi-trending-up"></i></small>
                            </div>
                        </div>
            </div>
        </div>        
    </div>
</section>
<?php include_once '../includes/admin-footer.php'; ?>
</body>
</html>

