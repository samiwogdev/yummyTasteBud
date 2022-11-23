<?php
include_once '../convig.php';

if (null == filter_input(INPUT_GET, "n")) {
    header("location: ../admin/shop?info=invalid");
}

$id = filter_input(INPUT_GET, "n");
if (!is_numeric($id)) {
    header("location: ../admin/shop?info=invalid");
}

$shop = Shop::getInstance();
if (isset($_POST['shop_update'])) {
    $errorMsg = "";
    $name = filter_input(INPUT_POST, "name");
    $category = filter_input(INPUT_POST, "category");
    $description = filter_input(INPUT_POST, "description");
    $price = filter_input(INPUT_POST, "price");
    $alias = filter_input(INPUT_POST, "alias");
    
    if (empty($name)) {
        $errorMsg = "name_empty";
        header("location: ../admin/shop?info=" . $errorMsg);
        exit;
    }
    if (empty($category)) {
        $errorMsg = "category_empty";
        header("location: ../admin/shop?info=" . $errorMsg);
        exit;
    }
    if (empty($description)) {
        $errorMsg = "description_empty";
        header("location: ../admin/shop?info=" . $errorMsg);
        exit;
    }
    if (empty($price)) {
        $errorMsg = "price_empty";
        header("location: ../admin/shop?info=" . $errorMsg);
        exit;
    }
    if (empty($alias)) {
        $errorMsg = "alias_empty";
        header("location: ../admin/shop?info=" . $errorMsg);
        exit;
    }
    
    if ($shop->update($name, $category, $description, $price, $alias, $id)) {
        header("location: ../admin/shop?info=upt_success");
    } else {
        header("location: ../admin/shop?info=" . $errorMsg);
    }
} else {
    header("location: ../admin/shop?info=invalid");
}
?>
