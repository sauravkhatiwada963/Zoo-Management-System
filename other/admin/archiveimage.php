<?php 
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';
$out=[];
$archiveImg =$pdo->prepare("UPDATE animalimages SET archive_status=:st WHERE img_id=:img_id");
if($archiveImg->execute(['st'=>$_POST['st'],'img_id'=>$_POST['img_id']])){
    $out['data']= "Done";
}


echo json_encode($out);
?>