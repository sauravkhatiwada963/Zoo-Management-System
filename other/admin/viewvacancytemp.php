<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

?>
<div id="add-vacancy-modal" class="modal fade" data-backdrop="false">
						<div class="modal-dialog panel border-teal">
							<div class="modal-content">
								<div class="modal-header bg-teal">
									<button type="button" id="add_vacancy_modal" class="close" data-dismiss="modal" >&times;</button>
									<i class="text-bold"></i> Add Vacancy
								</div>

								<div class="modal-body">
								<form id="addvacancyform" class="form-horizontal">
							<fieldset class="content-group">
							

									<div class="form-group">
											<label class="control-label col-lg-2">Position:</label>
											<div class="col-lg-10">
												<input type="text" class="form-control" id="v_position" name="v_position" placeholder="Enter the position" required>
											</div>
									</div>
									
									<div class="form_group">
										<label class="control-label col-md-2">Description</label>
										<div class="col-md-10">
											<textarea rows="5" cols="5" class="form-control"  id="v_description" name="v_description" placeholder="Enter the description" required></textarea>
										</div>
									</div>
									<br>
									
									<div class="form-group">
										<label class="control-label col-md-2">From :</label>
										<br>
										<div class="col-md-12">
											<input class="form-control" type="date" id="v_valid_from" name="v_valid_from"   min="<?php echo date("Y-m-d"); ?>" required>
										</div>
									</div>


									<input type="hidden" name="v_id" id="v_id">
									<div class="form-group">
										<label class="control-label col-md-2">To :</label>
										<br>
										<div class="col-md-12">
											<input class="form-control" type="date" id="v_valid_till" name="v_valid_till"  min="<?php echo date("Y-m-d"); ?>"required>
										</div>
									</div>
									

									<div class="form-group">
										<label class="control-label col-md-2">Type :</label>
										<select id="v_type"  name="v_type" class="form-control">
											<option value="Temporary">Temporary</option>
											<option value="Permanent">Permanent</option>
										</select>

									</div>

									

							</fieldset>

						<div class="text-right">
							<button type="submit" id="vacancy_submit" class="btn bg-teal" >Submit <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</form>
								</div>

								
							</div>
						</div>
</div>
					
					

<div class="panel panel-fit">
						<div class="panel-heading bg-teal">
							<div class="row">
									<div class="col-md-10">
										<h5 class="panel-title">Vacancies</h5>
									</div>


									<div class="col-md-2" style="background-color:#fff;padding:3px;border-radius:25px;width:9%;">
										<button data-toggle="modal" data-target="#add-vacancy-modal" type="button" class="btn bg-teal-400 btn-labeled btn-rounded"><b><i class="icon-add"></i></b> Add</button>
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


							function actionTabs($v_id){
								return'	
								<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li class="editvacancy" id='.$v_id.'><a><i class="icon-file-pdf"></i> Edit</a></li>
													<li class="archivevacancy" id='.$v_id.'><a><i class="icon-file-excel"></i> Archive</a></li>
												</ul>
											</li>
										</ul>
								';

							}

							$vacancies = new DatabaseTable('vacancies');
							$vacancy= $vacancies->find('archive_status','No'); //extracts all regarding enquiries table
							$vacanTable= new setTable();  //table is set
							$vacanTable->setTopics(["Position","Description","Type","Duration","Action"]);  //header is set
							
							foreach($vacancy as $v){
								$vacanTable->addEntries([ $v['v_position'],$v['v_description'],$v['v_type'],
								$v['v_valid_from'] ."/". $v['v_valid_till'],
								actionTabs($v['v_id']) ]);
							}
							echo $vacanTable->getValues();   //value is passed
							?>
							
						</div>
					</div>


</div>   


<script>

$("form#addvacancyform").submit(function(e){
	e.preventDefault();

if($('#v_id').val()==""){
		var formData = new FormData(this);
		$.ajax({
		url: "addvacancy.php",
		type: 'POST',
		data: formData,
		success: function (response) {
			
			loadviewvacancytemp();		
		},
		cache: false,
		contentType: false,
		processData: false
	});
	
}
else{
	var formData = new FormData(this);
	formData.append('table','vacancies');
	formData.append('main','v_id');
		$.ajax({
		url: "updateTable.php",
		type: 'POST',
		data: formData,
		success: function (response) {
			
			loadviewvacancytemp();	
		},
		cache: false,
		contentType: false,
		processData: false
	});

}

});




$('.archivevacancy').click(function(){
	$.ajax({
              url:"archivevacancy.php",
              method:"POST",
              data:{ v_id:$(this).attr('id'),archive:'Yes'},
              success:function(response){
                  
                if(response.data=='Done'){
                    loadarchivevacancytemp();
                }
              }
      }); 
});


$('.editvacancy').click(function(){
	$('#add-vacancy-modal').modal('show');
	$('#v_id').val($(this).attr('id'));
	
	$.ajax({
              url:"detailoftable.php",
              method:"GET",
              data:{ table:'vacancies', findby:'v_id',findvalue:$(this).attr('id')},
              success:function(data){
                
				$("#v_position").val(data.v_position);
				$("#v_description").val(data.v_description);
				$("#v_valid_from").val(data.v_valid_from);
				$("#v_valid_till").val(data.v_valid_till);
				$("#v_type").val(data.v_type);
				
              }
      });  
	
});

$('#add_vacancy_modal').click(function(){
	$("#v_position").val('');
	$("#v_description").val('');
	$("#v_valid_from").val('');
	$("#v_valid_till").val('');
	$("#v_id").val('');

});

</script>