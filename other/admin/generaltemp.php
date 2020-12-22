<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

function countSponsors(){
    global $pdo;
    $stmt =$pdo->prepare('SELECT count(*) FROM sponsors WHERE signed_status=:sig AND archived_status=:ar');
    $stmt->execute(['sig'=>'Yes' ,'ar'=>'No']);
    $count =$stmt->fetchColumn();
    return $count;
}

function countAnimals(){
    global $pdo;
    $stmt =$pdo->prepare('SELECT count(*) FROM animals WHERE  archived=:ar');
    $stmt->execute(['ar'=>'No']);
    $count =$stmt->fetchColumn();
    return $count;
}

function countEvents(){
    global $pdo;
    $stmt =$pdo->prepare('SELECT count(*) FROM events WHERE  archive_status=:ar');
    $stmt->execute(['ar'=>'No']);
    $count =$stmt->fetchColumn();
    return $count;
}

function staffs(){
    global $pdo;
    $stmt =$pdo->prepare('SELECT count(*) FROM staffs WHERE  archive_status=:a ');
    $stmt->execute(['a'=>'No'  ]);
    $count =$stmt->fetchColumn();
    return $count;

}


function countFeedbacks(){
    global $pdo;
    $stmt =$pdo->prepare('SELECT count(*) FROM feedback ');
    $stmt->execute();
    $count =$stmt->fetchColumn();
    return $count;

}

function countFeedbackType($r){
    global $pdo;
    $stmt =$pdo->prepare('SELECT count(*) FROM feedback WHERE read_status=:r');
    $stmt->execute(['r'=>$r ]);
    $count =$stmt->fetchColumn();
    return $count;

}

function countApplicationType($r){
    global $pdo;
    $stmt =$pdo->prepare('SELECT count(*) FROM applications WHERE application_status=:a');
    $stmt->execute(['a'=>$r ]);
    $count =$stmt->fetchColumn();
    return $count;

}




?>
<div class="row">


    <div class="col-lg-3">
		<div class="panel bg-primary">
			<div class="panel-body">
                <div class="heading-elements">
                    <ul class="icons-list">
                    <li class=" icon-coins" style="font-size:60px;"></li>
                    </ul>
                </div>
                <h3 class="no-margin"><?=countSponsors()?></h3>
                Sponsors
            </div>								
		</div>
    </div>

    <div class="col-lg-3">
		<div class="panel bg-danger">
			<div class="panel-body">
                 <div class="heading-elements ">
                    <ul class="icons-list ">
                    <li class=" icon-paw  " style="font-size:60px;"></li>
                    </ul>
                </div>
                <h3 class="no-margin"><?=countAnimals()?></h3>
                Animals
            </div>								
		</div>
    </div>

    <div class="col-lg-3">
		<div class="panel bg-success">
			<div class="panel-body">
                <div class="heading-elements">
                    <ul class="icons-list">
                    <li class="icon-calendar2" style="font-size:60px;"></li>
                    </ul>
                </div>
                <h3 class="no-margin"><?=countEvents()?></h3>
                Events
            </div>								
		</div>
    </div>


    <div class="col-lg-3">
		<div class="panel bg-purple">
			<div class="panel-body">
                <div class="heading-elements">
                    <ul class="icons-list">
                    <li class=" icon-users4" style="font-size:60px;"></li>
                    </ul>
                </div>
                <h3 class="no-margin"><?=staffs()?></h3>
                Staffs
            </div>								
		</div>
    </div>
    

</div>



