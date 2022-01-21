<?php
    include_once('../db/db.php');
    $db = db_open();

    if(isset($_GET['file_id'])){
        $id = $_GET['file_id'];
        $queryDelFile = sprintf('DELETE FROM t_file WHERE file_id = %s',  $id);
        que($db,$queryDelFile);
        echo '<h1>파일 삭제가 완료되었습니다.</h1>';
        echo '<h2>삭제된 파일의 id는'.$id.'입니다.</h2>';
        echo '<input type="button" onclick="backPage();" value="돌아가기" style="width: 300px; height:300px; font-size:60";></input>';
    }
?>
<script>
    function backPage(){
        window.location = document.referrer;
    }
</script>