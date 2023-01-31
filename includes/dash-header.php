<?php
include_once '../convig.php';
if (!isset($_SESSION['email'])) {
    header("location: ../");
    exit;
}

//$pmtlog = PmtLog::getInstance();
//$cus_assets_repo = CusAssetsRepo::getInstance();
//$assets = Assets::getInstance();
//$app = Applicant::getInstance();
$menu = Menu::getInstance();
$shop = Shop::getInstance();
$shop_pic = ShopItemPics::getInstance();
$delivery = Delivery::getInstance();
$settings = Settings::getInstance();
$order = Order::getInstance();
?>
﻿<!doctype html>
<html class="no-js " lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
        <title>Yummy:: Taste Buds</title>
        <link rel="icon" href="../assets/images/crown-logo.png" type="image/x-icon"> <!-- Favicon-->
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
        <link href="../css/sweetalert2/sweetalert2.min.css" rel="stylesheet">
    </head>