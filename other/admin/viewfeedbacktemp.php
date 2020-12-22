<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';



?>


<div class="">
			<div class="panel panel-flat">
								

								<div class="panel-body">
									<div class="tabbable">
                                    <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
											<li class="active"><a href="#newfeedback-tab" data-toggle="tab"><i class=" icon-certificate position-left"></i> New Feedbacks</a></li>
											<li><a href="#accepted-tab" data-toggle="tab"><i class=" icon-file-eye2 position-left"></i> Old Feedbacks</a></li>
										
										</ul>

                                        <div class="tab-content">
											<div class="tab-pane active" id="newfeedback-tab">
												<br>

												<div class="table-responsive pre-scrollable">
                            						<?php 
                        

														$feedback = new DatabaseTable('feedback');
														$feedback= $feedback->find('read_status','No'); //extracts all regarding enquiries table
														$feedTable= new setTable();  //table is set
														$feedTable->setTopics(["Name","Email","Message","Date","Action"]);  //header is set
														
														if($feedback->rowCount()>0){
																foreach($feedback as $f){
                                                                    $feedTable->addEntries([ $f['name'],$f['email'], $f['message'],$f['date'],
                                                                    // ,
																	// 	'<a  download ="'.$a['applicant_cv'].'"   href="../../files/'.$a['applicant_cv'].'">
																	// 			<button type="button" class="btn btn-primary btn-icon btn-warning"><i class="icon-file-download"></i></button>
																	// 	</a>'
                                                                '
                                                                    <button id='.$f['feedback_id'].' class="btn btn-success btn-labeled markfeedback " type="button" >
                                                                          <b>
                                                                          <i class="icon-checkmark position-left"></i>
                                                                          </b>
                                                                        Mark as Seen
                                                                        </button>

                                                                   '
																	
																	]);
																}
																echo $feedTable->getValues();  
														}	
														else{
															echo "<br>"; ?>
						
														<div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
															<h6 class="alert-heading text-semibold">No New Feedbacks found</h6>
														</div>
														<?php  } 	 
													?>
							
												</div>
											</div>

											<div class="tab-pane" id="accepted-tab">
												<div class="table-responsive pre-scrollable">
                            						<?php 

														$feedback = new DatabaseTable('feedback');
														$feedback= $feedback->find('read_status','Yes'); //extracts all regarding enquiries table
														$feedTable= new setTable();  //table is set
														$feedTable->setTopics(["Name","Email","Message","Date"]);  //header is set
														
														if($feedback->rowCount()>0){
															foreach($feedback as $f){
																$feedTable->addEntries([ $f['name'],$f['email'],$f['message'], $f['date']
																
																]);
															}
															echo $feedTable->getValues();   //value is passed
														} //value is passed
														else{
														   echo "<br>"; ?>
					   
													   <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
														   <h6 class="alert-heading text-semibold">No Old Feedbacks found</h6>
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


$('.markfeedback').click(function(){
	$.ajax({
              url:"markfeedback.php",
              method:"POST",
              data:{ feedback_id:$(this).attr('id'),read_status:'Yes'},
              success:function(response){
                  
                if(response.data=='Done'){
                    loadfeedbacktemp();
                }
              }
      });  
});






</script>