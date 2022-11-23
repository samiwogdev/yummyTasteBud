
<?php
include_once '../convig.php';
$id = filter_input(INPUT_GET, "n");
$shop = Shop::getInstance();

if ($shop->delete($id)) {
     header("location: ../admin/shop?info=del_success");
     exit;
} else {
     header("location: ../admin/shop?info=invalid");
     exit;
}


