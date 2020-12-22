<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

?>


<div class="panel panel-fit">

        <div class="panel-heading bg-teal">
			<h5 class="panel-title">Archived Staffs</h5>
        </div>

        <div class="table-responsive pre-scrollable">
                            <?php 
                        

							function archive($ar,$staff_id){

								if($ar == 'Yes'){  // button is selected 
									return '
									<button class="btn btn-success btn-labeled unarchivestaffbutton" type="button" id='.$staff_id.'>
										  <b>
										  <i class="icon-database position-left"></i>
										  </b>
										  Unarchive
										</button>
									';
								}
								
							}

							$staffs = new DatabaseTable('staffs');
							$staffs= $staffs->find('archive_status','Yes'); //extracts all regarding enquiries table
							$staffTable= new setTable();  //table is set
							$staffTable->setTopics(["Name","Email","Type","Password","Action"]);  //header is set
                            
                            if($staffs->rowCount()>0){
                                foreach($staffs as $s){
                                    $staffTable->addEntries([ $s['name'],$s['email'], $s['type'],'**********',archive('Yes',$s['staff_id']) ]);
                                }
                                echo $staffTable->getValues();   //value is passed
                                
                            }   
                            else{
                                echo "<br>"; ?>

                            <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                                <h6 class="alert-heading text-semibold">No Staffs found</h6>
                            </div>

                            <?php  }  
							?>
							
						</div>

</div>


<script>

    
$('.unarchivestaffbutton').click(function(){
	$.ajax({
              url:"archivestaffs.php",
              method:"POST",
              data:{ staff_id:$(this).attr('id'),archive:'No'},
              success:function(response){
                  console.log(response);
                if(response.data=='Done'){
                    loadviewstaffs();
                }
              }
      });  
});

</script>