<?php

require('autoloader.php');
$auth = new Auth();
if (isset(($_POST['id']))) {
    $id = $_POST['id'];
    $tableName = $_POST['tableName'];
    $column_id = $_POST['column_id'];
    $column_name = $_POST['column_name'];
    $newdata = $_POST['newData'];


    try {
        $auth->updateSpecific($tableName, $column_name, $column_id, $id, $newdata);
    } catch (Exception $e) {
    }
}
