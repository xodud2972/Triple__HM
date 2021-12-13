<?php

if(isset($_POST['submit'])){
    $countfiles = count($_FILES['file']['name']);
    for($i=0;$i<$countfiles;$i++){
        $filename = $_FILES['file']['name'][$i];
        $sql = "INSERT INTO fileup(id,name) VALUES ('$filename','$filename')";
        $db->query($sql);
        move_uploaded_file($_FILES['file']['tmp_name'][$i],'upload/'.$filename);
    }
}
?>

<form method='post' action='' enctype='multipart/form-data'>
    <input type="file" name="file[]" id="file" multiple>
    <input type='submit' name='submit' value='Upload'>
</form>