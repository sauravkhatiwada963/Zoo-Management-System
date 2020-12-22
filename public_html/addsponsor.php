<?php 
header('Content-Type: application/json');
    require '../classes/databasetable.php';
    require '../db/dbconnect.php';
    $out=[];


    $table= new DatabaseTable('sponsors');
    $table->save($_POST);
    $out['data'] ="ticketBooked";


    
echo json_encode($out);

?>