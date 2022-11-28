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
        <form class="main-form">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="mb-md-30">
                        <div class="mb-60">
                            <div class="row">
                                <div class="col-12">
                                    <div class="heading-part mb-30 mb-sm-20">
                                        <h3>Billing Details</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="full-name">Full Name*</label>
                                        <input id="full-name" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="company-name">Company Name</label>
                                        <input id="company-name" type="text">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="text">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="phone-no">Phone No*</label>
                                        <input id="phone-no" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="conutry">Conutry*</label>
                                        <input id="conutry" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address">Address*</label>
                                        <input id="address" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="zip">Pastcode / Zip*</label>
                                        <input id="zip" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city">Town / City*</label>
                                        <input id="city" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="check-box mt-n2">
                                        <span>
                                            <input type="checkbox" class="checkbox" id="create-account" name="Create an Account?">
                                            <label for="create-account" class="mb-0">Create an Account?</label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="heading-part mb-30">
                                    <h3>Shipping Details</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-20 mt-n2">
                                    <div class="check-box">
                                        <span>
                                            <input type="checkbox" class="checkbox" id="different-address" name="Ship to a different address?">
                                            <label for="different-address" class="mb-0">Ship to a different address?</label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <h4>Order Notes</h4>
                                <div class="notes p-4">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</section>

<?php include_once './includes/footer.php'; ?>