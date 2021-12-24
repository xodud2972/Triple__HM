<!-- 
    One User Detail Select
    Edit Page, Select Page process
    Create by Taeyoung 2021-12-23
-->
<?php

include_once('../db/db.php');
$db = db_open();
$id = $_GET['id'];

$querySelectOneUser = sprintf(
    'SELECT people_id, first_name, last_name, mid_name, address, contact, comment, GROUP_CONCAT(filename)  AS filename
                FROM t_people
            LEFT JOIN t_file
                ON t_people.people_id = t_file.file_people_id
            WHERE t_people.people_id = %d
                GROUP BY t_people.people_id
            ORDER BY people_id 
                DESC',
    $id
);

$result = que($db, $querySelectOneUser);
$row = mysqli_fetch_array($result);

$firstName = $row['first_name'];
$lastName = $row['last_name'];
$mid_Name = $row['mid_name'];
$ads = $row['address'];
$ctt = $row['contact'];
$cmt = $row['comment'];

$querySelectOneUserFiles = sprintf(
    ' SELECT filename
            FROM t_file
        LEFT JOIN t_people
            ON t_people.people_id = t_file.file_people_id
        WHERE t_people.people_id = %d'
    ,$id
);
$result2 = que($db, $querySelectOneUserFiles);

while($row2 = mysqli_fetch_array($result2)){
    $filename[] = $row2['filename'];
}
?>