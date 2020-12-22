<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

?>
<div id="view-animal-modal" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="vanimalmodal-title">View Animal</h5>
								</div>

								<div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12" id="specificimage" style="text-align:center;">
                                        </div>
                                    </div> 
                                        <hr>
                                        <br>                       
                                    <div class="row">
                                            <div class="col-md-6" id="easyretreive">
                                            </div>
                                            <div class="col-md-6" id="specificretrieve">
                                            </div>
                                    </div>

								</div>

							</div>
						</div>
</div>


<div class="panel panel-flat " style="height:100%">
						<div class="table-responsive pre-scrollable">
                            <?php 
                            function loadDetailAnimal($nickname,$id){                 
                            //   return data-toggle="modal" data-target="#view-animal-modal"
                                return '<button type="button" id ="'.$id.'"class="btn btn-default btn-sm loadvanimal" >
                                        <i class=" icon-stack-empty position-left"></i>'.$nickname.'
                                        </button>';
                                
                             }

							$animals = new DatabaseTable('animals');
							$animal= $animals->find('archived','No'); //extracts all regarding enquiries table
							$anTable= new setTable();  //table is set
							$anTable->setTopics(["Name","Species","DOB","Gender","Life span"]);  //header is set
							
							foreach($animal as $a){
                                $anTable->addEntries([ 
                                    loadDetailAnimal($a['nick_name'],$a['animal_id']),
                                
                                    $a['species_name'],
                                    $a['dob'],$a['gender'],$a['avg_lifespan'] ]);
							}
							echo $anTable->getValues();   //value is passed
							?>
							
						</div>
					</div>


</div>   




<script>
$('.loadvanimal').click(function(){
    $('#view-animal-modal').modal('show');
	$.ajax({
              url:"../admin/commondata.php",
              method:"POST",
              data:{ animal_id:$(this).attr('id')},
              success:function(data){
                  $('#easyretreive').html(data);        
              }
      });  

    $.ajax({
              url:"../admin/intricatedata.php",
              method:"POST",
              data:{ animal_id:$(this).attr('id')},
              success:function(data){
                 $('#specificretrieve').html(data);
              }
      });  

      $.ajax({
              url:"../admin/specificimage.php",
              method:"POST",
              data:{ animal_id:$(this).attr('id')},
              success:function(data){
                 $('#specificimage').html(data);
                
              }
      });  
    
});
</script>