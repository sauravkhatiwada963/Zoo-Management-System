<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

?>

<div class="panel panel-fit">

        <div class="panel-heading bg-teal">
			<h5 class="panel-title">Archived Animals</h5>
        </div>

        <div class="table-responsive pre-scrollable">
                            <?php 
                        

							function archive($ar,$animal_id){

								if($ar == 'Yes'){  // button is selected 
									return '
									<button class="btn btn-success btn-labeled unarchivebutton" type="button" id='.$animal_id.'>
										  <b>
										  <i class="icon-database position-left"></i>
										  </b>
										  Unarchive
										</button>
									';
								}
								
                            }
                            
                           
                                   

							$animals = new DatabaseTable('animals');
							$animal= $animals->find('archived','Yes'); //extracts all regarding enquiries table
							$anTable= new setTable();  //table is set
							$anTable->setTopics(["Name","Species","DOB","Gender","Action"]);   //header is set
							
                                if($animal->rowCount()>0){
                                    foreach($animal as $a){
                                        $anTable->addEntries([  $a['nick_name'],
                                        $a['species_name'],
                                        $a['dob'],$a['gender'],
                                        archive($a['archived'],$a['animal_id']) ]);
                                    }
                                    echo $anTable->getValues();   //value is passed
                                }
                                else{
                                    echo "<br>"; ?>

                                <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                                    <h6 class="alert-heading text-semibold">No Animals
                                         found</h6>
                                </div>
                                <?php  }   ?>
							
						</div>

</div>

<script>

$('.unarchivebutton').click(function(){
	$.ajax({
              url:"../admin/archiveanimal.php",
              method:"POST",
              data:{ animal_id:$(this).attr('id'),archive:'No'},
              success:function(response){
                  
                if(response.data=='Done'){
                    loadviewanimaltemp();
                }
              }
      });  
});


</script>