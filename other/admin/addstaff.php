<?php 
header('Content-Type: application/json');
    require '../../classes/databasetable.php';
    require '../../db/dbconnect.php';
    $out=[];
    $pass = $_POST['password'];
    $_POST['password']=password_hash($pass, PASSWORD_DEFAULT);

$staffs = new DatabaseTable('staffs');
$staffs->save($_POST);
$out['data'] ="staffAdded";
echo json_encode($out);



?>