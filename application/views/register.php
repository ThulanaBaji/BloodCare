<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css';?>">
		<script src="<?php echo base_url().'assets/js/jquery-3.7.0.js' ?>"></script>

		<title>Register</title>
	</head>
	<body class="bg-red-950 ">

		<div class="grid grid-flow-row grid-rows-[auto_1fr] h-screen relative">
            <div class="p-10 sticky top-0 left-0 bg-red-950">
                <nav class="flex justify-center md:justify-between items-center">
                    <a class="text-xl text-white font-semibold" href="<?php echo base_url()?>">BloodCare</a>
                    
                    <ul class="hidden justify-between gap-5 text-md md:flex">
                        <li>
                            <a id="btnRegister" class="p-3.5 bg-white rounded hover:shadow-xl hover:filter hover:brightness-95" href="<?php echo base_url().'login'?>">Login</a>
                        </li>
                    </ul> 
                </nav>
            </div>

			<div class=" my-auto md:w-fit md:mx-auto text-center md:-translate-y-[20%]">

				<h1 class="mt-6 mb-11 text-white text-2xl sm:text-3xl font-semibold">Wants to become a member as, A</h1>
				
				<div class="mx-11 flex flex-row flex-wrap gap-4 justify-around">
					<a href="<?php echo base_url().'register/hospital'?>">
						<div class="w-[250px] h-[180px] p-5 bg-white text-gray-600 rounded-2xl shadow hover:shadow-2xl">
							<h1 class="text-4xl font-light">Hospital</h1>
							<p class="text-lg font-light pt-3">Request blood, Support blood donation.</p>
						</div>
					</a>
					<a href="<?php echo base_url().'register/donor'?>">
						<div class="w-[250px] h-[180px] p-5 bg-white text-gray-600 rounded-2xl shadow hover:shadow-2xl">
							<h1 class="text-4xl font-light">Donor</h1>
							<p class="text-lg font-light pt-3">Donate blood.</p>
						</div>
					</a>
				</div>

				<p class="mt-12 text-md mb-6">Already registered ?<a href="<?php echo base_url().'login'?>" class=" font-semibold hover:underline hover:cursor-pointer"> Login</a></p>
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
