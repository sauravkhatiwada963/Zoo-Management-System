<?php
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';
$out=[];
$completewatchlist =$pdo->prepare("UPDATE watchlist SET complete_status=:st WHERE w_id=:w_id");
if($completewatchlist->execute(['st'=>$_POST['status'],'w_id'=>$_POST['w_id']])){
   $out['data'] ="Done";
}

echo json_encode($out);
?>