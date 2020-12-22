<?php
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';
$out=[];
$archiveLocation =$pdo->prepare("UPDATE locations SET archive_status=:st WHERE location_id=:location_id");
if($archiveLocation->execute(['st'=>$_POST['archive'],'location_id'=>$_POST['location_id']])){
    $out['data']="Done";
}


echo json_encode($out);
?>