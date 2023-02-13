<?php
include_once '../convig.php';
if (!isset($_SESSION['username'])) {
    header("location: signin");
    exit;
}

$menu = Menu::getInstance();
$shop = Shop::getInstance();
$shop_pic = ShopItemPics::getInstance();
$delivery = Delivery::getInstance();
$settings = Settings::getInstance();
$order = Order::getInstance();
$customer = Customer::getInstance();
$user_admin = UserAdmin::getInstance();

?>
﻿<!doctype html>
<html class="no-js " lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
        <title>Yummy:: Taste Buds</title>
        <link type="image/x-icon" href="../images/fav-icon.png" rel="icon">
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
        <link rel="stylesheet" href="assets/plugins/morrisjs/morris.min.css" />
        <link rel="stylesheet" href="assets/css/main.css">
        <link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet">
        <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
        <link href="assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/color_skins.css">
        <link rel="stylesheet" href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="assets/css/fontawesome-free-5.15.3-web/css/all.css">
        <link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet">
        <link type="text/css" href="../css/sweetalert2/sweetalert2.min.css" rel="stylesheet" media="all">
    </head>