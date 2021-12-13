<?php

use function PHPSTORM_META\type;

include_once('../db/db.php');           

    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $mname = $_POST['Middlename'];
    $ads = $_POST['Address'];
    $ctt = $_POST['Contact'];
    $cmt = $_POST['comment'];	

    $filename = $_FILES['files']['name'];
    $filename2 = $_FILES['files2']['name'];
    $count = count($filename);
    $filepath = "../uploads";

for($i=0; $i<$count; $i++){
    $filenames = $_FILES['files']['name'][$i];

    $tmp_name = $_FILES["files"]["tmp_name"][$i];
    $tmp_name2 = $_FILES["files2"]["tmp_name"][$i];

    $name = basename($_FILES["files"]["name"][$i]);
    $name2 = basename($_FILES["files2"]["name"][$i]);

    move_uploaded_file($tmp_name, "$filepath/$name");
    move_uploaded_file($tmp_name2, "$filepath/$name2");

    $query = "UPDATE people SET 
    first_name = '".$fname."',
    last_name = '".$lname."',
    mid_name = '".$mname."',
    address = '".$ads."',
    contact = '".$ctt."',
    comment = '".$cmt."',
    file = '".$filename[0]."',
    file2 = '".$filename2[0]."'
        WHERE people_id ='".$id."'
    ";

    mysqli_query($conn,$query) or die(mysqli_error($conn));
}