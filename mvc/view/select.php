<!-- 
  User Select Detail Page.
  create by 엄태영 2021.12.16
 -->
<?php
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
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> 회원관리 탭</a>
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
          <h2>회원정보 보기</h2>
          <div class="col-lg-6">
            <form>
              <div class="form-group"> <input class="form-control"  value="<?= $id ?>" type="hidden" /> </div>
              <div class="form-group"> <input class="form-control" value="<?= $firstName ?>" disabled> </div>
              <div class="form-group"> <input class="form-control" value="<?= $lastName ?>" disabled> </div>
              <div class="form-group"> <input class="form-control" value="<?= $midName ?>" disabled> </div>
              <div class="form-group"> <input class="form-control" value="<?= $ads ?>" disabled> </div>
              <div class="form-group"> <input class="form-control" value="<?= $ctt ?>" disabled> </div>
              <div class="form-group">  <textarea class="form-control" rows="3" disabled><?= $cmt ?></textarea> </div>
              <div class="form-group">
                <label for="files" downloads>기존 파일 목록 : <br>
                  <?
                  if(isset($fileName)){
                    for ($fileIndex = 0; $fileIndex < sizeof($fileName); $fileIndex++) {
                  ?>
                      <a href="../uploads/<?= $fileName[$fileIndex] ?>" download><?= $fileName[$fileIndex] ?></a><br>
                  <?
                  }
                  }else{
                    echo '업로드 된 파일이 없습니다.';
                  }
                  ?>
              </div>
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
</html>