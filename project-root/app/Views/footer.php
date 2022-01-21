



	<!-- jQuery -->
	<script src="/bootstrap/vendor/jquery/jquery.min.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="/bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- Metis Menu Plugin JavaScript -->
	<script src="/bootstrap/vendor/metisMenu/metisMenu.min.js"></script>

	<!-- DataTables JavaScript -->
	<script src="/bootstrap/vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="/bootstrap/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
	<script src="/bootstrap/vendor/datatables-responsive/dataTables.responsive.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="/bootstrap/dist/js/sb-admin-2.js"></script>


	<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
	</script>

	<script>
		$("#firstTable").on("click", "#delBtn", function() {
			$(this).closest("tr").remove();
		});

		function addRow() {

			mytable = document.getElementById('firstTable'); //행을 추가할 테이블
			row = mytable.insertRow(mytable.rows.length); //추가할 행


			cell1 = row.insertCell(0); //실제 행 추가 여기서의 숫자는 컬럼 수
			cell2 = row.insertCell(1);
			cell3 = row.insertCell(2);
			cell4 = row.insertCell(3);
			cell5 = row.insertCell(4);

			cell1.innerHTML = '<td><input type="text" id="time" name="time" size="15" style="width:100%; border: 0; text-align:center;"></td>'; //추가한 행에 원하는  요소추가
			cell2.innerHTML = '<td style="text-align:center"> <select class="form-select" aria-label="Default select example"><option selected>업무구분</option><option value="1">광고주 관리</option><option value="2">세일즈 준비</option><option value="3">컨택</option><option value="4">가망</option><option value="5">인입</option><option value="6">이탈</option><option value="7">기타</option></select></td>';
			cell3.innerHTML = '<td style="text-align:center"><input type="text" id="adName" name="adName" size="15" style="width:100%; border: 0;"></td>';
			cell4.innerHTML = '<td style="text-align:center"><input type="text" id="content" name="content" size="15" style="width:100%; border: 0; text-align:center;"></td>';
			cell5.innerHTML = '<td style="text-align:center"> <button class="btn btn-info" id="delBtn" name="delBtn">삭제</button></td>';
		}

		$("#saveBtn").on("click", function() {
			alert('저장 버튼');
			location.reload();
		});
		$("#insertBtn").on("click", function() {
			alert('가망 광고주 등록 버튼');
			location.reload();
		});
	</script>

</body>

</html>