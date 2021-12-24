<!-- 
	edit.php인 회원수정 페이지에서 해당 데이터를 UPDATE 하기 위한 코드입니다.
    create by 엄태영 2021.12.16
-->
<?php
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
    

    $queryUpdateUser = sprintf(
        "UPDATE t_people SET 
            first_name = '%s',
            last_name = '%s',
            mid_name = '%s',
            address = '%s',
            contact = '%s',a
            comment = '%s'
        WHERE people_id ='%d'
        ",
    $firstName, $lastName, $mid_Name, $ads, $ctt, $cmt, $id);

    que($db,$queryUpdateUser);



    $querySelectLastId = "SELECT LAST_INSERT_ID() as lastId";
    $exceSelectLastId = que($db, $querySelectLastId);
    $lastId = mysqli_fetch_array($exceSelectLastId);



    for($i=0; $i<$FILE_COUNT; $i++){

        $tmp_Name = $_FILES["files"]["tmp_name"][$i];
        $name = basename($_FILES["files"]["name"][$i]);
        move_uploaded_file($tmp_Name, "$filePath/$name");
        
        $queryUpdateFiles = sprintf(
            "UPDATE t_file SET
                filename = '%s'
        WHERE file_id = '%d'
            ", $fileName[$i], $id);
        
        que($db, $queryUpdateFiles);

        echo $queryUpdateFiles;
    }
    

?>