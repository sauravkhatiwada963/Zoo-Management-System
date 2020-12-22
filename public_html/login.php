<?php 
		require '../db/dbconnect.php';
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../css/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="../css/assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../css/assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="../css/assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="../css/assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../css/bulma.css" />
	<!-- /global stylesheets -->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" >
	<!-- Core JS files -->
	<script type="text/javascript" src="../css/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="../css/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="../css/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="../css/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="../css/assets/js/core/app.js"></script>
	<!-- /theme JS files -->

</head>

<body>



	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper" style={z-index:1;}>

				<!-- Simple login form -->
				<form  id="loginform" method="POST" enctype="multipart/form-data"> 

					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class=" border-slate-300 text-slate-300">
                               <a href="index.php">
                                    <img src="../images/zoologo.jpg" alt="logo" id="logo">
                                </a>
                            </div>
							<h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input name="email" id="email"  class="form-control" placeholder="Email" required>
							<div class="form-control-feedback">
								<i class="icon-user text-muted"></i>
							</div>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input name="password" id="password" type="password" class="form-control" placeholder="Password" required>
							<div class="form-control-feedback">
								<i class="icon-lock2 text-muted"></i>
							</div>
						</div>

						<div class="form-group">
							<button id="login" type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
						</div>

						<div class="content-divider text-muted form-group"><span>Want to sponsor an animal?</span></div>
							<a href="sign_process_sponsor.php" class="btn btn-default btn-block content-group">Sign up </a>
						</div>
						
					</div>
				</form> 
				<!-- /simple login form -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->


	

	</div>
	<!-- /page container -->

</body>



<div class="modal" id="errorModal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head"> 
      <p class=" modal-card-title">Wrong Credentials</p> 
      <button class="delete" aria-label="close"></button>
    </header>
    <section class=" modal-card-body">
        The provided  credentials are wrong please enter again.
    </section>
    <footer class="modal-card-foot">
    </footer>
  </div>
</div>


</html>

<style>
    #logo{
        width:150px;
        border-radius:20px;
    }
    body{
        background-image:url(../images/animals.gif);
        background-size:cover;
      
    }
    .login-form{
        -webkit-box-shadow: 0px 0px 100px 200px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 100px 200px rgba(0,0,0,0.75);
box-shadow: 0px 0px 100px 200px rgba(0,0,0,0.75);
        padding:20px;
    }
    
  
</style>

<script>
function clearValues(){
  $("#id").val("");
$("#myPass").val("");
}

clearValues();

$(".delete").click(function(){
  $("#errorModal").removeClass("is-active");
});


$("form#loginform").submit(function(e){
	e.preventDefault();

	var formData = new FormData(this);
	$.ajax({
	url: "../templates/trythis1.php",
	type: 'POST',
	data: formData,
	success: function (response) {
		console.log(response);
		
		if(response.data=="LoggedInAdmin"){
			window.location='../other/admin/dashboard.php';
		}
		if(response.data=="LoggedInSponsor"){
			window.location='../other/sponsor/dashboard.php';
		}
		if(response.data=="Manager"){
			window.location='../other/manager/dashboard.php';
		}
		if(response.data=="Zoo Keeper"){
			window.location='../other/zookeeper/dashboard.php';
		}

		if(response.data=="Error"){
			alert('Wrong credentials');
		}
	},
	cache: false,
	contentType: false,
	processData: false
});

});






</script>


