
<?php
include_once('../db/db.php');    

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
    $tmp_name = $_FILES["files"]["tmp_name"][$i];
    $tmp_name2 = $_FILES["files2"]["tmp_name"][$i];
    $name = basename($_FILES["files"]["name"][$i]);
    $name2 = basename($_FILES["files2"]["name"][$i]);
    move_uploaded_file($tmp_name, "$filepath/$name");
    move_uploaded_file($tmp_name2, "$filepath/$name2");
}
    $query = "INSERT INTO people
            (first_name, last_name, mid_name, address, contact, comment, file, file2)
            VALUES ('" . $fname . "','" . $lname . "','" . $mname . "','" . $ads . "','" . $ctt . "','" . $cmt . "', '$filename[0]', '$filename2[0]')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));

?>





