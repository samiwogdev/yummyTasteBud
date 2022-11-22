<?php
include_once '../convig.php';
if (isset($_POST['menu_def'])) {
    $errorMsg = "";
    $info = "";
    if (null != filter_input(INPUT_GET, "n")) {
        $shop_id = filter_input(INPUT_GET, "n");
        $photo = "no_pic1";
        
        
        
        
        

        $menu = Menu::getInstance();
        if ($menu->add($name)) {
            header("location: ../admin/menu?info=success");
            exit;
        } else {
            header("location: ../admin/menu?info=" . $errorMsg);
            exit;
        }
    }
}



