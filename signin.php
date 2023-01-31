<?php include_once './includes/header.php'; ?>

<section class="page-banner" style="background: #121619 url(images/blog-1.jpg) no-repeat center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="page-title">
                    <h1 class="page-headding">Login</h1>
                    <ul>
                        <li><a href="index" class="page-name">Type your email to log in </a></li>
                        <!--							<li><a href="cart" class="page-name">cart</a></li>
                                                                                <li>CHECKOUT</li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout-part ptb">
    <div class="container">
        <?php
        if (NULL !== filter_input(INPUT_GET, "n")) {
        $shop_id = filter_input(INPUT_GET, "n");?>
        <form class="main-form" action="controller/cus_login?n=<?php echo $shop_id ?>" method="post">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="mb-md-30">
                        <div class="mb-60">
                            <div class="row">
                                <div class="col-12">
                                    <div class="heading-part mb-30 mb-sm-20">
                                        <h3 class="text-center"> log in to continue.</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="full-name">Email*</label>
                                        <input id="full-name" name="email" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="company-name">Password</label>
                                        <input id="company-name" name="password" type="text">
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="input" name="cus_login" class="btn btn-color" style="width: 50%">Login</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <div class="check-box">
                                        <span>
                                            <label for="create-account" class="mb-0"><a href="signup?n=<?php echo $shop_id ?>" >Don't have an Account? click here to get Started </a></label>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <div class="check-box">
                                        <span>
                                            <label for="create-account" class="mb-0"><a href="#" style="color: #fd9d3e">Forgot Password?</a></label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </form>
        <?php }else{ ?>
        <form class="main-form" action="controller/cus_login" method="post">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="mb-md-30">
                        <div class="mb-60">
                            <div class="row">
                                <div class="col-12">
                                    <div class="heading-part mb-30 mb-sm-20">
                                        <h3 class="text-center"> log in to continue.</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="full-name">Email*</label>
                                        <input id="full-name" name="email" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="company-name">Password</label>
                                        <input id="company-name" name="password" type="text">
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="input" name="cus_login" class="btn btn-color" style="width: 50%">Login</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <div class="check-box">
                                        <span>
                                            <label for="create-account" class="mb-0"><a href="signup" >Don't have an Account? click here to get Started </a></label>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <div class="check-box">
                                        <span>
                                            <label for="create-account" class="mb-0"><a href="#" style="color: #fd9d3e">Forgot Password?</a></label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </form>
        <?php } ?>
    </div>
</section>

<?php include_once './includes/footer.php'; ?>