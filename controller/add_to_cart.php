<?php

if (!isset($_SESSION['email'])) {
    header("location: ../signin");
    exit;
}

if (NULL == filter_input(INPUT_GET, "n")) {
    header("location: ../shop-details?info=invalid");
    exit;
}
$shop_id = filter_input(INPUT_GET, "n");

