<!-- 
    User Add Page.
  create by 엄태영 2021.12.16
 -->
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
    /**
    @return BtnInsert()
    create by 엄태영 2021.12.16
**/
    $("#ajax").click(function() {
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
            function BtnInsert() {
                var form = $('#form1')[0];
                var data = new FormData(form);
                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: '../process/process_All.php',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    success: function(data) {
                        console.log(data);
                        location = "../view/index.php";
                        alert('회원이 추가되었습니다.');
                    },
                    error: function(e) {
                        console.log("ERROR : ", e);
                    }
                });
            }
            return BtnInsert();
        }
    });
</script>

</html>