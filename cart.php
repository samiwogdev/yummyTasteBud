<?php include_once './includes/header.php'; ?>

	<section class="page-banner" style="background: #121619 url(images/blog-1.jpg) no-repeat center / cover;">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12">
					<div class="page-title">
						<h1 class="page-headding">SHOPPING CART</h1>
						<ul>
							<li><a href="index" class="page-name">Home</a></li>
							<li>SHOPPING CART</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

<section class="shopping-cart ptb">
    <div class="container">
        <div class="cart-item-table commun-table">
            <div class="table-responsive">
                <table class="table border mb-0" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="align-left" >Menu Details</th>
                            <th class="text-left">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">
                                <a href="shop-detail">
                                    <div class="product-image">
                                        <img alt="Eshoper" src="images/2-1.png">
                                    </div>
                                </a>
                                <div class="product-title"> 
                                    <a href="shop-detail" class="font-weight-bold">margherita pizza</a> 
                                </div>
                                <div class="product-title"> 
                                    <a href="shop-detail">Without Sausage</a> 
                                </div>
                                <div class="product-title"> 
                                    <a href="shop-detail"><span class="font-weight-bold">Price:</span> 2,000</a> 
                                </div>
                                <div class="product-title"> 
                                     <a href="javascript:void(0)" class="" style="color: #fd9d3e; font-size: 18px">
                                     <span class="fa fa-trash" style="color: #fd9d3e; padding-right: 3px "></span>
                                    Remove</a>
                                </div>
                            </td>
                            <td class="text-left">
                                <div class="input-box">
                                    <span class="fa fa-plus-square fa-2x" style="color: #fd9d3e; padding-right: 5px"></span>
                                    <input  class="quantity" name="quantity_cart" value="1" style="width: 30px;">
                                    <span class="fa fa-minus-square fa-2x" style="color: #fd9d3e; padding-left: 5px ""></span>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mb-30">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-30 text-center-r"> 
                        <a href="menu" class="btn btn-color">
                            <i class="fa fa-angle-left"></i><span>Update Cart</span>
                        </a> 
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="mtb-30">
            <div class="row">
                <div class="col-md-6 mb-sm-20">
                    <div class="estimate">
                        <div class="heading-part mb-20">
                            <h3 class="sub-heading text-center-r">Estimate shipping and tax</h3>
                        </div>
                        <form class="full">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-box mb-20">
                                        <select id="country_id" class="full">
                                            <option selected="" value="">Select Country</option>
                                            <option value="1">India</option>
                                            <option value="2">China</option>
                                            <option value="3">Pakistan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-box mb-20">
                                        <select id="state_id" class="full">
                                            <option selected="" value="1">Select State/Province</option>
                                            <option value="2">---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-box mb-20">
                                        <select id="city_id" class="full">
                                            <option selected="" value="1">Select City</option>
                                            <option value="2">---</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cart-total-table commun-table">
                        <div class="table-responsive">
                            <table class="table border">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center-r">Cart Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Item(s) Subtotal</td>
                                        <td>
                                            <div class="price-box"> 
                                                <span class="price">$71.00</span> 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>
                                            <div class="price-box"> 
                                                <span class="price">$0.00</span> 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Amount Payable</b></td>
                                        <td>
                                            <div class="price-box"> 
                                                <span class="price"><b>$71.00</b></span> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
<!--        <div class="mt-30">
            <div class="row">
                <div class="col-12">
                    <div class="right-side float-none-xs text-center-r float-none-sm"> 
                        <a href="checkout" class="btn btn-color">Proceed to checkout
                            <span><i class="fa fa-angle-right"></i></span>
                        </a> 
                    </div>
                </div>
            </div>
        </div>-->
     <div class="mb-30">
            <div class="row">
                <div class="col-md-6">
                    <div class="mt-30 text-center-r"> 
                        <a href="menu" class="btn btn-color">
                            <i class="fa fa-angle-left"></i><span>Continue Shopping</span>
                        </a> 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mt-30 right-side float-none-sm text-center-r"> 
                        <a href="javascript:void(0)" class="btn btn-color">Proceed to checkout</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

	<?php include_once './includes/footer.php'; ?>