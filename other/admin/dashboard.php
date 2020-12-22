<?php 
if(!isset($_SESSION)){session_start();}  

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DashBoard</title>
	
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="../../dashboardresources/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="../../dashboardresources/assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../../dashboardresources/assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="../../dashboardresources/assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="../../dashboardresources/assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<link href="../../dashboardresources/assets/font-awesome.css" rel="stylesheet" type="text/css">

	<!-- /global stylesheets -->

    <!-- Core JS files -->
	<script type="text/javascript" src="../../dashboardresources/assets/js/core/libraries/jquery.min.js"></script> 
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/pages/components_popups.js"></script>
	<!-- /core JS files -->



	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/tables/datatables/extensions/col_vis.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/forms/selects/select2.min.js"></script>


	<!-- Theme JS files -->
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/notifications/bootbox.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/pages/components_modals.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/pages/extra_fullcalendar.js"></script>
	<script type="text/javascript" src="../../dashboardresourcesassets/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="../../dashboardresourcesassets/js/pages/components_notifications_pnotify.js"></script>

	<script type="text/javascript" src="../../dashboardresources/assets/js/core/app.js"></script>


	
	<!-- /theme JS files -->

	<!-- /theme JS files -->



	

</head>

<body>

  <!-- Vertical form modal -->
<div id="modal_form_vertical" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Change Password</h5>
								</div>

								<form id="changepasswordform">
									<div class="modal-body">
										<div class="form-group">
											<input type="hidden" name="admin_id" value="<?=$_SESSION['admin_id']?>">
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group has-feedback">
														<div class="input-group">
															<input type="password" id="cpassword" name="password" class="form-control input-lg" placeholder="Enter the password" required>
															<span style="cursor:pointer;" id="cshowpassword" class="input-group-addon"><i id="eyeicon" class=" icon-eye"></i></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</form>
							</div>
						</div>