<div class="row">
    <div class="col-md-6">

        <div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title ">Feedbacks</h6>
								</div>

								<!-- Numbers -->
								<div class="container-fluid">
									<div class="row text-center">
										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-clipboard3 position-left text-slate"></i> <?= countFeedbackType('No')?></h6>
												<span class="text-muted text-size-small">new feedbacks</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class=" icon-clipboard5 position-left text-slate"></i><?= countFeedbackType('Yes')?></h6>
												<span class="text-muted text-size-small">resolved feedbacks</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-clipboard4 position-left text-slate"></i> <?=countFeedbacks();?></h6>
												<span class="text-muted text-size-small">all feedbacks</span>
											</div>
										</div>
									</div>
								</div>
								<!-- /numbers -->


								<!-- Area chart -->
								<div id="messages-stats"></div>
								<!-- /area chart -->


								<!-- Tabs -->
			               
								<!-- /tabs -->


								<!-- Tabs content -->
								<div class="tab-content">
									<div class="tab-pane active fade in has-padding" id="messages-tue">
										<ul class="media-list">

                                        <?php 

                                        $stmt=$pdo->prepare('SELECT * FROM feedback ORDER BY date ASC LIMIT 5');
                                        $stmt->execute();
                                        $stmt = $stmt->fetchAll();

                                        foreach($stmt as $a){
                                        ?>
											<li class="media">
												<div class="media-left">
													<img src="../../dashboardresources/assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
													<span class="badge bg-danger-400 media-badge"><i class="icon-bell3" style="font-size:9px;"></i></span>
												</div>

												<div class="media-body">
													<a id="switchtofeedback">
														<?=$a['name']?>
                                                        <span class="media-annotation pull-right"><?=$a['date']?></span>
													</a>

													<span class="display-block text-muted"><?=substr($a['message'], 0, 10);?> ......................</span>
												</div>
											</li>

										
                                       <?php
                                       
                                        }
                                       ?>    
                                        
										</ul>
									</div>

								
								</div>
								<!-- /tabs content -->

		</div>

    </div>

    <div class="col-md-6">

        <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title ">Applications</h6>
                        </div>

                        <!-- Numbers -->
                        <div class="container-fluid">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="content-group">
                                        <h6 class="text-semibold no-margin"><i class=" icon-stack-text position-left text-slate"></i> <?= countApplicationType('Onprocess')?></h6>
                                        <span class="text-muted text-size-small">new applications</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="content-group">
                                        <h6 class="text-semibold no-margin"><i class=" icon-stack-check position-left text-slate"></i><?= countApplicationType('Accepted')?></h6>
                                        <span class="text-muted text-size-small">accepted applications</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="content-group">
                                        <h6 class="text-semibold no-margin"><i class="icon-stack-cancel position-left text-slate"></i> <?= countApplicationType('Rejected')?></h6>
                                        <span class="text-muted text-size-small">rejected applications</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /numbers -->


                        <!-- Area chart -->
                        <div id="messages-stats"></div>
                        <!-- /area chart -->


                        <!-- Tabs -->
                   
                        <!-- /tabs -->


                        <!-- Tabs content -->
                        <div class="tab-content">
                            <div class="tab-pane active fade in has-padding" id="messages-tue">
                                <ul class="media-list">

                                <?php 

                                $stmt=$pdo->prepare('SELECT * FROM applications ORDER BY a_id ASC LIMIT 5');
                                $stmt->execute();
                                $stmt = $stmt->fetchAll();

                                foreach($stmt as $a){
                                ?>
                                    <li class="media">
                                        <div class="media-left">
                                            <img src="../../dashboardresources/assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
                                            <span class="badge bg-danger-400 media-badge"><i class="icon-notebook" style="font-size:9px;"></i></span>
                                        </div>

                                        <div class="media-body">
                                            <a >
                                                <?=$a['applicant_name']?>
                                                <span class="media-annotation pull-right text-muted"><?=substr($a['applicant_email'], 0, 10);?> ......................</span>
                                            </a>

                        
                                        </div>
                                    </li>

                                
                               <?php
                               
                                }
                               ?>    
                                
                                </ul>
        </div>

                        
    </div>
                        <!-- /tabs content -->

</div>

</div>



</div>


<script>

$('#switchtofeedback').click(function(){
    loadfeedbacktemp();
});

</script>