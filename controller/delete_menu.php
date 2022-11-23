<?php

include_once '../convig.php';
if (isset($_GET['n'])) {
    $id = filter_input(INPUT_GET, "n");
    $menu = Menu::getInstance();

    if ($menu->delete($id)) {
        header("location: ../admin/menu?info=del_success");
        exit;
    } else {
        header("location: ../admin/menu?info=invalid");
        exit;
    }
} else {
    header("location: ../admin/menu?info=invalid");
    exit;
}
