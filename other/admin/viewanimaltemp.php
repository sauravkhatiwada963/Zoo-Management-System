<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';



function loadsetanimalimage($id){
    global $pdo;
    $stmt =$pdo->prepare('SELECT img FROM animalimages WHERE animal_id=:id LIMIT 1');
    $stmt->execute(['id'=>$id]);

    if($stmt->rowCount()>0){
        $i=$stmt->fetch();
        
        $out= $i['0'];
  }
    else{
        $out="No";
    }

    return $out;

}

function loadNickname($id){
    global $pdo;
    $stmt = $pdo->prepare('SELECT nick_name FROM animals WHERE animal_id=:id');
    $stmt->execute(['id'=>$id]);
    $stmt =$stmt->fetch();

    return $stmt['0'];

}

?>

<div id="add-animal-modal" class="modal fade " data-backdrop="false">
						<div class="modal-dialog panel border-teal ">
							<div class="modal-content scrollable">
								<div class="modal-header bg-teal">
									<!-- <button type="button" id="add_animal_modal" class="close" data-dismiss="modal" >&times;</button>
                                    <legend><i class="icon-piggy-bank position-left"></i> add/edit animals</legend> -->
                                    <button type="button" id="add_animal_modal" class="close" data-dismiss="modal" >&times;</button>
									<i class="icon-piggy-bank position-left"></i> Add/Edit Animals
								</div>

								<div class="modal-body table-scrollable ">
                                    <form id="addanimalform">
                                    <div class="row">
                                            <div class="col-md-6">
                                                <fieldset class="text-semibold">
                                                    <input type="hidden" name="animal_id" id="animal_id">
                                                    <input type="hidden" name="edit_id"  id="edit_id">
                                                    <div class="form-group">
                                                        <label>Name:</label>
                                                        <input type="text" name="nick_name" id="nick_name" class="form-control" placeholder="Name" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Species name:</label>
                                                        <input type="text" name="species_name" id="species_name" class="form-control" placeholder="Species name" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date of birth:</label>
                                                        <input id="dob" class="form-control" type="date" name="dob" required>
                                                                
                                                    </div>

                                            


                                                    
												
													<div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="select" name="gender" id="gender">
                                                        
                                                            <option value="M">Male</option>
                                                            <option value="F">Female</option>
                                                        
                                                    </select>
													</div>
												

												
													<div class="form-group">
                                                    <label>Lifespan:</label>
                                                        <input type="text" class="form-control" placeholder="Lifespan" id="avg_lifespan" name="avg_lifespan" required>
                                                        
													</div>
												
                                                    
                                                   
                                                    <div class="form-group">
                                                        <label>Dietary requirement:</label>
                                                        <input type="text" class="form-control" placeholder="Deitary requirement"  name="dietary_req" id="dietary_req"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Natural habitat:</label>
                                                        <input type="text" class="form-control" placeholder="Natural habitat" name="natural_habitat" id="natural_habitat" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Population distribution:</label>
                                                        <input type="text" class="form-control" placeholder="Population distribution" name="pop_dist" id="pop_dist" required>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Species category:</label>
                                                        <select data-placeholder="Select the category" name="species_category" id="species_category" class="select"  onchange="addFields(value);" required>
                                                            <option value=""></option>
                                                            <?php 
                                                                $classification=  new DatabaseTable('classification');
                                                                $class = $classification->findAll();

                                                                foreach ($class as $c){?>
                                                                    <option id="<?php echo $c['classif_id']?>"  ><?php echo $c['classif_name']?></option>
                                                                <?php }

                                                            ?> 
                                                        </select>
                                                    </div>

                                                </fieldset>
                                            </div>

									<div class="col-md-6">
										<fieldset>
											<div class="row">

                                            <div class="form-group">
                                                        <label>Join:</label>
                                                        <input id="join_date" class="form-control" type="date" name="join_date" required>
                                                                
                                                    </div>
                                                

                                            <div class="form-group">
                                                <label>Description:</label>
                                                <textarea rows="5" cols="5" class="form-control"  name="description" id="description" placeholder="Enter the description" required>
                                                </textarea>
                                            </div>

												<div class="col-md-6">
													<div class="form-group">
														<label>Height(cm):</label>
														<input type="number" placeholder="Height" name="height" id="height" class="form-control" required>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label>Weight(kg):</label>
														<input type="number" min=1 placeholder="Weight" name="weight" id="weight" class="form-control" required>
													</div>
												</div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Location:</label>
                                                <select data-placeholder="Select the category" name="location_id" id="location_id" class="select">
                                                    <?php 
                                                        $locations=  new DatabaseTable('locations');
                                                        $loc = $locations->find('archive_status','No');

                                                        foreach ($loc as $l){?>
                                                            <option id="<?php echo $l['location_id']?>"  value="<?php echo $l['location_id']?>"><?php echo $l['location_name']?></option>
                                                     <?php }

                                                        ?> 
                                                </select>
                                            </div>



                                            </fieldset>

                                            <fieldset id="insertfields">


                                            </fieldset>

											
										
									</div>
								</div>

                                <div class="text-right">
									<button type="submit" class="btn bg-teal">Submit form <i class="icon-arrow-right14 position-right"></i></button>
								</div>
                                    </form>
                         
								</div>

								
							</div>
						</div>
