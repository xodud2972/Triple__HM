<?php
include('../include/header.php');
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
                <a class="navbar-brand" href="index.php">CRUD Using PHP/MySQL</a>
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
                            회원추가하기
                        </h1>
                    </div>
                </div>
                <div class="col-lg-12">
                    <h2 class="title_h2">새 회원추가</h2>
                    <div class="col-lg-6">
                        <form id="form1" role="form" method="post" class="table_write">
                            <input type="hidden" value="add" name="action" class="validation-form">
                            <div class="form-group"><input class="form-control" placeholder="이름 : ex) 길동" name="firstName" id="firstName"></div>
                            <div class="form-group"><input class="form-control" placeholder="별명 : ex) 좀도둑" name="lastName" id="lastName"></div>
                            <div class="form-group"><input class="form-control" placeholder="성 : ex) 홍" name="midName" id="midName"></div>
                            <div class="form-group"><input class="form-control" placeholder="주소 : ex) 조선" name="ads" id="ads"></div>
                            <div class="form-group"><input class="form-control" placeholder="연락처 : ex) 010-1234-5678" name="ctt" id="ctt"></div>
                            <div class="form-group">
                                <label>소개</label>
                                <textarea class="form-control" rows="3" name="cmt" id="cmt"></textarea>
                            </div>
                            <div class="form-group" id="attachFileDiv">
                                <input type="file" name="files[]" value="" size="40" multiple />
                            </div>
                            <button id="ajax" class="btn btn-default" type="button">전송</button>
                            <button class="btn btn-default" type="reset">초기화</button>
                        </form>
                        <a class="btn btn-default" type="button" href="../view/index.php"> 목록으로 돌아가기 </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

<script>
    $("#ajax").click(function() {
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
            function btnInsert() {
                var form = $('#form1')[0];
                var data = new FormData(form);
                $.ajax({
                    type: "POST",                               // 전송 타입 (get, post, put)
                    enctype: 'multipart/form-data',
                    url: '../process/process_All.php',         
                    data: data,                                 // 서버에 전송할 데이터 key/value형식의 객체
                    processData: false,                         // 데이터를 querystring 형태로 보내지 않고 DOMDocument 또는 다른 형태로 보내고 싶으면 false로 설정한다.
                    contentType: false,                         //해더의 Content-Type을 설정한다
                    timeout: 1000,                              // 해당시간이 지나도 실패하면 에러 상태로 전환하게 된다.
                    success: function(data) {                   //전송에 성공하면 실행될 코드
                        console.log(data);
                        location = "../view/index.php";
                        alert('회원이 추가되었습니다.');
                    },
                    error: function(e) {                        //전송에 실패하면 실행될 코드
                        console.log("ERROR : ", e);
                    }
                });
            }
            return btnInsert();
        }
    });
</script>
</html>