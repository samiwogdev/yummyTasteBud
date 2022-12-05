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

    if (!isset($category)) {
        $errorMsg = "empty";
        header("location: ../admin/shop?info=" . $errorMsg);
        exit;
    }
    if (($category == 0)) {
        $errorMsg = "empty";
        header("location: ../admin/shop?info=" . $errorMsg);
        exit;
    }
    if (!isset($name)) {
        $errorMsg = "empty";
        header("location: ../admin/shop?info=" . $errorMsg);
        exit;
    }
    if (!isset($alias)) {
        $errorMsg = "empty";
        header("location: ../admin/shop?info=" . $errorMsg);
        exit;
    }
    if ($alias == 0) {
        $errorMsg = "empty";
        header("location: ../admin/shop?info=" . $errorMsg);
        exit;
    }
    if (!isset($description)) {
        $errorMsg = "empty";
        header("location: ../admin/shop?info=" . $errorMsg);
        exit;
    }
    if (!isset($price)) {
        $errorMsg = "empty";
        header("location: ../admin/shop?info=" . $errorMsg);
        exit;
    }

    $shop = Shop::getInstance();
    if ($shop->add($category, $name, $alias, $description, $price)) {
        header("location: ../admin/shop?info=success");
        exit;
    } else {
        header("location: ../admin/shop?info=" . $errorMsg);
        exit;
    }
}else{
     header("location: ../admin/shop?info=" . $errorMsg);
        exit;
}

