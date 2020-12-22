<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

?>
                

<div class="panel ">
						<div class="panel-heading bg-teal">
							<h5 class="panel-title">Sponsors</h5>
						</div>

					

						<div class="table-responsive pre-scrollable">
                            <?php 
                        
		 					function approval($approve,$sp_id){

								if($approve == 'No'){  // button is selected 
										return '
											<button class="btn btn-success btn-labeled approvebutton" type="button" id='.$sp_id.'>
												<b>
												<i class="icon-checkmark-circle2 position-left"></i>
												</b>
												Approve
											</button>
										';
								}
								else{
									return  '<span class="label label-success">Aprroved</span>';
								}

							}

							function archive($ar,$sp_id){

								if($ar == 'No'){  // button is selected 
									return '
									<button class="btn btn-warning btn-labeled archivebutton" type="button" id='.$sp_id.'>
										  <b>
										  <i class="icon-database position-left"></i>
										  </b>
										  Archive
										</button>
									';
								}
								
							}

							$sponsors = new DatabaseTable('sponsors');
							$sponsor= $sponsors->find('archived_status','No'); //extracts all regarding enquiries table
							$sponTable= new setTable();  //table is set
							$sponTable->setTopics(["Company Name","Client","Address","Contact","Email","Approved Status","Archive Status"]);  //header is set
							
							foreach($sponsor as $s){
								$sponTable->addEntries([ $s['company_name'],$s['client_name'],$s['com_address'],$s['com_contact'], $s['email'],
								approval($s['signed_status'],$s['sp_id']),archive($s['archived_status'],$s['sp_id']) ]);
							}
							echo $sponTable->getValues();   //value is passed
							?>
							
						</div>
					</div>


</div>               
                
<script>

$('.approvebutton').click(function(){

$.ajax({
		  url:"approvesponsor.php",
		  method:"POST",
		  data:{ sp_id:$(this).attr('id')},
		  success:function(response){
			  console.log(response);
			if(response.data=='Approved'){
				loadviewsponsortemp();
			}
		  }
  });  


});


$('.archivebutton').click(function(){
$.ajax({
		  url:"archivesponsor.php",
		  method:"POST",
		  data:{ sp_id:$(this).attr('id'),archive:'Yes'},
		  success:function(response){
			if(response.data =='Done'){
				loadarchivesponsortemp();
			}
		  }
  });  
});



</script>