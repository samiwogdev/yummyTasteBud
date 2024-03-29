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
                    if(isset($_SESSION['email'])){
                    $orders = $order->getCartItemByEmail($_SESSION['email']);
                    if ($orders != 0) {
                        ?>
                        <table class="table table-striped mb-0">
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
                                            <a href="#!" style=" cursor: default">
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
                                                <a href="shop-detail"><span class="font-weight-bold">Price: </span>&#8358;<?php echo number_format($shop_item['price']) ?></a> 
                                            </div>
                                            <div class="product-title"> 
                                                <a href="shop-detail"><span class="font-weight-bold">Subtotal: </span>&#8358;<?php echo number_format($shop_item['price'] * $order_['qty']) ?></a> 
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
                                                <input  class="quantity mr-3"  type="number" onfocus="displayBut(<?php echo $order_['id'] ?>)" id="qty_<?php echo $order_['id'] ?>" name="quantity_<?php echo $order_['id'] ?>" value="<?php echo $order_['qty'] ?>" style="width: 80px; border: none;  text-align: center; background-color: transparent;">
                                                <span class="fa fa-plus-square fa-2x" id="increase" onclick="incrementQty(<?php echo $order_['id'] ?>)" style="color: #fd9d3e; cursor: pointer "></span>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <button name="updt_cart_item" class="btn btn-color mt-3" type="submit" style="display:none" id="updt_cart"><i class="fa fa-angle-left"></i><span>Update Cart</span></button>
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
                                            <td>Item's Subtotal</td>
                                            <td>
                                                <div class="price-box">
                                                    <?php
                                                    $cartIds = $order->getCartItemID($_SESSION['email']);
                                                    $cartSubTotal = 0;
                                                    foreach ($cartIds as $cartId){
                                                        $cartItem =  $shop->get_menu_by_id($cartId['shop_id']);
                                                        $cartSubTotal += $cartItem['price'] * $cartId['qty']; ; 
                                                    }
                                                    ?>
                                                    <span class="price">&#8358;<?php echo number_format($cartSubTotal) ?></span> 
                                                    <?php $_SESSION['cartSubTotal'] = $cartSubTotal ?>
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
        <?php }else { ?>
                        <div class="mb-30">
                <div class="row mb-5">
                    <div class="col-md-12 mb-5">
                        <div class="mt-30 text-center-r"> 
                            <h3>Cart empty</h3>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        
        } ?>
    </div>
</section>
<script>
     var updt_cart = document.getElementById("updt_cart");
    function decrementQty(id){
        var qtyInput = document.getElementById("qty_" + id);
        
        var qtyValue = parseInt(qtyInput.value);
            if(isNaN(qtyValue)){
              qtyValue = 1;  
            }
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
              if(isNaN(qtyValue)){
              qtyValue = 1;  
            }
            qtyValue ++;
            qtyInput.value =  qtyValue; 
            updt_cart.style.display = "block";
    }
    
    function displayBut(id){
           updt_cart.style.display = "block";   
    }
</script>
<?php include_once './includes/footer.php'; ?>
<?php if (isset($_GET['info']) && $_GET['info'] == "cartsuccess") { ?>
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
                title: "cart updated successfully "
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
<?php } elseif (isset($_GET['info']) && $_GET['info'] == "cart_updt_success") { ?>
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
                title: "Cart item(s) updated successfully"
            })
        });
    </script> 
<?php } ?>
 
