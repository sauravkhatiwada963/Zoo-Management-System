<div class="common">	
							<form id="addvacancyform" class="form-horizontal">
							<fieldset class="content-group">
								<legend class="text-bold">Add Vacancy</legend>

									<div class="form-group">
											<label class="control-label col-lg-2">Position:</label>
											<div class="col-lg-10">
												<input type="text" class="form-control" name="v_position" placeholder="Enter the position" required>
											</div>
									</div>
									
									<div class="form_group">
										<label class="control-label col-md-2">Description</label>
										<div class="col-md-10">
											<textarea rows="5" cols="5" class="form-control"  name="v_description" placeholder="Enter the description" required></textarea>
										</div>
									</div>
									<br>
									
									<div class="form-group">
										<label class="control-label col-md-2">From :</label>
										<br>
										<div class="col-md-12">
											<input class="form-control" type="date" name="v_valid_from"   min="<?php echo date("Y-m-d"); ?>" required>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2">To :</label>
										<br>
										<div class="col-md-12">
											<input class="form-control" type="date" name="v_valid_till"  min="<?php echo date("Y-m-d"); ?>"required>
										</div>
									</div>
									

									<div class="form-group">
										<label class="control-label col-md-2">Type :</label>
										<select name="v_type" class="form-control">
											<option value="Temporary">Temporary</option>
											<option value="Permanent">Permanent</option>
										</select>

									</div>

									

							</fieldset>

						<div class="text-right">
							<button type="submit" id="event_submit"class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</form>
		</div>


		<script>

			
$("form#addvacancyform").submit(function(e){
	e.preventDefault();

	var formData = new FormData(this);
	$.ajax({
	url: "addvacancy.php",
	type: 'POST',
	data: formData,
	success: function (response) {
		// console.log(response);
		 loadviewvacancytemp();
		
	},
	cache: false,
	contentType: false,
	processData: false
});

});




		</script>