<?php

include_once '../convig.php';
if (NULL == filter_input(INPUT_GET, "n")) {
    header("location: ../");
    exit;
}
if (NULL == filter_input(INPUT_GET, "n2")) {
    header("location: ../");
    exit;
}

$shop_status = filter_input(INPUT_GET, "n");
if($shop_status == 1){
    $shop_status = 0;
}else{
    $shop_status = 1;
}
$shop_id = filter_input(INPUT_GET, "n2");

$shop = Shop::getInstance();

if ($shop->updateStatusbyID($shop_id, $shop_status)) {
    header("location: ../admin/shop?info=status_updt");
    exit;
} else {
        header("location: ../admin/shop?info=failed");
    exit;
}





