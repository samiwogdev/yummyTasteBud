<?php

include_once '../convig.php';
if (isset($_POST['shop_def'])) {
    $errorMsg = "";
    $info = "";
    $category = filter_input(INPUT_POST, "category");
    $name = filter_input(INPUT_POST, "name");
    $alias = filter_input(INPUT_POST, "alias");
    $description = filter_input(INPUT_POST, "description");
    $price = filter_input(INPUT_POST, "price");

    if (empty($category)) {
        $errorMsg = "category_empty";
    }
    if (empty($category == 0)) {
        $errorMsg = "category_empty";
    }
    if (empty($name)) {
        $errorMsg = "name_empty";
    }
    if (empty($alias)) {
        $errorMsg = "alias_empty";
    }
    if (empty($alias == 0)) {
        $errorMsg = "alias_empty";
    }
    if (empty($description)) {
        $errorMsg = "description_empty";
    }
    if (empty($price)) {
        $errorMsg = "price_empty";
    }

    $shop = Shop::getInstance();
    if ($shop->add($category, $name, $alias, $description, $price)) {
        header("location: ../admin/shop?info=success");
        exit;
    } else {
        header("location: ../admin/shop?info=" . $errorMsg);
        exit;
    }
}

