<?php 

$files=$_FILES["file"];
$post_name = $_POST['name'];

function store_image($files, $post_name) {
$conn = mysqli_connect('localhost', 'root', 'dkssud22@@', 'peopledb') or die (mysqli_connect_error($conn));
 $count=count($files["name"]);


 for ($i = 0; $i < $count; $i++) {
    $saveName = time(). $_FILES["file"]["name"][$i];
    
    $sql = "insert into file_list (upload_filename, db_filename) values('$post_name', '$saveName')";
    $res = mysqli_query($conn, $sql);
    move_uploaded_file($_FILES["file"]["tmp_name"][$i], "upload/". $saveName );

 }
}
