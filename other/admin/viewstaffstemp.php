<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

?>


<div id="add-staff-modal" class="modal fade" data-backdrop="false">
						<div class="modal-dialog panel border-teal">
							<div class="modal-content">
								<div class="modal-header bg-teal" >
									<button type="button" id="add_staff_modal" class="close" data-dismiss="modal" >&times;</button>
									<i class="text-bold"></i>Add/Edit Staffs
								</div>

								<div class="modal-body">
								<form id="addstaffform" class="form-horizontal">
							<fieldset class="content-group">
							

									<div class="form-group">
											<label class="control-label col-lg-2">Name:</label>
											<div class="col-lg-10">
												<input type="text" class="form-control" id="name" name="name" placeholder="Enter the name" required>
											</div>
                                    </div>
                                    
                                    <div class="form-group">
											<label class="control-label col-lg-2">Email:</label>
											<div class="col-lg-10">
												<input type="text" class="form-control" id="email" name="email" placeholder="Enter the email" required>
											</div>
									</div>
									<div class="form-group">
											<label class="control-label col-lg-2">Password:</label>
											<div class="col-lg-10">

                                            <div class="form-group has-feedback">
											<div class="input-group">
                                                <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Enter the password" required>
                                                <span style="cursor:pointer;" id="showpassword" class="input-group-addon"><i id="eyeicon" class=" icon-eye"></i></span>
											</div>
                                            </div>
											</div>
                                    </div>
                                    <div class="form-group">
										<label>Type:</label>
										<select class="select" name="type" id="type">		
												<option value="Manager">Manager</option>
												<option value="Zoo Keeper">Zoo keeper</option>
										</select>
                                    </div>
                                

									<input type="hidden" name="staff_id" id="staff_id">
								
									

							</fieldset>

						<div class="text-right">
							<button type="submit" id="vacancy_submit" class="btn bg-teal" >Submit <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</form>
								</div>

								
							</div>
						</div>
</div>

<div class="panel">
						<div class="panel-heading bg-teal">
							<div class="row">
									<div class="col-md-10">
										<h5 class="panel-title">Staffs</h5>
									</div>


									<div class="col-md-2" style="background-color:#fff;padding:3px;border-radius:25px;width:9%;">
										<button data-toggle="modal" data-target="#add-staff-modal" type="button" class="btn bg-teal-400 btn-labeled btn-rounded"><b><i class="icon-add"></i></b> Add</button>
									</div>
							</div>
							

							
							
						</div>

					

						<div class="table-responsive pre-scrollable">
                            <?php 
                        
							function actionTabs($staff_id){
								return'	
								<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li class="editstaff" id='.$staff_id.'><a><i class="icon-file-pdf"></i> Edit</a></li>
													<li class="archivestaff" id='.$staff_id.'><a><i class="icon-file-excel"></i> Archive</a></li>
												</ul>
											</li>
										</ul>
								';

							}

							$staffs = new DatabaseTable('staffs');
							$staffs= $staffs->find('archive_status','No'); //extracts all regarding enquiries table
							$staffTable= new setTable();  //table is set
							$staffTable->setTopics(["Name","Email","Type","Password","Action"]);  //header is set
                            
                            if($staffs->rowCount()>0){
                                foreach($staffs as $s){
                                    $staffTable->addEntries([ $s['name'],$s['email'], $s['type'],'**********',actionTabs($s['staff_id']) ]);
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


</div>   


<script>


	
    
$("form#addstaffform").submit(function(e){
	e.preventDefault();

if($('#staff_id').val()==""){
		var formData = new FormData(this);
		$.ajax({
		url: "addstaff.php",
		type: 'POST',
		data: formData,
		success: function (response) {
			
			location.reload();
		},
		cache: false,
		contentType: false,
		processData: false
	});
	
}
else{
	var formData = new FormData(this);
		$.ajax({
		url: "updatestaff.php",
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

$('.archivestaff').click(function(){
	$.ajax({
              url:"archivestaffs.php",
              method:"POST",
              data:{ staff_id:$(this).attr('id'),archive:'Yes'},
              success:function(response){
                  
                if(response.data=='Done'){
                    loadarchivedstaffs();
                }
              }
      }); 
});


$('.editstaff').click(function(){
	$('#add-staff-modal').modal('show');
	$('#staff_id').val($(this).attr('id'));
	
	$.ajax({
              url:"detailoftable.php",
              method:"GET",
              data:{ table:'staffs', findby:'staff_id',findvalue:$(this).attr('id')},
              success:function(data){
                
				$("#name").val(data.name);
				$("#email").val(data.email);
                $("#type").val(data.type);
				
				
              }
      });  
	
});

$('#add_staff_modal').click(function(){
	$("#name").val('');
	$("#email").val('');
	$("#password").val('');

});

$('#showpassword').click(function(){

    $("#eyeicon").toggleClass(' icon-eye-blocked icon-eye');
    if( $("#password").attr('type')=="password"){
        $("#password").prop("type", "text");
    }
    else{
        $("#password").prop("type", "password");
    }

});

</script>


