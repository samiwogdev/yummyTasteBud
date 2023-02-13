<?php 
include_once '../convig.php';
$user = UserAdmin::getInstance();

if(isset($_POST['login'])){
    if(empty($_POST['username'])){
        $error = "username_invalid";
    }elseif(empty($_POST['password'])) {
        $error = "password_invalid";
    }else{
        $username = UserAdmin::sanitize_input($_POST['username']);
        $password = UserAdmin::sanitize_input($_POST['password']);
        if ($user->adminLogin($username, $password)){
            $_SESSION['username'] = $username ;
            header("location: ../admin/");
            exit;
        } else {
            $error = "failed";
        }       
    }
}
?>
<?php include '../includes/other-header.php'; ?>
<div class="page-header">
    <div class="page-header-image" style="background-image:url(assets/images/login.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="header">
                        <h5>Log in</h5>
                    </div>
                    <div class="content">                                                
                        <div class="input-group">
                            <input type="text" name="username" class="form-control" placeholder="Enter Username">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" placeholder="Password" class="form-control" />
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" name="login" class="btn btn-primary btn-round btn-lg btn-block ">SIGN IN</button>
                        <h5><a href="#" class="link">Forgot Password?</a></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php include_once '../includes/other-footer.php'; ?>
<?php if (isset($error) && $error == "username_invalid") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'error',
                title: " Invalid username!"
            })
        });
    </script> 
<?php } if (isset($error) && $error == "password_invalid") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'error',
                title: "Invalid Password "
            })
        });
    </script> 
<?php } if (isset($error) && $error == "failed") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'error',
                title: "Username or password incorrect "
            })
        });
    </script> 
<?php } ?>