</div>
					<!-- /vertical form modal -->





	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
            <a  style="padding: 30px;color: white;font-size: 25px;font-weight: bold;">
                CLAYBROOK
            </a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

				<!-- <li class="dropdown">
				
					
					<div class="dropdown-menu dropdown-content">
					
						<ul class="media-list dropdown-content-body width-350">
							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
								</div>

								<div class="media-body">
									Drop the IE <a href="#">specific hacks</a> for temporal inputs
									<div class="media-annotation">4 minutes ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-commit"></i></a>
								</div>
								
								<div class="media-body">
									Add full font overrides for popovers and tooltips
									<div class="media-annotation">36 minutes ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-branch"></i></a>
								</div>
								
								<div class="media-body">
									<a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch
									<div class="media-annotation">2 hours ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-merge"></i></a>
								</div>
								
								<div class="media-body">
									<a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span> and <span class="text-semibold">Dev</span> branches
									<div class="media-annotation">Dec 18, 18:36</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
								</div>
								
								<div class="media-body">
									Have Carousel ignore keyboard events
									<div class="media-annotation">Dec 12, 05:46</div>
								</div>
							</li>
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li> -->
			
			</ul>



			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="../../dashboardresources/assets/images/placeholder.jpg" alt="">
						<span><?=$_SESSION['name']?> </span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						
						<li><a href="#" data-toggle="modal" data-target="#modal_form_vertical"><i class="icon-lock"></i> Change Password</a></li>
						<li><a href="../../templates/logout.php"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
            </ul>
            
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="../../dashboardresources/assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?=$_SESSION['name']?></span>
									<div class="text-size-mini text-muted">
									 <p id="position"> 	<i class="icon-quill2 text-size-small"></i>&nbsp; <?=$_SESSION['position']?></p>
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="../../templates/logout.php"><i class="icon-switch"></i></a>
										</li>
									</ul>
								</div>
							</div>
                        </div>
                        
					</div>
                    <!-- /user menu -->
       
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

                                <!-- Main -->
                               
								<!-- <li class="navigation-header"><span>Toggle</span> <i class="icon-menu" title="Main pages"></i></li>  -->
								<li class="active" id="generalmenutab"><a><i class="icon-home4"></i> <span>General</span></a></li>
                                
								<li>
									<a><i class="icon-coin-dollar"></i> <span>Sponsors</span></a>
									<ul>
                                        <li id="viewsponsormenutab"><a><i class="icon-eye"></i>View Sponsors</a></li>
                                        <li id="archivedsponsormenutab"><a><i class="icon-lock"></i>Archived Sponsors</a></li>
									</ul>
                                </li>

                               <li>
									<a><i class="icon-piggy-bank"></i> <span>Animals</span></a>
									<ul>
                                        <li id="viewanimalmenutab"><a><i class="icon-eye"></i>View Animals</a></li>
                                        <!-- <li id="addanimalmenutab"><a><i class="icon-add"></i>Add Animals</a></li> -->
                                        <li id="archivedanimalmenutab"><a><i class="icon-lock"></i>Archived Animals</a></li>

										<li>
											<a><i class="icon-images3"></i> <span>Animal Images</span></a>
											<ul>
												<li id="viewanimalimagemenutab"><a><i class="icon-eye"></i>View  Images</a></li>
												<!-- <li id="addanimalmenutab"><a><i class="icon-add"></i>Add Animals</a></li> -->
												<li id="archivedanimalimagemenutab"><a><i class="icon-lock"></i>Archived Images</a></li>
											</ul>
                               			 </li>
									</ul>
                                </li>
							
                    
                                <li>
									<a><i class="icon-gradient"></i> <span>Watchlists</span></a>
									<ul>
                                        <li id="viewwatchlistmenutab"><a><i class="icon-eye"></i>View Watchlists</a></li>
                                       
                                        <li id="completedwatchlistmenutab"><a><i class="icon-checkmark"></i>Completed Watchlists</a></li>
									</ul>
                                </li>

                                <li>
									<a><i class="icon-newspaper"></i> <span>Events</span></a>
									<ul>
									    <li id="vieweventmenutab"><a><i class="icon-eye"></i>View Events</a></li>
                                       
                                        <li id="archivedeventmenutab"><a><i class="icon-lock"></i>Archived Events</a></li>
									</ul>
                                </li>

                                <li>
									<a><i class="icon-location3"></i> <span>Locations</span></a>
									<ul>
                                        <li id="viewlocationtab"><a><i class="icon-eye"></i>View Locations</a></li>
                                        <li id="archivedlocationtab"><a><i class="icon-lock"></i>Archived Locations</a></li>
									</ul>
                                </li>
								
								
								<li>
									<a><i class="icon-person"></i> <span>Vacancies</span></a>
									<ul>
                                        <li id="viewvacancytab"><a><i class="icon-eye"></i>View Vacancies</a></li>
                                        <!-- <li id="addvacancytab"><a><i class="icon-add"></i>Add Vacancies</a></li> -->
                                        <li id="archivedvacancytab"><a><i class="icon-lock"></i>Archived Vacancies</a></li>
									</ul>
								</li>
								
								<li  id="applicationmenutab"><a><i class="icon-magazine"></i> <span>Applications</span></a></li>
								<li  id="sponsorpricemenutab"><a><i class="icon-price-tag"></i> <span>Sponsorship Price</span></a></li>
								<li id="animalsponsormenutab"><a><i class="icon-paw"></i> <span>Animal Sponsorship</span></a></li>

									<li>
										<a><i class="icon-users"></i> <span>Staffs</span></a>
										<ul>
											<li id="viewstaffsmenutab"><a><i class="icon-eye"></i>View  Staffs</a></li>
											<li id="archivedstaffsmenutab"><a><i class="icon-lock"></i>Archived Staffs</a></li>
										</ul>
                               		</li>
								
									   <li  id="feedbackmenutab"><a><i class="icon-magazine"></i> <span>Feedbacks</span></a></li>
									   <li  id="ticketmenutab"><a><i class="icon-barcode2"></i> <span>Tickets</span></a></li>
								<!-- /main -->


							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-file-eye2 position-left"></i> <span class="text-semibold" id="runningdashboard"> </h4>
						</div>

						
					</div>

				
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="changingmain" style="padding:20px;">
				
						
                                            
                        
										

								


				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>


