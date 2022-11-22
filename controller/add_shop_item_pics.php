
<?php

include_once '../convig.php';
if (isset($_POST['menu_def'])) {
    $errorMsg = "";
    $info = "";
    $name = filter_input(INPUT_POST, "name");

    if (empty($name)) {
        $errorMsg = "name_empty";
    }

    $menu = Menu::getInstance();
    if ($menu->add($name)) {
        header("location: ../admin/menu?info=success");
        exit;
    } else {
        header("location: ../admin/menu?info=" . $errorMsg);
        exit;
    }
}



