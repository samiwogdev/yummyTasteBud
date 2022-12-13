<?php
include_once '../convig.php';

if (null == filter_input(INPUT_GET, "n")) {
    header("location: ../admin/settings?info=invalid");
}

$id = filter_input(INPUT_GET, "n");
if (!is_numeric($id)) {
    header("location: ../admin/settings?info=invalid");
}

$settings = Settings::getInstance();
if (isset($_POST['settings_update'])) {
    $errorMsg = "";
    $def = filter_input(INPUT_POST, "definition");
    if (!isset($def)) {
        $errorMsg = "definition_empty";
        header("location: ../admin/settings?info=" . $errorMsg);
        exit;
    }
    
    if ($settings->update($id, $def)) {
        header("location: ../admin/settings?info=upt_success");
    } else {
        header("location: ../admin/settings?info=" . $errorMsg);
    }
} else {
    header("location: ../index");
}
?>
