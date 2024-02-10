<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css';?>">
		<script src="<?php echo base_url().'assets/js/jquery-3.7.0.js' ?>"></script>

		<title>Home</title>
	</head>
	<body class="bg-red-950">
        <div class="grid grid-flow-row grid-rows-[auto_1fr] h-screen relative">
            <div class="w-screen p-10 sticky top-0 left-0 bg-red-950">
                <nav class="flex justify-center md:justify-between items-center">
                    <a class="text-xl text-white font-semibold" href="<?php echo base_url()?>">BloodCare</a>
                    
                    <ul class="hidden justify-between gap-5 text-md md:flex">
                        <li>
                            <a id="btnRegister" class="p-3.5 bg-white rounded hover:shadow-xl hover:filter hover:brightness-95" href="<?php echo base_url().'register'?>">Become a member</a>
                        </li>
                    </ul> 
                </nav>
            </div>

			<div class="absolute top-[108px]  left-1/2 -translate-x-1/2">
				<?php 
				if(isset($message)){
					echo '<div class="alert relative
				z-40 flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50">
					<svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
						<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
					</svg>
					<span class="sr-only">Info</span>
					<div>'.$message.'</div>
				</div>';
				}
				if(isset($error)){
					echo '<div class="alert relative
				z-40 flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
					<svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
						<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
					</svg>
					<span class="sr-only">Info</span>
					<div>'.$error.'</div>
				</div>';
				}
				?>

				<?php echo validation_errors('<div class="alert relative
				z-40 flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
					<svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
						<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
					</svg>
					<span class="sr-only">Info</span>
					<div>', '</div></div>'); ?>
			
			</div>

			<div class="w-fit mx-auto my-auto">
				
                <div class="text-center flex flex-col justify-center items-center m-auto">
                    <h1 class="sm:text-3xl text-2xl text-white font-semibold">To access your portal, just</h1>

                    <div class="w-full bg-white p-8 m-2 sm:p-[50px] mt-[30px] rounded-2xl drop-shadow-2xl">
                    <?php 
                        echo form_open('login');
                    ?>
						<div class="relative mb-6">
							<div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
								<svg class="w-5 h-5 text-gray-100 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<rect x="48" y="96" width="416" height="320" rx="40" ry="40" class="stroke-gray-400" style="fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/>
									<polyline class="stroke-gray-400" points="112 160 256 272 400 160" style="fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/>
								</svg>
							</div>
								<input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="user@host.com"
								value="<?php echo set_value('email'); ?>">
						</div>
						<div class="relative mb-6">
							<div class="absolute inset-y-0 start-0 flex items-center ps-2.5 pointer-events-none">
								<svg class="w-6 h-6 text-gray-100 dark:text-gray-400" width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> 
									<path d="M21 13V8C21 6.89543 20.1046 6 19 6H5C3.89543 6 3 6.89543 3 8V14C3 15.1046 3.89543 16 5 16H12" class="stroke-gray-400" stroke-linecap="round" stroke-linejoin="round"/> 
									<path d="M14.5 18.5L16.5 20.5L20.5 16.5" stroke="currentColor" class="stroke-gray-400" stroke-linecap="round" stroke-linejoin="round"/> 
									<path d="M12 11.01L12.01 10.9989" stroke="currentColor" class="stroke-gray-400" stroke-linecap="round" stroke-linejoin="round"/> 
									<path d="M16 11.01L16.01 10.9989" stroke="currentColor" class="stroke-gray-400" stroke-linecap="round" stroke-linejoin="round"/> 
									<path d="M8 11.01L8.01 10.9989" stroke="currentColor" class="stroke-gray-400" stroke-linecap="round" stroke-linejoin="round"/> 
								</svg>
							</div>
							<input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="password"
							value="<?php echo set_value('password'); ?>">
						</div>
						
						<input type="submit" value="Login" 
						class="px-8 py-2.5 mt-2 text-white bg-red-950 rounded hover:shadow-xl hover:filter hover:brightness-95 hover:cursor-pointer">
						
						<p class="mt-8 text-sm">Not registered ?<a href="<?php echo base_url().'register'?>" class="text-red-950 font-semibold hover:underline hover:cursor-pointer"> Become a member</a></p>
                    </form>
                    </div>
                </div>
			</div>
        </div>
		
	</body>

	<script>
		$(document).ready(function() {
    		// show the alert
			$(".alert").delay(3000).fadeOut(200, function() {
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