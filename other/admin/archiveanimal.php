<?php

header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';
$out=[];
$archiveAnimal =$pdo->prepare("UPDATE animals SET archived=:st WHERE animal_id=:animal_id");
if($archiveAnimal->execute(['st'=>$_POST['archive'],'animal_id'=>$_POST['animal_id']])){
    $out['data']= "Done";
}

echo json_encode($out);

?>