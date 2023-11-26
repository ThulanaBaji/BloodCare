<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css' ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<script src="<?php echo base_url().'assets/js/jquery-3.7.0.js' ?>"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

		<title>Register | Donor</title>

		<style>
			.alert{
				text-align: center;
				max-width: 300px;
				left: 50%;
				transform: translate(-50%, -0%);
			}

		</style>
	</head>
	<body class="bg-red-950">
        <div class="my-6 w-full text-center">
            <a class="text-xl text-white font-semibold" href="<?php echo base_url()?>">BloodCare</a>
        </div>
        <div class="container mx-auto">
            <div class="my-11 py-2 bg-white rounded-2xl shadow-2xl">
            
                <ul class="md:hidden mb-12" id="smstepper">
                    <div class="pt-8 px-12 flex justify-between" step="1">
                        <li class="flex flex-col items-center">
                            <span class="block w-[40px] h-[40px] rounded-[50%] bg-red-950 text-white mr-0 leading-7 relative ">
                                <span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">1</span>
                            </span>
                            <div class="text-red-950">Social Profiles</div>
                        </li>

                        <span class="h-[2px] bg-gray-400 flex-1 mt-5"></span>
                    </div>
                    <div class="pt-8 px-12 flex justify-between hidden" step="2">
                        <span class="h-[2px] bg-teal-500 flex-1 mt-5"></span>

                        <li class="flex flex-col items-center">
                            <span class="block w-[40px] h-[40px] rounded-[50%] bg-red-950 text-white mr-0 leading-7 relative ">
                                <span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">2</span>
                            </span>
                            <div class="text-red-950">Address Details</div>
                        </li>

                        <span class="h-[2px] bg-gray-500 flex-1 mt-5"></span>
                    </div>
                    <div class="pt-8 px-12 flex justify-between hidden" step="3">
                        <span class="h-[2px] bg-teal-500 flex-1 mt-5"></span>

                        <li class="flex flex-col items-center">
                            <span class="block w-[40px] h-[40px] rounded-[50%] bg-red-950 text-white mr-0 leading-7 relative ">
                                <span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">3</span>
                            </span>
                            <div class="text-red-950">Credentials</div>
                        </li>
                    </div>
                </ul>

                <ul class="hidden md:flex flex-row mx-8 justify-between my-8" 
                    style="counter-reset:section;" id="mdstepper">
                    <li class="text-center" step="1">
                        <a class="mx-2">
                            <span class="inline-block w-[40px] h-[40px] rounded-[50%] bg-red-950 text-white mr-0 leading-7 relative">
                                <span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">1</span>
                            </span>
                            <div class="text-red-950">Social Profiles</div>
                        </a>
                    </li>

                    <span class="h-[2px] bg-gray-400 flex-1 mt-5" step="1"></span>

                    <li class="text-center" step="2">
                        <a class="mx-2">
                            <span class="inline-block w-[40px] h-[40px] rounded-[50%] bg-gray-400 text-white mr-0 leading-7 relative">
                                <span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">2</span>
                            </span>
                            <div class="text-gray-500">Address Details</div>
                        </a>
                    </li>

                    <span class="h-[2px] bg-gray-400 flex-1 mt-5" step="2"></span>

                    <li class="text-center" step="3">
                        <a class="mx-2">
                            <span class="inline-block w-[40px] h-[40px] rounded-[50%] bg-gray-400 text-white mr-0 leading-7 relative">
                                <span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">3</span>
                            </span>
                            <div class="text-gray-500">Credentials</div>
                        </a>
                    </li>
                </ul>
                
                <div id="alerts" class="absolute top-[100px] md:top-[160px] left-1/2 -translate-x-1/2">
                    <?php
                    if(isset($error)){
                        echo '<div class="alert relative
                        z-40 flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-200">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Error</span>
                            '.$error.'</div>';
                    }
                    ?>
                </div>

                <form enctype="multipart/form-data" 
                      action="<?php echo base_url().'register/registerHospital'?>" method="POST">

                    <section id="step-1" class="form-step max-w-4xl">
                        <div class="grid grid-cols-1 md:grid-cols-2 mx-8">
                            <div class="my-3 text-sm max-w-xs">
                                <label class="text-md text-gray-600 p-2">Profile image</label>
                                <div class="mt-6 relative flex flex-col">
                                    <div class="text-center relative rounded-[50%] w-[150px] h-[150px] overflow-hidden flex justify-center items-center">
           
                                        <img id="profilepreview" class="object-cover object-center" src="<?php echo base_url().'/uploads/hospital/profileimages/default.png';?>">

                                        <input class="hidden" type="file" name="profile" id="profileimage" accept="image/*" onchange="previewImage(this)" />
                                        <label for="profileimage" class="absolute top-0 left-0 h-full w-full text-blue-500 bg-white/90 border-2 border-blue-500 rounded-full text-xs font-bold opacity-0 flex items-center justify-center transition-all cursor-pointer hover:opacity-100">
                                            <div class="text-center">
                                                <div class="mb-2">
                                                    <i class="fa fa-camera fa-2x"></i>
                                                </div>
                                                <div class="uppercase text-xs">
                                                    Upload <br /> Profile image
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:block w-20 h-20"></div>
                            <div class="mt-3 text-sm">
                                <label class="text-md text-gray-600 p-2">Registration number</label>
                                <input type="text" name="regnum" id="regnum"
                                    class="max-w-xs mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="<?php echo set_value('regnum'); ?>">
                            </div>
                            <div class="mt-3 text-sm">
                                <label class="text-md text-gray-600 p-2">Hospital name</label>
                                <input type="text" name="name" id="name"
                                    class="max-w-xs mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="<?php echo set_value('name'); ?>">
                            </div>
                            <div class="mt-3 text-sm">
                                <label class="text-md text-gray-600 p-2">Email</label>
                                <input type="email" name="email" id="email"
                                    class="max-w-xs mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="<?php echo set_value('email'); ?>">
                            </div>
                            <div class="mt-3 text-sm">
                                <label class="text-md text-gray-600 p-2">Contact number</label>
                                <input type="tel" name="contact" id="contact"
                                    class="max-w-xs mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="<?php echo set_value('contact'); ?>">
                            </div>
                        </div>
                        
                        <button class="btn-navigate-form-step
                                       rounded bg-red-950 text-white py-2 px-3 ml-8 mt-9 mb-5" type="button" step_number="2">Next</button>
                    </section>

                    <section id="step-2" class="hidden form-step max-w-4xl">
                        <div class="grid grid-cols-1 md:grid-cols-2 mx-8">
                            <div class="mt-3 text-sm">
                            <label class="text-md text-gray-600 p-2">Province</label>
                                <select class="max-w-xs mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        name="province" id="province" onchange="mapDistricts()">
                                    <option hidden disabled selected value> -- select the province -- </option>
                                </select>
                            </div>
                            <div class="mt-3 text-sm">
                                <label class="text-md text-gray-600 p-2">District</label>
                                <select disabled class="max-w-xs mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg disabled:text-gray-400 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        name="district" id="district"  onchange="enableCity()">
                                    <option hidden disabled selected value> -- select the district -- </option>
                                </select>
                            </div>

                            <div class="mt-3 text-sm">
                                <label class="text-md text-gray-600 p-2">City</label>
                                <input type="text" maxlength="40" name="city" id="city"
                                    class="max-w-xs mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="<?php echo set_value('city'); ?>">
                            </div>
                            <div class="mt-3 text-sm">
                                <label class="text-md text-gray-600 p-2">Street</label>
                                <input type="text" maxlength="30" name="street" id="street"
                                    class="max-w-xs mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="<?php echo set_value('street'); ?>">
                            </div>
                            <div class="mt-3 text-sm">
                                <label class="text-md text-gray-600 p-2">Zip code</label>
                                <input type="text" maxlength="30" name="zipcode" id="zipcode"
                                    class="max-w-xs mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="<?php echo set_value('zipcode'); ?>">
                            </div>
                        </div>

                        <div>
                            <button class="btn-navigate-form-step
                                       rounded bg-red-950 text-white py-2 px-3 ml-8 mt-9 mb-5" type="button" step_number="1">Prev</button>
                            <button class="btn-navigate-form-step
                                       rounded bg-red-950 text-white py-2 px-3 ml-3 mt-9 mb-5" type="button" step_number="3">Next</button>
                        </div>
                    </section>
                    
                    <section id="step-3" class="hidden form-step">
                        <div class="grid grid-cols-1 mx-8">
                            <div class="mt-3 text-sm">
                                <label class="text-md text-gray-600 p-2">Password</label>
                                <input type="password" minlength="8" name="password" id="password"
                                    class="max-w-xs mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="<?php echo set_value('password'); ?>">
                            </div>
                            <div class="mt-3 text-sm">
                                <label class="text-md text-gray-600 p-2">Confirm password</label>
                                <input type="password" minlength="8" name="cpassword" id="cpassword"
                                    class="max-w-xs mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="<?php echo set_value('cpassword'); ?>">
                            </div>
                        </div>

                        <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY;?>"></div>
                        <div class="mt-3 mb-5">
                            <button class="btn-navigate-form-step
                                       rounded bg-red-950 text-white py-2 px-3 ml-8 mt-9" type="button" step_number="2">Prev</button>
                            <button class="rounded bg-red-950 text-white py-2 px-3 ml-3 md:ml-8 mt-9 " type="submit" id="registerButton">Register</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </body>

    <script>

    $(document).ready(function(){
        populateInfo();

        $(".alert").delay(3000).fadeOut(200, function() {
				$(this).alert('close');
			});

        document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
            formNavigationBtn.addEventListener("click", () => {
                const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
                navigateToFormStep(stepNumber);
            });
        });

        $('#registerButton').click(function(e){
            if(!isValid(5))
                e.preventDefault();
        })
    });

    function previewImage(e){
        var files = e.files || [];
        if (!files.length || !window.FileReader) 
            return;

        if (/^image/.test(files[0].type)) {
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);

            reader.onloadend = function () {
                console.log(this.result);
                $("#profilepreview").attr('src', this.result);
            }
        }
    }

    function navigateToFormStep(stepNumber){
        if(!isValid(stepNumber))
            return;

        document.querySelectorAll(".form-step").forEach((formStepElement) => {
            formStepElement.classList.add("hidden");
        });

        $('#smstepper').children('div').addClass('hidden');
        $('#smstepper').children('div[step="' + stepNumber + '"]').removeClass('hidden');

        
        $('#mdstepper li a').children('span').removeClass('bg-red-950');
        $('#mdstepper li a > div').removeClass('text-red-950');
        $('#mdstepper li a').children('span').addClass('bg-gray-400');
        $('#mdstepper li a > div').addClass('text-gray-500');

        $('#mdstepper').children('span').addClass('bg-gray-400');
        
        $('#mdstepper li[step="' + stepNumber + '"] a').children('span').removeClass('bg-gray-400');
        $('#mdstepper li[step="' + stepNumber + '"] a > div').removeClass('text-gray-500');
        $('#mdstepper li[step="' + stepNumber + '"] a').children('span').addClass('bg-red-950');
        $('#mdstepper li[step="' + stepNumber + '"] a > div').addClass('text-red-950');

        $("#step-" + stepNumber).removeClass("hidden");

        for (let index = 0; index < stepNumber; index++) {
            
            $('#mdstepper li[step="' + index + '"] a').children('span').removeClass('bg-gray-400');
            $('#mdstepper li[step="' + index + '"] a > div').removeClass('text-gray-500');
            $('#mdstepper li[step="' + index + '"] a').children('span').addClass('bg-teal-500');
            $('#mdstepper li[step="' + index + '"] a > div').addClass('text-teal-500');

            $('#mdstepper').children('span[step="' + index + '"]').addClass('bg-teal-500');
        }
    };

    function isValid(stepNumber){
        stepNumber--;

        switch(stepNumber){
            case 1:
                const regnum = $('#regnum').val();
                const name = $('#name').val();
                const email = $('#email').val();
                const contact = $('#contact').val();   

                if(regnum == "" || name == "" || email == "" || contact == "" || contact == '+94')
                    return showAlert('Please fill in all the details', 1000);

                if(!($('#email')[0].checkValidity()))
                    return showAlert('Please enter a valid email', 1000);

                /* the following regex pattern was extracted from https://stackoverflow.com/a/68256427 */
                const regexPhoneNumber = '^(?:0|94|\\+94)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)(0|2|3|4|5|7|9)|7(0|1|2|4|5|6|7|8)\\d)\\d{6}$';
                
                if(!(contact.match(regexPhoneNumber)))
                    return showAlert('Please enter a valid mobile number', 1000);

                break;
            
            case 2:
                const province = $('#province').val();
                const district = $('#district').val();
                const city = $('#city').val();
                const street = $('#street').val();
                const zipcode = $('#zipcode').val();

                if(province == null)
                    return showAlert('Please select the province', 1000);
                if(district == null)
                    return showAlert('Please select the district', 1000);
                if(province == "" || district == "" || city == "" || street == "" || zipcode == "")
                    return showAlert('Please fill in all the details', 1000);

                break;
            
            case 3:
                const password = $('#password').val();
                const cpassword = $('#cpassword').val();

                if(password == "")
                    return showAlert('Please enter the password', 1000);

                /* the following regex pattern was extracted from https://stackoverflow.com/a/21456918, https://stackoverflow.com/a/19605207 */
                const regexPassword = '^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$';

                if(!password.match(regexPassword))
                    return showAlert('Password should be minimum 8 characters and contain at least one letter, one number and one special character', 3500);

                if(cpassword == "")
                    return showAlert('Please confirm the entered password', 1000);

                if(password != cpassword)
                    return showAlert('Passwords do not match', 1000);
                break;
        }

        return true;
    }

    function showAlert(message, delay){
        $('#alerts').html(`<div class="alert relative
				z-40 flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-200">
					<svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
						<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
					</svg>
					<span class="sr-only">Info</span>
					<div>` + message + `</div>`);
        $(".alert").delay(delay).fadeOut(200, function() {
            $(this).alert('close');
        });

        return false;
    }

    function getAge(val){
        const date = new Date(val);
        const curYear = new Date();
        return curYear.getFullYear() - date.getFullYear();
    }

    function populateInfo(){
        const provinces = ['Western province',
                           'Southern province', 
                           'Central province', 
                           'Eastern province',
                           'Nothern province', 
                           'Sabaragamuwa province', 
                           'Uva province',
                           'North Central province',
                           'North Western province'];

        provinces.forEach(p => {
            $('#province').append('<option>'+p+'</option>');
        });
    }

    function mapDistricts(){
        const districts = {
            'Western province'       : ['Colombo', 'Gampaha', 'Kalutara'],
            'Southern province'      : ['Galle', 'Matara', 'Hambantota'], 
            'Central province'       : ['Kandy', 'Matale', 'Nuwara Eliya'],
            'Eastern province'       : ['Ampara', 'Batticaloa', 'Trincomalee'],
            'Nothern province'       : ['Jaffna', 'Kilinochchi', 'Mullaitivu'], 
            'Sabaragamuwa province'  : ['Kegalle', 'Rathnapura'], 
            'Uva province'           : ['Badulla', 'Monaragala'],
            'North Central province' : ['Anuraghapura', 'Polonnaruwa'],
            'North Western province' : ['Kurunegala', 'Puttalam']
        }
        
        $('#district').removeAttr('disabled').empty();
        $('#district').append('<option hidden disabled selected value> -- select the district -- </option>');

        districts[$('#province').val()].forEach(d => {
            $('#district').append('<option>'+d+'</option>');
        });
    }

    </script>
    
</html>