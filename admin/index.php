<?php
$timezone = date_default_timezone_set('Africa/Lagos'); 
$date = date('m/d/Y h:i:s a', time());
$page = "dash";

include_once '../includes/admin-header.php';
include_once '../includes/admin-nav-bar.php';
include_once '../includes/admin-sidebar.php';

$total_payment = $pmtlog->get_total_customer_payment(date("Y"));
$total_asset_sold = $pmtlog->get_asset_sold_count();
$completed_payment = $cus_assets_repo->get_completed_payment_count();

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
                                <a href="" style="color: black">
                                    <div class="icon xl-slategray"><i class="fa fa-store-alt"></i> </div>
                                    <div class="content">
                                        <div class="text font-weight-bold">Total Asset Sold</div>
                                        <h5 class="number font-weight-light"><?php echo $total_asset_sold ?></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                       <div class="col-lg-6 col-12">
                        <div class="card top_counter shadow">
                            <div class="body">
                                <a href="" style="color: black">
                                    <div class="icon xl-slategray"><i class="fa fa-store"></i> </div>
                                    <div class="content">
                                        <div class="text font-weight-bold">Completed Payment</div>
                                        <h5 class="number"><?php echo $completed_payment ?></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
            <!-- Akure Total Payment-->
            <?php
            $akure_assets_ids = $assets->get_asset_id_by_location("AKR");
            $total_akure_payment = 0;
            if ($akure_assets_ids != 0) {
                foreach ($akure_assets_ids as $akure_assets_id) {
                    $akure_payment = $pmtlog->get_total_location_payment_by_assetID($akure_assets_id['id']);
                    $total_akure_payment += $akure_payment;
                }
            }
            ?>
                     <div class="col-lg-6 col-12">
                        <div class="card top_counter shadow">
                            <div class="body">
                                <a href="" style="color: black">
                                    <div class="icon xl-slategray"><i class="fa fa-money-bill"></i> </div>
                                    <div class="content">
                                        <div class="text">Akure Payment</div>
                                        <h5 class="number text">&#8358; <?php echo number_format($total_akure_payment) ?></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
          <!-- Oshogbo Total Payment-->
            <?php
            $osogbo_assets_ids = $assets->get_asset_id_by_location("OSG");
            $total_osogbo_payment = 0;
            if ($osogbo_assets_ids != 0) {
                foreach ($osogbo_assets_ids as $osogbo_assets_id) {
                    $osogbo_payment = $pmtlog->get_total_location_payment_by_assetID($osogbo_assets_id['id']);
                    $total_osogbo_payment += $osogbo_payment;
                }
            }
            ?>
                       <div class="col-lg-6 col-12">
                        <div class="card top_counter shadow">
                            <div class="body">
                                <a href="" style="color: black">
                                    <div class="icon xl-slategray"><i class="fa fa-money-bill"></i> </div>
                                    <div class="content">
                                        <div class="text">Oshogbo Payment</div>
                                        <h5 class="number">&#8358; <?php echo number_format($total_osogbo_payment) ?></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card student-list">
                    <div class="header">
                     <?php $all_cus_payments =  $pmtlog->get_all_payment_by_payment_status_v2(); ?>
                        <h2><strong>Recent</strong> Payment List <!--  <small>Recent Payment List...</small>--> </h2>
                    </div>
                    <div class="body shadow">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable " style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Property ID</th>
                                        <th>Amount</th>
                                        <th>Trans Ref</th>
                                        <th>Date</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>                            
                                <tbody>
                                    <?php 
                                    $count = 1;
                                    if($all_cus_payments != 0){
                                        foreach ($all_cus_payments as $all_cus_payment){
                                            $cus_name = $app->get_user_by_id($all_cus_payment['user_id']);
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $count ?></td> 
                                        <td><?php echo $cus_name['fullname'] ?></td> 
                                        <td><?php echo  $all_cus_payment['asset_cart_id']?></td> 
                                        <td><?php echo  $all_cus_payment['amount_payed']?></td> 
                                        <td><?php echo  $all_cus_payment['payment_ref']?></td> 
                                        <td><?php echo  $all_cus_payment['date']?></td> 
                                        <td><?php echo  $all_cus_payment['remark']?></td> 
                                    </tr>
                                    <?php 
                                    $count ++;
                                        } ?>
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
         $total_payment = $total_akure_payment + $total_osogbo_payment;
         ?>
               <div class="card tasks_report shadow">
                            <div class="header">
                                <h2><strong>Total</strong> Revenue</h2>
                            </div>
                            <div class="body text-center">
                                <h4 class="margin-0">&#8358; <span data-speed="2500" data-fresh-interval="700"><?php echo number_format($total_payment) ?></span></h4>
                                <h6 class="m-b-20">Total Payment</h6>
                            <!--  Expected Payment-->
                            <?php
                            $all_asset_ids = $pmtlog->get_all_asset_cart_id();
                            $expected_payment = 0;
                            if($all_asset_ids != 0){
                            foreach ($all_asset_ids as $all_asset_id){
                                $expected_payment +=  $all_asset_id['asset_price'];
                            }
                            }
                            
                           if($expected_payment < 1){
                               $ezpected_payment_percentage = 0;
                           }else{
                               $ezpected_payment_percentage =  ($total_payment / $expected_payment) * 100;
                           }
                            ?>
                                <input type="text" class="knob dial1" value="<?php echo $ezpected_payment_percentage ?>" data-width="100" data-height="100" data-thickness="0.3" data-fgColor="#4caf50" readonly>
                                <h6 class="m-t-20">Satisfaction Rate</h6>
                                <?php
                                $satisfaction = "none";
                                if ($ezpected_payment_percentage >= 70) {
                                    $satisfaction = "Excellent";
                                } elseif ($ezpected_payment_percentage >= 60 && $ezpected_payment_percentage < 70) {
                                    $satisfaction = "Good";
                                } elseif ($ezpected_payment_percentage >= 50 && $ezpected_payment_percentage < 60) {
                                    $satisfaction = "Average";
                                } elseif ($ezpected_payment_percentage >= 40 && $ezpected_payment_percentage < 50) {
                                    $satisfaction = "Below Average";
                                } elseif ($ezpected_payment_percentage >=1 && $ezpected_payment_percentage <=39) {
                                    $satisfaction = "Poor";
                                }else {
                                    $satisfaction = "nil";
                                }
                                ?>
                                <small class="displayblock"><?php echo $ezpected_payment_percentage ?> <?php echo $satisfaction ?> <i class="zmdi zmdi-trending-up"></i></small>
                            </div>
                        </div>
            </div>
        </div>        
    </div>
</section>
<?php include_once '../includes/admin-footer.php'; ?>
</body>
</html>

