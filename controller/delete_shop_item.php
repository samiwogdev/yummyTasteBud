
<?php

include_once '../convig.php';
if (isset($_GET['n'])) {
    $id = filter_input(INPUT_GET, "n");
    $shop = Shop::getInstance();
    $shop_img = ShopItemPics::getInstance();
    if ($shop->delete($id)) {
        $shop_img->delete_by_shop_id($id);
        header("location: ../admin/shop?info=del_success");
        exit;
    } else {
        header("location: ../admin/shop?info=invalid");
        exit;
    }
} else {
    header("location: ../admin/shop?info=invalid");
    exit;
}


