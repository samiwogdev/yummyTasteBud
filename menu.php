<?php
if (NULL == filter_input(INPUT_GET, "n")) {
    header("location: index?info=invalid");
}
$shop_id = filter_input(INPUT_GET, "n");
?>
<?php include_once './includes/header.php'; ?>
<section class="page-banner" style="background: #121619 url(images/menu-banner-1.png) no-repeat center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="page-title">
                    <?php
                    $shops = $shop->get_menu_by_category($shop_id);
                    $menus = $menu->get_menu_by_id($shops['category']);
                    ?>
                    <h1 class="page-headding"><?php echo $menus['name'] ?></h1>
                    <ul>
                        <li><a href="index" class="page-name">Home</a></li>
                        <li>Yummy <?php echo $menus['name'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- --------        --------
Page Banner End
--------        -------- -->

<section class="menu-list pt-100">
    <div class="container">
        <div class="tab-content">
            <div role="tabpanel" class="row tab-pane fade in active show" id="tab-1">
                <?php
                $shops = $shop->get_menu_by_category_2($shop_id);
                if ($shops != 0) {
                    foreach ($shops as $shop_) {
                        $shop_imgs = $shop_img->get_shop_pics_by_id_2($shop_['id']);
                        if ($shop_imgs != 0) {
                            ?>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="menu-list-box">
                                    <div class="list-img"><a href="shop-details?n=<?php echo $shop_['id'] ?>"><img src="uploads/shop_item_img/<?php echo $shop_imgs['picture'] ?>" alt="pizza"></a></div>
                                    <div class="menu-detail">
                                        <a href="shop-details?n=<?php echo $shop_['id'] ?>" class="iteam-name"><?php echo $shop_['name'] ?> </a>
                                        <ul>
                                            <li><?php echo $menus['name'] ?></li>
                                            <li><?php echo $shop_['alias'] ?></li>
                                        </ul>
                                        <p class="iteam-desc"><?php echo $shop_['description'] ?></p>
                                        <a href="shop-details?n=<?php echo $shop_['id'] ?>" class="iteam-order">order now</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<div class="top-scrolling">
    <a href="menu#header" class="scrollTo"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<?php include_once './includes/footer.php'; ?>