<?php

include_once '../convig.php';

if (!isset($_POST['user'])) {
    header("location: ../admin/user?info=invalid");
    exit;
}

if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['role'])) {
    header("location: ../signup?info=empty&n=" . $shop_id);
    exit;
}
$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");
$role = filter_input(INPUT_POST, "role");

$user_admin = UserAdmin::getInstance();
$username_check = $user_admin->checkUsername($username);
if ($username_check > 0) {
    header("location: ../admin/user?info=exists");
    exit;
}

$user_admin->add($username, $password, $role);
header("location: ../admin/user?info=success");
