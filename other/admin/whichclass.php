<?php 

require '../../db/dbconnect.php';
require '../../classes/databasetable.php';

$classification = new DatabaseTable('classification');
$classification=$classification->find('classif_id',$_GET['classif_id']);
$classification=$classification->fetch();


echo ( $classification['classif_name']);


?>