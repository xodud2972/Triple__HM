<?php
include('../db/db.php');
include('header.php');
include('../process/process_select_one.php')
?>
<html>
<body>
  <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Taeyoung PHP&MySQL</a>
      </div>
      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li class="active">
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>회원관리 탭</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </nav>
    <div id="page-wrapper">
      <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
              회원관리
            </h1>
          </div>
        </div>
        <!-- /.row -->
        <div class="col-lg-12">
          <h2 class="title_h2">회원정보 수정</h2>
          <div class="col-lg-6">
            <form id="form1" method="post" action="../process/process_edit.php" enctype="multipart/form-data" class="table_write">
              <div class="form-group"><input class="form-control" type="hidden" name="id" value="<?= $id ?>" /></div>
              <div class="form-group"><input class="form-control" name="firstname" value="<?= $fname ?>"></div>
              <div class="form-group"><input class="form-control" name="lastname" value="<?= $lname ?>"></div>
              <div class="form-group"><input class="form-control" name="Middlename" value="<?= $mname ?>"></div>
              <div class="form-group"><input class="form-control" name="Address" value="<?= $ads ?>"></div>
              <div class="form-group"><input class="form-control" name="Contact" value="<?= $ctt ?>"></div>
              <div class="form-group">
                <textarea class="form-control" rows="3" name="comment"><?= $cmt ?></textarea>
              </div>
              <div class="form-group">
                <label downloads>기존 파일 목록 : <br>
                  <a href="../uploads/<?= $filename ?>" download><?= $filename ?></a><br>
                  <a href="../uploads/<?= $filename2 ?>" download><?= $filename2 ?></a> <br><br>
              </div>
              <div class="form-group" id="attachFileDiv">
                <input type="file" name="files[]" value="" size="40" />
                <input type="button" value="파일추가" onclick="attachFile.add()" style="margin-left:5px" />
              </div>
              <button class="btn btn-default" type="button" onclick="clkBtn();">전송</button>
              <!-- <input class="btn btn-default" type="submit" id="submit"></input> -->
            </form>
            <a class="btn btn-default" type="button" href="../view/index.php"> 목록으로 돌아가기 </a>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
  </div>
  <!-- /#wrapper -->
  <script type="text/javascript">
    // 버튼 클릭 시 실행
    function clkBtn() {
      // Get form
      var form = $('#form1')[0];
      // Create an FormData object 
      var data = new FormData(form);
      $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '../process/process_edit.php', // form을 전송할 실제 파일경로
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function(data) {
          // 전송 후 성공 시 실행 코드
          console.log(data);
          location="../view/index.php"
        },
        error: function(e) {
          // 전송 후 에러 발생 시 실행 코드
          console.log("ERROR : ", e);
        }
      });
    }
  </script>
  <!-- jQuery -->
  <script src="js/jquery.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Morris Charts JavaScript -->
  <script src="js/plugins/morris/raphael.min.js"></script>
  <script src="js/plugins/morris/morris.min.js"></script>
  <script src="js/plugins/morris/morris-data.js"></script>
</body>

</html>
<script src="/mvc/view/js/taeyoung.js"></script>