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

<div id="add-watchlist-modal" class="modal fade" data-backdrop="false">
						<div class="modal-dialog panel border-teal">
							<div class="modal-content">
								<div class="modal-header bg-teal">
									<button type="button" id="add_watchlist_modal" class="close" data-dismiss="modal" >&times;</button>
									<i class="text-bold"></i>Add/Edit Watchlist
								</div>

								<div class="modal-body">
								<form id="addwatchform" class="form-horizontal">
							<fieldset class="content-group">
							
    						
								
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
                                        <label>Condition: </label>
                                        <textarea name="w_condition" cols="30" rows="5" class="form-control"></textarea>

                                    </div>

                                    
                                    <div class="form-group">
										<label class="display-block text-semibold">Severity:</label>
										<label class="radio-inline">
											<input type="radio" name="w_severity" class="styled" checked="true" value="1">
                                                    <button type="button" class="btn position-right bg-orange-600 btn-labeled btn-rounded">
                                                        <b><i class="icon-heart5"></i></b> 
                                                         Level 1
                                                    </button>
										</label>
                                        <br>
										<label class="radio-inline">
											<input type="radio" name="w_severity" class="styled" value="2">
											        <button type="button" class="btn position-right bg-danger-400 btn-labeled btn-rounded">
                                                        <b><i class="icon-heart5"></i></b> 
                                                        Level 2
                                                    </button>
                                        </label>
                                        <br>
                                        <label class="radio-inline">
											<input type="radio" name="w_severity" class="styled" value="3">
											        <button type="button" class="btn position-right bg-success-400 btn-labeled btn-rounded">
                                                        <b><i class="icon-heart5"></i></b> 
                                                        Level 3
                                                    </button>
                                        </label>
                                        <br>
                                        <label class="radio-inline">
											<input type="radio" name="w_severity" class="styled" value="4">
											        <button type="button" class="btn position-right bg-info-400 btn-labeled btn-rounded">
                                                        <b><i class="icon-heart5"></i></b> 
                                                        Level 4
                                                    </button>
                                        </label>
                                        <br>
                                        <label class="radio-inline">
											<input type="radio" name="w_severity" class="styled" value="5">
											        <button type="button" class="btn position-right bg-violet-400 btn-labeled btn-rounded">
                                                        <b><i class="icon-heart5"></i></b> 
                                                        Level 5
                                                    </button>
                                        </label>
                                        


									</div>
            					

									

							</fieldset>

						<div class="text-right">
							<button type="submit" id="price_submit" class="btn bg-teal" >Submit <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</form>
								</div>

								
							</div>
						</div>
</div>

<div class="panel ">
						<div class="panel-heading">
							<div class="row">
									<div class="text-right" >
										<button data-toggle="modal" data-target="#add-watchlist-modal" type="button" class="btn bg-teal-400 btn-labeled btn-rounded">
                                            <b><i class="icon-add"></i></b> Add 
                                        </button>
									</div>
							</div>
							

							
							
						</div>

					

						<div class="table-responsive pre-scrollable">
                            <?php 

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
							


							function actionTabs($w_id){
								return'	
								<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">

													<li class="completewatchlist" id='.$w_id.'><a><i class="icon-checkmark"></i> Mark As Complete</a></li>
												</ul>
											</li>
										</ul>
								';

							}

							$watchlists = new DatabaseTable('watchlist');
							$watchlist= $watchlists->find('complete_status','No'); //extracts all regarding enquiries table
							$watchTable= new setTable();  //table is set
							$watchTable->setTopics(["Animal","Condition","Severity","Action"]);  //header is set
							
							foreach($watchlist as $w){
                                $watchTable->addEntries([ whichAnimal($w['animal_id']),
                                $w['w_condition'],severityBar($w['w_severity'])

								,actionTabs($w['w_id']) ]);
							}
							echo $watchTable->getValues();   //value is passed
							?>
							
						</div>
					</div>


</div>   

                

<script>


// addpriceform

$("form#addwatchform").submit(function(e){
	e.preventDefault();


		var formData = new FormData(this);
        formData.append('table','watchlist');
		$.ajax({
		url: "../admin/addTable.php",
		type: 'POST',
		data: formData,
		success: function (response) {
			console.log(response);
			loadViewdWatchlistTemp();	
		},
		cache: false,
		contentType: false,
		processData: false
	});
	


});


$('.completewatchlist').click(function(){
    $.ajax({
              url:"../admin/completewatchlist.php",
              method:"POST",
              data:{ w_id:$(this).attr('id'),status:'Yes'},
              success:function(response){
                  
                if(response.data=='Done'){
                    loadcompletewatchlisttemp();
                }
              }
      }); 
});

</script>