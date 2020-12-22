<?php
header('Content-Type: application/json');
    require '../../classes/databasetable.php';
    require '../../classes/tablecreate.php';
    require '../../db/dbconnect.php';
    $out=[];
    $archiveEvent =$pdo->prepare("UPDATE events SET archive_status=:st WHERE e_id=:e_id");
    if($archiveEvent->execute(['st'=>$_POST['archive'],'e_id'=>$_POST['e_id']])){
    $out['data'] ="Done";
    }
echo json_encode($out);

?>