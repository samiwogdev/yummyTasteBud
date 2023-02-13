<?php
//$shop_id = filter_input(INPUT_GET, "n");
//echo $shop_id; exit;
?>
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
       <?php
        if (NULL !== filter_input(INPUT_GET, "n")) {
        $shop_id = filter_input(INPUT_GET, "n");
        ?>
        <form class="main-form" action="controller/getstarted?n=<?php echo $shop_id ?>" method="post">
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
                                        <label>Fullname *</label>
                                        <input name="fullname" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Phone*</label>
                                        <input name="phone" type="number" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input name="email" type="email" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label >address*</label>
                                        <input name="address" type="text" required="">
                                    </div>
                                </div>
                                  <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-name">Password</label>
                                        <input name="password" id="psd" type="password" required="">
                                    </div>
                                </div>
                                  <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-name">Confirm password</label>
                                        <input id="cfm_psd" type="password" onkeyup="validatePass()" required="">
                                        <p class="text-danger" id="msg" style="display: none"> Password & Confirm password does not match!</p>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="submit" name="getstarted" class="btn btn-color" style="width: 50%">Signup</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <div class="check-box">
                                        <span>
                                            <label for="create-account" class="mb-0"><a href="signin?n=<?php echo $shop_id ?>" >Already have an Account? Login </a></label>
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
        <form class="main-form" action="controller/getstarted" method="post">
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
                                        <label>Fullname *</label>
                                        <input name="fullname" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label >Phone*</label>
                                        <input name="phone" type="number" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label >Email*</label>
                                        <input name="email" type="email" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label >address*</label>
                                        <input name="address" type="text" required="">
                                    </div>
                                </div>
                                  <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-name">Password</label>
                                        <input name="password" type="password" id="psd" required="">
                                    </div>
                                </div>
                                  <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-name">Confirm password</label>
                                        <input id="cfm_psd" type="password" onkeyup="validatePass()" required="">
                                        <p class="text-danger" id="msg" style="display: none"> Password & Confirm password does not match!</p>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="submit" name="getStarted" class="btn btn-color" style="width: 50%">Signup</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <div class="check-box">
                                        <span>
                                            <label for="create-account" class="mb-0"><a href="signin" >Already have an Account? Login </a></label>
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
<script>
    function validatePass(){ 
        var password = document.getElementById("psd");
        var confirm_password = document.getElementById("cfm_psd");
        var msg = document.getElementById("msg");
        if(password.value !== confirm_password.value){
            msg.style.display = "block";
        }else{
            msg.style.display = "none";
        }
    }
</script>
<?php include_once './includes/footer.php'; ?>
<?php if (isset($_GET['info']) && $_GET['info'] == "empty") { ?>
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
                title: "Please, fill all form inputs "
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
<?php } elseif (isset($_GET['info']) && $_GET['info'] == "emailExist") { ?>
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
                title: "Email already exist, please login"
            })
        });
    </script> 
<?php } ?>

