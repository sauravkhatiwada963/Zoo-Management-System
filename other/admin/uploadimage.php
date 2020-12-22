<?php 
require '../../db/dbconnect.php';

header('Content-Type: application/json');

$err=[];
$out=[];

$supported_exT = array('jpg','jpeg','png','gif'); 

foreach ($_FILES['imageFile']['name'] as $key  => $value) {

    $fileexT =strtolower(substr($_FILES['imageFile']['name'][$key],strrpos($_FILES['imageFile']['name'][$key],'.')+1)); 

    if(in_array($fileexT,$supported_exT)==false){
            $err[]='Upload supported file only'; 
    }

    if(empty($err)){ 
        move_uploaded_file($_FILES['imageFile']['tmp_name'][$key],"../../images/{$_FILES['imageFile']['name'][$key]}");
        $upImage= $pdo -> prepare("INSERT INTO animalimages (img, animal_id) VALUES (:img, :animal_id)");
            
        $crit=["animal_id"=>$_POST['animal_id'],
                    "img"=> $_FILES['imageFile']['name'][$key]];

        if($upImage->execute($crit)){ 
            $out['data']="Image uploaded Successfully"; 
        }

    } 
    else{
        $out['data']="Upload supported file only";
    }

}

echo json_encode($out);

?>