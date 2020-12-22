<?php 
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../db/dbconnect.php';
$out=[];


if($_POST['complete_status']=="No"){

    try{
        $stmt =$pdo -> prepare("UPDATE sponsor_animals SET approved_status=:ap WHERE id=:id");
        $pass=["ap"=>$_POST[ 'approved_status'], "id"=>$_POST['id'] ];
        if($stmt -> execute($pass) ){
            $out['data']='Done';
        }  
    } 
    catch(Exception $e) {
        $out['data']=var_dump($e->getMessage());
    }  

 
}
else if($_POST['complete_status']=="Yes"){
    $stmt =$pdo->prepare('UPDATE sponsor_animals SET complete_status=:ap WHERE id=:id');
    $stmt->execute(['ap'=>'Yes','id'=>$_POST['id']]);
    $out['data']='Done';
}



echo json_encode($out);
?>