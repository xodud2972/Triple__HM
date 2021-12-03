<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <?php
    $conn = mysqli_connect(
    'localhost',
    'root',
    'dkssud22@@',
    'testdata');

    echo "<h1>single row</h1>";
    
    $sql = "SELECT * FROM member_table WHERE seq = 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    echo 'seq가 1인 member의 ID : '.$row['mb_id'].'</br>';
    echo 'seq가 1인 member의 PW : '.$row['mb_pw'].'</br>';
    echo 'seq가 1인 member의 Address : '.$row['address'].'</br>';
    echo 'seq가 1인 member의 Address :'.$row['mb_tell'].'</br>';



    echo "<h1>multi row</h1>";

    $sql = "SELECT * FROM member_table";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)) {
        echo $row['mb_id'];
        echo $row['mb_pw'];
        echo $row['address'];
        echo $row['mb_tell'].'</br>';
    }

?>
</body>
</html>