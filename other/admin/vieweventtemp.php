<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

?>


<div id="add-event-modal" class="modal fade" data-backdrop="false">
						<div class="modal-dialog panel border-teal">
							<div class="modal-content">
								<div class="modal-header bg-teal" >
									<button type="button" id="add_event_modal" class="close" data-dismiss="modal" >&times;</button>
									<i class="text-bold"></i>Add/Edit Event
								</div>

								<div class="modal-body">
								<form id="addeventform" class="form-horizontal">
							<fieldset class="content-group">
							

									<div class="form-group">
											<label class="control-label col-lg-2">Title:</label>
											<div class="col-lg-10">
												<input type="text" class="form-control" id="e_title" name="e_title" placeholder="Enter the title" required>
											</div>
									</div>
									
									<div class="form_group">
										<label class="control-label col-md-2">Description</label>
										<div class="col-md-10">
											<textarea rows="5" cols="5" class="form-control"  id="e_description" name="e_description" placeholder="Enter the description" required></textarea>
										</div>
									</div>
									<br>
									
									<div class="form-group">
										<label class="control-label col-md-2">Date:</label>
										<br>
										<div class="col-md-12">
											<input class="form-control" type="date" id="date" name="date"   min="<?php echo date("Y-m-d"); ?>" required>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2">Image:</label>
										<br>
										<div class="col-md-10">
											<input id="file" name="image" type="file" 
											 required>		
										</div>	
									</div>


									<input type="hidden" name="e_id" id="e_id">
								
									

							</fieldset>

						<div class="text-right">
							<button type="submit" id="vacancy_submit" class="btn bg-teal" >Submit <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</form>
								</div>

								
							</div>
						</div>
</div>

<div class="panel ">
						<div class="panel-heading bg-teal">
							<div class="row">
									<div class="col-md-10">
										<h5 class="panel-title">Events</h5>
									</div>


									<div class="col-md-2" style="background-color:#fff;padding:3px;border-radius:25px;width:9%;">
										<button data-toggle="modal" data-target="#add-event-modal" type="button" class="btn bg-teal-400 btn-labeled btn-rounded"><b><i class="icon-add"></i></b> Add</button>
									</div>
							</div>
							

							
							
						</div>

					

						<div class="table-responsive pre-scrollable">
                            <?php 
                        

							function archive($ar,$v_id){

								if($ar == 'No'){  // button is selected 
									return '
									<button class="btn btn-warning btn-labeled archivebutton" type="button" id='.$v_id.'>
										  <b>
										  <i class="icon-database position-left"></i>
										  </b>
										  Archive
										</button>
									';
								}
								
							}


							function actionTabs($e_id){
								return'	
								<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li class="editevent" id='.$e_id.'><a><i class="icon-file-pdf"></i> Edit</a></li>
													<li class="archiveevent" id='.$e_id.'><a><i class="icon-file-excel"></i> Archive</a></li>
												</ul>
											</li>
										</ul>
								';

							}

							$events = new DatabaseTable('events');
							$event= $events->find('archive_status','No'); //extracts all regarding enquiries table
							$eveTable= new setTable();  //table is set
							$eveTable->setTopics(["Title","Image","Description","Date","Action"]);  //header is set
							
							foreach($event as $e){
								$eveTable->addEntries([ $e['e_title'], 
								
								'<img src="../../images/' . $e['image'] . '" alt="error" style="width:50px;height:50px;">' ,
							$e['e_description'] ,$e['date'],
								
								actionTabs($e['e_id']) ]);
							}
							echo $eveTable->getValues();   //value is passed
							?>
							
						</div>
					</div>


</div>   


<script>


	
    
$("form#addeventform").submit(function(e){
	e.preventDefault();

if($('#e_id').val()==""){
		var formData = new FormData(this);
		$.ajax({
		url: "addevent.php",
		type: 'POST',
		data: formData,
		success: function (response) {
			console.log(response);
			
			if(response.data=='eventAdded'){
				// $('#add-event-modal').modal('hide');
				// loadvieweventTemp();
				// $(window).scroll();
				location.reload();
			}
		},
		cache: false,
		contentType: false,
		processData: false
	});
	
}
else{
	var formData = new FormData(this);
		$.ajax({
		url: "updateevent.php",
		type: 'POST',
		data: formData,
		success: function (response) {
			console.log(response);
			location.reload();
			
		},
		cache: false,
		contentType: false,
		processData: false
	});

}

});

$('.archiveevent').click(function(){
	$.ajax({
              url:"archiveevent.php",
              method:"POST",
              data:{ e_id:$(this).attr('id'),archive:'Yes'},
              success:function(response){
                  
                if(response.data=='Done'){
                    loadarchiveeventtemp();
                }
              }
      }); 
});


$('.editevent').click(function(){
	$('#add-event-modal').modal('show');
	$('#e_id').val($(this).attr('id'));
	
	$.ajax({
              url:"detailoftable.php",
              method:"GET",
              data:{ table:'events', findby:'e_id',findvalue:$(this).attr('id')},
              success:function(data){
                
				$("#e_title").val(data.e_title);
				$("#e_description").val(data.e_description);
				
				
              }
      });  
	
});

$('#add_event_modal').click(function(){
	$("#e_description").val('');
	$("#e_title").val('');
	$("#e_id").val('');

});


</script>