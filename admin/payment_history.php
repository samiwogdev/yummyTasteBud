<?php
$timezone = date_default_timezone_set('Africa/Lagos'); 
$date = date('m/d/Y h:i:s a', time());
$page = "report";

include_once '../includes/admin-header.php';
include_once '../includes/admin-nav-bar.php';
include_once '../includes/admin-sidebar.php';
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Payment History
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid mx-auto">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card shadow ">
                    <div class="header">
                        <h2> <small>This option enables you to view all payment history </small></h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);" class="waves-effect waves-block"><i class="fa fa-pen mt-0 mr-1 text-success" style="font-size: 12px;"></i>Edit</a></li>
                                    <li><a href="javascript:void(0);" class="waves-effect waves-block "><i class="fa fa-trash mt-0 mr-1 text-danger" style="font-size: 12px;"></i>delete</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 p-5">
                 <?php $all_cus_payments =  $pmtlog->get_all_payment_by_payment_status(); ?>
                <div class="table-responsive text-center">
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
</section>
<?php include_once '../includes/admin-footer.php'; ?>