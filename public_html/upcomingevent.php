<?php 
// header('Content-Type: application/json');
require '../classes/databasetable.php';
require '../db/dbconnect.php';

$out="";

$table= new DatabaseTable('events');
$table=$table->find('archive_status','No');
$records=$table->fetchColumn();

if($table->rowCount()>0){
    
    foreach($table as $t){?>
     
             
            <div class="s-12 m-12 l-6" style="padding:10px;">
                <div class="image-border-radius margin-m-bottom">

                    <div class="margin">
                        <div class="s-12 m-12 l-4 margin-m-bottom">
                            <a href="event.php" class="image-hover-zoom" href="/"><img src="../images/<?=$t['image']?>" style="  width: 200px;height: 120px;" alt=""></a>
                        </div>
                      
                        <div class="s-12 m-12 l-8 margin-m-bottom">
                            <h3><a href="eventstickets.php" class="text-dark text-primary-hover" href="/"><?=$t['e_title']?></a></h3>
                            <p><?=substr($t['e_description'],6);?>....................</p>
                            <a class="text-more-info text-primary-hover" href="eventstickets.php">Read more</a>
                        </div>
                    </div>  

                    <br>
                </div>
            </div>
               
            
    


<?php    }
}
else{
    $out='<span class="text-primary">Events</span>';
}


?>


