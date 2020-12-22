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
                        

														$spons = $pdo->prepare('SELECT * FROM sponsor_animals WHERE approved_status=:ap AND sp_id=:id  ');
														 $spons->execute(['ap'=>'OnProgress' ,'id'=>$_SESSION['sp_id']]);
														$appTable= new setTable();  //table is set
														$appTable->setTopics(["Animal","Image","Started From","Valid Till","Link"]);  //header is set
														
														if($spons->rowCount()>0){
																foreach($spons as $s){
																	$appTable->addEntries([
                                                                         "<img src='../../images/" . loadoneimage($s['animal_id']) . "' alt='error' style='height:50px;'>"
                                                                        ,
                                                                        "<img src='../../images/" .$s['image']. "' alt='error' style='height:50px;'>"
                                                                        
                                                                        
                                                                        ,$s['started_from'],$s['valid_till'],$s['redirect_link'] ]);
																}
																echo $appTable->getValues();  
														}	
														else{
															echo "<br>"; ?>
						
														<div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
															<h6 class="alert-heading text-semibold">No Results found</h6>
														</div>
														<?php  } 	 
													?>
							
												</div>
											</div>

											<div class="tab-pane" id="accepted-tab">
												<div class="table-responsive pre-scrollable">
                                                <?php 
                        

                                                    $spons = $pdo->prepare('SELECT * FROM sponsor_animals WHERE approved_status=:ap AND sp_id=:id  ');
                                                    $spons->execute(['ap'=>'Yes' ,'id'=>$_SESSION['sp_id']]);
                                                    $appTable= new setTable();  //table is set
                                                    $appTable->setTopics(["Animal","Image","Started From","Valid Till","Link"]);  //header is set
                                                    
                                                    if($spons->rowCount()>0){
                                                            foreach($spons as $s){
                                                                $appTable->addEntries([
                                                                    "<img src='../../images/" . loadoneimage($s['animal_id']) . "' alt='error' style='height:50px;'>"
                                                                   ,
                                                                   "<img src='../../images/" .$s['image']. "' alt='error' style='height:50px;'>"
                                                                   
                                                                   
                                                                   ,$s['started_from'],$s['valid_till'],$s['redirect_link'] ]);
                                                            }
                                                            echo $appTable->getValues();  
                                                    }	
                                                    else{
                                                        echo "<br>"; ?>

                                                    <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                                                        <h6 class="alert-heading text-semibold">No Results found</h6>
                                                    </div>
                                                    <?php  } 	 
                                                ?>
							
												</div>
											</div>

											<div class="tab-pane" id="rejected-tab">
												<div class="table-responsive pre-scrollable">
                                                <?php 
                        

                                                    $spons = $pdo->prepare('SELECT * FROM sponsor_animals WHERE approved_status=:ap AND sp_id=:id  ');
                                                    $spons->execute(['ap'=>'No' ,'id'=>$_SESSION['sp_id']]);
                                                    $appTable= new setTable();  //table is set
                                                    $appTable->setTopics(["Animal","Image","Started From","Valid Till","Link"]);  //header is set
                                                    
                                                    if($spons->rowCount()>0){
                                                            foreach($spons as $s){
                                                                $appTable->addEntries([
                                                                    "<img src='../../images/" . loadoneimage($s['animal_id']) . "' alt='error' style='height:50px;'>"
                                                                   ,
                                                                   "<img src='../../images/" .$s['image']. "' alt='error' style='height:50px;'>"
                                                                   
                                                                   
                                                                   ,$s['started_from'],$s['valid_till'],$s['redirect_link'] ]);
                                                            }
                                                            echo $appTable->getValues();  
                                                    }	
                                                    else{
                                                        echo "<br>"; ?>

                                                    <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                                                        <h6 class="alert-heading text-semibold">No Results found</h6>
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

