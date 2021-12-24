<!-- 
  Main Page

  create by 엄태영 2021.12.16
 -->
<?php
    include('../include/header.php');
    include('../process/process_select_all.php');
    $resultData = SelectAllUser();

    include_once('../db/db.php');

    if (isset($_GET["page"])) {
        $page = $_GET["page"]; 
    } else {
        $page = 1;
    }


    $sql = que_Paging("SELECT * FROM t_people");

    $total_record = mysqli_num_rows($sql);                      // 게시물 총 개수
    $list = 10;                                                  // 한 페이지에 보여줄 게시물 개수
    $block_cnt = 5;                                             // 하단에 표시할 블록 당 페이지 개수
    $block_num = ceil($page / $block_cnt);                      // 현재 페이지 블록
    $block_start = (($block_num - 1) * $block_cnt) + 1;         // 블록의 시작 번호
    $block_end = $block_start + $block_cnt - 1;                 // 블록의 마지막 번호
    $total_page = ceil($total_record / $list);                  // 페이징한 페이지 수
    if ($block_end > $total_page) {
        $block_end = $total_page;                               // 블록 마지막 번호가 총 페이지 수보다 크면 마지막 페이지 번호가 총 페이지 수
    }
    $total_block = ceil($total_page / $block_cnt);              // 블록의 총 개수
    $page_start = ($page - 1) * $list;                          // 페이지의 시작 (SQL문에서 LIMIT 조건 걸 때 사용)
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
                    <h2>회원목록</h2> <a href="add.php?action=add" type="button" class="btn btn-xs btn-info">회원추가</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>이름</th>
                                    <th>별명</th>
                                    <th>성</th>
                                    <th>주소</th>
                                    <th>연락처</th>
                                    <th>소개</th>
                                    <th>첨부파일 개수</th>
                                    <th>회원관리</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?
                                for ($index = 0; $index < sizeof($resultData); $index++) {
                                ?>
                                    <tr>
                                        <td><?= $resultData[$index]["firstName"] ?></td>
                                        <td><?= $resultData[$index]["lastName"] ?></td>
                                        <td><?= $resultData[$index]["midName"] ?></td>
                                        <td><?= $resultData[$index]["add"] ?></td>
                                        <td><?= $resultData[$index]["ctt"] ?></td>
                                        <td><?= $resultData[$index]["cmt"] ?></td>
                                        <td><?= $resultData[$index]['filename'] ?> 개 </td>
                                        <td>
                                            <a class="btn btn-xs btn-info" type="button" href="../view/select.php?action=select?&id=<?= $resultData[$index]['id'] ?>"> 자세히 보기 </a>
                                            <a class="btn btn-xs btn-warning" type="button" href="../view/edit.php?action=edit?&id=<?= $resultData[$index]['id'] ?>"> 수정하기 </a>
                                            <a class="btn btn-xs btn-danger" type="button" href="../process/process_del.php?action=del?&id=<?= $resultData[$index]['id'] ?>">삭제하기</a>
                                        </td>
                                    </tr>
                                <?
                                }
                                ?>
                            </tbody>
                        </table>

                        <!-- 게시물 목록 중앙 하단 페이징 부분-->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <?php
                                if ($page <= 1) {

                                } else {
                                    echo "<li class='page-item'><a class='page-link' href='/mvc/view/index.php?page=1' aria-label='Previous'>처음</a></li>";
                                }

                                if ($page <= 1) {

                                } else {
                                    $pre = $page - 1;
                                    echo "<li class='page-item'><a class='page-link' href='/mvc/view/index.php?page=$pre'>◀ 이전 </a></li>";
                                }

                                for ($i = $block_start; $i <= $block_end; $i++) {

                                    if ($page == $i) {
                                        echo "<li class='page-item'><a class='page-link' disabled><b style='color: #df7366;'> $i </b></a></li>";
                                    } else {
                                        echo "<li class='page-item'><a class='page-link' href='/mvc/view/index.php?page=$i'> $i </a></li>";
                                    }
                                }

                                if ($page >= $total_page) {

                                } else {
                                    $next = $page + 1;
                                    echo "<li class='page-item'><a class='page-link' href='/mvc/view/index.php?page=$next'> 다음 ▶</a></li>";
                                }

                                if ($page >= $total_page) {

                                } else {
                                    echo "<li class='page-item'><a class='page-link' href='/mvc/view/index.php?page=$total_page'>마지막</a>";
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>