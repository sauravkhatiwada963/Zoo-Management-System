<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';


function severeColor($severe){
    switch($severe){
        case '1':
                return 'progress-bar-info';
                break;
        case '2':
                return 'progress-bar';
                break;
        case '3':
                return 'progress-bar-success';
                break;
        case '4':
                return 'progress-bar-warning';
                break;
        case '5':
                return 'progress-bar-danger';
                break;        


    }

}

function severityBar($severe){
    
   return' <div class="progress progress-rounded">
        <div class="progress-bar '.severeColor($severe).'" style="width:100%">
            <span>Severity Level: '.$severe.'</span>
        </div>
    </div>'
    ;
}


function whichAnimal($animal_id){
    $animal = new DatabaseTable('animals');
    $animal=$animal->find('animal_id',$animal_id);
    $animal=$animal->fetch();

    return $animal['nick_name'];

}
?>


<div class="panel panel-fit">

     

        <div class="table-responsive pre-scrollable">
                            <?php 
                        

							function archive(){

								// button is selected 
									return '
									<button class="btn btn-success btn-labeled " type="button" >
										  <b>
										  <i class="icon-checkmark position-left"></i>
										  </b>
										  Completed
										</button>
									';
								
								
							}

							$watchlists = new DatabaseTable('watchlist');
							$watchlist= $watchlists->find('complete_status','Yes'); //extracts all regarding enquiries table
							$wacTable= new setTable();  //table is set
							$wacTable->setTopics(["Animal","Condition","Severity"," Status"]);  //header is set
							
                                if($watchlist->rowCount()>0){
                                    foreach($watchlist as $w){
                                        $wacTable->addEntries([ 
                                            whichAnimal($w['animal_id']),
                                            $w['w_condition'],severityBar($w['w_severity']),
                                        archive()
                                        ]);
                                    }
                                    echo $wacTable->getValues();   //value is passed
                                }
                                else{
                                    echo "<br>"; ?>

                                <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                                    <h6 class="alert-heading text-semibold">No completed watchlist
                                         found</h6>
                                </div>
                                <?php  }   ?>
							
						</div>

</div>
