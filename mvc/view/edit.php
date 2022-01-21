<!-- 
  User Edit Page.
  create by 엄태영 2021.12.16
 -->
<?php
include('../db/db.php');
db_open();
include('../include/header.php');
include('../process/process_select_one.php');
?>

<body>
  <div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Taeyoung PHP&MySQL</a>
      </div>
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li class="active">
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>회원관리 탭</a>
          </li>
        </ul>
      </div>
    </nav>
    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
              회원관리
            </h1>
          </div>
        </div>
        <div class="col-lg-12">
          <h2 class="title_h2">회원정보 수정</h2>
          <div class="col-lg-6">

            <form id="form1" method="post" class="table_write">
              <input type="hidden" value="edit" name="action" class="validation-form">
              <div class="form-group"><input class="form-control" name="id" value="<?= $id ?>" type="hidden" /></div>
              <div class="form-group"><input class="form-control" name="firstName" value="<?= $firstName ?>" id="firstName"></div>
              <div class="form-group"><input class="form-control" name="lastName" value="<?= $lastName ?>" id="lastName"></div>
              <div class="form-group"><input class="form-control" name="midName" value="<?= $midName ?>" id="midName"></div>
              <div class="form-group"><input class="form-control" name="ads" value="<?= $ads ?>" id="ads"></div>
              <div class="form-group"><input class="form-control" name="ctt" value="<?= $ctt ?>" id="ctt"></div>
              <div class="form-group">
                <textarea class="form-control" rows="3" name="cmt" id="cmt"><?= $cmt ?></textarea>
              </div>
              <div class="form-group">
                <label downloads>기존 파일 목록 : <br>
                  <?
                  if (isset($fileName)) {
                    for ($fileIndex = 0; $fileIndex < sizeof($fileName); $fileIndex++) {
                  ?>
                      <div id="btnDivId<?= $fileIndex ?>">
                        <a href="../uploads/<?= $fileName[$fileIndex] ?>" download><?= $fileName[$fileIndex] ?></a>
                        <a href="../process/process_del_filelist.php?&id=<?=$id?>?&file_id=<?=$fileId[$fileIndex]?>">
                          <input type="button" id="button<?= $fileIndex ?>" value="X" style="color:red;"></input>
                        </a>
                        <br>
                      </div>

                  <?
                    }
                  } else {
                    echo '업로드 된 파일이 없습니다.';
                  }
                  ?>
              </div>
              <div class="form-group" id="attachFileDiv">
                <input type="file" name="files[]" value="" size="40" multiple />
              </div>
              <button id="editAjax" class="btn btn-default" type="button">전송</button>
            </form>

            <a class="btn btn-default" type="button" href="../view/index.php"> 목록으로 돌아가기 </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script>
    $("#editAjax").click(function() {
      if ($("#firstName").val().length == 0) {
        alert("이름을 입력하세요.");
        $("#firstName").focus();
        return false;
      }
      if ($("#lastName").val().length == 0) {
        alert("별명을 입력하세요.");
        $("#lastName").focus();
        return false;
      }
      if ($("#midName").val().length == 0) {
        alert("성을 입력하세요.");
        $("#midName").focus();
        return false;
      }
      if ($("#ads").val().length == 0) {
        alert("주소를 입력하세요.");
        $("#ads").focus();
        return false;
      }
      if ($("#ctt").val().length == 0) {
        alert("연락처를 입력하세요.");
        $("#ctt").focus();
        return false;
      }
      if ($("#cmt").val().length == 0) {
        alert("소개를 입력하세요.");
        $("#cmt").focus();
        return false;
      } else {
        function btnEdit() {
          var form = $('#form1')[0];
          var data = new FormData(form);
          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: '../process/process_All.php',
            data: data,
            processData: false,
            contentType: false,
            timeout: 600000,
            success: function(data) {
              console.log(data);
              location = "../view/index.php";
              alert('수정이 완료되었습니다.');
            },
            error: function(e) {
              console.log("ERROR : ", e);
            }
          });
        }
        return btnEdit();
      }
    });
  </script>
</html>