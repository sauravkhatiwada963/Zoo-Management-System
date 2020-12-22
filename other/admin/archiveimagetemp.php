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
	<div class="panel-heading">
            <br>
                <div class="row">
                
                            <?php
                            $stmt = $pdo->query('SELECT * FROM animalimages WHERE archive_status="Yes"'); 
                            if($stmt->rowCount()>0){
                                foreach ($stmt as $row)
                                {?>
                                <div class="col-md-4">
                                    <div class="panel panel-flat">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title"><?php echo whichAnimal($row['animal_id']); ?></h6>
                                                    <div class="heading-elements">
                                                        <ul class="icons-list" >
                                                                <button class="btn btn-success btn-labeled unarchiveimgbutton" type="button" id=<?=$row['img_id']?>>
                                                                    <b>
                                                                    <i class="icon-database position-left"></i>
                                                                    </b>
                                                                    Unarchive
                                                                </button>
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
                            <?php 
                                }
                            }    
                        else {
                                       echo "<br>"; ?>

                                <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                                    <h6 class="alert-heading text-semibold">No Images
                                        found</h6>
                                </div>

                        <?php }
                            ?>    
                                                                                                                              
                </div>				
        </div>	
    </div>
</div>  


<script>


$('.unarchiveimgbutton').click(function(){
    $.ajax({
              url:"../admin/archiveimage.php",
              method:"POST",
              data:{ img_id:$(this).attr('id'),st:'No'},
              success:function(response){
                  console.log(response);
                  
                if(response.data=='Done'){
                    loadviewanimalimagestemp();
                }
              }
      });  
});

</script>