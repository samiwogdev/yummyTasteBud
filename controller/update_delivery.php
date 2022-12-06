<?php
include_once '../convig.php';

if (null == filter_input(INPUT_GET, "n")) {
    header("location: ../admin/delivery?info=invalid");
}

$id = filter_input(INPUT_GET, "n");
if (!is_numeric($id)) {
    header("location: ../admin/menu?info=invalid");
}

$menu = Menu::getInstance();
if (isset($_POST['menu_update'])) {
    $errorMsg = "";
    $name = filter_input(INPUT_POST, "name");
    if (empty($name)) {
        $errorMsg = "name_empty";
        header("location: ../admin/menu?info=" . $errorMsg);
        exit;
    }
    
    if ($menu->update($id, $name)) {
        header("location: ../admin/menu?info=upt_success");
    } else {
        header("location: ../admin/menu?info=" . $errorMsg);
    }
} else {
    header("location: ../admin/menu?info=invalid");
}
?>