</div>
                    

<div id="view-animal-modal" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="vanimalmodal-title">View Animal</h5>
								</div>

								<div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12" id="specificimage" style="text-align:center;">
                                        </div>
                                    </div> 
                                        <hr>
                                        <br>                       
                                    <div class="row">
                                            <div class="col-md-6" id="easyretreive">
                                            </div>
                                            <div class="col-md-6" id="specificretrieve">
                                            </div>
                                    </div>

								</div>

							</div>
						</div>
</div>










					
					

<div class="panel panel-flat " style="height:100%">
						<div class="panel-heading ">
							<div class="row bg-teal " style="padding:10px;">
									<div class="col-md-10 ">
										<h5 class="panel-title ">Animals</h5>
									</div>


									<div class="col-md-2" style="background-color:#fff;padding:3px;border-radius:25px;width:9%;">
										<button data-toggle="modal" data-target="#add-animal-modal" type="button" class="btn bg-teal-400 btn-labeled btn-rounded"><b><i class="icon-add"></i></b> Add</button>
									</div>
							</div>
							

							
							
						</div>

					

						<div class="table-responsive pre-scrollable">
                            <?php 
                        



							function actionTabs($animal_id){
								return'	
								<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li class="editvanimal" id='.$animal_id.'><a><i class="icon-file-pdf"></i> Edit</a></li>
                                                    <li class="archiveanimal" id='.$animal_id.'><a><i class="icon-file-excel"></i> Archive</a></li>
                                                    <li class="setanimaloftheweek" id='.$animal_id.'><a><i class=" icon-paste3"></i>Animal of the week</a></li>
												</ul>
											</li>
										</ul>
								';

                            }
                            
                            function loadDetailAnimal($nickname,$id){                 
                            //   return data-toggle="modal" data-target="#view-animal-modal"
                                return '<button type="button" id ="'.$id.'"class="btn btn-default btn-sm loadvanimal" >
                                        <i class=" icon-stack-empty position-left"></i>'.$nickname.'
                                        </button>';
                                
                             }

							$animals = new DatabaseTable('animals');
							$animal= $animals->find('archived','No'); //extracts all regarding enquiries table
							$anTable= new setTable();  //table is set
							$anTable->setTopics(["Name","Species","DOB","Gender","Action"]);  //header is set
							
							foreach($animal as $a){
                                $anTable->addEntries([ 
                                    loadDetailAnimal($a['nick_name'],$a['animal_id']),
                                
                                    $a['species_name'],
                                    $a['dob'],$a['gender'],

								actionTabs($a['animal_id']) ]);
							}
							echo $anTable->getValues();   //value is passed
							?>
							
						</div>
					</div>


</div>   

