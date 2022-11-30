<?php
if (NULL == filter_input(INPUT_GET, "n")) {
    header("location: ../shop-details?info=invalid");
    exit;
}

$shop_id = filter_input(INPUT_GET, "n");
if (!isset($_SESSION['email'])) {
    header("location: ../signin?n=".$shop_id );
    exit;
}





