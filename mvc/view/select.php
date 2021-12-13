<?php
include('header.php');
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
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> 회원관리 탭</a>
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
        <?php
        include('../process/process_select_one.php');
        ?>
        <div class="col-lg-12">
          <h2>회원정보 보기</h2>
          <div class="col-lg-6">
            <form>
              <div class="form-group"><input class="form-control" type="hidden" name="id" value="<?= $id ?>" /> </div>
              <div class="form-group"><input class="form-control" name="firstname" value="<?= $fname ?>" disabled> </div>
              <div class="form-group"><input class="form-control" name="lastname" value="<?= $lname ?>" disabled> </div>
              <div class="form-group"><input class="form-control" name="Middlename" value="<?= $mname ?>" disabled> </div>
              <div class="form-group"><input class="form-control" name="Address" value="<?= $ads ?>" disabled> </div>
              <div class="form-group"><input class="form-control" name="Contact" value="<?= $ctt ?>" disabled> </div>
              <div class="form-group">
                <textarea class="form-control" rows="3" name="comment" disabled><?= $cmt ?></textarea>
              </div>
              <div class="form-group">
                <label for="files" downloads>기존 파일 목록 : <br>
                  <a href="../uploads/<?= $filename ?>" download><?= $filename ?></a><br>
                  <a href="../uploads/<?= $filename2 ?>" download><?= $filename2 ?></a>
              </div>
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