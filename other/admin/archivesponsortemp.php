<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

?>

<div class="panel panel-fit">

        <div class="panel-heading bg-teal">
			<h5 class="panel-title">Archived Sponsors</h5>
        </div>

        <div class="table-responsive pre-scrollable">
                            <?php 
                        

							function archive($ar,$sp_id){

								if($ar == 'Yes'){  // button is selected 
									return '
									<button class="btn btn-success btn-labeled unarchivebutton" type="button" id='.$sp_id.'>
										  <b>
										  <i class="icon-database position-left"></i>
										  </b>
										  Unarchive
										</button>
									';
								}
								
							}

							$sponsors = new DatabaseTable('sponsors');
							$sponsor= $sponsors->find('archived_status','Yes'); //extracts all regarding enquiries table
							$sponTable= new setTable();  //table is set
							$sponTable->setTopics(["Company Name","Client","Address","Contact","Email","Archive Status"]);  //header is set
							
                                if($sponsor->rowCount()>0){
                                    foreach($sponsor as $s){
                                        $sponTable->addEntries([ $s['company_name'],$s['client_name'],$s['com_address'],$s['com_contact'], $s['email'],
                                        archive($s['archived_status'],$s['sp_id']) ]);
                                    }
                                    echo $sponTable->getValues();   //value is passed
                                }
                                else{
                                    echo "<br>"; ?>

                                <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                                    <h6 class="alert-heading text-semibold">No sponsors
                                         found</h6>
                                </div>
                                <?php  }   ?>
							
						</div>

</div>

<script>

$('.unarchivebutton').click(function(){
	$.ajax({
              url:"archivesponsor.php",
              method:"POST",
              data:{ sp_id:$(this).attr('id'),archive:'No'},
              success:function(response){
                  
                if(response.data=='Done'){
                    loadarchivesponsortemp();
                }
              }
      });  
});


</script>