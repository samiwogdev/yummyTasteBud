<?php
if (NULL == filter_input(INPUT_GET, "n")) {
    header("location: index?info=invalid");
}
$shop_id = filter_input(INPUT_GET, "n");
?>
<?php include_once './includes/header.php'; ?>

<section class="page-banner" style="background: #121619 url(images/blog-9.jpg) no-repeat center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="page-title">
                    <?php
                    $shops = $shop->get_menu_by_id($shop_id);
                    $menus = $menu->get_menu_by_id($shops['category']);
                            ?>
                    <h1 class="page-headding"><?php echo $menus['name'] ?></h1>
                    <ul>
                        <li><a href="index" class="page-name">Home</a></li>
                        <li><a href="menu?n=<?php echo $shops['category'] ?>" class="page-name"><?php echo $shops['name'] ?></a></li>
                        <li><?php echo $shops['description'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-det pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-12">
                <div class="align-center mb-md-30">
                    <ul id="glasscase" class="gc-start">
                        <li><img src="images/p-1.png" alt="pizzon" /></li>
                        <li><img src="images/p-2.png" alt="pizzon" /></li>
                        <li><img src="images/p-3.png" alt="pizzon" /></li>
                        <li><img src="images/p-4.png" alt="pizzon" data-gc-caption="Your caption text" /></li>
                        <li><img src="images/p-5.png" alt="pizzon" /></li>
                        <li><img src="images/p-6.png" alt="pizzon" /></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7">
                <div class="shop-detail">
                    <div class="shop-name">
                        <h3 class="title-shop"><?php echo $shops['name'] ?></h3>
                        <div class="price-shop">
                           <?php  $old_price = $shops['price'] * 30/100;?>
                            <span class="filter-price filter-price-r">&#8358;<?php echo number_format($shops['price'] + $old_price )?></span>
                            <span class="filter-price">&#8358;<?php echo number_format($shops['price'] )?></span>
                        </div>
                        <p class="shop-desc"><?php echo $shops['description'] ?></p>
                    </div>
                    <div class="quantity-product">
                        <form action='controller/add_to_cart?n=<?php echo $shops['id']?>' method="post">
                            <label class="quantity">Qty:</label>
                        <input type="number" name='quantity' value="1" min="0" max="10">
                        <button type="submit" class="add-cart pt-3 pb-3"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Add to cart</button>
<!--                        <a href="cart" class="add-cart"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Add to cart</a>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="top-scrolling">
    <a href="shop-detailsheader" class="scrollTo"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<?php include_once './includes/footer.php'; ?>