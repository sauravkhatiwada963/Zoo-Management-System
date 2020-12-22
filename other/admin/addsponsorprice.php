<?php 
header('Content-Type: application/json');
require '../../db/dbconnect.php';
require '../../classes/databasetable.php';

$out=[];

unset($_POST['sp_id']);

$checkPresent = new DatabaseTable('sponsorship_price');
$checkPresent =$checkPresent->find('animal_id',$_POST['animal_id']);

if($checkPresent->rowCount()>0){
    $updateprice = new DatabaseTable('sponsorship_price');
    $updateprice->update($_POST,'animal_id');
    $out['data']= "Updated";
}
else{
    

$addprice = new DatabaseTable('sponsorship_price');
$addprice->insert($_POST);
$out['data']="Added";

}

echo json_encode($out);
?>