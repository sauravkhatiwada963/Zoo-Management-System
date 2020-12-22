<?php 
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../db/dbconnect.php';
$out=[];
$main = $_POST['main'];
$table=$_POST['table'];
unset($_POST['main']);
unset($_POST['table']);

$table= new DatabaseTable($table);
$table->update($_POST,$main);
$out['data']= 'updated';

echo json_encode($out);
?>