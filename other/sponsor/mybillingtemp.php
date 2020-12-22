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


function getSband($id){
	global $pdo;
	$stmt = $pdo->prepare('SELECT sponsor_band FROM sponsorship_price WHERE animal_id=:id');
	$stmt->execute(['id'=>$id]);
	$stmt=$stmt->fetch();
	return $stmt[0];
}

function Amount($b){
	$band;

	if($b=='A'){
		$band='2500';
	}
	else if($b=='B'){
		$band='2000';
	}
	else if($b=='C'){
		$band='1500';
	}
	else if($b=='D'){
		$band='1000';
	}
	else if($b=='E'){
		$band='500';
	}
	return $band;

}


?>




<!-- <div class="panel panel-flat" style="height:100%; padding:20px;">


</div> -->
	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<div class="content">

					<!-- Invoice archive -->
					<div >
					
					
								<?php 

								$stmt =$pdo->prepare('SELECT * FROM sponsor_animals WHERE sp_id=:spid AND approved_status=:ap');
								$stmt->execute([ 'spid'=>$_SESSION['sp_id'] ,'ap'=>"Yes" ]);

								if($stmt->rowCount()>0){ ?>
									<table class="table table-lg invoice-archive panel panel-white">
									<thead>
										<tr>
									
									<th>Animal</th>
					                <th>Status</th>
					                <th>Started From</th>
					                <th>Valid Till</th>
					                <th>Amount</th>
					                
										</tr>
									</thead>
									<tbody>
									
								<?php	foreach($stmt as $s){?>
										<tr>
											
											<td>
											<img src="../../images/<?=loadoneimage($s['animal_id'])?>"  alt='error' style='height:50px;'>
											</td>
											
											<td>
											<?php if($s['complete_status']=='No'){ ?>
												<span class="label label-success">ON GOING</span>
											<?php	}
												else{?>
															<span class="label label-success">COMPLETED</span>
											<?php	} ?>

											</td>
											<td>
											<?php  echo date("d-m-Y", strtotime($s['started_from']));?>
											</td>
											<td>
											<?php  echo date("d-m-Y", strtotime($s['valid_till']));?>
											</td>
											<td>
												<h6 class="no-margin text-bold">$ <?=Amount(getSband($s['animal_id'])) ?>
													<small class="display-block text-muted text-size-small">
													<?=getSband($s['animal_id']);?>
													</small>
												</h6>
											</td>
											
										</tr>

							<?php	}?>
							
							</tbody>
							</table>
							<?php		}
								else{?>
								
											
										<div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
											<h6 class="alert-heading text-semibold">No records found</h6>
										</div>		
									
								

							<?php } ?>

				          
					</div>
					<!-- /invoice archive -->

							</div>
						</div>
					</div>
					<!-- /modal with invoice -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
