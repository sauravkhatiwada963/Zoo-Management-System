<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

function whichAnimal($animal_id){
    $animal = new DatabaseTable('animals');
    $animal=$animal->find('animal_id',$animal_id);
    $animal=$animal->fetch();

    return $animal['nick_name'];

}

?>



<div class="panel panel-flat">
	<div class="panel-heading ">
		
            <br>
                <div class="row ">
                
                            <?php
                            $stmt = $pdo->query('SELECT * FROM animalimages WHERE archive_status="No"'); 
                            foreach ($stmt as $row)
                            {?>
                            <div class="col-md-4">
                                <div class="panel panel-flat ">
                                            <div class="panel-heading">
                                                <h6 class="panel-title"><?php echo whichAnimal($row['animal_id']); ?></h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                    
                                                    <li data-popup="tooltip" title="Archive" class="archive" id="<?php echo $row['img_id']?>"><a data-action="close"></a></li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="panel-body">
                                                <div class="thumbnail">
                                                        <img src="../../images/<?= $row['img']?>" alt="" style="width:100%;height:250px;">
                                                </div>
                                            </div>
                                </div>
                            </div>    
                        <?php }
                        ?>    
                                                                                                                              
                </div>				
        </div>	
    </div>
</div>   
