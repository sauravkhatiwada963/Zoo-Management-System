<?php 
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../db/dbconnect.php';
$out=[];

$whichtable=$_POST['table'];
unset($_POST['table']);
$table = new DatabaseTable($whichtable);
$table->save($_POST);
$out['data'] ='added';


echo json_encode($out);
?>