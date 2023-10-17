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

		<title>Home</title>

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

			.cont{
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				text-align: center;
        	}

			.form-container{
				background-color: #fff;
				max-width: 300px;
				min-height: 234px;
				padding: 35px 30px 20px;
				margin-top: 30px;
				border-radius: 20px;
				box-shadow: 0 1rem 2rem hsl(0 0% 0% / 20%);

				position: relative;
				left: 50%;
				transform: translate(-50%, -0%);
			}

			.alert{
				text-align: center;
				max-width: 300px;
				left: 50%;
				transform: translate(-50%, -0%);
			}
			

		</style>
	</head>
	<body style="background-color: #e23e57;">
		<nav class="navbar navbar-dark bg-primary">
			<a class="navbar-brand" href="<?php echo base_url()?>">BloodCare</a>

			<ul class="nav">
				<li class="nav-item">
					<a id="btnLogin" class="nav-link btn btn-primary disabled" href="<?php echo base_url().'login'?>">Login</a>
				</li>
				<li class="nav-item ml-3">
					<a id="btnRegister" class="nav-link btn btn-light" href="<?php echo base_url().'register'?>">Become a member</a>
				</li>
			</ul> 
		</nav>
			
		<?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>

		<div class="cont">
			<h1 style="color: #fff;">To access your portal, just,</h1>

			<div class="form-container">

				<?php 
					echo form_open('login');
				?>

				<form>
					<input type="email" class="form-control mb-2" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
					<input type="password" class="form-control mb-5" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
					<div class="form-group offset-6 d-flex justify-content-end my-0">
						<input type="submit" value="Login" class="btn btn-primary col-8">
					</div>
				</form>
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

	<script>
		if ( window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
	</script>
</html>
