<?php
header('Content-type: application/json');
require '../../db/dbconnect.php';
require '../../classes/databasetable.php';
    
   $output=[];

   $stmt = $pdo->prepare('SELECT img FROM animalimages WHERE archive_status=:ar AND animal_id=:animal_id LIMIT 1');
   $stmt->execute(['ar'=>"No", 'animal_id'=>$_POST['animal_id']]);

   if($stmt->rowCount()>0){
        $stmt=$stmt->fetch();
        $output ='<img src="../../images/'.$stmt['0'].'" alt="icon" style="width:200px;height:200px;"/>';
        
   }
   else{
       $output ='<img src="../../images/noimage.PNG" alt="icon" style="width:200px;height:200px;"/>';
   }
    
    


        echo json_encode($output);
   

?>