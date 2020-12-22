<?php
header('Content-type: application/json');
require '../../db/dbconnect.php';
require '../../classes/databasetable.php';
    
   $output=[];

    $tables = new DatabaseTable($_GET['table']);
    $tableSpecific=$tables->find($_GET['findby'],$_GET['findvalue']);
    $t=$tableSpecific->fetch();
    
    $output=$t;


        echo json_encode($output);
   

?>