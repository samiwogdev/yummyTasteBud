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
                        <?php
                        $shop_imgs = $shop_img->get_shop_pics_by_id($shop_id);
                        if ($shop_imgs != 0) {
                            foreach ($shop_imgs as $shop_img) {
                                ?>
                                <li><img src="uploads/shop_item_img/<?php echo $shop_img['picture'] ?>" alt="" /></li>
                            <?php }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7">
                <div class="shop-detail">
                    <div class="shop-name">
                        <h3 class="title-shop"><?php echo $shops['name'] ?></h3>
                        <div class="price-shop">
                        <?php $old_price = $shops['price'] * 30 / 100; ?>
                            <span class="filter-price filter-price-r">&#8358;<?php echo number_format($shops['price'] + $old_price) ?></span>
                            <span class="filter-price">&#8358;<?php echo number_format($shops['price']) ?></span>
                        </div>
                        <p class="shop-desc"><?php echo $shops['description'] ?></p>
                    </div>
                    <div class="quantity-product">
                        <form action='controller/add_to_cart?n=<?php echo $shops['id'] ?>' method="post">
                            <label class="quantity">Qty:</label>
                            <input type="number" name='quantity' value="1" min="0" max="10000000">
                            <?php 
                            if($shops['status'] == 0){ ?>
                            <button type="button" disabled class="add-cart pt-3 pb-3 bg-secondary" disabled="true"><i class="fa fa-shopping-bag"></i>Add to cart</button> 
                            <br><label class="quantity mt-4"style="color: #fd9d3e">Menu not currently available, please click on the Whatsapp chat button below to pre-order</label>
                         <?php }else{ ?>
                            <button type="submit" name="addcart" class="add-cart pt-3 pb-3"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Add to cart</button>
                         <?php } ?>
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
<?php if (isset($_GET['info']) && $_GET['info'] == "loginSuccessful") { ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
        $(document).ready(function () {
            Toast.fire({
                icon: 'success',
                title: "Login succsssful "
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
