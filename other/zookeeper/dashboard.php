<?php 
if(!isset($_SESSION)){session_start();


		if( ($_SESSION['staff_archived'] =='Yes')  ){
			session_unset(); 
			session_destroy();
			header('Location:../../public_html/forbidden.php');
		
		}

}  

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
    
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>



	<script type="text/javascript" src="../../dashboardresources/assets/js/pages/extra_fullcalendar.js"></script>

	<script type="text/javascript" src="../../dashboardresources/assets/js/core/app.js"></script>
	<script type="text/javascript" src="../../dashboardresources/assets/js/pages/dashboard.js"></script>
	
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
											<input type="hidden" name="staff_id" value="<?=$_SESSION['staff_id']?>">
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
									 <p id="position"> 	<i class="icon-quill2 text-size-small"></i>&nbsp; <?= $_SESSION['type']?></p>
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
                               
								<li>
									<a><i class="icon-piggy-bank"></i> <span>Animals</span></a>
									<ul style="display:block;">
                                        <li id="viewanimalmenutab"><a><i class=" icon-paw"></i>View Animals</a></li>
										<li id="viewanimalimagemenutab"><a><i class="icon-images3"></i>View  Images</a></li>
									</ul>
                                </li>
                            	 <li id="viewwatchlistmenutab"><a><i class=" icon-clipboard6"></i>View Watchlists</a></li>
                                     


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

<script>

function loadviewanimaltemp(){
	$.ajax({
		url:"loadanimals.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Animal");	

		}
	});

}

loadviewanimaltemp();

$('#viewanimalmenutab').click(function(){
	loadviewanimaltemp();
});


function loadviewwatchlist(){
	$.ajax({
		url:"animalwatchlist.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Animal Watchlist");	

		}
	});
}

$('#viewwatchlistmenutab').click(function(){
	loadviewwatchlist();
});

function loadviewimg(){
	$.ajax({
		url:"loadimages.php",
		method:"POST",
		success:function(data){
			$('.changingmain').html(data);
			$('#runningdashboard').html("Images");	

		}
	});
}


$('#viewanimalimagemenutab').click(function(){
	loadviewimg();
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
		formData.append('cby','staff_id');
		$.ajax({
		url: "../admin/changepassword.php",
		type: 'POST',
		data: formData,
		success: function (response) {
			
			if(response.data=="updated"){
				// header('Location:../../templates/logout.php');
				$(location).attr('href','../../templates/logout.php');
			}
		},
		cache: false,
		contentType: false,
		processData: false
	});
});

</script>