<?php

include_once '../convig.php';
if (isset($_POST['menu_def'])) {
    $errorMsg = "";
    $info = "";
    $name = filter_input(INPUT_POST, "name");

    if (!isset($name)) {
        $errorMsg = "name_empty";
        header("location: ../admin/menu?info=" . $errorMsg);
        exit;
    }

    $menu = Menu::getInstance();
    if ($menu->add($name)) {
        header("location: ../admin/menu?info=menu_success");
        exit;
    } else {
        header("location: ../admin/menu?info=" . $errorMsg);
        exit;
    }
}else{
      header("location: ../admin/menu?info=" . $errorMsg);
        exit;  
}

