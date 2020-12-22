<?php 
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';
$out=[];


$approveSponsor =$pdo->prepare("UPDATE sponsors SET signed_status=:st WHERE sp_id=:sp_id");
if($approveSponsor->execute(['st'=>'Yes','sp_id'=>$_POST['sp_id']])){
    $out['data']= "Approved";
}

echo json_encode($out);

?>