<?php
include_once '../convig.php';

echo 'yes'; exit;
if (null == filter_input(INPUT_GET, "n")) {
    header("location: ../checkout?info=invalid");
}

$delivery_id = filter_input(INPUT_GET, "n");
if (!is_numeric($id)) {
    header("location: ../admin/delivery?info=invalid");
}

$deliver = Delivery::getInstance();

    $city = filter_input(INPUT_POST, "city");
    $phone = filter_input(INPUT_POST, "phone");
    $address = filter_input(INPUT_POST, "address");
    
    
    if (!isset($city)) {
        $errorMsg = "city_empty";
        header("location: ../checkout?info=" . $errorMsg);
        exit;
    }
    
    if (!isset($city)) {
        $errorMsg = "city_empty";
        header("location: ../admin/delivery?info=" . $errorMsg);
        exit;
    }
    if (!isset($amount)) {
        $errorMsg = "amount_empty";
        header("location: ../admin/deliverys?info=" . $errorMsg);
        exit;
    }
    
    if ($deliver->update($id, $city, $amount)) {
        header("location: ../admin/delivery?info=upt_success");
    } else {
        header("location: ../admin/delivery?info=" . $errorMsg);
    }
} else {
    header("location: ../admin/delivery?info=invalid");
}
?>
