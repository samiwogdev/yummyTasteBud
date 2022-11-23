<?php

include_once '../convig.php';
if (isset($_POST['shop_image'])) {
    $errorMsg = "";
    if (null != filter_input(INPUT_GET, "n")) {
        $shop_id = filter_input(INPUT_GET, "n");
        $photo = "no_pic1";
        try {
            // Check if image was uploaded without errors
            if (isset($_FILES["shop_item_photo"]) && $_FILES["shop_item_photo"]["error"] == 0) {
                $allowedImageType = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "gif" => "image/gif");
                $imageFileName = $_FILES['shop_item_photo']['name'];
                $imageFileType = $_FILES['shop_item_photo']['type'];
                $imageFileSize = $_FILES['shop_item_photo']['size'];

                $imageExtension = pathinfo($imageFileName, PATHINFO_EXTENSION);
                if (!array_key_exists($imageExtension, $allowedImageType))
                    ;
                // Verify MYME type of the file
                if (in_array($imageFileType, $allowedImageType)) {
                    $photo = 'shop_item_image_' . md5(rand()) . '_' . time() . '.' . $imageExtension;
                    move_uploaded_file($_FILES['shop_item_photo']['tmp_name'], "../uploads/shop_item_img/" . $photo);
//            $imageFileName = copy('../uploads/shop_item_img/' . $photo, '../uploads/photos/' . $photo);
                } else {
                    echo 'There was a problem in uploading your file! Please ensure you upload the correct file format.';
                }
            } else {
                echo 'It seems something went wrong in creating new photo, Please check your paramters and check again.';
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        $shop_item_pics = ShopItemPics::getInstance();
        if ($shop_item_pics->add($photo, $shop_id)) {
            header("location: ../admin/shop_image?info=success&n=" . $shop_id);
            exit;
        } else {
            header("location: ../admin/shop_image?info=" . $errorMsg);
            exit;
        }
    }
    header("location: ../admin/shop_image?info=invalid");
    exit;
}


