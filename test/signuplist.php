<?php
    $host = "localhost";
    $user = "root";
    $pw = "dkssud22@@";
    $dbName = "testdata";

    $conn = new mysqli($host, $user, $pw, $dbName);

    /* DB 연결 확인 */
    if($conn){ echo "Connection established"."<br>"; }
    else{ die( 'Could not connect: ' . mysqli_error($conn) ); }


    $sql = "SELECT * FROM signup";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        
        echo $row['m_name'].'</br>';
        echo $row['m_nickname'].'</br>';
        echo $row['m_email'].'</br>';
        echo $row['m_address'].'</br>';
        echo $row['m_address2'].'</br>';
        echo $row['m_code'].'</br>';

    }

    /* INSERT  */
    $sql = "INSERT INTO signup(m_name, m_nickname, m_email, m_address, m_address2, m_code) 
    VALUES
    ('$_POST[m_name]','$_POST[m_nickname]','$_POST[m_email]','$_POST[m_address]','$_POST[m_address2]','$_POST[m_code]')";

    // ('ujin','ulog','ugin@naver.com','ansan','hospital','aaa77')";

    $result = mysqli_query($conn, $sql);
 	
    if($result) { echo "insert success!"; }

    else { echo "failure"; }
    
    mysqli_close($conn);
?>
