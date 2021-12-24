<!-- 
	Index Page Process + Pagination Code
    Create by Taeyoung 2021-12-23
-->
<?php
include_once('../db/db.php');

function SelectAllUser(){
	$db = db_open();

	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	} else {
		$page = 1; 
	}
                   
	$list = 10;                                                   
	$page_start = ($page - 1) * $list;  


	$querySelectAllUser = sprintf('SELECT people_id, first_name, last_name, mid_name, address, contact, comment,  COUNT(filename)  AS filename
						FROM t_people
							LEFT JOIN t_file
						ON t_people.people_id = t_file.file_people_id
							GROUP BY t_people.people_id
						ORDER BY people_id 
							DESC LIMIT %s, %s ',
						$page_start, $list);


	$result = que($db, $querySelectAllUser);

	while ($row = mysqli_fetch_array($result)) {
		$tempData["firstName"] = $row['first_name'];
		$tempData["lastName"] = $row['last_name'];
		$tempData["midName"] = $row['mid_name'];
		$tempData["add"] = $row['address'];
		$tempData["ctt"] = $row['contact'];
		$tempData["cmt"] = $row['comment'];
		$tempData["id"] = $row['people_id'];
		$tempData["filename"] = $row['filename'];

		$resultData[] = $tempData;
	}

	return $resultData;
}
?>

<script>
	//AJAX
	function clkBtn() {
		var form = $('#form1')[0];
		var data = new FormData(form);
		$.ajax({
			type: "POST",
			enctype: 'multipart/form-data',
			url: '../process/process_del.php', // form을 전송할 실제 파일경로
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			timeout: 600000,
			success: function(data) {
				// 전송 후 성공 시 실행 코드
				console.log(data);
				location.href = '../mvc/view/index.php';
			},
			error: function(e) {
				// 전송 후 에러 발생 시 실행 코드
				console.log("ERROR : ", e);
			}
		});
	}
</script>