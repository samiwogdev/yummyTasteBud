<?php

include_once '../convig.php';
if (isset($_GET['n'])) {
    $id = filter_input(INPUT_GET, "n");
    $user = UserAdmin::getInstance();

    if ($user->delete($id)) {
        header("location: ../admin/user?info=del_success");
        exit;
    } else {
        header("location: ../admin/user?info=invalid");
        exit;
    }
} else {
    header("location: ../admin/user?info=invalid");
    exit;
}
