<?php include_once './includes/header.php'; ?>
        <section class="banner">
            <div class="banner-carousel owl-carousel">
                <div class="banner-slide">
                    <div class="container">
                        <div class="banner-box">
                            <div class="banner-text">
                                <div class="banner-center">
                                    <h2 class="banner-headding">Yummy Pi<span>zz</span>a</h2>
                                    <p class="banner-sub-hed">Keeps your TasteBuds Alive</p>
                                </div>
                            </div>
                            <div class="banner-images">
                                <div class="all-img-banner">
                                    <img src="images/banner-bg-1.png" alt="banner" class="pizza-img">
                                    <img src="images/banner-bg-2.png" alt="banner" class="pizza-it pizza-1">
                                    <img src="images/banner-bg-3.png" alt="banner" class="pizza-it pizza-2">
                                    <img src="images/banner-bg-4.png" alt="banner" class="pizza-it pizza-3">
                                    <img src="images/banner-bg-5.png" alt="banner" class="pizza-it pizza-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-slide-2">
                    <div class="container">
                        <div class="banner-box">
                            <div class="banner-text">
                                <div class="banner-center">
                                    <h2 class="banner-headding">Quality Sha<span>Wa</span>rma</h2>
                                    <p class="banner-sub-hed">Healthy Food for healthy body</p>
                                </div>
                            </div>
                            <div class="banner-images">
                                <div class="all-img-banner">
                                    <img src="images/Beef_Shawarma.png" alt="banner" class="pizza-img">
                                    <img src="images/pizza-1.png" alt="banner" class="pizza-it pizza-1">
                                    <img src="images/pizza-2.png" alt="banner" class="pizza-it pizza-2">
                                    <img src="images/pizza-3.png" alt="banner" class="pizza-it pizza-3">
                                    <img src="images/pizza-4.png" alt="banner" class="pizza-it pizza-4">
                                    <img src="images/pizza-5.png" alt="banner" class="pizza-it pizza-5">
                                    <img src="images/pizza-6.png" alt="banner" class="pizza-it pizza-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-slide-3">
                    <div class="container">
                        <div class="banner-box">
                            <div class="banner-images">
                                <div class="all-img-banner">
                                    <img src="images/plantain-fritata.png" alt="banner" class="pizza-img">
                                    <img src="images/pizza-7.png" alt="banner" class="pizza-it pizza-1">
                                    <img src="images/pizza-8.png" alt="banner" class="pizza-it pizza-2">
                                    <img src="images/pizza-9.png" alt="banner" class="pizza-it pizza-3">
                                    <img src="images/pizza-10.png" alt="banner" class="pizza-it pizza-4">
                                    <img src="images/pizza-11.png" alt="banner" class="pizza-it pizza-5">
                                    <img src="images/pizza-12.png" alt="banner" class="pizza-it pizza-6">
                                </div>
                            </div>
                            <div class="banner-text">
                                <div class="banner-center">
                                    <h2 class="banner-headding">Plantain Fri<span>tt</span>ata</h2>
                                    <p class="banner-sub-hed">Yummy Taste Buds</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="order-section ptb">
            <div class="container">
                <div class="row">
                    <div class="order-top"><img src="images/order-top.png" alt="layer"></div>
                    <div class="col-xl-4 col-lg-4 col-md-4 servose-box text-center padding-lf">
                        <img src="images/order-1.svg" alt="order" class="order-img">
                        <h2 class="order-title text-uppercase">order your Food</h2>
                        <p class="order-des">Your order will be delivered to you in no time</p>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 servose-box text-center padding-lf">
                        <img src="images/order-2.svg" alt="delivery" class="order-img">
                        <h2 class="order-title text-uppercase">delivery or pick up</h2>
                        <p class="order-des">Choose our delivery or pick up and enjoy seamless experience</p>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 servose-box text-center padding-lf">
                        <img src="images/order-3.svg" alt="delicious" class="order-img">
                        <h2 class="order-title text-uppercase">delicious receipe</h2>
                        <p class="order-des">Yummy Taste Buds, Keeps your TasteBuds Alive</p>
                    </div>
                    <div class="order-bottom"><img src="images/order-bottom.png" alt="layer"></div>
                </div>
            </div>
        </section>

        <section class="speciality ptb pt-140">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="headding-part text-center pb-50">
                            <p  class="headding-sub">Fresh From Yummy Taste Buds</p>
                            <h2 class="headding-title text-uppercase font-weight-bold">Our Special Menu</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="special-tab text-center">
                            <ul  id="tabs" class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="text-uppercase font-weight-bold tab-link current" data-tab="tab-0"><a href="#tab-0" role="tab" data-toggle="tab" class="active"> all</a></li>
                                                        <?php $menus = $menu->get_all();
                                                         foreach ($menus as $menu_){ ?>                                                    
                                <li role="presentation" class="text-uppercase font-weight-bold tab-link" data-tab="tab-<?php echo $menu_['id'] ?>"><a href="#tab-<?php echo $menu_['id'] ?>" role="tab" data-toggle="tab"> <?php echo $menu_['name'] ?></a></li>
                                                         <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="row pt-50 tab-pane fade in active show" id="tab-0">
                        <?php
                        $shops = $shop->get_all();
                        if ($shops != 0) {
                            foreach ($shops as $shop_) {
                                $shop_imgs = $shop_img->get_shop_pics_by_id_2($shop_['id']);
                                if ($shop_imgs != 0) {
                                ?>
                                <div class="col-xl-3 col-lg-3 col-md-4 text-center pt-20">
                                    <div class="menu-img"><a href="#"><img src="uploads/shop_item_img/<?php echo $shop_imgs['picture'] ?>" alt="menu" class="menu-image"></a></div>
                                    <a href="shop-details" class="menu-title text-uppercase"><?php echo $shop_['name'] ?></a>
                                    <p class="menu-des"><?php echo $shop_['description'] ?> </p>
                                    <span class="menu-price"><?php echo $shop_['price'] ?></span>
                                </div>
                                <?php
                            }
                            }
                        }
                        ?>
                    </div>
                      <?php
                        $shops = $shop->get_all();
                        if ($shops != 0) {
                            foreach ($shops as $shop_) {
                                $shop_imgs = $shop_img->get_shop_pics_by_id_2($shop_['id']);
                                if ($shop_imgs != 0) {
                                ?>
                    <div role="tabpanel" class="row pt-70 tab-pane fade" id="tab-<?php echo $shop_['category'] ?>">
                        <div class="col-xl-3 col-lg-3 col-md-4 text-center pt-20">
                            <div class="menu-img"><a href="shop-details"><img src="uploads/shop_item_img/<?php echo $shop_imgs['picture'] ?>" alt="menu" class="menu-image"></a></div>
                            <a href="shop-details" class="menu-title text-uppercase"><?php echo $shop_['name'] ?></a>
                            <p class="menu-des"><?php echo $shop_['description'] ?> </p>
                            <span class="menu-price"><?php echo $shop_['price'] ?></span>
                        </div>
                    </div>
                   <?php      }
                            }
                        }
                   ?>
                </div>
            </div>
        </section>

        <div class="top-scrolling">
            <a href="#header" class="scrollTo"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
        </div>

     <?php include_once './includes/footer.php'; ?>