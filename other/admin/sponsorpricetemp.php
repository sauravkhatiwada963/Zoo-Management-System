
<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';


function whichAnimal($animal_id){
    $animal = new DatabaseTable('animals');
    $animal=$animal->find('animal_id',$animal_id);
    $animal=$animal->fetch();

    return $animal['nick_name'];

}

?>
<div id="add-price-modal" class="modal fade" data-backdrop="false">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" id="add_price_modal" class="close" data-dismiss="modal" >&times;</button>
									<legend class="text-bold">Add/Edit Price</legend>
								</div>

								<div class="modal-body">
								<form id="addpriceform" class="form-horizontal">
							<fieldset class="content-group">
							
    							<input type="hidden" name="sp_id" id="sp_id">
								
									<div class="form-group">
										<label class="control-label col-md-2">Animal :</label>
										<select id="animal_id"  name="animal_id" class="form-control">
                                        <?php 
                                                                $animals=  new DatabaseTable('animals');
                                                                $animal= $animals->findAll();

                                                                foreach ($animal as $a){?>
                                                                    <option id="<?php echo $a['animal_id']?>"  value="<?php echo $a['animal_id']?>"><?php echo $a['nick_name']?></option>
                                                                <?php }

                                                            ?> 
										</select>

									</div>

                                    
                                    <div class="form-group">
										<label class="display-block text-semibold">Price:</label>
										<label class="radio-inline">
											<input type="radio" name="sponsor_band" class="styled" checked="true" value="A">
                                                    <button type="button" class="btn position-right bg-orange-600 btn-labeled btn-rounded">
                                                        <b><i class="icon-coin-dollar"></i></b> 
                                                        A
                                                    </button>
										</label>

										<label class="radio-inline">
											<input type="radio" name="sponsor_band" class="styled" value="B">
											        <button type="button" class="btn position-right bg-danger-400 btn-labeled btn-rounded">
                                                        <b><i class="icon-coin-dollar"></i></b> 
                                                        B
                                                    </button>
                                        </label>
                                        <label class="radio-inline">
											<input type="radio" name="sponsor_band" class="styled" value="C">
											        <button type="button" class="btn position-right bg-success-400 btn-labeled btn-rounded">
                                                        <b><i class="icon-coin-dollar"></i></b> 
                                                        C
                                                    </button>
                                        </label>
                                        <label class="radio-inline">
											<input type="radio" name="sponsor_band" class="styled" value="D">
											        <button type="button" class="btn position-right bg-info-400 btn-labeled btn-rounded">
                                                        <b><i class="icon-coin-dollar"></i></b> 
                                                        D
                                                    </button>
                                        </label>
                                        <br>
                                        <label class="radio-inline">
											<input type="radio" name="sponsor_band" class="styled" value="E">
											        <button type="button" class="btn position-right bg-violet-400 btn-labeled btn-rounded">
                                                        <b><i class="icon-coin-dollar"></i></b> 
                                                        E
                                                    </button>
                                        </label>
                                        


									</div>
            					

									

							</fieldset>

						<div class="text-right">
							<button type="submit" id="price_submit" class="btn btn-primary" >Submit <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</form>
								</div>

								
							</div>
						</div>
</div>
					
					



<div class="panel">
						<div class="panel-heading ">
							<div class="row bg-teal ">
									<div class="col-md-10 ">
										<h5 class="panel-title ">Animals</h5>
									</div>


									<div class="col-md-2" style="background-color:#fff;padding:3px;border-radius:25px;width:11%;">
									<button data-toggle="modal" data-target="#add-price-modal" type="button" class="btn position-right bg-teal-400 btn-labeled btn-rounded"><b><i class="icon-add"></i></b> Add</button>
									</div>
							</div>

							
							
						</div>

					

						<div class="table-responsive pre-scrollable">
                            <?php 


							function actionTabs($sp_id){
								return'	
								<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li class="editspprice" id='.$sp_id.'><a><i class="icon-file-pdf"></i> Edit</a></li>
												</ul>
											</li>
										</ul>
								';

							}

							$spprices = new DatabaseTable('sponsorship_price');
							$spprice= $spprices->findAll(); //extracts all regarding enquiries table
							$spTable= new setTable();  //table is set
							$spTable->setTopics(["Animal","Sponsor Band","Action"]);  //header is set
							
							foreach($spprice as $sp){
								$spTable->addEntries([ whichAnimal($sp['animal_id']),$sp['sponsor_band']
								,actionTabs($sp['sp_id']) ]);
							}
							echo $spTable->getValues();   //value is passed
							?>
							
						</div>
					</div>


</div>   



<script>

$('form#addpriceform').submit(function(e){
	e.preventDefault();
		var formData = new FormData(this);
			$.ajax({
			url: "addsponsorprice.php",
			type: 'POST',
			data: formData,
			success: function (response) {
				// console.log(response);
				loadsponsorPrice();
			},
			cache: false,
			contentType: false,
			processData: false
		});
});


$('.editspprice').click(function(){
	$('#add-price-modal').modal('show');
});

</script>