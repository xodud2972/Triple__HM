<!-- 
	User Insert Process
    Create by Taeyoung 2021-12-23
-->
<?php
function userInsert(){
    include_once('../db/db.php');
    $db = db_open();    

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $midName = $_POST['Middlename'];
    $ads = $_POST['Address'];
    $ctt = $_POST['Contact'];
    $cmt = $_POST['comment'];
    $fileName = $_FILES['files']['name'];
    $FILE_COUNT = count($fileName);
    $filePath = "../uploads";


    $queryInsertUser = sprintf(
    "INSERT INTO t_people
        (first_name, last_name, mid_name, address, contact, comment)
    VALUES 
        ('%s','%s','%s','%s','%s','%s')"
    ,$firstName, $lastName, $midName, $ads, $ctt, $cmt);

    que($db, $queryInsertUser);

    $querySelectLastId = "SELECT LAST_INSERT_ID() as lastId";
    $exceSelectLastId = que($db, $querySelectLastId);
    $lastId = mysqli_fetch_array($exceSelectLastId);

if($fileName[0] != ""){
    for($Fileindex=0; $Fileindex <$FILE_COUNT; $Fileindex++){
        $tmp_Name = $_FILES["files"]["tmp_name"][$Fileindex];
        $name = basename($fileName[$Fileindex]);
        move_uploaded_file($tmp_Name, "$filePath/$name");
   
        $queryInsertFiles = sprintf(
            "INSERT INTO t_file
                (file_people_id, filename)
            VALUES
                ('%s', '%s')"
            ,$lastId['lastId'] ,$fileName[$Fileindex]);
        
        que($db, $queryInsertFiles);

        echo $queryInsertFiles;

    }
}
que_close($db);
}
?>