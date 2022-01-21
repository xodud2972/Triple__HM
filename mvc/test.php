<?php
    $txtArray = array(
        "0" => "월요일",
        "1" => "화요일",
        "2" => "수요일"
    );
    echo $txtArray[0];
    echo $txtArray[1];
    echo $txtArray[2];

    $txtReportColume = array(
		"imp_cnt" => "노출수", 
		"click_vaild_cnt" => "클릭수", 
		"ctr" => "클릭률(ctr)", 
		"click_cost_avg" => "평균클릭비용", 
		"click_cost_total" => "총비용", 
		"conversion_cnt" => "전환수", 
		"conversin_cost_total" => "전환 금액",
		"conversion_rate" => "전환률(CVR)",
		"conversion_cost_avg" => "전환당 비용(CPS)",
		"roas" => "광고 수익률(ROAS)"
	);

    echo $txtReportColume['imp_cnt'];
    echo $txtArray[1+1];
    $txt = 'roas';
    echo $txtReportColume[$txt];

    $txtGiho = array(
		">" => "보다 큼", 
		">=" => "보다 크거나 같다",
		"<" => "보다 작다",
		"<=" => "보다 작거나 같다",
		"=" => "와 작음"
	);

    echo 'a는 b'.$txtGiho['>'];
?>