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
                <h2>Payment Report <small>This option enables you to generate payment Report for a selected Property ID</small>
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="general">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">                       
                            <div class="col-lg-12">
                                <h6 style="color:#ed5a0b; font-size: 12px" class="mb-2 mt-5"> Enter Property ID *</h6>
                                <form action="<?php echo htmlspecialchars($_SERVER['self']) ?>" method="post" class="form-inline" id="payment_form">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="input-group">
                                            <input type="text" name="ppty_id" class="form-control" placeholder="e.g: OJH-RAS39Hu-54836" >
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                        <div class="form-group">
                                            <button type="submit" name="payment_report" class="btn btn-raised btn-round btn-primary">Submit <span class="fa fa-forward"></span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                              <div class="col-12 p-5">
                <div class="table-responsive text-center">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable " style="width: 100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Property ID</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>                            
                        <tbody>
                            <?php
                            $count = 1;
                            if ($purchased_pptys != 0) {
                                foreach ($purchased_pptys as $purchased_ppty) {
                                    $assets->setId($purchased_ppty['asset_id']);
                                    $assets_details = $assets->get_all_asset_by_id();
                                    foreach ($assets_details as $assets_detail) {
                                        ?>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <td><?php echo $assets_detail['name'] ?></td>
                                            <td><?php echo $purchased_ppty['asset_cart_id'] ?></td>
                                            <td><?php
                            if ($assets_detail['location'] == "AKR") {
                                echo "Akure";
                            } elseif ($assets_detail['location'] == "OSG") {
                                echo 'Oshogbo';
                            }
                                        ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #760076">
                                                        Quick Action <span class="fa fa-angle-down"></span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="../report/single_payment_receipt?auth=<?php echo $purchased_ppty['asset_cart_id'] ?>"><span class="fa fa-file-pdf p-2"></span>Receipt</a>
                                                        <hr class="m-0 p-0">
                                                        <a class="dropdown-item" href="../report/single_payment_history?auth=<?php echo $purchased_ppty['asset_cart_id'] ?>"><span class="fa fa-file-invoice p-2"></span>payment Summary</a>
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
                </div>
            </div>
        </div>
    </div>

</section>
<?php include_once '../includes/admin-footer.php'; ?>
<?php if (isset($error) && $error == "department_invalid") { ?>
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
                title: " Invalid department"
        })
        });
    </script> 
<?php } if (isset($error) && $error == "semester_invalid") { ?>
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
                title: " Invalid Semester!"
        })
        });
    </script> 
<?php } if (isset($error) && $error == "session_invalid") { ?>
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
                title: " Invalid Seession!"
        })
        });
    </script> 
<?php } ?>