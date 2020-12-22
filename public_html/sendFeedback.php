<?php 
header('Content-Type: application/json');
    require '../classes/databasetable.php';
    require '../db/dbconnect.php';
    $out=[];

// $date = DateTime::createFromFormat('d/m/Y', $_POST['date']);
// $_POST['date']= $date->format('Y-m-d');
 


$table= new DatabaseTable('feedback');
$table->save($_POST);
$out['data'] ="feedbackSent";
echo json_encode($out);

// var_dump($_POST);



?>