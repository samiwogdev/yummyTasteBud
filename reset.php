<?php include_once './includes/header.php'; ?>
<section class="page-banner" style="background: #121619 url(images/blog-1.jpg) no-repeat center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="page-title">
                    <h1 class="page-headding">Forgot Password</h1>
                    <ul>
                        <li><a href="index" class="page-name">Create new password </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout-part ptb">
    <div class="container">
        <form class="main-form" action="controller/update_pass" method="post">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="mb-md-30">
                        <div class="mb-60">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-name">New Password</label>
                                        <input name="password" id="psd" type="password" required="">
                                    </div>
                                </div>
                                  <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-name">Confirm password</label>
                                        <input id="cfm_psd" type="password" onkeyup="validatePass()" required="">
                                        <p class="text-danger" id="msg" style="display: none">New Password & Confirm password does not match!</p>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="input" name="updt_pass" class="btn btn-color" style="width: 50%">Continue</button>
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
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </form>
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
                title: "Please, fill all inputs "
            })
        });
    </script>  
<?php } elseif (isset($_GET['info']) && $_GET['info'] == "pass_failed") { ?>
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
