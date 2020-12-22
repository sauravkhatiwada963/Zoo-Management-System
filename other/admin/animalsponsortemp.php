<?php 

require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

function whichSponsor($id){
    global $pdo;
    $spons = $pdo->prepare("SELECT client_name FROM sponsors WHERE sp_id=:id ");
    $spons-> execute(["id"=>$id ]);
    $spons= $spons->fetch();
   return $spons[0];
}


function loadoneimage($id){
    global $pdo;
    $myCreds = $pdo -> prepare("SELECT img FROM animalimages WHERE animal_id=:id ");
    $myCreds-> execute(["id"=>$id ]);
    $ok = $myCreds->fetch();
    return $ok[0];
} 

function actiontab($id,$com){
    if($com == "No"){
    return ' 	<div class="btn-group">
                    <button type="button" class="btn bg-teal-400 btn-labeled dropdown-toggle" data-toggle="dropdown">
                    <b><i class=" icon-cog"></i></b> Action   <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                    <li class="markasaccepted" id="'.$id.'"><a href="#"><i class=" icon-enlarge5"></i> Mark as Accepted</a></li>
                    <li class="markasrejected" id="'.$id.'"><a href="#"><i class=" icon-shrink5"></i> Mark as Rejected</a></li>        
                    </ul></div>
            ';
    }   

    else if($com == "Yes"){
        return ' 	<div class="btn-group">
        <button type="button" class="btn bg-teal-400 btn-labeled dropdown-toggle" data-toggle="dropdown">
        <b><i class=" icon-cog"></i></b> Action   <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-right">
        <li class="markascompleted" id="'.$id.'"><a href="#"><i class="icon-checkmark2"></i> Mark as completed</a></li>      
        </ul></div>
';
    }

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
                                            <li><a href="#completed-tab" data-toggle="tab"><i class="icon-task position-left"></i> Completed</a></li>
										</ul>

                                        <div class="tab-content">
											<div class="tab-pane active" id="process-tab">
												<br>

												<div class="table-responsive pre-scrollable">
                            						<?php 
                        

														$spons = $pdo->prepare('SELECT * FROM sponsor_animals WHERE approved_status=:ap AND complete_status=:c  ');
														 $spons->execute(['ap'=>'OnProgress' ,'c'=>'No' ]);
														$appTable= new setTable();  //table is set
														$appTable->setTopics(["Animal","Sponsor","Image","Started From","Valid Till","Link","Action"]);  //header is set
														
														if($spons->rowCount()>0){
																foreach($spons as $s){
																	$appTable->addEntries([
                                                                         "<img src='../../images/" . loadoneimage($s['animal_id']) . "' alt='error' style='height:50px;'>"
                                                                        , whichSponsor($s['sp_id']),
                                                                        "<img src='../../images/" .$s['image']. "' alt='error' style='height:50px;'>"
                                                                        
                                                                        
                                                                        ,$s['started_from'],$s['valid_till'],$s['redirect_link'] , actiontab($s['id'],"No")]);
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
                        

                                                    $spons = $pdo->prepare('SELECT * FROM sponsor_animals WHERE approved_status=:ap AND complete_status=:c   ');
                                                    $spons->execute(['ap'=>'Yes','c'=>'No'  ]);
                                                    $appTable= new setTable();  //table is set
                                                    $appTable->setTopics(["Animal","Sponsor","Image","Started From","Valid Till","Link","Action"]);  //header is set
                                                    
                                                    if($spons->rowCount()>0){
                                                            foreach($spons as $s){
                                                                $appTable->addEntries([
                                                                    "<img src='../../images/" . loadoneimage($s['animal_id']) . "' alt='error' style='height:50px;'>"
                                                                   ,whichSponsor($s['sp_id']),
                                                                   "<img src='../../images/" .$s['image']. "' alt='error' style='height:50px;'>"
                                                                   
                                                                   
                                                                   ,$s['started_from'],$s['valid_till'],$s['redirect_link'] ,actiontab($s['id'],"Yes") ]);
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
                        

                                                    $spons = $pdo->prepare('SELECT * FROM sponsor_animals WHERE approved_status=:ap AND complete_status=:c  ');
                                                    $spons->execute(['ap'=>'No','c'=>'No' ]);
                                                    $appTable= new setTable();  //table is set
                                                    $appTable->setTopics(["Animal","Sponsor","Image","Started From","Valid Till","Link"]);  //header is set
                                                    
                                                    if($spons->rowCount()>0){
                                                            foreach($spons as $s){
                                                                $appTable->addEntries([
                                                                    "<img src='../../images/" . loadoneimage($s['animal_id']) . "' alt='error' style='height:50px;'>"
                                                                   ,whichSponsor($s['sp_id']),
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

                                            <div class="tab-pane" id="completed-tab">
												<div class="table-responsive pre-scrollable">
                                                <?php 
                        

                                                    $spons = $pdo->prepare('SELECT * FROM sponsor_animals WHERE complete_status=:c  ');
                                                    $spons->execute(['c'=>'Yes' ]);
                                                    $appTable= new setTable();  //table is set
                                                    $appTable->setTopics(["Animal","Sponsor","Image","Started From","Valid Till","Link"]);  //header is set
                                                    
                                                    if($spons->rowCount()>0){
                                                            foreach($spons as $s){
                                                                $appTable->addEntries([
                                                                    "<img src='../../images/" . loadoneimage($s['animal_id']) . "' alt='error' style='height:50px;'>"
                                                                   ,whichSponsor($s['sp_id']),
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

<script>

$('.markasaccepted').click(function(){
        
    $.ajax({
            url:"updatesponsoranimal.php",
            method:"POST",
            data:{ id:$(this).attr('id'),complete_status:"No",approved_status:"Yes"},
            success:function(response){
                console.log(response);
                if(response.data=='Done'){
                    loadanimalsponsorTemp();
                }
            }
    });  

});

$('.markasrejected').click(function(){
    $.ajax({
            url:"updatesponsoranimal.php",
            method:"POST",
            data:{ id:$(this).attr('id'),complete_status:"No",approved_status:"No"},
            success:function(response){
                console.log(response);
                if(response.data=='Done'){
                    loadanimalsponsorTemp();
                }
            }
    });  
});

$('.markascompleted').click(function(){
    $.ajax({
            url:"updatesponsoranimal.php",
            method:"POST",
            data:{ id:$(this).attr('id'),complete_status:"Yes"},
            success:function(response){
                console.log(response);
                if(response.data=='Done'){
                    loadanimalsponsorTemp();
                }
            }
    });  
});

</script>