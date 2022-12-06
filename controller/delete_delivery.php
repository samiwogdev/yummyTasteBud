<?php

include_once '../convig.php';
if (isset($_GET['n'])) {
    $id = filter_input(INPUT_GET, "n");
    $deliver = Delivery::getInstance();

    if ($deliver->delete($id)) {
        header("location: ../admin/delivery?info=del_success");
        exit;
    } else {
        header("location: ../admin/delivery?info=invalid");
        exit;
    }
} else {
    header("location: ../admin/delivery?info=invalid");
    exit;
}
