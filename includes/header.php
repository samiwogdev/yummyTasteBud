<?php
include_once 'convig.php';
$menu = Menu::getInstance();
$shop = Shop::getInstance();
$shop_img = ShopItemPics::getInstance();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>YummyTasteBud</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
        <link type="image/x-icon" href="images/fav-icon.png" rel="icon">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/glass-case.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142494086-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-142494086-2');
        </script>
    </head>
    <body>

        <!-- Start preloader -->
<!--        <div id="preloader">
            <label>Loading</label>
        </div>-->
        <!-- End preloader -->

        <header id="header">
            <div class="container">
                <div class="row m-0">
                    <div class="col-xl-3 col-lg-2 col-md-4 col-3 p-0">
                        <div class="navbar-header">
                            <a class="navbar-brand page-scroll" href="index">
<!--                                <img alt="pizzon" src="images/header-logo.png">-->
                                <h2 class="banner-headding" style="font-size: 30px; ">Yummy<span>Taste</span>Bud</h2>
                            </a> 
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-10 col-md-8 col-9 p-0 text-right">
                        <div id="menu" class="navbar-collapse collapse" >
                            <ul class="nav navbar-nav">
                                <li class="level">
                                    <a href="index" class="page-scroll">Home</a>
                                </li>
                                <li class="level dropdown set"> 
                                    <a href="#" class="page-scroll">Menu</a>
                                    <span class="opener plus"></span> 
                                    <div class="megamenu mobile-sub-menu content">
                                        <div class="megamenu-inner-top">
                                            <ul class="sub-menu-level1">
                                                <li class="level2">
                                                    <ul class="sub-menu-level2 ">
                                                        <?php $menus = $menu->get_all();
                                                         foreach ($menus as $menu_){ ?>
                                                        <li class="level3"><a href="menu?n=<?php echo $menu_['id'] ?>"><span>■</span><?php echo $menu_['name'] ?></a></li>
                                                         <?php } ?>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                if (!isset($_SESSION['email'])) {?>
                                <li class="level">
                                    <a href="signin" class="page-scroll">Login</a>
                                </li>
                                <?php }else{ ?>
                                <li class="level">
                                    <a href="signin" class="page-scroll">Logout</a>
                                </li>
                                <?php } ?>
                                <li class="level">
                                    <a href="contact" class="page-scroll">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class=" header-right-link">
                            <ul>
                                <?php if (isset($_SESSION['email'])) { ?> 
                                    <li class="order-online">
                                        <a href="cart" class="page-scroll text-white" >
                                            
                                            <span class="fa fa-cart-arrow-down fa-2x text-white" ></span>
                                            <span class="badge badge-light text-white" style="font-size: 100% !important; background-color: #fd9d3e;;">4</span>
                                        </a>
                                    </li>
                                <?php } else { ?>
                                    <li class="order-online">
                                        <a href="#" class="btn btn-green">Order online</a>
                                    </li>
                                <?php } ?>
                                <li class="side-toggle">
                                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><span></span></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>