<?php 
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

$out=[];

$statusApp =$pdo->prepare("UPDATE applications SET application_status=:st WHERE a_id=:a_id");
if($statusApp->execute(['st'=>$_POST['st'],'a_id'=>$_POST['a_id']])){
    $out['data']="Done";
}

echo json_encode($out);
?>