<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

?>


<div class="panel panel-fit">

        <div class="panel-heading bg-teal">
			<h5 class="panel-title">Archived Location</h5>
        </div>

        <div class="table-responsive pre-scrollable">
                            <?php 
                        

							function archive($ar,$location_id){

								if($ar == 'Yes'){  // button is selected 
									return '
									<button class="btn btn-success btn-labeled unarchivelocbutton" type="button" id='.$location_id.'>
										  <b>
										  <i class="icon-database position-left"></i>
										  </b>
										  Unarchive
										</button>
									';
								}
								
							}

							$locations = new DatabaseTable('locations');
							$location= $locations->find('archive_status','Yes'); //extracts all regarding enquiries table
							$locTable= new setTable();  //table is set
							$locTable->setTopics(["Location","Archive Status"]);  //header is set
							
                                if($location->rowCount()>0){
                                    foreach($location as $l){
                                        $locTable->addEntries([$l['location_name'],
                                        archive($l['archive_status'],$l['location_id'])
                                        ]);
                                    }
                                    echo $locTable->getValues();   //value is passed
                                }
                                else{
                                    echo "<br>"; ?>

                                <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                                    <h6 class="alert-heading text-semibold">No archived locations
                                         found</h6>
                                </div>
                                <?php  }   ?>
							
						</div>

</div>

<script>

    
$('.unarchivelocbutton').click(function(){
	$.ajax({
              url:"archivelocation.php",
              method:"POST",
              data:{ location_id:$(this).attr('id'),archive:'No'},
              success:function(response){
                  
                if(response.data=='Done'){
                    loadviewlocationtemp();
                }
              }
      });  
});

</script>