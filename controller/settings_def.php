<?php

include_once '../convig.php';
if (isset($_POST['settings_def'])) {
    $errorMsg = "";
    $info = "";
    $title = filter_input(INPUT_POST, "title");
    $definition = filter_input(INPUT_POST, "definition");

    if (!isset($title)) {
        $errorMsg = "title_empty";
        header("location: ../admin/settings?info=" . $errorMsg);
        exit;
    }
    
    if (!isset($definition)) {
        $errorMsg = "definition_empty";
        header("location: ../admin/settings?info=" . $errorMsg);
        exit;
    }

    $settings = Settings::getInstance();
    if ($settings->add($title, $definition)) {
        header("location: ../admin/settings?info=success");
        exit;
    } else {
        header("location: ../admin/settings?info=" . $errorMsg);
        exit;
    }
}else{
      header("location: ../index");
        exit;
}

