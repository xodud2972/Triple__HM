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
              <div class="form-group"><input class="form-control" name="firstname" value="<?= $firstName ?>" id="firstname"></div>
              <div class="form-group"><input class="form-control" name="lastname" value="<?= $lastName ?>" id="lastname"></div>
              <div class="form-group"><input class="form-control" name="Middlename" value="<?= $mid_Name ?>" id="Middlename"></div>
              <div class="form-group"><input class="form-control" name="Address" value="<?= $ads ?>" id="Address"></div>
              <div class="form-group"><input class="form-control" name="Contact" value="<?= $ctt ?>" id="Contact"></div>
              <div class="form-group">
                <textarea class="form-control" rows="3" name="comment" id="comment"><?= $cmt ?></textarea>
              </div>
              <div class="form-group">
                <label downloads>기존 파일 목록 : <br>
                  <?
                  if (isset($filename)) {
                    for ($index = 0; $index < sizeof($filename); $index++) {
                  ?>
                      <div id="btnDivId<?= $index ?>">
                        <a href="../uploads/<?= $filename[$index] ?>" download><?= $filename[$index] ?></a>
                        <a href="../process/process_del_filelist.php?&id=<?=$id?>?&file_id=<?=$file_id[$index]?>">
                          <input type="button" id="button<?= $index ?>" value="X" style="color:red;"></input>
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
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script>
    /**
    @return BtnEdit()
    create by 엄태영 2021.12.23
**/
    $("#editAjax").click(function() {
      if ($("#firstname").val().length == 0) {
        alert("이름을 입력하세요.");
        $("#firstname").focus();
        return false;
      }
      if ($("#lastname").val().length == 0) {
        alert("별명을 입력하세요.");
        $("#lastname").focus();
        return false;
      }
      if ($("#Middlename").val().length == 0) {
        alert("성을 입력하세요.");
        $("#Middlename").focus();
        return false;
      }
      if ($("#Address").val().length == 0) {
        alert("주소를 입력하세요.");
        $("#Address").focus();
        return false;
      }
      if ($("#Contact").val().length == 0) {
        alert("연락처를 입력하세요.");
        $("#Contact").focus();
        return false;
      }
      if ($("#comment").val().length == 0) {
        alert("소개를 입력하세요.");
        $("#comment").focus();
        return false;
      } else {

        // AJAX
        function BtnEdit() {
          var form = $('#form1')[0];
          var data = new FormData(form);
          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: '../process/process_All.php', // form을 전송할 실제 파일경로
            data: data,
            processData: false,
            contentType: false,
            cache: false,
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

        return BtnEdit();
      }
    });
    
  </script>
</body>

</html>