<?php
    date_default_timezone_set('Asia/Seoul');

    $host = "localhost";
    $user = "root";
    $pw = "dkssud22@@";
    $dbName = "testdata";

    $conn = new mysqli($host, $user, $pw, $dbName);

    /* DB 연결 확인 */
    if($conn){ echo "Connection established"."<br>"; }
    else{ die( 'Could not connect: ' . mysqli_error($conn) ); }

    /* INSERT 예제 */
    $sql = "INSERT INTO member_table(mb_id, mb_pw, mb_tell) 
    VALUES
    ('$_POST[mb_id]','$_POST[mb_pw]','$_POST[mb_tell]')";

    $result = mysqli_query($conn, $sql);
 	
    if($result) { echo "insert success!"; }

    else { echo "failure"; }
    
    mysqli_close($conn);
?>
