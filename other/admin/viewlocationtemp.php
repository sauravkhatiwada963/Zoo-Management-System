<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

?>
  		<div id="add-location-modal" class="modal fade" data-backdrop="false">
						<div class="modal-dialog panel border-teal">
							<div class="modal-content">
								<div class="modal-header bg-teal">
									<button type="button" id="add_location_modal"  class="close" data-dismiss="modal" >&times;</button>
									<i class="text-bold"></i>Add/Edit Location
								</div>

								<div class="modal-body">
								<form id="addlocationform" class="form-horizontal">
							<fieldset class="content-group">
							

									<div class="form-group">
											<label class="control-label col-lg-2">Location:</label>
											<div class="col-lg-10">
												<input type="text" class="form-control" id="location_name" name="location_name" placeholder="Enter the location" required>
											</div>
									</div>

									<input type="hidden" name="location_id" id="location_id">
									
							</fieldset>

						<div class="text-right">
							<button type="submit" id="location_submit" class="btn bg-teal" >Submit <i class="icon-arrow-right14 position-right"></i></button>
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
										<h5 class="panel-title">Locations</h5>
									</div>


									<div class="col-md-2" style="background-color:#fff;padding:3px;border-radius:25px;width:9%;">
										<button data-toggle="modal" data-target="#add-location-modal" type="button" class="btn bg-teal-400 btn-labeled btn-rounded"><b><i class="icon-add"></i></b> Add</button>
									</div>
							</div>
							

							
							
						</div>

					

						<div class="table-responsive pre-scrollable">
                            <?php 
                        


							function actionTabs($location_id){
								return'	
								<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li class="editlocation" id='.$location_id.'><a><i class="icon-file-pdf"></i> Edit</a></li>
													<li class="archivelocation" id='.$location_id.'><a><i class="icon-file-excel"></i> Archive</a></li>
												</ul>
											</li>
										</ul>
								';

							}

							$locations = new DatabaseTable('locations');
							$location= $locations->find('archive_status','No'); //extracts all regarding enquiries table
							$locanTable= new setTable();  //table is set
							$locanTable->setTopics(["Location name","Action"]);  //header is set
							
							foreach($location as $l){
								$locanTable->addEntries([ $l['location_name'],
								actionTabs($l['location_id']) ]);
							}
							echo $locanTable->getValues();   //value is passed
							?>
							
						</div>
					</div>


</div>   


<script>


$("form#addlocationform").submit(function(e){
	e.preventDefault();

if($('#location_id').val()==""){
		var formData = new FormData(this);
		formData.append('table','locations');
		$.ajax({
		url: "addTable.php",
		type: 'POST',
		data: formData,
		success: function (response) {
			
			loadviewlocationtemp();	
		},
		cache: false,
		contentType: false,
		processData: false
	});
	
}
else{
	var formData = new FormData(this);
	formData.append('table','locations');
	formData.append('main','location_id');
		$.ajax({
		url: "updateTable.php",
		type: 'POST',
		data: formData,
		success: function (response) {
			
			loadviewlocationtemp();
		},
		cache: false,
		contentType: false,
		processData: false
	});

}

});



$('.archivelocation').click(function(){
	$.ajax({
              url:"archivelocation.php",
              method:"POST",
              data:{ location_id:$(this).attr('id'),archive:'Yes'},
              success:function(response){
                  console.log(response);
                if(response.data=='Done'){
                    loadarchivelocationtemp();
                }
              }
      }); 
});


$('.editlocation').click(function(){
	$('#add-location-modal').modal('show');
	$('#location_id').val($(this).attr('id'));
	
	$.ajax({
              url:"detailoftable.php",
              method:"GET",
              data:{ table:'locations', findby:'location_id',findvalue:$(this).attr('id')},
              success:function(data){
                
			$('#location_name').val(data.location_name);
				
              }
      });  
	
});


$('#add_location_modal').click(function(){
	$("#location_id").val('');
	$('#location_name').val('');
	

});
</script>