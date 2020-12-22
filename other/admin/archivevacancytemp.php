<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

?>


<div class="panel">

        <div class="panel-heading bg-teal">
			<h5 class="panel-title">Archived Vacancy</h5>
        </div>

        <div class="table-responsive pre-scrollable">
                            <?php 
                        

							function archive($ar,$v_id){

								if($ar == 'Yes'){  // button is selected 
									return '
									<button class="btn btn-success btn-labeled unarchivevacbutton" type="button" id='.$v_id.'>
										  <b>
										  <i class="icon-database position-left"></i>
										  </b>
										  Unarchive
										</button>
									';
								}
								
							}

							$vacancies = new DatabaseTable('vacancies');
							$vacancy= $vacancies->find('archive_status','Yes'); //extracts all regarding enquiries table
							$vacTable= new setTable();  //table is set
							$vacTable->setTopics(["Position","Description","Type","Duration","Archive Status"]);  //header is set
							
                                if($vacancy->rowCount()>0){
                                    foreach($vacancy as $v){
                                        $vacTable->addEntries([$v['v_position'],$v['v_description'],$v['v_type'],$v['v_valid_from']."/".$v['v_valid_till'] ,
                                        archive($v['archive_status'],$v['v_id'])
                                        ]);
                                    }
                                    echo $vacTable->getValues();   //value is passed
                                }
                                else{
                                    echo "<br>"; ?>

                                <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                                    <h6 class="alert-heading text-semibold">No archived sponsors
                                         found</h6>
                                </div>
                                <?php  }   ?>
							
						</div>

</div>


<script>

    
$('.unarchivevacbutton').click(function(){
	$.ajax({
              url:"archivevacancy.php",
              method:"POST",
              data:{ v_id:$(this).attr('id'),archive:'No'},
              success:function(response){
                  
                if(response.data=='Done'){
                    loadarchivevacancytemp();
                }
              }
      });  
});

</script>