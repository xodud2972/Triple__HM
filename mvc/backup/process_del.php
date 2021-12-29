<!-- 
	User Delete Process
    Create by Taeyoung 2021-12-23
-->
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
		$del_file = "../uploads/" . $row['filename'];
		echo $del_file;
		if ($row['filename'] && is_file($del_file)) {
			unlink($del_file);
		}
	}


	$queryDeleteUser = sprintf(
		'DELETE FROM t_people WHERE people_id=%d',
		$id
	);
	que($db, $queryDeleteUser);


	que_close($db);

}

?>
