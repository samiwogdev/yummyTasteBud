<?php include_once './includes/header.php'; ?>
<?php
$cus = $customer->get_user_by_email($_SESSION['email']);
$email = $settings->get_settings_by_title("email");
$subTotal = $_SESSION['cartSubTotal'];
//$total = $subTotal + $delivery_fees;
?>
<section class="page-banner" style="background: #121619 url(images/blog-1.jpg) no-repeat center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="page-title">
                    <h1 class="page-headding">CHECKOUT</h1>
                    <ul>
                        <li><a href="index" class="page-name">Home</a></li>
                        <li><a href="cart" class="page-name">cart</a></li>
                        <li>CHECKOUT</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if (null !== filter_input(INPUT_GET, "n")) {
    $del_id = filter_input(INPUT_GET, "n");
    ?>
    <section class="checkout-part ptb">
        <div class="container">
            <div class="row">
                <?php
                $cus_order = $order->getCartItemByEmail_v2($_SESSION['email']);
                if ($cus_order != 0) {
                    $del_price = $delivery->get_by_id($cus_order['delivery_id']);
                    $total = $del_price['amount'] + $subTotal;
                    $paystack_total = $total * 100;
                    $_SESSION['total_payment'] = $total;
                    ?>
                    <div class="col-12 col-lg-8">
                        <div class="mb-md-30">

                            <div class="row">
                                <div class="col-12" id="del_address_id">
                                    <label class="font-weight-bold text-danger">Your Address *</label>
                                    <div class="notes p-4 mb-5">
                                        <?php $customers = $customer->get_user_by_email($_SESSION['email']); ?>
                                        <p><?php echo $customers['address'] ?></p>
                                        <p><span class=" pr-2 text-black text-dark">Phone:</span><?php echo $customers['phone'] ?></p>
                                        <a href="shop-detail" class="btn btn-color mt-2" data-toggle="modal" data-target="#smallModal">Change</a>
                                    </div>
                                </div>
                                <?php
                                $orders = $order->getCartItemByEmail($_SESSION['email']);
                                if ($orders != 0) {
                                    ?>
                                    <div class="col-12">
                                        <h3 class="font-weight-bold mb-3 mt-2">Your Order</h3>
                                        <div class="checkout-products sidebar-product mb-60">
                                            <ul>
                                                <?php
                                                foreach ($orders as $order_) {
                                                    $shop_item = $shop->get_menu_by_id($order_['shop_id']);
                                                    $shop_imgs = $shop_img->get_shop_pics_by_id_2($shop_item['id']);
                                                    ?>
                                                    <li>
                                                        <div class="pro-media"> <a href="shop-detail"><img alt="" src="uploads/shop_item_img/<?php echo $shop_imgs['picture'] ?>"></a> </div>
                                                        <div class="pro-detail-info"> <a href="shop-detail" class="product-title"><?php echo $shop_item['name'] ?></a>
                                                            <div class="price-box"> 
                                                            <?php $old_price = $shop_item['price'] * 30 / 100; ?>
                                                                <span class="price">&#8358;<?php echo number_format($shop_item['price']) ?></span>
                                                                <del class="price old-price">&#8358;<?php echo number_format($old_price + $shop_item['price']) ?></del>
                                                            </div>
                                                            <div class="checkout-qty">
                                                                <div>
                                                                    <label class="font-weight-bold text-dark">Qty: </label>
                                                                    <span class="info-deta"><?php echo $order_['qty'] ?></span> 
                                                                </div>
                                                                  <div>
                                                                      <label class="font-weight-bold text-dark">Subtotal: </label>
                                                                    <span class="info-deta">&#8358;<?php echo number_format($shop_item['price'] * $order_['qty']) ?></span> 
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </li>
                                                <?php }
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <h3 class="font-weight-bold mb-3">Order Summary</h3>
                        <div class="complete-order-detail commun-table gray-bg mb-30">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <tbody>
                                        <tr>
                                            <td><b>SubTotal :</b></td>
                                            <td>&#8358;<?php echo number_format($subTotal) ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Delivery Method:</b></td>
                                            <td>Door delivery</td>
                                        </tr>

                                        <tr>
                                            <td><b>Delivery Fee:</b></td>
                                            <td><?php echo number_format($del_price['amount']) ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Total :</b></td>
                                            <td><div class="price-box"> <span class="price">&#8358;<?php echo number_format($total) ?></span> </div></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <form >
                            <script src="https://js.paystack.co/v1/inline.js"></script>
                            <div class="text-center">
                                <button id="place_order_id" class="btn btn-success shadow-sm btn-block" type="button" onclick="payWithPaystack()"> PAY NOW: &#8358;<?php echo number_format($total) ?>.00</button> 
                            </div>
                        </form>

                        <script>
                            function payWithPaystack() {
                                const api = 'pk_test_207c06ad449cf0e885eb0ad353f96bf091d04e5a';
                                var handler = PaystackPop.setup({
                                    key: api,
                                    email: 'ayollionaire@gmail.com',
                                    amount: '<?php echo $paystack_total ?>',
                                    currency: "NGN",
                                    ref: '' + Math.floor((Math.random() * 1000000000) + 1),
                                    phone: '<?php echo $cus['phone'] ?>',
                                    first_name: '<?php echo $cus['fullname'] ?>',
                                    metadata: {
                                        custom_fields: [
                                            {
                                                custmer_name: "<?php echo $cus['fullname'] ?>",
                                            }
                                        ]
                                    },
                                    callback: function (response) {
                                        const referenced = response.reference;
                                        const status = response.status;
                                        window.location.href = 'payment_confirmation?txnref=' + referenced + '&status=' + status;
                                    },
                                    onClose: function () {
                                        alert('window closed');
                                    }
                                });
                                handler.openIframe();
                            }
                        </script>
                        <!--                <button class="btn full btn-color" id="place_order_id">Place order</button>-->
                    </div>
    <?php } ?>
            </div>
        </div>
    </section>
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="controller/update_delivery_address?n=<?php echo $del_id ?>" method="post">
                    <div class="modal-header">
                        <h4 class="title" id="smallModalLabel">Update Delivery Details</h4>
                    </div>
                    <div class="modal-body"> 
                        <div class="col-lg-12 col-12 mt-3">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fas fa-utensils"></i>
                                </span>
                                <input type="number" value="<?php
                                if (isset($_POST['phone'])) {
                                    echo $_POST['phone'];
                                }
                                ?>" name="phone" class="form-control" placeholder="phone" required="">
                            </div>
                        </div>
                        <div class="col-lg-12 col-12 mt-3">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fas fa-utensils"></i>
                                </span>
                                <input type="text" value="<?php
                                if (isset($_POST['address'])) {
                                    echo $_POST['address'];
                                }
                                ?>" name="address" class="form-control" placeholder="address" required="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="delivey_def" class="btn btn-default btn-round waves-effect text-light" style="background-color: #fd9d3e;">Update delivery details</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
} else {
    $orders = $order->getCartItemByEmail($_SESSION['email']);
    if ($orders != 0) {
        ?>

        <section class="checkout-part ptb">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="mb-md-30">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="estimate">
                                            <h3 class="font-weight-bold mb-3">Delivery Method</h3>
                                            <form class="full main-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-box">
                                                            <select id="del_option_id" class="full" onchange="deliveryMethod()">
                                                                <option selected="" value="0">How do you want your order delivered ?</option>
                                                                <option value="2">Door delivery</option>
                                                                <option value="1">Pickup Station (Cheaper Delivery Fees than Door Delivery)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-5 text-danger" id="location_id" style="display: none">
                                                        <div class="input-box">
                                                            <label class="font-weight-bold">Location *</label>
                                                            <select id="del_location_id" onchange="changeLocation()">
                                                                <?php $citys = $delivery->get_all(); ?>
                                                                <option selected="" value="">Select location</option>
                                                                <?php foreach ($citys as $city) { ?>
                                                                    <option value="<?php echo $city['id'] ?>"><?php echo $city['city'] ?></option>
                                                                     <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-5" id="pickup_address_id" style="display: none">
                                    <label class="font-weight-bold text-danger">Pickup Address </label>
                                    <?php
                                    $addr = $settings->get_settings_by_title("address");
                                    if ($addr !== 0) {
                                        ?>
                                        <div class="notes p-4 mb-5">
                                            <p><?php echo $addr['definition']; ?></p>
                                        </div>                                             
                                <?php } ?>
                                </div>
                                <?php
                                $orders = $order->getCartItemByEmail($_SESSION['email']);
                                if ($orders != 0) {
                                    ?>
                                    <div class="col-12 col-lg-4" id="order_summary" style="display: none">
                                        <h3 class="font-weight-bold mb-3 mt-2">Your Order</h3>
                                        <div class="checkout-products sidebar-product mb-60">
                                            <ul>
                                                <?php
                                                foreach ($orders as $order_) {
                                                    $shop_item = $shop->get_menu_by_id($order_['shop_id']);
                                                    $shop_imgs = $shop_img->get_shop_pics_by_id_2($shop_item['id']);
                                                    ?>
                                                    <li>
                                                        <div class="pro-media"> <a href="shop-detail"><img alt="" src="uploads/shop_item_img/<?php echo $shop_imgs['picture'] ?>"></a> </div>
                                                        <div class="pro-detail-info"> <a href="shop-detail" class="product-title"><?php echo $shop_item['name'] ?></a>
                                                            <div class="price-box"> 
                                                             <?php $old_price = $shop_item['price'] * 30 / 100; ?>
                                                                <span class="price">&#8358;<?php echo number_format($shop_item['price']) ?></span>
                                                                <del class="price old-price">&#8358;<?php echo number_format($old_price + $shop_item['price']) ?></del>
                                                            </div>
                                                            <div class="checkout-qty">
                                                                <div>
                                                                    <label class="font-weight-bold text-dark">Qty: </label>
                                                                    <span class="info-deta"><?php echo $order_['qty'] ?></span> 
                                                                </div>
                                                                  <div>
                                                                      <label class="font-weight-bold text-dark">Subtotal: </label>
                                                                    <span class="info-deta">&#8358;<?php echo number_format($shop_item['price'] * $order_['qty']) ?></span> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                 <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>       
                    <div class="col-12 col-lg-4" id="order_list" style="display: none">
                        <h3 class="font-weight-bold mb-3">Order Summary</h3>
                        <div class="complete-order-detail commun-table gray-bg mb-30">
                            <div class="table-responsive">
                                <?php
                                $delivery_fees = 0;
                                $total = $subTotal + $delivery_fees;
                                $paystack_total = $total * 100;
                                $_SESSION['total_payment'] = $total;
                                ?>
                                <table class="table m-0">
                                    <tbody>
                                        <tr>
                                            <td><b>SubTotal :</b></td>
                                            <td>&#8358;<?php echo number_format($subTotal) ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Delivery Method:</b></td>
                                            <td>Pickup Station</td>
                                        </tr>
                                        <tr>
                                            <td><b>Total :</b></td>
                                            <td><div class="price-box"> <span class="price">&#8358;<?php echo number_format($total) ?></span> </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <form >
                            <script src="https://js.paystack.co/v1/inline.js"></script>
                            <div class="text-center">
                                <button id="place_order_id" class="btn btn-success shadow-sm btn-block" type="button" onclick="payWithPaystack()"> PAY NOW: &#8358;<?php echo number_format($total) ?>.00</button> 
                            </div>
                        </form>
                        <script>
                            function payWithPaystack() {
                                const api = 'pk_test_207c06ad449cf0e885eb0ad353f96bf091d04e5a';
                                var handler = PaystackPop.setup({
                                    key: api,
                                    email: '<?php echo $cus['email'] ?>',
                                    amount: '<?php echo $paystack_total ?>',
                                    currency: "NGN",
                                    ref: '' + Math.floor((Math.random() * 1000000000) + 1),
                                    phone: '<?php echo $cus['phone'] ?>',
                                    first_name: '<?php echo $cus['fullname'] ?>',
                                    metadata: {
                                        custom_fields: [
                                            {
                                                custmer_name: "<?php echo $cus['fullname'] ?>",
                                            }
                                        ]
                                    },
                                    callback: function (response) {
                                        const referenced = response.reference;
                                        const status = response.status;
                                        window.location.href = 'payment_confirmation?txnref=' + referenced + '&status=' + status;
                                    },
                                    onClose: function () {
                                        alert('window closed');
                                    }
                                });
                                handler.openIframe();
                            }
                        </script>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <form action="../controller/update_del_location" method="post">
                        <div class="modal-header">
                            <h4 class="title" id="smallModalLabel">Update Delivery Details</h4>
                        </div>
                        <div class="modal-body"> 
                            <div class="col-lg-12 col-12">
                                    <?php $citys = $delivery->get_all(); ?>
                                <select name="city" class="form-control m-b-15">
                                    <option value="0" selected="selected">-- Pick your location --</option>
                                    <?php foreach ($citys as $city) { ?>
                                        <option value="<?php echo $city['id'] ?>"><?php echo $city['city'] ?></option>
                                      <?php } ?>
                                </select> 
                            </div>
                            <div class="col-lg-12 col-12 mt-3">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-utensils"></i>
                                    </span>
                                    <input type="number" value="<?php
                                    if (isset($_POST['phone'])) {
                                        echo $_POST['phone'];
                                    }
                                    ?>" name="phone" class="form-control" placeholder="phone" required="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-12 mt-3">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-utensils"></i>
                                    </span>
                                    <input type="text" value="<?php
                                    if (isset($_POST['address'])) {
                                        echo $_POST['address'];
                                    }
                                    ?>" name="address" class="form-control" placeholder="address" required="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="delivey_def" class="btn btn-default btn-round waves-effect text-light" style="background-color: #fd9d3e;">Update delivery details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <script>
        function deliveryMethod() {
            var deliveryOption = document.getElementById("del_option_id").value;
            var location = document.getElementById('location_id');
            var order_summary = document.getElementById('order_summary');
            var pickup_address = document.getElementById('pickup_address_id');
            var order_list = document.getElementById('order_list');
            var place_order_but = document.getElementById('place_order_id');
            if (deliveryOption == 1) {
                pickup_address.style.display = "block";
                order_summary.style.display = "block";
                location.style.display = "none";
                order_list.style.display = "block";
                place_order_but.style.display = "block";
            } else if (deliveryOption == 2) {
                location.style.display = "block";
                pickup_address.style.display = "none";
            } else {
                location.style.display = "none";
                pickup_address.style.display = "none";
            }
        }

        function changeLocation() {
            var del_location = document.getElementById('del_location_id');
            var place_order_but = document.getElementById('place_order_id');
            if (del_location.value !== 0) {
                window.location.href = "controller/update_del_location?n=" + del_location.value;
            }

        }

    </script>
<?php } ?>

<?php include_once './includes/footer.php'; ?>
<?php if (isset($_GET['info']) && $_GET['info'] == "del_upt_success") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'success',
                title: "Delivery address updated successfully "
            })
        });
    </script>  
<?php } elseif (isset($_GET['info']) && $_GET['info'] == "phone_empty") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'error',
                title: "Please enter phone number"
            })
        });
    </script>  
<?php } elseif (isset($_GET['info']) && $_GET['info'] == "address_empty") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'error',
                title: "please enter address"
            })
        });
    </script> 
<?php } elseif (isset($_GET['info']) && $_GET['info'] == "phoneExist") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'error',
                title: "Phone number already exist"
            })
        });
    </script> 
<?php } elseif (isset($_GET['info']) && $_GET['info'] == "failed") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'error',
                title: "Something went wrong, please try again"
            })
        });
    </script> 
<?php } ?>
 
