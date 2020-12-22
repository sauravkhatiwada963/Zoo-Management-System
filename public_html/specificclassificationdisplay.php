<?php
header('Content-Type: application/json');
require '../classes/databasetable.php';
require '../classes/tablecreate.php';
require '../db/dbconnect.php';
$out="";

function categoryno($name){
    global $pdo;
    $tables = new DatabaseTable('classification');
    $tableSpecific=$tables->find('classif_name',$name);
    $t=$tableSpecific->fetch();
    return $t['0'];
    // return $name;
}

function loadsetanimalimage($id){
    global $pdo;
    $stmt =$pdo->prepare('SELECT img FROM animalimages WHERE animal_id=:id LIMIT 1');
    $stmt->execute(['id'=>$id]);

    if($stmt->rowCount()>0){
        $i=$stmt->fetch();
        
        $o= $i['0'];
  }
    else{
        $o="noimage.PNG";
    }

    return $o;

}





$animal =$pdo->prepare("SELECT * FROM animals WHERE species_category=:sp");
if($animal->execute(['sp'=> categoryno($_POST['cat'])  ])  ){

    if($animal->rowCount()>0){

        foreach($animal as $a){
 
                

            $out.= '<div class="s-12 m-12 l-4 margin-bottom" style="padding:4px;">';
            $out.=' <div class="padding-2x block-bordered border-radius">';
            $out.='<div style="padding-left:35px;padding-right:35px;">';
            $out.=' <img src="../images/'.loadsetanimalimage($a['animal_id']).'" alt="" style="height: 200px;width: 200px;">';
            $out.='</div>';
            $out.='<br>';
            $out.='<h2 class="text-thin" style="border-bottom: 2px #7854 solid;
            border-top:2px #7854 solid;padding:2px;">'.$a['nick_name'].'</h2>';
            $out.=' <p><b>Habitat: </b>'.$a['natural_habitat'].'</p>';
            $out.='  <p class="margin-bottom-30">'.substr($a['description'], 0, 20).' ........................</p>';
            $out.=  '<a class="button border-radius background-primary text-size-12 text-white text-strong" 
            href="specificanimal.php?animal_id='. $a['animal_id'].'">LEARN MORE</a>';
            $out.='</div>';  
            $out.='</div>'; 
            
        }
       
    }
    else{
            $out ="<h3>No animals found</h3>";
    }




}
// $out=categoryno($_POST['cat']);

// echo json_encode($out);


 echo json_encode($out);

?>