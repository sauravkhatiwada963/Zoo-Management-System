<?php 
header('Content-Type: application/json');
    require '../../classes/databasetable.php';
    require '../../db/dbconnect.php';
    $out=[];

    $vacancies = new DatabaseTable('vacancies');
    $vacancies->save($_POST);
    $out['data']= 'vacancyAdded';
echo json_encode($out);
?>