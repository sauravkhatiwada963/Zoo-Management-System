<?php 
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../db/dbconnect.php';
$out=[];

$prev =$pdo->prepare('DELETE FROM animal_of_the_week');
$prev->execute();

$animalDay = new DatabaseTable('animal_of_the_week');
$animalDay->save($_POST);
$out['data'] ="animalAdded";

echo json_encode($out); 
?>