<div class="panel">
        <div class="panel-heading bg-teal ">
                    <div class="row ">
                        <div class="col-md-10 ">
                            <h5 class="panel-title ">Animal of the week</h5>
                        </div>
                    </div>
        </div>            

        <div class="panel-body imgday centerimg" >
                <?php
                    $stmt =$pdo->prepare('SELECT animal_id FROM animal_of_the_week');
                    $stmt->execute();
                        if($stmt->rowCount()>0){
                            $i= $stmt->fetch();
                            
                            if(loadsetanimalimage($i[0]) == 'No'){?>
                                
                                <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                                    <h6 class="alert-heading text-semibold">No Images set for <?=loadNickname($i[0]);?></h6>
                                </div>
                                
                          <?php  }
                            else{
                                 
                            ?>
                                <div style="width:48%">
                                    <span class="label label-flat label-block border-danger text-danger-600">
                                        <?=loadNickname($i[0])?>
                                    </span>
                                </div>
                                <br>
                               
                        <img src="../../images/<?= loadsetanimalimage($i[0])?>" alt="" style="height:500px">
                       
                       <?php 

                            }
                       }
                        else{?>
                                <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                                    <h6 class="alert-heading text-semibold">No Animal of the day is set.</h6>
                                </div>
                       <?php }
                    // loadsetanimalimage();
                ?>
        </div>
</div>

<style>

.centerimg {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}

</style>

<script>



$('.setanimaloftheweek').click(function(){
    $.ajax({
              url:"../admin/setanimalofday.php",
              method:"POST",
              data:{animal_id:$(this).attr('id')},
              success:function(response){
                loadviewanimaltemp();
            }
      });  
   
});


