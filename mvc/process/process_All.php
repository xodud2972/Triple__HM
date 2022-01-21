<?php
function userDelete(){
	include_once('../db/db.php');
	$db = db_open();

	$id = $_POST['id'];

 	$querySelectFiles = sprintf(
		'SELECT filename FROM t_file WHERE file_people_id=%d',
		$id
	);

	$result = mysqli_query($db, $querySelectFiles);

	while ($row = mysqli_fetch_array($result)) {
		$del_File = "../uploads/" . $row['filename'];
		echo $del_File;
		if ($row['filename'] && is_file($del_File)) {
			unlink($del_File);
		}
	}


	$queryDeleteUser = sprintf(
		'DELETE FROM t_people WHERE people_id=%d',
		$id
	);
	que($db, $queryDeleteUser);


	que_close($db);

}

function userEdit(){
    include_once('../db/db.php');
    $db = db_open();
    
    $id = $_POST['id'];
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $midName = $_POST['midName'];
    $ads = $_POST['ads'];
    $ctt = $_POST['ctt'];
    $cmt = $_POST['cmt'];
    
    $fileName = $_FILES['files']['name'];
    $fileCount = count($fileName);
    $filePath = "../uploads";
    
    $querySelectFiles = sprintf(
        'SELECT filename FROM t_file WHERE file_people_id=%d',
        $id
    );
    
    $result = mysqli_query($db, $querySelectFiles);
    
    while ($row = mysqli_fetch_array($result)) {
        $del_File = "../uploads/" . $row['filename'];
        
        if ($row['filename'] && is_file($del_File)) {
            unlink($del_File);
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
        $midName,
        $ads,
        $ctt,
        $cmt
    );
    
    que($db, $queryInsertUser);
    
    $querySelectLastId = "SELECT LAST_INSERT_ID() as lastId";
    $exceSelectLastId = que($db, $querySelectLastId);
    $lastId = mysqli_fetch_array($exceSelectLastId);
    
    if ($fileName[0] != "") {
        for ($fileIndex = 0; $fileIndex < $fileCount; $fileIndex++) {
            $tmp_Name = $_FILES["files"]["tmp_name"][$fileIndex];
            $name = basename($fileName[$fileIndex]);
            move_uploaded_file($tmp_Name, "$filePath/$name");
    
            $queryInsertFiles = sprintf(
                "INSERT INTO t_file
                    (file_people_id, filename)
                VALUES
                    ('%s', '%s')",
                $lastId['lastId'],
                $fileName[$fileIndex]
            );
            que($db, $queryInsertFiles);
        }
    }
    que_close($db);
    }

function userInsert(){
    include_once('../db/db.php');
    $db = db_open();    

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $midName = $_POST['midName'];
    $ads = $_POST['ads'];
    $ctt = $_POST['ctt'];
    $cmt = $_POST['cmt'];
    $fileName = $_FILES['files']['name'];
    $fileCount = count($fileName);
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
    for($fileIndex=0; $fileIndex <$fileCount; $fileIndex++){
        $tmp_Name = $_FILES["files"]["tmp_name"][$fileIndex];
        $name = basename($fileName[$fileIndex]);
        move_uploaded_file($tmp_Name, "$filePath/$name");
   
        $queryInsertFiles = sprintf(
            "INSERT INTO t_file
                (file_people_id, filename)
            VALUES
                ('%s', '%s')"
            ,$lastId['lastId'] ,$fileName[$fileIndex]);
        
        que($db, $queryInsertFiles);

        echo $queryInsertFiles;
    }
}
que_close($db);
}



switch($_POST["action"]) {
    case "add":
        userInsert();
        break;
    case "edit":
        userEdit();
        break;
    case "del":
        userDelete();
        break;
            
}
?>
