<?php
include_once('../process/process_del.php');
include_once('../process/process_edit.php');
include_once('../process/process_insert.php');
include_once('../process/process_select_all.php');
include_once('../process/process_select_one.php');

switch($_POST["action"]) {
    case "add":
        userInsert();
        break;
    case "edit":
        userEdit();
        break;    
}
?>
