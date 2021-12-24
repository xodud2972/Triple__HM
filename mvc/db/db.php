<?php
        function db_open(){

		$host = "localhost";
		$user = "root";
		$password = "dkssud22@@";
		$dataname = "peopledb";

		$db=mysqli_connect($host,$user,$password) or die ("ERROR: Could not connect to the database");
		mysqli_select_db($db, $dataname);
		return $db;
	}

	function que($db, $Qry){
		mysqli_query($db, "set names utf8");
		$que = mysqli_query($db, $Qry);
		return $que;
	}

	function que_close($db){
		mysqli_close($db);
	}


    // Paging 처리시 사용하는 sql함수
    function que_Paging($sql){
		$db_id="root"; 
		$db_pw="dkssud22@@"; 
		$db_name="peopledb"; 
		$db_domain="localhost"; 
		$db=mysqli_connect($db_domain,$db_id,$db_pw,$db_name) or die ("ERROR: Could not connect to the database");
	
        return $db->query($sql); // ->query 라는게 문제 모르겠음..
    }
