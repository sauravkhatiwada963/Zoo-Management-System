<?php
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';
$out=[];
$archiveVacancy =$pdo->prepare("UPDATE vacancies SET archive_status=:st WHERE v_id=:v_id");
if($archiveVacancy->execute(['st'=>$_POST['archive'],'v_id'=>$_POST['v_id']])){
    $out['data']= "Done";
}
echo json_encode($out);

?>