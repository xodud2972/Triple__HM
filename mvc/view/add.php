<?php
include('../view/header.php')
?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>
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
                <a class="navbar-brand" href="index.php">CRUD Using PHP/MySQL</a>
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
                            회원추가하기
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-12">
                    <h2 class="title_h2">새 회원추가</h2>
                    <div class="col-lg-6">
                        <form id="form1" role="form" method="post" action="../process/process_insert.php" enctype='multipart/form-data' class="table_write">
                            <input type="hidden" value="add" name="action" class="validation-form">
                            <div class="form-group"><input class="form-control" placeholder="이름 : ex) 길동" name="firstname" id="firstname"></div>
                            <div class="form-group"><input class="form-control" placeholder="별명 : ex) 좀도둑" name="lastname" id="lastname"></div>
                            <div class="form-group"><input class="form-control" placeholder="성 : ex) 홍" name="Middlename" id="Middlename"></div>
                            <div class="form-group"><input class="form-control" placeholder="주소 : ex) 조선" name="Address" id="Address"></div>
                            <div class="form-group"><input class="form-control" placeholder="연락처 : ex) 010-1234-5678" name="Contact" id="Contact"></div>
                            <div class="form-group">
                                <label>소개</label>
                                <textarea class="form-control" rows="3" name="comment" id="comment"></textarea>
                            </div>
                            <div class="form-group" id="attachFileDiv">
                                <span style="color: red;">※파일은 최대 2개까지만 첨부 가능합니다※</span>
                                <input type="file" name="files[]" value="" size="40" />
                                <input id="fileField" type="button" value="파일추가" onclick="attachFile.add()" style="margin-left:5px" />
                            </div>
                            <button id="ajax" class="btn btn-default" type="button">전송</button>
                            <!-- onclick="clkBtn();" -->
                            <button class="btn btn-default" type="reset">초기화</button>
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
                url: '../process/process_insert.php', // form을 전송할 실제 파일경로
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
    <script src="js/taeyoung.js"></script>
</body>
</html>