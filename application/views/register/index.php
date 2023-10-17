<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">

		<script src="<?php echo base_url().'assets/js/jquery-3.7.0.js' ?>"></script>
		<script src="<?php echo base_url().'assets/js/jquery-ui.js' ?>"></script>
		<script src="<?php echo base_url().'assets/js/popper.min.js' ?>"></script>
		<script src="<?php echo base_url().'assets/js/bootstrap.js' ?>"></script>

		<title>Register</title>

		<style>
			.btn-light, .btn-light:hover, .btn-light:focus, .btn-light.focus{
				color: #e23e57;
			}
			.btn-light:not(:disabled):not(.disabled):active, .btn-light:not(:disabled):not(.disabled).active,
			.show > .btn-light.dropdown-toggle {
  				color: #e23e57;
			}

			.btn-primary {
				border-color: #e23e57;
			}

			.btn-primary:hover {
				background-color: #e3344e;
				border-color: #e23e57;
			}

			.navbar{
				position: fixed;
				top: 0px;
				width: 100%;
			}

			.body-container{
				height: calc(100vh - 58px);
				min-height: 624px;

				position: relative;
				top: 58px;
			}

			.cont{
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				
				text-align: center;
        	}

			.alert{
				text-align: center;
				max-width: 300px;
				left: 50%;
				transform: translate(-50%, -0%);
			}

			.button{
				background-color: #ffffff75;
				
				min-width: 250px;
				min-height: 201px;

				margin: 10px;
				padding: 10px;

				border-radius: 20px;
				box-shadow: 0 1rem 2rem hsl(0 0% 0% / 20%);
			}

			.button:hover{
				color: black;
				text-decoration: none;
				background-color: #ffffff9f;
				cursor: pointer;
			}

			.button-link{
				color: black;
				text-decoration: none;
				margin: 0px;
				padding: 0px;
				width: 270px;
				height: 221px;
			}

			.button-link:hover{
				color: black;
				text-decoration: none;
			}

		</style>
	</head>
	<body style="background-color: #e23e57;">

		<nav class="navbar navbar-dark bg-primary">
			<a class="navbar-brand" href="<?php echo base_url()?>">BloodCare</a>

			<ul class="nav">
				<li class="nav-item">
					<a id="btnLogin" class="nav-link btn btn-primary" href="<?php echo base_url().'login'?>">Login</a>
				</li>
				<li class="nav-item ml-3">
					<a id="btnRegister" class="nav-link btn btn-light disabled" href="<?php echo base_url().'register'?>">Become a member</a>
				</li>
			</ul> 
		</nav>
		
		<div class="body-container">

			<div class="cont">
				<h1 class="mb-4" style="color: #fff;">Wants to become a member as, A</h1>

				<div class="row d-flex justify-content-around align-items-center">
				
					<a href="<?php echo base_url().'register/hospital'?>" class="button-link">
						<div class="col-sm-4 button">
							<h1 class="display-4">Hospital</h1>
							<p class="lead">
								Request blood, Support blood donation.
							</p>
						</div>
					</a>
					
					<a href="<?php echo base_url().'register/donor'?>" class="button-link">
						<div class="col-sm-4 button">						
							<h1 class="display-4">Donor</h1>
							<p class="lead">
								Donate blood.
							</p>
						</div>
					</a>
					
				</div>
			</div>
		</div>
	</body>

	<script>
		$(document).ready(function() {
    		// show the alert
			$(".alert").delay(2000).fadeOut(200, function() {
				$(this).alert('close');
			});
		});
	</script>
</html>
