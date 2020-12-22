<?php
require '../db/dbconnect.php';
require '../classes/databasetable.php';

header('Content-Type: application/json');

$_POST['applicant_cv'] =$_FILES['applicant_cv']['name'][0];


$table= new DatabaseTable('applications');
$table->save($_POST);

move_uploaded_file($_FILES['applicant_cv']['tmp_name'][0],"../files/{$_FILES['applicant_cv']['name'][0]}");

$ok="done";
echo json_encode($ok);
?>