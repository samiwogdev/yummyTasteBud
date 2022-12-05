<?php include_once './includes/header.php'; ?>
<section class="page-banner" style="background: #121619 url(images/blog-1.jpg) no-repeat center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="page-title">
                    <h1 class="page-headding">SHOPPING CART</h1>
                    <ul>
                        <li><a href="index" class="page-name">Home</a></li>
                        <li>SHOPPING CART</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shopping-cart ptb">
    <div class="container">
        <div class="cart-item-table commun-table">
            <form action="controller/update_cart_item" method="post">
                <div class="table-responsive">
                    <?php
                    $orders = $order->getCartItemByEmail($_SESSION['email']);
                    if ($orders != 0) {
                        ?>
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="align-center" >Menu Details</th>
                                    <th class="text-center">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($orders as $order_) {
                                    $shop_item = $shop->get_menu_by_id($order_['shop_id']);
                                    $shop_imgs = $shop_img->get_shop_pics_by_id_2($shop_item['id']);
                                    ?>
                                    <tr>
                                        <td class="text-left">
                                            <a href="shop-detail">
                                                <div class="product-image">
                                                    <img alt="<?php echo $shop_item['name'] ?>" src="uploads/shop_item_img/<?php echo $shop_imgs['picture'] ?>">
                                                </div>
                                            </a>
                                            <div class="product-title"> 
                                                <a href="shop-detail" class="font-weight-bold"><?php echo $shop_item['name'] ?></a> 
                                            </div>
                                            <div class="product-title"> 
                                                <a href="shop-detail"><?php echo $shop_item['description'] ?></a> 
                                            </div>
                                            <div class="product-title"> 
                                                <a href="shop-detail"><span class="font-weight-bold">Price:</span><?php echo $shop_item['price'] ?></a> 
                                            </div>
                                            <div class="product-title"> 
                                                <a href="controller/delete_cart_item?n=<?php echo $order_['id'] ?>" class="" style="color: #fd9d3e; font-size: 18px">
                                                    <span class="fa fa-trash" style="color: #fd9d3e; padding-right: 3px "></span>
                                                    Remove</a>
                                            </div>
                                        </td>

                                        <td class="text-left">
                                            <div class="input-box">
                                                <span class="fa fa-minus-square fa-2x mr-3" id="reduce" onclick="decrementQty(<?php echo $order_['id'] ?>)" style="color: #fd9d3e;  cursor: pointer;"></span>
                                                <input  class="quantity mr-3" type="number" id="qty_<?php echo $order_['id'] ?>" name="quantity_cart_<?php echo $order_['id'] ?>" value="<?php echo $order_['qty'] ?>" style="width: 80px; border: none; text-align: center; background-color: transparent;">
                                                <span class="fa fa-plus-square fa-2x" id="increase" onclick="incrementQty(<?php echo $order_['id'] ?>)" style="color: #fd9d3e; cursor: pointer "></span>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-color mt-3" type="submit" style="display:none" id="updt_cart"><i class="fa fa-angle-left"></i><span>Update Cart</span></button>
                </form>
            </div>
            <hr>
            <div class="mtb-30">
                <div class="row">
                    <div class="col-md-6">
                        <div class="cart-total-table commun-table">
                            <div class="table-responsive">
                                <table class="table border">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center-r">Cart Summary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Item's(3) Subtotal</td>
                                            <td>
                                                <div class="price-box"> 
                                                    <span class="price">$71.00</span> 
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-30">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-30 text-center-r"> 
                                <a href="checkout" class="btn btn-color">Proceed to checkout</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-30 right-side float-none-sm text-center-r"> 
                                <a href="index#menu-list" class="btn btn-color">
                                    <i class="fa fa-angle-left"></i><span>Continue Shopping</span>
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
        <?php } else { ?>
            <div class="mb-30">
                <div class="row mb-5">
                    <div class="col-md-12 mb-5">
                        <div class="mt-30 text-center-r"> 
                            <h3>Cart empty</h3>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<script>
     var updt_cart = document.getElementById("updt_cart");
    function decrementQty(id){
        var qtyInput = document.getElementById("qty_" + id);
        
        var qtyValue = parseInt(qtyInput.value);
            qtyValue --;
            if(qtyValue < 1){
              qtyValue = 1; 
            }
             qtyInput.value =  qtyValue;
             updt_cart.style.display = "block";
    }
    function incrementQty(id){
        var qtyInput = document.getElementById("qty_" + id);
        var qtyValue = parseInt(qtyInput.value);
            qtyValue ++;
            qtyInput.value =  qtyValue; 
            updt_cart.style.display = "block";
    }
</script>
	<?php include_once './includes/footer.php'; ?>