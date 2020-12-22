<?php
header('Content-type: application/json');
require '../../db/dbconnect.php';
require '../../classes/databasetable.php';
    
   $output=[];

    $common = new DatabaseTable('animals');
    $tableSpecific=$common->find('animal_id',$_POST['animal_id']);
    $t=$tableSpecific->fetch();
    
    $output = "<ul style='list-style: none;'>";
    $output.='<li><b>Name:</b> '. $t['nick_name']. '</li>';
    $output.='<li><b>Species:</b> '. $t['species_name']. '</li>';
    $output.='<li><b>Date of Birth:</b> '. $t['dob']. '</li>';
    $output.='<li><b>Gender:</b> '. $t['gender']. '</li>';
    $output.='<li><b>Average lifespan:</b> '. $t['avg_lifespan']. '</li>';
    $output.='<li><b>Dieratry requirement:</b> '. $t['dietary_req']. '</li>';
    $output.='<li><b>Natural habitat:</b> '. $t['natural_habitat']. '</li>';
    $output.='<li><b>Population distribution:</b> '. $t['pop_dist']. '</li>';
    $output.='<li><b>Joined Date:</b> '. $t['join_date']. '</li>';
    $output.='<li><b>Height:</b> '. $t['height']. '</li>';
    $output.='<li><b>Weight:</b> '. $t['weight']. '</li>';
    $output.='<li><b>Description:</b> '. $t['description']. '</li>';
    $output.='</ul>';


        echo json_encode($output);
   

?>