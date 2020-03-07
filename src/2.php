<?php
// print_r($_FILES);
include 'UpHelper.php';
include 'config.php';
$uphelper = new UpHelper();
$uphelper->save_upload_file();
$src_path = $uphelper->get_destination();

include '3.php';
include 'shuchu.php';
?>
