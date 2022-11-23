<?php

include_once '../convig.php';
if (isset($_GET['n']) && isset($_GET['n2'])) {

    $id = filter_input(INPUT_GET, "n");
    $shop_id = filter_input(INPUT_GET, "n2");

    $shop_img = ShopItemPics::getInstance();

    if ($shop_img->delete($id)) {
        header("location: ../admin/shop_image?info=del_success&n=". $shop_id);
        exit;
    } else {
        header("location: ../admin/shop_image?info=invalid&n=". $shop_id);
        exit;
    }
} else {
    header("location: ../admin/shop_image?info=invalid&n=". $shop_id);
    exit;
}

