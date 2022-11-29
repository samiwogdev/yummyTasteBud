<?php include_once './includes/header.php'; ?>

<section class="page-banner" style="background: #121619 url(images/blog-1.jpg) no-repeat center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="page-title">
                    <h1 class="page-headding">Signup</h1>
                    <ul>
                        <li><a href="index" class="page-name">create a new YummyTasteBud account </a></li>
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
                                        <h3 class="text-center">Get Started</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="zip">Fullname *</label>
                                        <input name="fullname" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city">Phone*</label>
                                        <input name="phone" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city">Email*</label>
                                        <input name="email" type="email" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city">address*</label>
                                        <input name="address" type="text" required="">
                                    </div>
                                </div>
                                  <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-name">Password</label>
                                        <input name="password" id="psd" type="text">
                                    </div>
                                </div>
                                  <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-name">Confirm password</label>
                                        <input id="cfm_psd" type="text">
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button class="btn btn-color" style="width: 50%">Signup</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <div class="check-box">
                                        <span>
                                            <label for="create-account" class="mb-0"><a href="login" >Already have an Account? Login </a></label>
                                        </span>
                                    </div>
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