<?php 
    $A = 'apple';
    $B = 'banana';
    $C = 'I wanna %s %s';
    echo sprintf($C, $B, $A).'<br><br>';

    $id = '2';
    $query = sprintf('SELECT first_name, last_name, mid_name, address, contact, comment, file, file2 FROM people
    WHERE
    people_id = %d', $id);
    echo sprintf($query, $id).'<br><br>';

    $firstName = 'Taeyoung';
    $lastName = 'ttaey';
    $mid_Name = 'Eom';
    $ads = 'Anyang';
    $ctt = '010-4993-2972';
    $cmt = 'Hello';
    $fileName = '1.png';
    $fileName2 = '2.png';
    echo sprintf("UPDATE people SET 
    first_name = '%s',
    last_name = '%s',
    mid_name = '%s',
    address = '%s',
    contact = '%s',
    comment = '%d',
    file = '%s',
    file2 = '%s'
        WHERE people_id ='%s'
    ", 
    $firstName, $lastName, $mid_Name, $ads, $ctt, 24, $fileName, $fileName2, $id).'<br><br>';

    $sql = 'INSERT INTO people
    (first_name, last_name, mid_name)
    VALUES
    (%s, %s, %s)
    ';
    echo sprintf($sql, 'taeyoung', 'ttaey', 'eom').'<br><br>';
    
    $sql2 = 'DELETE FROM people WHERE people_id = %s';
    echo sprintf($sql2, $id).'<br><br>';

    $sql3 = 'INSERT INTO people (first_name, last_name, mid_name)
                VALUES(%s, %s, %s)';
    echo sprintf($sql3, 'hello', 'hi', 'hey').'<br><br>';

    $sql4 = ' UPDATE people SET
        first_name = "%s",
        last_name = "%s",
        mid_name = "%s"
            WHERE people_id = "%s"
    ';
    echo sprintf($sql4, 'hello', 'hi', 'hey', '2');
    echo sprintf($sql4, 25,25,25,25).'<br><br>';

    $sql5 = 'SELECT first_name, last_name
        FROM (
            SELECT first_name, last_name
            FROM member
            WHERE mid_name = "ttaey"
            )tn2, table_name tn1
            WHERE tn2.field03 = tn1.field03 AND
                tn2.field03 = "ttaey"
    ';
    
    $test = 'height : %d,   width : %d';
    echo sprintf($test, 178, 50).'<br><br>';  // 둘 다 소수점 여섯자리까지 출력
    //height : 178.000000, width : 50.000000
    $newtest = sprintf($test, 187, 80).'<br><br>';
    echo $newtest;
    
    $Statement = 'My Profile is %s ';
    echo sprintf($Statement, $newtest);


?>