function addFields(classify){
    var container = document.getElementById("insertfields");
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }

    switch(classify){

    case 'Fish':
      
        container.appendChild(document.createTextNode("Body Temperatrue"));
        var bt = document.createElement("input");
        bt.type ="number";
        bt.id = 'body_temp';
        bt.name= 'body_temp';
        bt.class="form-control";
        bt.setAttribute("required","true");
        bt.classList.add("form-control");
        container.appendChild(bt);

        container.appendChild(document.createElement("br"));
        container.appendChild(document.createTextNode("Water type"));
        var wt = document.createElement("input");
        wt.type ="text";
        wt.setAttribute("required","true");
        wt.id="water_type";
        wt.name="water_type";
        wt.classList.add("form-control");
        container.appendChild(wt);

        container.appendChild(document.createElement("br"));
        container.appendChild(document.createTextNode("Color variant"));
        var ct = document.createElement("input");
        ct.type ="text";
        ct.setAttribute("required","true");
        ct.id="color_variant";
        ct.name="color_variant";
        ct.classList.add("form-control");
        container.appendChild(ct);

        
    break;


    case 'Mammals':
        container.appendChild(document.createTextNode("Gestational Period"));
        var bt = document.createElement("input");
        bt.type ="text";
        bt.id = 'gast_period';
        bt.name = 'gast_period';
        bt.class="form-control";
        bt.setAttribute("required","true");
        bt.classList.add("form-control");
        container.appendChild(bt);

        container.appendChild(document.createElement("br"));
        container.appendChild(document.createTextNode("Mammal category"));
        var wt = document.createElement("input");
        wt.type ="text";
        wt.setAttribute("required","true");
        wt.id="category";
        wt.name="category";
        wt.classList.add("form-control");
        container.appendChild(wt);

        container.appendChild(document.createElement("br"));
        container.appendChild(document.createTextNode("Average body temperature"));
        var ct = document.createElement("input");
        ct.type ="number";
        ct.setAttribute("required","true");
        ct.id="avg_btemp";
        ct.name="avg_btemp";
        ct.classList.add("form-control");
        container.appendChild(ct);

    break;

    case 'Reptiles':

        container.appendChild(document.createTextNode("Reproduction Type"));
        var bt = document.createElement("input");
        bt.type ="text";
        bt.id = 'rep_type';
        bt.name= 'rep_type';
        bt.class="form-control";
        bt.setAttribute("required","true");
        bt.classList.add("form-control");
        container.appendChild(bt);

        container.appendChild(document.createElement("br"));
        container.appendChild(document.createTextNode("Clutch size"));
        var wt = document.createElement("input");
        wt.type ="number";
        wt.setAttribute("required","true");
        wt.id="clutch_size";
        wt.name="clutch_size";
        wt.classList.add("form-control");
        container.appendChild(wt);

        container.appendChild(document.createElement("br"));
        container.appendChild(document.createTextNode("No of offspring"));
        var ct = document.createElement("input");
        ct.type ="number";
        ct.setAttribute("required","true");
        ct.id="num_offspring";
        ct.name="num_offspring";
        ct.classList.add("form-control");
        container.appendChild(ct);
    break;


case 'Amphibian':
container.appendChild(document.createTextNode("Reproduction Type"));
var bt = document.createElement("input");
bt.type ="text";
bt.id = 'rep_type';
bt.name = 'rep_type';
bt.class="form-control";
bt.setAttribute("required","true");
bt.classList.add("form-control");
container.appendChild(bt);

container.appendChild(document.createElement("br"));
container.appendChild(document.createTextNode("Clutch size"));
var wt = document.createElement("input");
wt.type ="number";
wt.setAttribute("required","true");
wt.id="clutch_size";
wt.name="clutch_size";
wt.classList.add("form-control");
container.appendChild(wt);

container.appendChild(document.createElement("br"));
container.appendChild(document.createTextNode("No of offspring"));
var ct = document.createElement("input");
ct.type ="number";
ct.setAttribute("required","true");
ct.id="num_offspring";
ct.name="num_offspring";
ct.classList.add("form-control");
container.appendChild(ct);
break;

case 'Birds':

container.appendChild(document.createTextNode("Nest construction method"));
var bt = document.createElement("input");
bt.type ="text";
bt.id = 'nest_const';
bt.name = 'nest_const';
bt.class="form-control";
bt.setAttribute("required","true");
bt.classList.add("form-control");
container.appendChild(bt);

container.appendChild(document.createElement("br"));
container.appendChild(document.createTextNode("Clutch size"));
var wt = document.createElement("input");
wt.type ="number";
wt.setAttribute("required","true");
wt.id="clutch_size";
wt.name="clutch_size";
wt.classList.add("form-control");
container.appendChild(wt);

container.appendChild(document.createElement("br"));
container.appendChild(document.createTextNode("Wing span"));
var ct = document.createElement("input");
ct.type ="number";
ct.setAttribute("required","true");
ct.id="wingspan";
ct.name="wingspan";
ct.classList.add("form-control");
container.appendChild(ct);

container.appendChild(document.createElement("br"));
container.appendChild(document.createTextNode("Flying ability"));
var array=['Yes','No'];
        var selectList = document.createElement("select");
        selectList.id="flying_ability";
        selectList.name="flying_ability";
         
        for (var i = 0; i < array.length; i++) {
            var option = document.createElement("option");
            option.value = array[i];
            option.text = array[i];
            selectList.appendChild(option);
        }
container.appendChild(selectList);


container.appendChild(document.createElement("br"));
        container.appendChild(document.createTextNode("Color variant"));
        var ct = document.createElement("input");
        ct.type ="text";
        ct.setAttribute("required","true");
        ct.id="color_variant";
        ct.name="color_variant";
        ct.classList.add("form-control");
        container.appendChild(ct);
break;

    }
}



    
$("form#addanimalform").submit(function(e){
	e.preventDefault();
    
    if($('#animal_id').val()==''){

        if(  $('#join_date').val() > $('#dob').val() ){
            var formData = new FormData(this);
            $.ajax({
                url: "../admin/addanimal.php",
                type: 'POST',
                data: formData,
                success: function (response) {
                    loadviewanimaltemp();
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
        else{
            alert('Birth date must be greater than joined date');
        }    

    }

    else{
        var formData = new FormData(this);
            $.ajax({
                url: "../admin/updateanimal.php",
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
	


});




$('.archiveanimal').click(function(){
	$.ajax({
              url:"../admin/archiveanimal.php",
              method:"POST",
              data:{ animal_id:$(this).attr('id'),archive:'Yes'},
              success:function(response){
                  
                if(response.data=='Done'){
                    loadarchiveanimaltemp();
                }
              }
      });  
});



function getWhichClass(id){
    var result="";
    $.ajax({
              url:"../admin/whichclass.php",
              method:"GET",
              async: false,  
              data:{ classif_id:id},
              success:function(data){
                //addFields(data);
                //console.log(data);
                result = data;
                
            }
      });  

return result;
}

function selectoptionsdisable(){
    var op = document.getElementById("species_category").getElementsByTagName("option");
    for (var i = 0; i < op.length; i++) {
             op[i].disabled = true;
    }
}

function selectoptionsenable(){
    var op = document.getElementById("species_category").getElementsByTagName("option");
    for (var i = 0; i < op.length; i++) {
             op[i].disabled = false;
    }
}

function foreditValues(table,value){
    console.log(table);
    $.ajax({
              url:"../admin/detailoftable.php",
              method:"GET",
              async: false,  
              data:{  table:table,findby:'animal_id',findvalue:value},
              success:function(data){
                //addFields(data);
                console.log(data);
                // result = data;
                if(table =="birds"){
                    $('#nest_const').val(data.nest_const);
                    $('#clutch_size').val(data.clutch_size);
                    $('#wingspan').val(data.wingspan);
                    $('#flying_ability').val(data.flying_ability);
                    $('#color_variant').val(data.color_variant);
                }
                if(table=="reptiles"){
                    $('#rep_type').val(data.rep_type);
                    $('#clutch_size').val(data.clutch_size);
                    $('#num_offspring').val(data.num_offspring);
                }   
                if(table=="mammals"){
                    $('#gast_period').val(data.gast_period);
                    $('#category').val(data.category);
                    $('#avg_btemp').val(data.avg_btemp);
                }
                 if(table=="amphibians"){
                    $('#rep_type').val(data.rep_type);
                    $('#clutch_size').val(data.clutch_size);
                    $('#num_offspring').val(data.num_offspring);
                }
                if(table=="fish"){
                    $('#body_temp').val(data.body_temp);
                    $('#water_type').val(data.water_type);
                    $('#color_variant').val(data.color_varaint);

                 }


                
            }
      });  

}





$('.loadvanimal').click(function(){
    $('#view-animal-modal').modal('show');
    
    $.ajax({
              url:"../admin/commondata.php",
              method:"POST",
              data:{ animal_id:$(this).attr('id')},
              success:function(data){
                  $('#easyretreive').html(data);        
              }
      });  

    $.ajax({
              url:"../admin/intricatedata.php",
              method:"POST",
              data:{ animal_id:$(this).attr('id')},
              success:function(data){
                 $('#specificretrieve').html(data);
              }
      });  

      $.ajax({
              url:"../admin/specificimage.php",
              method:"POST",
              data:{ animal_id:$(this).attr('id')},
              success:function(data){
                 $('#specificimage').html(data);
                
              }
      });  



     


});




$('.editvanimal').click(function(){
	$('#add-animal-modal').modal('show');
	$('#animal_id').val($(this).attr('id'));

	
	$.ajax({
              url:"../admin/detailoftable.php",
              method:"GET",
              data:{ table:'animals', findby:'animal_id',findvalue:$(this).attr('id')},
              success:function(data){

                console.log(data);
                $('#nick_name').val(data.nick_name);
                $('#species_name').val(data.species_name);
                $('#dob').val(data.dob);
                $('#gender').val(data.gender);
                $('#avg_lifespan').val(data.avg_lifespan);
                $('#natural_habitat').val(data.natural_habitat);
                $('#pop_dist').val(data.pop_dist);
                $('#join_date').val(data.join_date);
                $('#height').val(data.height);
                $('#weight').val(data.weight);
                $('#description').val(data.description);
                $('#location_id').val(data.location_id);
                $('#dietary_req').val(data.dietary_req);
               $('#species_category').val(getWhichClass(data.species_category));
               
                var which =getWhichClass(data.species_category);
               var table= which.toLowerCase();
               addFields(which);
               foreditValues(table,data.animal_id);
               $('#edit_id').val(data.species_category);
               
               selectoptionsdisable();
               
        
    		
				
              }
      });  
	
});

$('#add_animal_modal').click(function(){
	
	$("#animal_id").val('');
    $('#edit_id').val('');
    $('#nick_name').val('');
    $('#species_name').val('');
    $('#dob').val('');
 
    $('#avg_lifespan').val('');
    $('#natural_habitat').val('');
    $('#pop_dist').val('');
    $('#join_date').val('');
    $('#height').val('');
    $('#weight').val('');
    $('#description').val('');
   
    $('#nest_const').val('');
    $('#clutch_size').val('');
    $('#wingspan').val('');
    $('#flying_ability').val('');
    $('#color_variant').val('');

    $('#rep_type').val('');

    $('#num_offspring').val('');
    $('#gast_period').val('');
    $('#category').val('');
    $('#avg_btemp').val('');
    $('#body_temp').val('');
    $('#water_type').val('');
    $('#color_variant').val('');

 selectoptionsenable();


});


</script>
