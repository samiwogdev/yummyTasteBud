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
				    <table class="table border mb-0">
				        <thead>
				            <tr>
				                <th class="align-left">Product</th>
				                <th class="align-left">Product Name</th>
				                <th>Price</th>
				                <th>Quantity</th>
				                <th>Sub Total</th>
				                <th>Action</th>
				            </tr>
				        </thead>
				        <tbody>
				            <tr>
				                <td class="align-left">
				                    <a href="shop-detail">
					                    <div class="product-image">
					                        <img alt="Eshoper" src="images/2-1.png">
					                    </div>
				                     </a>
				                </td>
				                <td class="align-left">
				                    <div class="product-title"> 
				                        <a href="shop-detail">margherita pizza</a> 
				                    </div>
				                </td>
				                <td>
				                    <ul>
				                        <li>
				                          	<div class="base-price price-box"> 
				                            	<span class="price">$15.50</span> 
				                          	</div>
				                        </li>
				                    </ul>
				                </td>
				                <td>
				                    <div class="input-box">
				                       	<select data-id="100" class="quantity_cart" name="quantity_cart">
				                          	<option selected="" value="1">1</option>
				                          	<option value="2">2</option>
				                          	<option value="3">3</option>
				                          	<option value="4">4</option>
				                        </select>
				                    </div>
				                </td>
				                <td>
				                    <div class="total-price price-box"> 
				                        <span class="price">$15.50</span> 
				                    </div>
				                </td>
				                <td>
				                   	<a href="javascript:void(0)" class="btn small btn-color">
					                    <i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i>
					                </a>
				                </td>
				            </tr>
				            <tr>
				                <td class="align-left">
				                    <a href="shop-detail">
				                        <div class="product-image">
				                          	<img alt="Eshoper" src="images/4.png">
				                        </div>
				                    </a>
				                </td>
				                <td class="align-left">
				                    <div class="product-title"> 
				                        <a href="shop-detail">GREEK PIZZA</a> 
				                    </div>
				                </td>
				                <td>
				                    <ul>
				                        <li>
				                          	<div class="base-price price-box"> 
				                            	<span class="price">$20.00</span> 
				                          	</div>
				                        </li>
				                    </ul>
				                </td>
				                <td>
				                	<div class="input-box">
				                    	<select data-id="100" class="quantity_cart" name="quantity_cart">
				                          	<option selected="" value="1">1</option>
				                          	<option value="2">2</option>
				                          	<option value="3">3</option>
				                          	<option value="4">4</option>
				                        </select>
				                    </div>
				                </td>
				                <td>
				                    <div class="total-price price-box"> 
				                        <span class="price">$20.00</span> 
				                    </div>
				                </td>
				                <td>
				                   	<a href="javascript:void(0)" class="btn small btn-color">
					                    <i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i>
					                </a>
				                </td>
				            </tr>
				        </tbody>
				    </table>
				</div>
			</div>
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
						    <a href="javascript:void(0)" class="btn btn-color">Update Cart</a> 
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
			<div class="mt-30">
				<div class="row">
					<div class="col-12">
					    <div class="right-side float-none-xs text-center-r float-none-sm"> 
					        <a href="checkout" class="btn btn-color">Proceed to checkout
					            <span><i class="fa fa-angle-right"></i></span>
					        </a> 
					    </div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include_once './includes/footer.php'; ?>