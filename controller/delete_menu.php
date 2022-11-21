<?php
include_once '../convig.php';
$id = filter_input(INPUT_GET, "n");
$menu = Menu::getInstance();

if ($menu->delete($id)) {
     header("location: ../admin/menu?info=del_success");
} else {
     header("location: ../admin/menu?info=invalid");
}
