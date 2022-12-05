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
                                        <h3 class="font-weight-bold mb-3">Delivery Options</h3>
                                    <form class="full main-form">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-box">
                                                    <select id="country_id" class="full">
                                                        <option selected="" value="">Select Delivery Method</option>
                                                        <option value="1">Pick up at our shop</option>
                                                        <option value="2">Door delivery</option>
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
                        <div class="col-12">
                            <h3 class="font-weight-bold mb-3">Your Delivery Address</h3>
                            <div class="notes p-4 shadow mb-5">
                                <p><span class="font-weight-bold pr-2" style="color: black">Location:</span>49, Joel Ogunnaike Street, Ikeja, Lagos, Nigeria.</p>
                                <p><span class="font-weight-bold pr-2 text-black" style="color: black">Phone:</span>0907891085</p>
                                <a href="shop-detail" class="btn btn-color mt-2">Change Address</a>
                            </div>
                                <h3 class="font-weight-bold mb-3">Your Order</h3>
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
                                    <li>
                                        <div class="pro-media"> <a href="shop-detail"><img alt="T-shirt" src="images/4.png"></a> </div>
                                        <div class="pro-detail-info"> <a href="shop-detail" class="product-title">Greek Pizza</a>
                                            <div class="price-box"> <span class="price">$20.00</span> </div>
                                            <div class="checkout-qty">
                                                <div>
                                                    <label>Qty: </label>
                                                    <span class="info-deta">2</span> 
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="pro-media"> <a href="shop-detail"><img alt="T-shirt" src="images/2.png"></a> </div>
                                        <div class="pro-detail-info"> <a href="shop-detail" class="product-title">Barbecue Pizza</a>
                                            <div class="price-box"> <span class="price">$20.00</span> </div>
                                            <div class="checkout-qty">
                                                <div>
                                                    <label>Qty: </label>
                                                    <span class="info-deta">2</span> 
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
                <button class="btn full btn-color">Place order</button>
            </div>
        </div>
    </div>
</section>
<?php include_once './includes/footer.php'; ?>