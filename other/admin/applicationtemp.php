<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';


function whichPosition($v_id){
	$vacancies = new DatabaseTable('vacancies');
	$vacancy=$vacancies->find('v_id',$v_id); 
	$vacancy =$vacancy->fetch();
	return $vacancy['v_position'];

}

function actionTabs($a_id){
	return'	
	<ul class="icons-list">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-menu9"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li class="acceptapplication" id='.$a_id.'><a><i class="icon-user-check"></i> Accept</a></li>
						<li class="rejectapplication" id='.$a_id.'><a><i class="icon-user-minus"></i> Reject</a></li>
					</ul>
				</li>
			</ul>
	';

}
?>


<div class="">
			<div class="panel panel-flat">
								

								<div class="panel-body">
									<div class="tabbable">
                                    <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
											<li class="active"><a href="#process-tab" data-toggle="tab"><i class="icon-spinner3 position-left"></i> On Process</a></li>
											<li><a href="#accepted-tab" data-toggle="tab"><i class="icon-user-check position-left"></i> Accepted</a></li>
											<li><a href="#rejected-tab" data-toggle="tab"><i class="icon-user-minus position-left"></i> Rejected</a></li>
										</ul>

                                        <div class="tab-content">
											<div class="tab-pane active" id="process-tab">
												<br>

												<div class="table-responsive pre-scrollable">
                            						<?php 
                        

														$applications = new DatabaseTable('applications');
														$application= $applications->find('application_status','Onprocess'); //extracts all regarding enquiries table
														$appTable= new setTable();  //table is set
														$appTable->setTopics(["Applicant","Email","Number","CV","Position","Action"]);  //header is set
														
														if($application->rowCount()>0){
																foreach($application as $a){
																	$appTable->addEntries([ $a['applicant_name'],$a['applicant_email'],$a['applicant_number'],
																		'<a  download ="'.$a['applicant_cv'].'"   href="../../files/'.$a['applicant_cv'].'">
																				<button type="button" class="btn btn-primary btn-icon btn-warning"><i class="icon-file-download"></i></button>
																		</a>'
																	,
																	whichPosition($a['v_id'] ),actionTabs($a['a_id'])
																	
																	]);
																}
																echo $appTable->getValues();  
														}	
														else{
															echo "<br>"; ?>
						
														<div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
															<h6 class="alert-heading text-semibold">No Applications found</h6>
														</div>
														<?php  } 	 
													?>
							
												</div>
											</div>

											<div class="tab-pane" id="accepted-tab">
												<div class="table-responsive pre-scrollable">
                            						<?php 

														$applications = new DatabaseTable('applications');
														$application= $applications->find('application_status','Accepted'); //extracts all regarding enquiries table
														$appTable= new setTable();  //table is set
														$appTable->setTopics(["Applicant","Email","Number","CV","Position"]);  //header is set
														
														if($application->rowCount()>0){
															foreach($application as $a){
																$appTable->addEntries([ $a['applicant_name'],$a['applicant_email'],$a['applicant_number'],
																	'<a  download ="'.$a['applicant_cv'].'"   href="../../files/'.$a['applicant_cv'].'">
																			<button type="button" class="btn btn-primary btn-icon btn-warning"><i class="icon-file-download"></i></button>
																	</a>'
																,
																whichPosition($a['v_id'] )
																
																]);
															}
															echo $appTable->getValues();   //value is passed
														} //value is passed
														else{
														   echo "<br>"; ?>
					   
													   <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
														   <h6 class="alert-heading text-semibold">No Applications found</h6>
													   </div>
													   <?php  }   
												   ?>
							
												</div>
											</div>

											<div class="tab-pane" id="rejected-tab">
												<div class="table-responsive pre-scrollable">
                            						<?php 

														$applications = new DatabaseTable('applications');
														$application= $applications->find('application_status','Rejected'); //extracts all regarding enquiries table
														$appTable= new setTable();  //table is set
														$appTable->setTopics(["Applicant","Email","Number","CV","Position"]);  //header is set
														
														if($application->rowCount()>0){
															foreach($application as $a){
																$appTable->addEntries([ $a['applicant_name'],$a['applicant_email'],$a['applicant_number'],
																	'<a  download ="'.$a['applicant_cv'].'"   href="../../files/'.$a['applicant_cv'].'">
																			<button type="button" class="btn btn-primary btn-icon btn-warning"><i class="icon-file-download"></i></button>
																	</a>'
																,
																whichPosition($a['v_id'] )
																
																]);
															}
															echo $appTable->getValues();  
														 } //value is passed
														 else{
															echo "<br>"; ?>
						
														<div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
															<h6 class="alert-heading text-semibold">No Applications found</h6>
														</div>
														<?php  }   
													?>
							
												</div>
											</div>

											
                                        </div>
                                        
									</div>
								</div>
							</div>

							
		    </div>
</div>


<script>


$('.acceptapplication').click(function(){
	$.ajax({
              url:"applicationstatus.php",
              method:"POST",
              data:{ a_id:$(this).attr('id'),st:'Accepted'},
              success:function(response){
                  
                if(response.data=='Done'){
                    loadapplicationtemp();
                }
              }
      });  
});



$('.rejectapplication').click(function(){
	$.ajax({
              url:"applicationstatus.php",
              method:"POST",
              data:{ a_id:$(this).attr('id'),st:'Rejected'},
              success:function(response){
                  
                if(response.data=='Done'){
                    loadapplicationtemp();
                }
              }
      });  
});


</script>