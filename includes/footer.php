<footer>
    <div class="container">
        <div class="footer">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 footer-box">
                    <div class="footer-logo">
                        <?php
                        $address =  $settings->get_settings_by_title("address");
                        $phone =  $settings->get_settings_by_title("phone");
                        $email =  $settings->get_settings_by_title("email");
                        ?>
                        <h2 class="banner-headding" style="font-size: 30px; ">Yummy<span>Taste</span>Bud</h2>
                        <p class="footer-des"><?php echo $address['definition']  ?></p>
                        <ul>
                            <li>phone - <a href="<?php echo $phone['definition'] ?>"><?php echo $phone['definition'] ?></a></li>
                            <li>email - <a href="<?php echo $email['definition'] ?>"><span class="__cf_email__"><?php echo $email['definition'] ?></span></a></li>
                        </ul>
                    </div>
                </div>

<!--                <div class="col-xl-4 col-lg-4 col-md-4 footer-box">
                    <div class="opening-hours">
                        <h2>Opening Hours</h2>
                        <ul>
                            <li>Mon - Tues :  <span>6.00 am - 10.00 pm</span></li>
                            <li>Wednes - Thurs : <span>6.00 am - 10.00 pm</span></li>
                            <li>Launch :  <span>Everyday</span></li>
                            <li>Sunday :  <span class="footer-close">Closed</span></li>
                        </ul>
                    </div>
                </div>-->

                <div class="col-xl-4 col-lg-4 col-md-4 footer-box">
                    <div class="useful-links">
                        <h2>useful links</h2>
                        <ul>
                            <li><a href="./">Home</a></li>
                            <li><a href="signin">Login</a></li>
                            <li><a href="signup">Signup</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 copyright-box">
                    <p class="copy-text">© YummyTasteBud all Rights Reserved.</p>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 copyright-box">
                    <ul>
                        <?php
                       $facebook =  $settings->get_settings_by_title("facebook");
                       $twitter =  $settings->get_settings_by_title("twitter");
                       $instagram =  $settings->get_settings_by_title("instagram");
                        ?>
                        <li><a href="<?php echo $facebook['definition']  ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo $twitter['definition'] ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo $instagram['definition'] ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="css/sweetalert2/sweetalert2.min.js"></script>

<script>
    $(document).ready(function () {
        //If your <ul> has the id "glasscase"
        $('#glasscase').glassCase({
            'thumbsPosition': 'bottom',
            'widthDisplayPerc': 100,
            isDownloadEnabled: false,
        });
    });
</script>
<script src="js/script.js"></script>
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+2348066695469", // WhatsApp number
            call_to_action: "Pre order your Menu", // Call to action
            button_color: "#FF6550", // Color of button
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
</body>
</html>