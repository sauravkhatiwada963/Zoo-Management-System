<?php 

require '../../classes/databasetable.php';
require '../../db/dbconnect.php';


$_POST['image']=$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],"../../images/{$_FILES['image']['name']}");

$table= new DatabaseTable('events');
$table->update($_POST,'e_id');
echo  'updated';


?>