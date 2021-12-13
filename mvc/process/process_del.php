<?php
include_once('../db/db.php');

$sql = '
	SELECT * FROM people WHERE people_id=' . $_GET['id'];

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$del_file = "../uploads/" . $row['file'];
$del_file2 = "../uploads/" . $row['file2'];

if ($row['file'] && is_file($del_file)) {
	unlink($del_file);
}
if ($row['file2'] && is_file($del_file2)) {
	unlink($del_file2);
}

$sqldel = '
	DELETE FROM people WHERE people_id=' . $_GET['id'];

mysqli_query($conn, $sqldel) or die(mysqli_error($conn));


$query = 'DELETE FROM people 
	WHERE 
		people_id = ' . $_GET['id'];
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

?>

<script type="text/javascript">
	window.location = "../view/index.php";
</script>