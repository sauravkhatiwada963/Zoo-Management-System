<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../dashboardresources/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="../dashboardresources/assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../dashboardresources/assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="../dashboardresources/assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="../dashboardresources/assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="../dashboardresources/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="../dashboardresources/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="../dashboardresources/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="../dashboardresources/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="../dashboardresources/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="../dashboardresources/assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="../dashboardresources/assets/js/core/app.js"></script>
	<script type="text/javascript" src="../dashboardresources/assets/js/pages/form_layouts.js"></script>

	
	<!-- /theme JS files -->

</head>

<body>

<a href="index.php"><i class="icon-exit" id="backLogo"></i></a>

<div class="center">

                          

    <form id="signinsponsorform">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Sign In</h5>
								<div class="heading-elements">
									<hr>
			                	</div>
							</div>

							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<fieldset class="text-semibold">
											<legend><i class="icon-coins position-left"></i> Company details</legend>

											<div class="form-group">
												<label>Company name:</label>
												<input type="text" class="form-control" name="company_name" placeholder="Enter the company name " required>
                                            </div>
                                            
                                            <div class="form-group">
												<label>Client name :</label>
												<input type="text" name="client_name" placeholder="Enter the client name" class="form-control" required>
											</div>

											<div class="form-group">
												<label>Company address:</label>
												<input type="text" name="com_address" class="form-control" placeholder="Enter the company address" required>
											</div>

										
										
											<div class="form-group">
												<label>Contact :</label>
												<input type="text" name="com_contact" placeholder="+99-99-9999-9999" class="form-control" required>
                                            </div>
                                            
                                           
												

											
										</fieldset>
									</div>

									<div class="col-md-6">
										<fieldset>
						                	<legend class="text-semibold"><i class="icon-truck position-left"></i> Login details</legend>

											

											<div class="row">
												
													<div class="form-group">
														<label>Email:</label>
														<input type="email" name="email" placeholder="Enter your email" class="form-control" required>
													</div>
												

												
													<div class="form-group">
														<label>Password:</label>
														<input type="password" placeholder="Enter your password" class="form-control" required>
													</div>
												
											</div>

										</fieldset>
									</div>
								</div>

								<div class="text-right">
									<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</div>
						</div>
					</form>
                            
                        

</div>                    

</body>

</html>


<style>

.center{
    top:10px;
    width: 50%;
  margin: 0 auto;
  margin-top:1pc;
  background-color:#000;
}
body{
    background: #43cea2;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #185a9d, #43cea2);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #185a9d, #43cea2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
#backLogo{
    color:white;
    position:absolute;
    top:10px;
    left:10px;
    font-size:20px;
}
</style>


<script>

$("form#signinsponsorform").submit(function(e){
	e.preventDefault();

	var formData = new FormData(this);
	$.ajax({
	url: "addsponsor.php",
	type: 'POST',
	data: formData,
	success: function (response) {
        alert('Account created');
        window.location.href="index.php";
        	
	},
	cache: false,
	contentType: false,
	processData: false
});

});


</script>