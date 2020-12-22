<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

?>

<div class="panel panel-fit">

        <div class="panel-heading bg-teal">
			<h5 class="panel-title">Archived Events</h5>
        </div>

        <div class="table-responsive pre-scrollable">
                            <?php 
                        

							function archive($ar,$e_id){

								if($ar == 'Yes'){  // button is selected 
									return '
									<button class="btn btn-success btn-labeled unarchivebutton" type="button" id='.$e_id.'>
										  <b>
										  <i class="icon-database position-left"></i>
										  </b>
										  Unarchive
										</button>
									';
								}
								
							}

							$events = new DatabaseTable('events');
							$event= $events->find('archive_status','Yes'); //extracts all regarding enquiries table
							$eTable= new setTable();  //table is set
							$eTable->setTopics(["Title","Image","Description","Date","Archive Status"]);  //header is set
							
                                if($event->rowCount()>0){
                                    foreach($event as $e){
                                        $eTable->addEntries([ $e['e_title'],
                                        '<img src="../../images/' . $e['image'] . '" alt="error" style="width:50px;height:50px;">' ,
                                        $e['e_description'],
                                        $e['date'],
                                        archive($e['archive_status'],$e['e_id']) ]);
                                    }
                                    echo $eTable->getValues();   //value is passed
                                }
                                else{
                                    echo "<br>"; ?>

                                <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                                    <h6 class="alert-heading text-semibold">No events
                                         found</h6>
                                </div>
                                <?php  }   ?>
							
						</div>

</div>

<script>

$('.unarchivebutton').click(function(){
	$.ajax({
              url:"archiveevent.php",
              method:"POST",
              data:{ e_id:$(this).attr('id'),archive:'No'},
              success:function(response){
                  
                if(response.data=='Done'){
                    loadvieweventTemp();
                }
              }
      });  
});


</script>