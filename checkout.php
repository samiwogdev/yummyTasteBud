<?php include_once './includes/header.php'; ?>
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
                                                    <select id="country_id">
                                                        <?php $citys = $delivery->get_all(); ?>
                                                        <option selected="" value="">Select location</option>
                                                         <?php foreach ($citys as $city){ ?>
                                                        <option value="<?php echo $city['amount']?>"><?php echo $city['city'] ?></option>
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
                        <div class="col-12" id="del_address_id" style="display: none">
<!--                            <h3 class="font-weight-bold mb-3">Your Address</h3>-->
                            <label class="font-weight-bold text-danger">Your Address *</label>
                            <div class="notes p-4 mb-5">
                                <p>49, Joel Ogunnaike Street, Ikeja, Lagos, Nigeria.</p>
                                <p><span class=" pr-2 text-black text-dark">Phone:</span>0907891085</p>
                                <a href="shop-detail" class="btn btn-color mt-2" data-toggle="modal" data-target="#smallModal">Change</a>
                            </div>
                        </div>
                       <div class="col-12 mt-5" id="pickup_address_id" style="display: none">
<!--                            <h3 class="font-weight-bold mb-3">Pickup Address</h3>-->
                            <label class="font-weight-bold text-danger">Pickup Address </label>
                            <div class="notes p-4 mb-5">
                                <p>49, Joel Ogunnaike Street, Ikeja, Lagos, Nigeria.</p>
                            </div>
                        </div>
                        <div class="col-12">
                                <h3 class="font-weight-bold mb-3 mt-2">Your Order</h3>
                            <div class="checkout-products sidebar-product mb-60">
                                <ul>
                                    <li>
                                        <div class="pro-media"> <a href="shop-detail"><img alt="pizzon" src="images/2-1.png"></a> </div>
                                        <div class="pro-detail-info"> <a href="shop-detail" class="product-title">Margherita Pizza</a>
                                            <div class="price-box"> 
                                                <span class="price">$20.00</span>
                                                <del class="price old-price">$22.00</del>
                                            </div>
                                            <div class="checkout-qty">
                                                <div>
                                                    <label>Qty: </label>
                                                    <span class="info-deta">1</span> 
                                                </div>
                                            </div>
                                        </div>
                                    </li>
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
                                    <td><b>Order Places :</b></td>
                                    <td>17 February 2020</td>
                                </tr>
                                <tr>
                                    <td><b>Total :</b></td>
                                    <td><div class="price-box"> <span class="price">$160.00</span> </div></td>
                                </tr>
                                <tr>
                                    <td><b>Payment :</b></td>
                                    <td>COD</td>
                                </tr>
                                <tr>
                                    <td><b>Order No. :</b></td>
                                    <td>#011052</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button class="btn full btn-color" id="place_order_id" style="display: none">Place order</button>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="../controller/menu_def" method="post">
                <div class="modal-header">
                    <h4 class="title" id="smallModalLabel">Update Delivery Details</h4>
                </div>
                <div class="modal-body"> 
                    <div class="col-lg-12 col-12">
                        <?php $citys = $delivery->get_all(); ?>
                         <select name="city" class="form-control m-b-15">
                           <option value="0" selected="selected">-- Pick your location --</option>
                            <?php foreach ($citys as $city){ ?>
                            <option value="<?php echo $city['amount']?>"><?php echo $city['city'] ?></option>
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
                            ?>" name="phone" class="form-control" placeholder="phone">
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
                            ?>" name="address" class="form-control" placeholder="address">
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
<script>
    function deliveryMethod(){
        var deliveryOption = document.getElementById("del_option_id").value;
         var location = document.getElementById('location_id');
        var address = document.getElementById('del_address_id');
        var pickup_address = document.getElementById('pickup_address_id');
        var place_order_but = document.getElementById('place_order_id');
        if (deliveryOption == 1) {
            pickup_address.style.display = "block";
            place_order_but.style.display = "block";
            location.style.display = "none"; 
            address.style.display = "none"; 
        }
        else if(deliveryOption == 2){
          location.style.display = "block"; 
          place_order_but.style.display = "block";
          address.style.display = "block";
          pickup_address.style.display = "none";
        }
    }
    
</script>
<?php include_once './includes/footer.php'; ?>