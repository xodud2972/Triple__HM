<?php
    include('../db/db.php');
    
    $id = $_GET['id'];
    $query = 'SELECT * FROM people
                WHERE
                people_id =' . $_GET['id'];
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($result)) {
            $fname = $row['first_name'];
            $lname = $row['last_name'];
            $mname = $row['mid_name'];
            $ads = $row['address'];
            $ctt = $row['contact'];
            $cmt = $row['comment'];
            $filename = $row['file'];
            $filename2 = $row['file2'];
        }
?>