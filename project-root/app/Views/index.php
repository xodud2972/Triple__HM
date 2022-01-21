<body>
	<div id="wrapper">
		<div id="wrapper">
			<div class="row">
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Home -> Work Desk -> 일일업무일지
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<!-- 관리자 코멘트 테이블 -->
						<h3>관리자 코멘트</h3>
								<table  width="100%" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th style="text-align:center">관리자명</th>
											<th style="text-align:center">내용</th>
										</tr>
									</thead>
									<tbody>
											<tr>
												<td>김민주 CM님</td>
												<td>이제 이건 태영이가 해봅시다~</td>
											</tr>
											<tr>
												<td>신현준 PM님</td>
												<td>모르는거 있으면 물어보세요~</td>
											</tr>
											<tr>
												<td>유정민 PM님</td>
												<td>오늘 점심 뭐 먹어요~?</td>
											</tr>
									</tbody>
								</table>

							<!-- 일일 업무일지 테이블 -->
							<table width="100%" class="table  table-bordered table-hover" id="firstTable">
								<button id="insertBtn" class="btn btn-info">가망 광고주 등록</button>
								<h3>일일 업무일지</h3>
								<thead>
									<tr>
										<th style="text-align:center">시간</th>
										<th style="text-align:center">업무구분</th>
										<th style="text-align:center">광고주명</th>
										<th style="text-align:center">내용 / 소요시간 (내용과 소요시간 사이에 '/를 꼭 입력해주세요)</th>
										<th style="text-align:center">삭제</th>
									</tr>
								</thead>
								<tbody>
										<tr>
											<td style="text-align:center">
												<input type="text" value="09:45" id="time" name="time" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<select class="form-select" aria-label="Default select example">
													<option value="1">광고주 관리</option>
												</select>
											</td>
											<td style="text-align:center">
												<input type="text" id="adName" name="adName" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<input type="text" value="광고주 DB수집 / 30분" id="content" name="content" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<button class="btn btn-info" id="delBtn" name="delBtn">삭제</button>
											</td>
										</tr>

										<tr>
											<td style="text-align:center">
												<input type="text" value="09:50" id="time" name="time" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<select class="form-select" aria-label="Default select example">
													<option value="5">인입</option>
												</select>
											</td>
											<td style="text-align:center">
												<input type="text" value="신세계" id="adName" name="adName" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<input type="text" value="11번가 매체 확장 제안 / 30분" id="content" name="content" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<button class="btn btn-info" id="delBtn" name="delBtn">삭제</button>
											</td>
										</tr>

										<tr>
											<td style="text-align:center">
												<input type="text" value="10:15" id="time" name="time" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<select class="form-select" aria-label="Default select example">
													<option value="5">가망</option>
												</select>
											</td>
											<td style="text-align:center">
												<input type="text" value="(가망)퍼플오션" id="adName" name="adName" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<input type="text" value="영업컨택 / 30분" id="content" name="content" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<button class="btn btn-info" id="delBtn" name="delBtn">삭제</button>
											</td>
										</tr>
									<?php for ($idx = 0; $idx < 7; $idx++) { ?>
										<tr>
											<td style="text-align:center">
												<input type="text" id="time" name="time" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<select class="form-select" aria-label="Default select example">
													<option selected>업무구분</option>
													<option value="1">광고주 관리</option>
													<option value="2">세일즈 준비</option>
													<option value="3">컨택</option>
													<option value="4">가망</option>
													<option value="5">인입</option>
													<option value="6">이탈</option>
													<option value="7">기타</option>
												</select>
											</td>
											<td style="text-align:center">
												<input type="text" id="adName" name="adName" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<input type="text" id="content" name="content" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<button class="btn btn-info" id="delBtn" name="delBtn">삭제</button>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
							<!-- /.table-responsive -->

							<!-- 행 추가 버튼 -->
							<div style="text-align:center; margin-bottom: 20px;">
								<button id="trAddBtn" class="fa fa-plus" style="height: 30px; width: 30px;" onclick="addRow();"></button>
							</div>

							<!-- 저장 버튼 -->
							<div style="text-align:center">
								<button id="saveBtn" class="btn btn-info">저장</button>
							</div>
						</div>
						<!-- /.panel-body -->
						<div class="well" style="background-color: white;">
						<!-- 이전 업무일지 테이블 -->
							<table width="100%" class="table  table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th style="text-align:center">일자</th>
										<th style="text-align:center">업무일지 건수(광고주 관리, 세일즈 준비, 컨택, 가망, 인입, 이탈, 기타)</th>
									</tr>
								</thead>
								<tbody>
									<?php for ($idx = 0; $idx < 100; $idx++) { ?>
										<tr>
											<td align="center">2021.07.15</td>
											<td align="center">총 <?= $idx ?>건 (3/4/2/1/2/2/2)</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->