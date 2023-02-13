<?php
include_once 'convig.php';

if (null == filter_input(INPUT_GET, "txnref")) {
    header("location: index");
}

if (null == filter_input(INPUT_GET, "status")) {
    header("location: index");
}

$txnref = filter_input(INPUT_GET, "txnref");
$status = filter_input(INPUT_GET, "status");
//$sub_total = $_SESSION['total_payment'];

$order = Order::getInstance();
$shop = Shop::getInstance();
if ($status = "success") {
    $all_oder_items = $order->getCartItemIDv2($_SESSION['email']);
    foreach ($all_oder_items as $all_oder_item) {
        $shop_info = $shop->get_menu_by_id($all_oder_item['shop_id']);
        $total = $shop_info['price'] * $all_oder_item['qty'];
        $order->updatecompleteOrder(0, 1, $txnref, $total, $_SESSION['email'], $all_oder_item['shop_id']);
    }
} else {
    $all_oder_items = $order->getCartItemIDv2($_SESSION['email']);
    foreach ($all_oder_items as $all_oder_item) {
        $shop_info = $shop->get_menu_by_id($all_oder_item['shop_id']);
        $total = $shop_info['price'] * $all_oder_item['qty'];
        $order->updatecompleteOrder(0, 0, $txnref, $total, $_SESSION['email']);
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="icon" href="../assets/images/icon-logo.png"> <!-- start linking -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link type="text/css" href="css/sweetalert2/sweetalert2.min.css" rel="stylesheet" media="all">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="css/sweetalert2/sweetalert2.min.js"></script>
        <style>
            body {
                font-family: 'Varela Round', sans-serif;
            }
            .modal-confirm {
                color: #434e65;
                width: 525px;
            }
            .modal-confirm .modal-content {
                padding: 20px;
                font-size: 16px;
                border-radius: 5px;
                border: none;
            }
            .modal-confirm .modal-header {
                background: #47c9a2;
                border-bottom: none;
                position: relative;
                text-align: center;
                margin: -20px -20px 0;
                border-radius: 5px 5px 0 0;
                padding: 35px;
            }
            .modal-confirm h4 {
                text-align: center;
                font-size: 36px;
                margin: 10px 0;
            }
            .modal-confirm .form-control, .modal-confirm .btn {
                min-height: 40px;
                border-radius: 3px;
            }
            .modal-confirm .close {
                position: absolute;
                top: 15px;
                right: 15px;
                color: #fff;
                text-shadow: none;
                opacity: 0.5;
            }
            .modal-confirm .close:hover {
                opacity: 0.8;
            }
            .modal-confirm .icon-box {
                color: #fff;
                width: 95px;
                height: 95px;
                display: inline-block;
                border-radius: 50%;
                z-index: 9;
                border: 5px solid #fff;
                padding: 15px;
                text-align: center;
            }
            .modal-confirm .icon-box i {
                font-size: 64px;
                margin: -4px 0 0 -4px;
            }
            .modal-confirm.modal-dialog {
                margin-top: 80px;
            }
            .modal-confirm .btn, .modal-confirm .btn:active {
                color: #fff;
                border-radius: 4px;
                background: #eeb711 !important;
                text-decoration: none;
                transition: all 0.4s;
                line-height: normal;
                border-radius: 30px;
                margin-top: 10px;
                padding: 6px 20px;
                border: none;
            }
            .modal-confirm .btn:hover, .modal-confirm .btn:focus {
                background: #eda645 !important;
                outline: none;
            }
            .modal-confirm .btn span {
                margin: 1px 3px 0;
                float: left;
            }
            .modal-confirm .btn i {
                margin-left: 1px;
                font-size: 20px;
                float: right;
            }
            .trigger-btn {
                display: inline-block;
                margin: 100px auto;
            }
        </style>
    <body>   
        <?php if ($status == "success") { ?>
            <div class="modal-dialog modal-confirm shadow">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <div class="icon-box">
                            <i class="material-icons"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center"> Approved Successfully</h4>	
                        <hr>
                        <p class="" style="font-size: 12px">Your issuance certificate has been sent to your email <strong>[<?php echo $_SESSION['email'] ?>]</strong></p>
                        <p class="" style="font-size: 12px">Order ID:<strong> <?php echo $txnref ?></strong></p>
                        <a href="dashboard/index" class="btn btn-success" data-dismiss="modal"><span>View order Details</span> <i class="material-icons"></i></a>
                        <a href="./" class="btn btn-success" data-dismiss="modal"><span>Continue Shopping</span> <i class="material-icons"></i></a>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="modal-dialog modal-confirm shadow">
                <div class="modal-content">
                    <div class="modal-header justify-content-center" style="background-color: #f44336;">
                        <div class="icon-box">
                            <i class="material-icons">&#xE5CD;</i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <h4 style="font-size:23px" class="text-center">Your Transaction was not successful</h4>	
                        <hr>
                        <p class="" style="font-size: 12px">Reason: <strong>Incomplete Transaction</strong></p>
                        <p class="" style="font-size: 12px">Order ID: <strong> <?php echo $txnref ?></strong></p>
                        <a href="dashboard/index" class="btn btn-success" data-dismiss="modal"><span>View order Details</span> <i class="material-icons"></i></a>
                        <a href="#" class="btn btn-success" data-dismiss="modal"><span>Continue Shopping</span> <i class="material-icons"></i></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </body>
</html>
