<?php 
if(!isset($_SESSION)){session_start();}  
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

function loadoneimage($id){
    global $pdo;
    $send;
    $myCreds = $pdo -> prepare("SELECT img FROM animalimages WHERE animal_id=:id ");
    $myCreds-> execute(["id"=>$id ]);
    $ok = $myCreds->fetch();

    if($ok[0]==''){
        $send='noimage.PNG';
    }
    else{
        $send=$ok[0];
    }


    return $send;
}    

function  checkAvailable($id){
    global $pdo;
    $approved ="";
    $animals = $pdo->prepare("SELECT approved_status FROM sponsor_animals WHERE animal_id=:animal_id ");
    $animals->execute(['animal_id'=>$id]);
    if($animals->rowCount()>0){
        $ok =$animals->fetchAll();
        
        foreach($ok as $o){
            if($o['approved_status']=="Yes"){
                $approved ="Yes";
            }
            else{
                $approved ="No";
            }

        }

    }
    else{
        $approved ="No";
    }

    return $approved;
}





?>



<div id="sponsor-animal-modal" class="modal fade" data-backdrop="false">
						<div class="modal-dialog panel border-teal">
							<div class="modal-content">
								<div class="modal-header bg-teal" >
                                <button type="button" id="sponsor-animal-modal" class="close" data-dismiss="modal" >&times;</button>
									<i class="icon-piggy-bank position-left"></i> Sponsor an Animal
								</div>

								<div class="modal-body">
                                    <p class="text-right">
										<button type="button" class="btn btn-link  daterange-ranges heading-btn text-semibold">
                                            <i class="icon-calendar3 position-left"></i><?= date('Y-m-d')?> / <?=date('Y-m-d', strtotime('+1 years'));?>
										</button>
                                    </p>
								<form id="sponsoranimalform" class="form-horizontal">
							<fieldset class="content-group">
									
									<div class="form-group">
										<label class="control-label col-md-6">Redirect Link:</label>
										<br>
										<div class="col-md-12">
											<input class="form-control" type="text" id="redirect_link" name="redirect_link"  placeholder="www.example.com" required>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2">Image:</label>
										<br>
										<div class="col-md-10">
											<input id="file" name="image" type="file"  required>		
										</div>	
									</div>
                                    <input type="hidden" name="animal_id" id="animal_id" value="">
                                    <input type="hidden"  name="started_from" id="started_from" value="<?= date('Y-m-d')?>">
                                    <input type="hidden"  name="valid_till" id="valid_till" value="<?=date('Y-m-d', strtotime('+1 years'));?>">
                                    <input type="hidden" name="sp_id" value="<?=$_SESSION['sp_id']?>">
							</fieldset>

						<div class="text-right">
							<button type="submit" id="sponsor_submit" class="btn bg-teal" >Submit <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</form>
								</div>

								
							</div>
						</div>
</div>

				                	
                               
<div class="panel panel-flat" style="height:100%; padding:20px;">
    <div class="row" >
        <?php 
        $stmt = "SELECT * FROM animals  ";
        $animals =$pdo->query($stmt)->fetchAll();

        foreach($animals as $key => $value){?>     		

            <div class="col-md-6">
				<div class="panel  border-teal">
                    <div class="panel-heading bg-teal">
                        <h6 class="no-margin text-semibold"><i class="icon-paw"></i>        <?php echo $value['nick_name'];?></h6>
                    </div>


					<div class="panel-body">
                        
                        <div class="col-md-12">
                            <p class="text-center">
                      
                          <?php  echo "<img src='../../images/" . loadoneimage($value[0]). "' alt='error' style='height:150px;width:150px;'>";   ?>
                        
                            <br>
                            <br>
                            
                        
                            </p>
                            Description: 
                            <?php echo $value['description']?>
                        </div>
                        <br>
                        <br>

                            <div class="col-md-6  " style="padding:10px;">
                                    <p class=" text-light"> Species name : <?=$value['species_name']?></p>       
                                    <p class=" text-light">  Date of birth : <?php echo $value['dob']?></p>
                                    <p class=" text-light">  Gender : <?php echo $value['gender']?>   </p>
                                    <p class=" text-light">  Average Lifespan : <?php echo $value['avg_lifespan']?> </p>                            
                                    <p class=" text-light">  Diet : <?php echo $value['dietary_req']?></p>   
                                    <p class=" text-light">  Habitat :<?php echo $value['natural_habitat']?></p>   
                             </div> 

                             <div class="col-md-6  " style="padding:10px;">
                                    <p class=" text-light">  Population distribution : <?php echo $value['pop_dist']?>  </p>   
                                    <p class=" text-light">  Joined Date : <?php echo $value['join_date']?>  </p> 
                                    <p class=" text-light">  Height : <?php echo $value['height']?>  cm </p>
                                    <p class=" text-light">   Weight : <?php echo $value['weight']?>  kg</p>   
                                	
                             </div>   
                    </div>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        
        <div class="text-right" style="padding:5px;">
             <p>
                <?php 
                      if(  checkAvailable($value[0]) == "No"){   ?>
                <button id="<?=$value[0]?>"  data-toggle="modal" data-target="#sponsor-animal-modal" type="button" class="btn bg-teal-700 btn-labeled sponsoropenmodel">
                    <b><i class="icon-coins"></i></b> 
                    Sponsor
                </button>
                      <?php } else{
                          ?>
                        <button type="button" class="btn bg-success btn-labeled sponsoredby">
                            <b><i class="icon-checkbox-checked"></i></b> 
                            Sponsored
                        </button>
                        
                      <?php } ?>
            </p>
        </div>	
                        
 <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                        -->
				</div>		
			</div>
        <?php }
        ?>
    </div>
</div>


<script>

$('.close').click(function(){
    $('#animal_id').val(" ");
});    

$('.sponsoropenmodel').click(function(){
    $('#animal_id').val($(this).attr('id'));
});

$("form#sponsoranimalform").submit(function(e){
	e.preventDefault();
		var formData = new FormData(this);
		$.ajax({
		url: "applysponsor.php",
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


</script>