<style>
	.switch-tables{
		background-color: white;
	padding: 40px;
	}

	.addingeventTab,.addingtowatchTab,.common{
		padding:20px;
		background-color:white;	
	}
	
</style>

<script>

function loadsponsorPrice(){
	$.ajax({
		url:"sponsorpricetemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
				$('#runningdashboard').html("Sponsor Price");

		}
	});
}

$('#sponsorpricemenutab').click(function(){
	loadsponsorPrice();
});


	function loadGeneralTemp(){
		$.ajax({
			url:"generaltemp.php",
			method:"POST",
			success:function(data)
			{
				$('.changingmain').html(data);
				$('#runningdashboard').html("General");
				

				
			}
	});
		
	}

 loadGeneralTemp();

function loadAddnimalTemp(){
    $.ajax({
			url:"addanimaltemp.php",
			method:"POST",
			success:function(data)
			{
				$('.changingmain').html(data);
				$('#runningdashboard').html("Add animals");	
			}
	});
}

function loadvieweventTemp(){
	$.ajax({
			url:"vieweventtemp.php",
			method:"POST",
			success:function(data)
			{
				$('.changingmain').html(data);
				$('#runningdashboard').html("Events/ View Events");	
			}
	});
}
function loadanimalsponsorTemp(){
	$.ajax({
			url:"animalsponsortemp.php",
			method:"POST",
			success:function(data)
			{
				$('.changingmain').html(data);
				$('#runningdashboard').html("Animal & Sponsor");	
			}
	});
}

$('#animalsponsormenutab').click(function(){
	loadanimalsponsorTemp();
});

function loadAddvacancyTemp(){
	$.ajax({
			url:"addvacancytemp.php",
			method:"POST",
			success:function(data)
			{
				$('.changingmain').html(data);
				$('#runningdashboard').html("Vacancy");	
			}
	});
}

$('#addvacancytab').click(function(){
	loadAddvacancyTemp();
});

function loadViewdWatchlistTemp(){
	$.ajax({
			url:"viewwatchlisttemp.php",
			method:"POST",
			success:function(data)
			{
				$('.changingmain').html(data);
				$('#runningdashboard').html("Watchlist");	
			}
	});
}

function loadviewsponsortemp(){
	$.ajax({
			url:"viewsponsortemp.php",
			method:"POST",
			success:function(data)
			{
				$('.changingmain').html(data);
				$('#runningdashboard').html("View Sponsors");	
			}
	});

}

function loadviewvacancytemp(){
	$.ajax({
			url:"viewvacancytemp.php",
			method:"POST",
			success:function(data)
			{
				$('.changingmain').html(data);
				$('#runningdashboard').html("Vacancy");	
			}
	});

}

$('#viewvacancytab').click(function(){
	loadviewvacancytemp();
});

function loadarchivesponsortemp(){
	$.ajax({
		url:"archivesponsortemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Archived Sponsors");	

		}
	});
}

function loadarchivevacancytemp(){
	$.ajax({
		url:"archivevacancytemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Archived Vacancy");	

		}
	});
}


function loadarchiveeventtemp(){
	$.ajax({
		url:"archiveeventtemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Events / Archived Events");	

		}
	});

}

$('#archivedeventmenutab').click(function(){
	loadarchiveeventtemp();
});

function loadapplicationtemp(){
	$.ajax({
		url:"applicationtemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Application");	

		}
	});
}

