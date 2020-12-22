<?php
header('Content-type: application/json');
require '../../db/dbconnect.php';
require '../../classes/databasetable.php';


$output=[];

function amphData($id){
    $d;
    $amphibian = new DatabaseTable('amphibian');
    $tableSpecific=$amphibian->find('animal_id',$id);
    if($tableSpecific->rowCount()>0){
        $t=$tableSpecific->fetch();

        $d="<ul style='list-style: none;'>";
        $d.='<li><b>Type:</b> '.$t['rep_type'].'</li>';
        $d.='<li><b>Clutch size:</b> '.$t['clutch_size'].'</li>';
        $d.='<li><b>Number of offspring:</b> '.$t['num_offspring'].'</li>';
        $d.="</ul>";

    }
    else{
        $d='No';
    }
    return $d;
}

function birdData($id){
    $d;
    $animal = new DatabaseTable('birds');
    $tableSpecific=$animal->find('animal_id',$id);
    if($tableSpecific->rowCount()>0){
        $t=$tableSpecific->fetch();

        $d="<ul style='list-style: none;'>";
        $d.='<li><b>Nest const:</b> '.$t['nest_const'].'</li>';
        $d.='<li><b>Clutch size:</b> '.$t['clutch_size'].'</li>';
        $d.='<li><b>Wingspan:</b> '.$t['wingspan'].'</li>';
        $d.='<li><b>Flying ability:</b> '.$t['flying_ability'].'</li>';
        $d.='<li><b>Color:</b> '.$t['color_variant'].'</li>';
        $d.="</ul>";

    }
    else{
        $d='No';
    }
    return $d;
}
function fishData($id){
    $d;
    $animal = new DatabaseTable('fish');
    $tableSpecific=$animal->find('animal_id',$id);
    if($tableSpecific->rowCount()>0){
        $t=$tableSpecific->fetch();

        $d="<ul style='list-style: none;'>";
        $d.='<li><b>Body temperature:</b> '.$t['body_temp'].'</li>';
        $d.='<li><b>Water Type:</b> '.$t['water_type'].'</li>';
        $d.='<li><b>Color_variant:</b> '.$t['color_variant'].'</li>';
        $d.="</ul>";

    }
    else{
        $d='No';
    }
    return $d;
}
function mammalData($id){
    $d;
    $animal = new DatabaseTable('mammals');
    $tableSpecific=$animal->find('animal_id',$id);
    if($tableSpecific->rowCount()>0){
        $t=$tableSpecific->fetch();

        $d="<ul style='list-style: none;'>";
        $d.='<li><b>Gast Period:</b> '.$t['gast_period'].'</li>';
        $d.='<li><b>Category:</b> '.$t['category'].'</li>';
        $d.='<li><b>Average body temperature:</b> '.$t['avg_btemp'].'</li>';
        $d.="</ul>";

    }
    else{
        $d='No';
    }
    return $d;
}
function repData($id){
    $d;
    $amphibian = new DatabaseTable('reptiles');
    $tableSpecific=$amphibian->find('animal_id',$id);
    if($tableSpecific->rowCount()>0){
        $t=$tableSpecific->fetch();

        $d="<ul style='list-style: none;'>";
        $d.='<li><b>Type:</b> '.$t['rep_type'].'</li>';
        $d.='<li><b>Clutch size:</b> '.$t['clutch_size'].'</li>';
        $d.='<li><b>Number of offspring:</b> '.$t['num_offspring'].'</li>';
        $d.="</ul>";

    }
    else{
        $d='No';
    }
    return $d;
}

if(amphData($_POST['animal_id'])!='No'){
    $output= amphData($_POST['animal_id']);
}
else if(birdData($_POST['animal_id'])!='No'){
    $output= birdData($_POST['animal_id']);
}
else if(fishData($_POST['animal_id'])!='No'){
    $output= fishData($_POST['animal_id']);
}
else if(mammalData($_POST['animal_id'])!='No'){
    $output= mammalData($_POST['animal_id']);
}
else if(repData($_POST['animal_id'])!='No'){
    $output= repData($_POST['animal_id']);
}
else{
 $output="No data found";
}




echo json_encode($output);



?>