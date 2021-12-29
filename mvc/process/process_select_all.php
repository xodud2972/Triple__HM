<!-- 
	Index Page Process + Pagination Code
    Create by Taeyoung 2021-12-23
-->
<?php
include_once('../db/db.php');

function SelectAllUser(){
	$db = db_open();

	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	} else {
		$page = 1; 
	}
                   
	$list = 10;                                                   
	$page_start = ($page - 1) * $list;  


	$querySelectAllUser = sprintf('SELECT people_id, first_name, last_name, mid_name, address, contact, comment,  COUNT(filename)  AS filename
						FROM t_people
							LEFT JOIN t_file
						ON t_people.people_id = t_file.file_people_id
							GROUP BY t_people.people_id
						ORDER BY people_id 
							DESC LIMIT %s, %s ',
						$page_start, $list);


	$result = que($db, $querySelectAllUser);

	while ($row = mysqli_fetch_array($result)) {
		$tempData["firstName"] = $row['first_name'];
		$tempData["lastName"] = $row['last_name'];
		$tempData["midName"] = $row['mid_name'];
		$tempData["add"] = $row['address'];
		$tempData["ctt"] = $row['contact'];
		$tempData["cmt"] = $row['comment'];
		$tempData["id"] = $row['people_id'];
		$tempData["filename"] = $row['filename'];

		$resultData[] = $tempData;
	}
	que_close($db);
	return $resultData;
}



function pagenation(){
	
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
	
}







?>