function loadviewanimaltemp(){
	$.ajax({
		url:"viewanimaltemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Animal");	

		}
	});

}

function loadviewanimalimagestemp(){
	
	$.ajax({
		url:"viewanimalimagestemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Animal Images");	

		}
	});
}


function loadviewlocationtemp(){
	$.ajax({
		url:"viewlocationtemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Location");	

		}
	});

}

function  loadarchivelocationtemp(){

	$.ajax({
		url:"archivelocationtemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Archived Location");	

		}
	});

}

function loadarchiveanimaltemp(){
	$.ajax({
		url:"archiveanimaltemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Archived Animal");	

		}
	});

}


function  loadviewarchivedimages(){
	$.ajax({
		url:"archiveimagetemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Archived Images");	

		}
	});
}

function  loadviewstaffs(){
	$.ajax({
		url:"viewstaffstemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("View Staffs");	

		}
	});
}

function  loadarchivedstaffs(){
	$.ajax({
		url:"archivedstaffstemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Archived Staffs");	

		}
	});
}

$('#archivedstaffsmenutab').click(function(){
	loadarchivedstaffs();
});

$('#viewstaffsmenutab').click(function(){
	loadviewstaffs();
});


$('#archivedanimalimagemenutab').click(function(){
	loadviewarchivedimages();
});


$('#archivedanimalmenutab').click(function(){
	loadarchiveanimaltemp();
});

function  loadcompletewatchlisttemp(){

$.ajax({
	url:"completewatchlisttemp.php",
	method:"POST",
	success:function(data){
		$('.changingmain').html(data);
		$('#runningdashboard').html("Completed Watchlist");	

	}
});

}


function loadfeedbacktemp(){
	$.ajax({
		url:"viewfeedbacktemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Feedbacks");	

		}
	});	
}


function loadbookingtemp(){

	$.ajax({
		url:"viewbookingstemp.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Ticket bookings");	

		}
	});	

}


$('#feedbackmenutab').click(function(){
	loadfeedbacktemp();
});


$('#archivedvacancytab').click(function(){
	loadarchivevacancytemp();
});

$('#applicationmenutab').click(function(){
	loadapplicationtemp();
});


$('#archivedsponsormenutab').click(function(){
	loadarchivesponsortemp();
});

$('#viewanimalimagemenutab').click(function(){
	loadviewanimalimagestemp();
});



$('#addanimalmenutab').click(function(){
	loadAddnimalTemp();
});


$('#archivedlocationtab').click(function(){
	loadarchivelocationtemp();
});


$('#viewsponsormenutab').click(function(){
	loadviewsponsortemp();
});

$('#ticketmenutab').click(function(){
	loadbookingtemp();
});


$('#viewwatchlistmenutab').click(function(){
	loadViewdWatchlistTemp();
});

$('#generalmenutab').click(function(){
	loadGeneralTemp();
	
});



$('#viewanimalmenutab').click(function(){
	loadviewanimaltemp();
});


$('#viewlocationtab').click(function(){
	loadviewlocationtemp();
});


$('#completedwatchlistmenutab').click(function(){
	loadcompletewatchlisttemp();
});

$('#vieweventmenutab').click(function(){
loadvieweventTemp();
});


$('#cshowpassword').click(function(){

$("#eyeicon").toggleClass(' icon-eye-blocked icon-eye');
if( $("#cpassword").attr('type')=="password"){
	$("#cpassword").prop("type", "text");
}
else{
	$("#cpassword").prop("type", "password");
}

});


$("form#changepasswordform").submit(function(e){
	e.preventDefault();
		var formData = new FormData(this);
		formData.append('cby','admin_id');
		$.ajax({
		url: "changepassword.php",
		type: 'POST',
		data: formData,
		success: function (response) {
			if(response.data=="updated"){
				$(location).attr('href','../../templates/logout.php');
			}
		},
		cache: false,
		contentType: false,
		processData: false
	});
});
</script>