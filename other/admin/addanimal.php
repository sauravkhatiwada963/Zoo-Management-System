<?php 
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../db/dbconnect.php';

$out=[];

function whichCatergory($name){
    $classification = new DatabaseTable('classification');
    $classification =$classification->find('classif_name',$name);
    $classification=$classification->fetch();
    return $classification['classif_id'] ;
}

unset($_POST['animal_id']);

$allacross=[
'nick_name' =>$_POST['nick_name'],
'species_name' =>$_POST['species_name'],
'dob'=>$_POST['dob'],
'gender'=>$_POST['gender'],
'avg_lifespan'=>$_POST['avg_lifespan'],
'species_category'=>whichCatergory($_POST['species_category']),
'dietary_req'=>$_POST['dietary_req'],
'natural_habitat'=>$_POST['natural_habitat'],
'pop_dist'=>$_POST['pop_dist'],
'join_date'=>$_POST['join_date'],
'height'=>$_POST['height'],
'weight'=>$_POST['weight'],
'description'=>$_POST['description'],
'location_id'=>$_POST['location_id']
];

$animals = new DatabaseTable('animals');
$animals->save($allacross);


$insertedAID = $animals->getlastInsertId(); 
// $ar=array_diff($_POST, $allacross);

// var_dump($_POST);

// var_dump($allacross);






if($_POST['species_category']=='Fish'){
    $fishData=[
        'animal_id'=>$insertedAID,
        'body_temp'=>$_POST['body_temp'],
        'water_type'=>$_POST['water_type'],
        'color_variant'=>$_POST['color_variant']

    ];
    $fish = new DatabaseTable('fish');
    $fish->save($fishData);
    $out['data']= 'fish';
    
}
else if($_POST['species_category']=='Mammals'){

$mammalData=[
'animal_id'=>$insertedAID,
'gast_period'=>$_POST['gast_period'],
'category'=>$_POST['category'],
'avg_btemp'=>$_POST['avg_btemp']
];

$mammal = new DatabaseTable('mammals');
$mammal->save($mammalData);

$out['data']= 'mammal';

}
else if($_POST['species_category']=='Birds'){
    $birdsData=[
        'animal_id'=>$insertedAID,
        'nest_const'=>$_POST['nest_const'],
        'clutch_size'=>$_POST['clutch_size'],
        'wingspan'=>$_POST['wingspan'],
        'flying_ability'=>$_POST['flying_ability'],
        'color_variant'=>$_POST['color_variant']

    ];
$birds = new DatabaseTable('birds');
$birds->save($birdsData);
$out['data']= 'birds';

}
else if($_POST['species_category']=='Amphibian'){

$amphibiansData=[
    'animal_id'=>$insertedAID,
    'rep_type'=>$_POST['rep_type'],
    'clutch_size'=>$_POST['clutch_size'],
    'num_offspring'=>$_POST['num_offspring']
];


$amphibians= new DatabaseTable('amphibian');
$amphibians->save($amphibiansData);

$out['data']= 'amphibians';

}
else if($_POST['species_category']=='Reptiles'){
    $reptilesData=[
        'animal_id'=>$insertedAID,
        'rep_type'=>$_POST['rep_type'],
        'clutch_size'=>$_POST['clutch_size'],
        'num_offspring'=>$_POST['num_offspring']
    ];
$reptiles= new DatabaseTable('reptiles');
$reptiles->save($reptilesData);
$out['data']='rep';

}


echo json_encode($out);
?>