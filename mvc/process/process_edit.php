<!-- 
	User Edit Process
    Create by Taeyoung 2021-12-23
-->
<?php
function userEdit(){
include_once('../db/db.php');
$db = db_open();

$id = $_POST['id'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$mid_Name = $_POST['Middlename'];
$ads = $_POST['Address'];
$ctt = $_POST['Contact'];
$cmt = $_POST['comment'];

$fileName = $_FILES['files']['name'];
$FILE_COUNT = count($fileName);
$filePath = "../uploads";



$querySelectFiles = sprintf(
    'SELECT filename FROM t_file WHERE file_people_id=%d',
    $id
);

$result = mysqli_query($db, $querySelectFiles);

while ($row = mysqli_fetch_array($result)) {
    $del_file = "../uploads/" . $row['filename'];
    
    if ($row['filename'] && is_file($del_file)) {
        unlink($del_file);
    }
}


$queryDeleteUser = sprintf(
    'DELETE FROM t_people WHERE people_id=%d',
    $id
);

que($db, $queryDeleteUser);

$queryInsertUser = sprintf(
    "INSERT INTO t_people
        (first_name, last_name, mid_name, address, contact, comment)
    VALUES 
        ('%s','%s','%s','%s','%s','%s')",
    $firstName,
    $lastName,
    $mid_Name,
    $ads,
    $ctt,
    $cmt
);

que($db, $queryInsertUser);

$querySelectLastId = "SELECT LAST_INSERT_ID() as lastId";
$exceSelectLastId = que($db, $querySelectLastId);
$lastId = mysqli_fetch_array($exceSelectLastId);

if ($fileName[0] != "") {
    for ($Fileindex = 0; $Fileindex < $FILE_COUNT; $Fileindex++) {
        $tmp_Name = $_FILES["files"]["tmp_name"][$Fileindex];
        $name = basename($fileName[$Fileindex]);
        move_uploaded_file($tmp_Name, "$filePath/$name");

        $queryInsertFiles = sprintf(
            "INSERT INTO t_file
                (file_people_id, filename)
            VALUES
                ('%s', '%s')",
            $lastId['lastId'],
            $fileName[$Fileindex]
        );

        que($db, $queryInsertFiles);
    }
}
}
?>