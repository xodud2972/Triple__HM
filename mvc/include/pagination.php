
<?php
    $db_id="root"; // DB 계정명
    $db_pw="dkssud22@@"; // DB 계정 비밀번호
    $db_name="peopledb"; // 연결할 데이터베이스명
    $db_domain="localhost"; // 연결할 도메인
    $db=mysqli_connect($db_domain,$db_id,$db_pw,$db_name);

    // SQL 쿼리문 간단하게 쓰기 위한 함수 que 선언
    function que($sql){
        global $db;
        return $db->query($sql);
    }

    include_once("../db/db.php");
    db_open();
// 이 php 파일 만든 후에 sql 연결 필요하면 include하여 que("실행할_쿼리문"); 이렇게 사용하면 됩니다.
?>

<?php

    // 현재 페이지 번호 받아오기
    if(isset($_GET["page"])){
        $page = $_GET["page"]; // 하단에서 다른 페이지 클릭하면 해당 페이지 값 가져와서 보여줌
    } else {
        $page = 1; // 게시판 처음 들어가면 1페이지로 시작
    }



    // 페이징 구현                                                                   
    $sql = que($db, "SELECT * FROM t_people");                    
    
    $total_record = mysqli_num_rows($sql);                      // 불러올 게시물 총 개수
    $list = 5;                                                  // 한 페이지에 보여줄 게시물 개수
    $block_cnt = 5;                                             // 하단에 표시할 블록 당 페이지 개수
    $block_num = ceil($page / $block_cnt);                      // 현재 페이지 블록
    $block_start = (($block_num - 1) * $block_cnt) + 1;         // 블록의 시작 번호
    $block_end = $block_start + $block_cnt - 1;                 // 블록의 마지막 번호

    $total_page = ceil($total_record / $list);                  // 페이징한 페이지 수
    if($block_end > $total_page){
        $block_end = $total_page;                               // 블록 마지막 번호가 총 페이지 수보다 크면 마지막 페이지 번호가 총 페이지 수
    }
    $total_block = ceil($total_page / $block_cnt);              // 블록의 총 개수
    $page_start = ($page - 1) * $list;                          // 페이지의 시작 (SQL문에서 LIMIT 조건 걸 때 사용)
                
    $sql2 = que($db, "SELECT people_id, first_name, last_name, mid_name, address, contact, comment,  COUNT(filename)  AS filename
            FROM t_people
        LEFT JOIN t_file
        ON t_people.people_id = t_file.file_people_id
        GROUP BY t_people.people_id
        ORDER BY people_id 
        DESC LIMIT $page_start, $list");
    $dataList =  $sql2->fetch_array();

?>

        
<!-- 게시물 목록 중앙 하단 페이징 부분-->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
            if ($page <= 1){
                // 빈 값
            } else {
                    echo "<li class='page-item'><a class='page-link' href='/mvc/view/index.php?page=1' aria-label='Previous'>처음</a></li>";
            }
            
            if ($page <= 1){
                // 빈 값
            } else {
                $pre = $page - 1;
                    echo "<li class='page-item'><a class='page-link' href='/mvc/view/index.php?page=$pre'>◀ 이전 </a></li>";
            }
            
            for($i = $block_start; $i <= $block_end; $i++){
                if($page == $i){
                    echo "<li class='page-item'><a class='page-link' disabled><b style='color: #df7366;'> $i </b></a></li>";
                } else {
                        echo "<li class='page-item'><a class='page-link' href='/mvc/view/index.php?page=$i'> $i </a></li>";
                }
            }
            
            if($page >= $total_page){
                // 빈 값
            } else {
                $next = $page + 1;
                    echo "<li class='page-item'><a class='page-link' href='/mvc/view/index.php?page=$next'> 다음 ▶</a></li>";
            }
            
            if($page >= $total_page){
                // 빈 값
            } else {
                    echo "<li class='page-item'><a class='page-link' href='/mvc/view/index.php?page=$total_page'>마지막</a>";
            }
?>      






<?php


if($page==null){
    $page=1;
    }
    //한페이지당 보여질게시물 수
    $psize=5;

    //시작번호 알기
    $first=($page-1)*$psize;

    //페이지 그룹 사이즈
    $pgsize=5;

    //총 게시물수 구해오기
    $sql="select count(first_name) as cdx from t_people";
    $result=que($db,$sql);
    $row=mysqli_fetch_array($result);
    $tot=$row["cdx"];

    //총 페이지수 구해오기
    $totpage=ceil($tot/$psize);

    //시작페이지 기본설정
    $spage=(int)($page/$pgsize)*$pgsize+1;

    //마지막페이지 기본설정
    $lpage=0;

    //시작페이지 계산
    if($page%$pgsize==0){
    $spage=$page-$pgsize+1;
    }

    //마지막페이지 계산
    if($totpage<=$pgsize){
        //총페이지가 페이지그룹사이즈보다 작으면 마지막페이지는 총페이지
        $lpage=$totpage;
    }else{
        //기본 마지막페이지는 시작페이지 +페이지그룹사이즈-1
        $lpage=$spage+$pgsize-1;
        if($lpage>$totpage){
            //계산된 마지막페이지가 총페이지보다 크면 마지막페이지는 총페이지
            $lpage=$totpage;
        }
    }
    
    //시작번호 구해오기
    $snum=$tot-(($page-1)*$psize);
    
    //게시물 정보 얻어오기
    $sql="SELECT people_id, first_name, last_name, mid_name, address, contact, comment,  COUNT(filename)  AS filename
                FROM t_people
            LEFT JOIN t_file
            ON t_people.people_id = t_file.file_people_id
            GROUP BY t_people.people_id
            ORDER BY people_id 
            DESC
            limit $first,$psize";
    
  
    
    
?>

<?php

//페이징 출력부분
if($spage>$pgsize){
    //맨처음으로
    echo "<a href='board.php?page=1&key=$key'><img src='../images/common/prev_01.gif' width='10' height='10' border='0'></a>";
    //이전 페이지 그룹
    echo "<a href='board.php?page=".($spage-$pgsize)."&key=$key'><img src='../images/common/prev_02.gif' width='10' height='10' border='0'></a>";
    }?>
    <?for($i=$spage;$i<=$lpage;$i++){
    if($i==$page){
    echo "<span class='cafe'> $i </span>";
    }else{
    echo "<a href='board.php?page=$i&key=$key'><span class='dotum_2'> $i </span></a>";
    }
    }?>
    <?if($lpage<$totpage){
    //다음페이지그룹
    echo "<a href='board.php?page=".($lpage+1)."&key=$key'><img src='../images/common/next_01.gif' width='13' height='10' border='0'></a>";
    //마지막페이지
    echo "<a href='board.php?page=$totpage&key=$key'><img src='../images/common/next_02.gif' width='13' height='10' border='0'></a>";
    }?>

?>