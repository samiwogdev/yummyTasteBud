<?php
include_once '../includes/header.php';
$cart_fee = $payment->get_payment_cart_list();
$payment_session = $payment->get_payment_session();
$cart_sum = $payment->get_payment_cart_sum();
if (isset($_GET['auth']) && $_GET['auth'] = "full_pay") {
    ?>
    <!doctype html>
    <html class="no-js " lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title> Lens Poly :: Payment Portal</title>
            <link rel="icon" href="../assets/images/lens-logo.png"> <!-- start linking -->
            <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="../assets/css/style.min.css">
        </head>
        <body style="background-color: white">
            <div class="wrapper">
                <div class="main_header">
                    <header id="header" style="padding-bottom: 60px">
                        <div class="container-fluid">
                        </div>
                    </header>
                    <div id="navbar">
                        <div class="container-fluid">

                        </div>
                    </div>
                </div>
                <section id="hero">
                    <div class="slider" style="background-image:url(../assets/images/grad1.png)">
                        <section class="main-section">
                            <!-- Our Best Courses -->
                            <div class="our-best-courses">
                                <div class="container-fluid">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-6 ">
                                            <div class="courses-box border border-light p-3 shadow-sm ">
                                                <div class="courses-cnt">
                                                    <p class="  text-ce "> <strong class="font-weight-bold">Hi</strong>, <?php echo $_SESSION['fullname'] ?></p>
                                                    <div class="courses-name mb-3 text-ce">Payment Details</div>
                                                    <ul class="list-unstyled">
                                                        <li><label class="font-weight-bold">Amount:</label> <span>&#8358;<?php echo number_format($_SESSION['amount']) ?>.00</span> </li>
                                                        <li><label class="font-weight-bold">Reg No:</label> <span><?php echo $_SESSION['matricno'] ?></span> </li>
                                                        <li><label class="font-weight-bold">Session:</label> <span><?php echo $_SESSION['session'] ?></span> </li>
                                                        <li><label class="font-weight-bold ">Department:</label> <span> <?php echo $_SESSION['default_department'] ?>  </span> </li>
                                                        <li><label class="font-weight-bold">School:</label> <span> <?php echo $_SESSION['school'] ?>  </span> </li>
                                                    </ul>
                                                    <form >
                                                        <script src="https://js.paystack.co/v1/inline.js"></script>
                                                        <div class="text-center">
                                                            <button class="btn btn-success shadow-sm btn-block" type="button" onclick="payWithPaystack()"> PAY NOW: &#8358;<?php echo number_format($_SESSION['amount']) ?>.00</button> 
                                                        </div>
                                                    </form>

                                                    <script>
                                                        function payWithPaystack() {
                                                            const api = 'pk_test_8356da434e36c63e0c2e6f6a4d17e8661a0b142b';
                                                            var handler = PaystackPop.setup({
                                                                key: api,
                                                                email: 'samuel.ogunbodede@livingtrust.com',
                                                                amount: '<?php echo $_SESSION['amount'] ?>',
                                                                currency: "NGN",
                                                                ref: '' + Math.floor((Math.random() * 1000000000) + 1),
                                                                matric_number: '<?php echo $_SESSION['matricno'] ?>',
                                                                semester: '<?php echo $_SESSION['semester'] ?>',
                                                                session: '<?php echo $_SESSION['session'] ?>',
                                                                department: '<?php echo $_SESSION['default_department'] ?>',
                                                                school: '<?php echo $_SESSION['school'] ?>',
                                                                metadata: {
                                                                    custom_fields: [
                                                                        {
                                                                            display_name: "<?php echo $_SESSION['fullname'] ?>",
                                                                            variable_name: "<?php echo $_SESSION['fullname'] ?>",
                                                                            value: "+2348139663076"
                                                                        }
                                                                    ]
                                                                },
                                                                callback: function (response) {
                                                                    const referenced = response.reference;
                                                                    window.location.href = 'payment-confirmation?type=complete&successfullypaid=' + referenced;
                                                                },
                                                                onClose: function () {
                                                                    alert('window closed');
                                                                }
                                                            });
                                                            handler.openIframe();
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
                <footer id="footer mt-2 pt-2" style="background-color: black">
                    <div class="copyright">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <small>&copy;  <script>
                                        document.write(new Date().getFullYear());
                                        </script> Powered by: <a href="" target="_blank" style="color: #616161 !important;">  Living Trust Bank <img src="../assets/images/logo.PNG" width="12px"> </a> </small>
                                </div>
                                <div class="col-lg-6 col-md-6 text-right">
                                    <div class="up"><a href="#header"><i class="zmdi zmdi-caret-up-circle"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <script src="assets/bundles/libscripts.bundle.js"></script>    
            <script src="assets/js/app.js"></script>
            <script src="assets/js/countTo.js"></script>
        </body>
    </html>
    <?php
} elseif (isset($_GET['info']) && $_GET['info'] = "part_pay") {
    if ($cart_fee < 1) {
        header("location: ../dashboard/part_payment?error=empty&cart_pay=valid");
        exit;
    }
    ?>

    <!doctype html>
    <html class="no-js " lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title> Lens Poly :: Payment Portal</title>
            <link rel="icon" href="../assets/images/lens-logo.png"> <!-- start linking -->
            <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="../assets/css/style.min.css">
        </head>
        <body style="background-color: white">
            <div class="wrapper">
                <div class="main_header">
                    <header id="header" style="padding-bottom: 60px">
                        <div class="container-fluid">
                        </div>
                    </header>
                    <div id="navbar">
                        <div class="container-fluid">

                        </div>
                    </div>
                </div>
                <!-- Content Area -->
                <section class="main-section">
                    <!-- About Us Section -->
                    <div class="about-us-section">
                        <div class="container">
                            <div class="row">
                                <div class="section-title col-12">
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-lg-6 col-md-12">
                                    <div class="page-text">
                                        <div class="section-top">
                                            <p><strong>PAYMENT SUMMARY</strong></p>
                                        </div>
                                        <p> <strong class="font-weight-bold">Name:</strong>, <?php echo $_SESSION['fullname'] ?></p>
                                        <p> <strong class="font-weight-bold">Reg No: </strong><?php echo $_SESSION['matricno'] ?></p>
                                        <p> <strong class="font-weight-bold">Session:</strong> <?php echo $payment_session['session'] ?></p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped text-center">
    <!--                                                <strong class="font-weight-bold" style="color: #000; font-weight: 700; font-size: 20px">FEES DETAIL</strong>-->
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Action</th>
                                                        <th scope="col">Fee Type</th>
                                                        <th scope="col">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($cart_fee as $row_info) {
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><a href="../controller/remove?pay=auth&auth=<?php echo $row_info['id'] ?>" title="remove Fee"><span class="fa fa-trash-alt text-danger mr-1"></span><span class="text-danger">Remove</span></a></th>
                                                            <td><?php echo $row_info['fee_type'] ?></td>
                                                            <td>&#8358;<?php echo number_format($row_info['amount']) ?></td>
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                    <tr>
                                                        <th scope="row"></th>
                                                        <th scope="row" class="text-dark">Total</th>                                       
                                                        <th scope="row" class="text-dark">&#8358;<?php echo number_format($cart_sum) ?></th>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <form >
                                            <script src="https://js.paystack.co/v1/inline.js"></script>
                                            <div class="text-ce">
                                                <button class="btn btn-success shadow-sm " type="button" onclick="payWithPaystack()"> PAY NOW: &#8358;<?php echo number_format($cart_sum) ?>.00</button> 
                                            </div>
                                        </form>

                                        <script>
                                            function payWithPaystack() {
                                                const api = 'pk_test_8356da434e36c63e0c2e6f6a4d17e8661a0b142b';
                                                var handler = PaystackPop.setup({
                                                    key: api,
                                                    email: 'samuel.ogunbodede@livingtrust.com',
                                                    amount: '<?php echo $row_info['amount'] ?>',
                                                    currency: "NGN",
                                                    ref: '' + Math.floor((Math.random() * 1000000000) + 1),
                                                    matric_number: '<?php echo $row_info['matricno'] ?>',
                                                    semester: '<?php echo $row_info['semester'] ?>',
                                                    session: '<?php echo $row_info['session'] ?>',
                                                    department: '<?php echo $row_info['dept_code'] ?>',
                                                    metadata: {
                                                        custom_fields: [
                                                            {
                                                                display_name: "<?php echo $row_info['fullname'] ?>",
                                                                variable_name: "<?php echo $row_info['fullname'] ?>",
                                                                value: "+2348139663076"
                                                            }
                                                        ]
                                                    },
                                                    callback: function (response) {
                                                        const referenced = response.reference;
                                                        window.location.href = 'payment-confirmation?type=part&successfullypaid=' + referenced;
                                                    },
                                                    onClose: function () {
                                                        alert('window closed');
                                                    }
                                                });
                                                handler.openIframe();
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="box-img m-b-20">
                                        <img src="../assets/images/grad-stud.png" alt="" class="img-fluid p-0">
    <!--                                        <span class="section-line"></span>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <footer id="footer mt-2 pt-2" style="background-color: black">
                    <div class="copyright">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <small>&copy;  <script>
                                        document.write(new Date().getFullYear());
                                        </script> Powered by: <a href="" target="_blank" style="color: #616161 !important;">  Living Trust Bank <img src="../assets/images/logo.PNG" width="12px"> </a> </small>
                                </div>
                                <div class="col-lg-6 col-md-6 text-right">
                                    <div class="up"><a href="#header"><i class="zmdi zmdi-caret-up-circle"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <script src="assets/bundles/libscripts.bundle.js"></script>    
            <script src="assets/js/app.js"></script>
            <script src="assets/js/countTo.js"></script>
        </body>
    </html>
    <?php
} else {
    echo header("location: https://www.lenspolytechnic.edu.ng/index.php");
}
?>