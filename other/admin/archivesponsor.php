<?php
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';
$out=[];
$archiveSponsor =$pdo->prepare("UPDATE sponsors SET archived_status=:st WHERE sp_id=:sp_id");
if($archiveSponsor->execute(['st'=>$_POST['archive'],'sp_id'=>$_POST['sp_id']])){
    $out['data'] ="Done";
}


echo json_encode($out);
?>