<?php 

// header('Content-type: application/json');
require '../../db/dbconnect.php';
require '../../classes/databasetable.php';

$output=[];
$table =strtolower($_GET['table']);

// if($table=='fish'){
//     $fish = new DatabaseTable('fish');
//     $fish=$fish->find('animal_id',$_GET['animal_id']);
//     $fish=$fish->fetch();
//     $output = $fish;


// }
// else if($table=='amphibian'){
//     $amphibian = new DatabaseTable('amphibian');
//     $amphibian=$amphibian->find('animal_id',$_GET['animal_id']);
//     $amphibian=$amphibian->fetch();
//     $output = $amphibian;

// }
// else if($table =='mammals'){
//     $mammals = new DatabaseTable('mammals');
//     $mammals=$mammals->find('animal_id',$_GET['animal_id']);
//     $mammals=$mammals->fetch();
//     $output = $mammals;

// }
// else if($table=='reptiles'){
//     $reptiles = new DatabaseTable('reptiles');
//     $reptiles=$reptiles->find('animal_id',$_GET['animal_id']);
//     $reptiles=$reptiles->fetch();
//     $output = $reptiles;

// }
// else 

if($table=='birds'){
    echo 'birds true';
    $birds = new DatabaseTable('fish');
    $birds=$birds->find('animal_id',$_GET['animal_id']);
    $birds=$birds->fetch();
   var_dump( $birds);
}

// echo json_encode($output);

?>