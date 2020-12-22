<?php 
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../db/dbconnect.php';
$out=[];
$_POST['image']=$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],"../../images/{$_FILES['image']['name']}");
unset($_FILES);
$sponsor = new DatabaseTable('sponsor_animals');
$sponsor->save($_POST);
$out['data'] ="sponsored";
echo json_encode($out);
?>