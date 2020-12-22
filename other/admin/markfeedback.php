<?php 
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

$out=[];

$statusApp =$pdo->prepare("UPDATE feedback SET read_status=:st WHERE feedback_id=:feedback_id");
if($statusApp->execute(['st'=>$_POST['read_status'],'feedback_id'=>$_POST['feedback_id']])){
    $out['data']="Done";
}

echo json_encode($out);
?>