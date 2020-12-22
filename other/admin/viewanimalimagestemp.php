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

<div id="add-image-modal" class="modal fade" data-backdrop="false">
						<div class="modal-dialog panel border-teal">
							<div class="modal-content scrollable">
								<div class="modal-header bg-teal">
									<button type="button" id="add_image_modal" class="close" data-dismiss="modal" >&times;</button>
									<i class="text-bold position-left"></i>Add Images
								</div>

								<div class="modal-body">
								<form id="addimageform" class="form-horizontal">
							<fieldset class="content-group">
							
    						
								
									<div class="form-group">
										<label class="control-label col-md-2">Animal :</label>
										<select id="animal_id"  name="animal_id" class="form-control">
                                        <?php 
                                                                $animals=  new DatabaseTable('animals');
                                                                $animal= $animals->findAll();

                                                                foreach ($animal as $a){?>
                                                                    <option id="<?php echo $a['animal_id']?>"  value="<?php echo $a['animal_id']?>"><?php echo $a['nick_name']?></option>
                                                                <?php }

                                                            ?> 
										</select>

                                    </div>
                                    

                                    
                                     

                                    
                                    <div class="form-group">
											<label>Your avatar:</label>
											<input id="file" name="imageFile[]" type="file" multiple required>	
									</div>
            					

									

							</fieldset>

						<div class="text-right">
							<button type="submit" id="price_submit" class="btn bg-teal" >Submit <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</form>
								</div>

								
							</div>
						</div>
</div>

<div class="panel panel-flat">
	<div class="panel-heading ">
		<div class="row">							
            <div class="text-right">
                <button data-toggle="modal" data-target="#add-image-modal" type="button" class="btn bg-teal-400 btn-labeled btn-rounded">
                <b><i class="icon-add"></i></b> Add 
                </button>
            </div>
		</div>
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
<script>

$("form#addimageform").submit(function(e){
	e.preventDefault();
		var formData = new FormData(this);
		$.ajax({
		url: "../admin/uploadimage.php",
		type: 'POST',
		data: formData,
		success: function (response) {
			location.reload();
		},
		cache: false,
		contentType: false,
		processData: false
	});
});


$('.archive').click(function(){
    $.ajax({
              url:"../admin/archiveimage.php",
              method:"POST",
              data:{ img_id:$(this).attr('id'),st:'Yes'},
              success:function(response){
                  console.log(response);
                  
                if(response.data=='Done'){
                    loadviewarchivedimages();
                }
              }
      });  
});


</script>