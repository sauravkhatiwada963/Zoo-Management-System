<?php
header('Content-Type: application/json');
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';
$out=[];
$archiveStaffs =$pdo->prepare("UPDATE staffs SET archive_status=:st WHERE staff_id=:staff_id");
if($archiveStaffs->execute(['st'=>$_POST['archive'],'staff_id'=>$_POST['staff_id']])){
    $out['data']= "Done";
}
echo json_encode($out);

?>