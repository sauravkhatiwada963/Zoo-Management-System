<?php 
header('Content-Type: application/json');
    require '../classes/databasetable.php';
    require '../db/dbconnect.php';
    $out=[];

// $date = DateTime::createFromFormat('d/m/Y', $_POST['date']);
// $_POST['date']= $date->format('Y-m-d');
 
if(($_POST['no_child_tickets']==0) && ($_POST['no_adult_tickets']==0) ){
    $out['data']='Book atleast a ticket';
}
else{
   
    $table= new DatabaseTable('ticket_booking');
    $table->save($_POST);
    $out['data'] ="ticketBooked";
}


echo json_encode($out);

// var_dump($_POST);



?>