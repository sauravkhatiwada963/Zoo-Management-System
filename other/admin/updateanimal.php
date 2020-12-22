<?php 
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../db/dbconnect.php';
$out=[];
function whichCatergory($id){
    $classification = new DatabaseTable('classification');
    $classification =$classification->find('classif_id',$id);
    $classification=$classification->fetch();
    return $classification['classif_name'] ;
}

$allacross=[
    'animal_id'=>$_POST['animal_id'],
    'nick_name' =>$_POST['nick_name'],
    'species_name' =>$_POST['species_name'],
    'dob'=>$_POST['dob'],
    'gender'=>$_POST['gender'],
    'avg_lifespan'=>$_POST['avg_lifespan'],
    'species_category'=>$_POST['edit_id'],
    'dietary_req'=>$_POST['dietary_req'],
    'natural_habitat'=>$_POST['natural_habitat'],
    'pop_dist'=>$_POST['pop_dist'],
    'join_date'=>$_POST['join_date'],
    'height'=>$_POST['height'],
    'weight'=>$_POST['weight'],
    'description'=>$_POST['description'],
    'location_id'=>$_POST['location_id']
    ];

    


$cat =whichCatergory($_POST['edit_id']);



if($cat=='Fish'){
    $animals = new DatabaseTable('animals');
    $animals->update($allacross,'animal_id');
    $fishData=[
        'animal_id'=>$_POST['animal_id'],
        'body_temp'=>$_POST['body_temp'],
        'water_type'=>$_POST['water_type'],
        'color_variant'=>$_POST['color_variant']

    ];
    $fish = new DatabaseTable('fish');
    $fish->update($fishData,'animal_id');
    $out['data']='fish';
    
}
else if($cat=='Mammals'){
    $animals = new DatabaseTable('animals');
    $animals->update($allacross,'animal_id');

$mammalData=[
'animal_id'=>$_POST['animal_id'],
'gast_period'=>$_POST['gast_period'],
'category'=>$_POST['category'],
'avg_btemp'=>$_POST['avg_btemp']
];

$mammal = new DatabaseTable('mammals');
$mammal->update($mammalData,'animal_id');

$out['data']='mammal';

}
else if($cat=='Birds'){
    $animals = new DatabaseTable('animals');
    $animals->update($allacross,'animal_id');
    $birdsData=[
        'animal_id'=>$_POST['animal_id'],
        'nest_const'=>$_POST['nest_const'],
        'clutch_size'=>$_POST['clutch_size'],
        'wingspan'=>$_POST['wingspan'],
        'flying_ability'=>$_POST['flying_ability'],
        'color_variant'=>$_POST['color_variant']

    ];
$birds = new DatabaseTable('birds');
$birds->update($birdsData,'animal_id');
$out['data']= 'birds';

}
else if($cat=='Amphibian'){
    $animals = new DatabaseTable('animals');
    $animals->update($allacross,'animal_id');

$amphibiansData=[
    'animal_id'=>$_POST['animal_id'],
    'rep_type'=>$_POST['rep_type'],
    'clutch_size'=>$_POST['clutch_size'],
    'num_offspring'=>$_POST['num_offspring']
];


$amphibians= new DatabaseTable('amphibian');
$amphibians->update($amphibiansData,'animal_id');

$out['data']= 'amphibians';

}
else if($cat=='Reptiles'){
    $animals = new DatabaseTable('animals');
    $animals->update($allacross,'animal_id');
    $reptilesData=[
        'animal_id'=>$_POST['animal_id'],
        'rep_type'=>$_POST['rep_type'],
        'clutch_size'=>$_POST['clutch_size'],
        'num_offspring'=>$_POST['num_offspring']
    ];
$reptiles= new DatabaseTable('reptiles');
$reptiles->update($reptilesData,'animal_id');
$out['data']= 'rep';

}


echo json_encode($out);




?>