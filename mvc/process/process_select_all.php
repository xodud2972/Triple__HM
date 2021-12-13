<?php
include('../db/db.php');
$query = 'SELECT people_id, first_name, last_name, mid_name, address, contact, comment, file, file2 FROM people';
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result)) {
	echo '<tr>';
	echo '<td>' . $row['first_name'] . '</td>';
	echo '<td>' . $row['last_name'] . '</td>';
	echo '<td>' . $row['mid_name'] . '</td>';
	echo '<td>' . $row['address'] . '</td>';
	echo '<td>' . $row['contact'] . '</td>';
	echo '<td>' . $row['comment'] . '</td>';
	echo '<td><a href="../uploads/' . $row['file'] . '" download>' . $row['file'] . '</a></td>';
	echo '<td><a href="../uploads/' . $row['file2'] . '" download>' . $row['file2'] . '</a></td>';
	echo '<td><a class="btn btn-xs btn-info" type="button" href="../view/select.php?&id=' . $row['people_id'] . '" > 자세히 보기 </a>  ,';
	echo '<a class="btn btn-xs btn-warning" type="button" href="../view/edit.php?&id=' . $row['people_id'] . '"> 수정하기 </a>   ,';
	echo '<a class="btn btn-xs btn-danger" type="button" href="../process/process_del.php?&id=' . $row['people_id'] . '" onclick="button_event(); clkBtn();">삭제하기</a> </td>';
	echo '</tr>';
}
?>
<script>
	function button_event() {
		if (confirm("정말 삭제하시겠습니까??") == true) { //확인
			document.form.submit();
		} else { //취소
			return;
		}
	}
	function clkBtn() {
		// Get form
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
			},
			error: function(e) {
				// 전송 후 에러 발생 시 실행 코드
				console.log("ERROR : ", e);
			}
		});
	}
</script>