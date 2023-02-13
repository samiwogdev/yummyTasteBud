<?php
include_once '../convig.php';

if (null == filter_input(INPUT_GET, "n")) {
    header("location: ../checkout?info=invalid");
}

$delivery_id = filter_input(INPUT_GET, "n");
if (!is_numeric($delivery_id)) {
        header("location: ../checkout?info=invalid");
}

if(isset($_POST['delivey_def'])){
    $phone = filter_input(INPUT_POST, "phone");
    $address = filter_input(INPUT_POST, "address");

    if (!isset($phone)) {
        $errorMsg = "phone_empty";
        header("location: ../checkout?info=" . $errorMsg);
        exit;
    }
    if (!isset($address)) {
        $errorMsg = "address_empty";
        header("location: ../checkout?info=" . $errorMsg);
        exit;
    }
    
    $customer = Customer::getInstance();
    if($customer->checkPhone($phone) == '1'){
     header("location: ../checkout?info=phoneExist&n=$delivery_id");
     exit;
    }
    if ($customer->updateByEmail($phone, $_SESSION['email'], $address)) {
        header("location: ../checkout?info=del_upt_success&n=$delivery_id");
    } else {
        header("location: ../checkout?info=failed");
    }
} else {
    header("location: ../index");
}
?>
