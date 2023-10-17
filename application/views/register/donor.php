<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/regDonor.css' ?>">

		<script src="<?php echo base_url().'assets/js/jquery-3.7.0.js' ?>"></script>
		<script src="<?php echo base_url().'assets/js/jquery-ui.js' ?>"></script>
		<script src="<?php echo base_url().'assets/js/popper.min.js' ?>"></script>
		<script src="<?php echo base_url().'assets/js/bootstrap.js' ?>"></script>
		

		<title>Register | Donor</title>

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

		</style>
	</head>
	<body>
        <div class="container">
            <div id="multi-step-form-container">

                <!-- Form Steps / Progress Bar -->
                <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                    <li class="form-stepper-active text-center form-stepper-list" step="1">
                        <a class="mx-2">
                            <span class="form-stepper-circle"><span>1</span></span>
                            <div class="label">Age verification</div>
                        </a>
                    </li>

                    <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                        <a class="mx-2">
                            <span class="form-stepper-circle text-muted"><span>2</span></span>
                            <div class="label text-muted">Social Profiles</div>
                        </a>
                    </li>

                    <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                        <a class="mx-2">
                            <span class="form-stepper-circle text-muted"><span>3</span></span>
                            <div class="label text-muted">Address Details</div>
                        </a>
                    </li>

                    <li class="form-stepper-unfinished text-center form-stepper-list" step="4">
                        <a class="mx-2">
                            <span class="form-stepper-circle text-muted"><span>4</span></span>
                            <div class="label text-muted">Credentials</div>
                        </a>
                    </li>
                </ul>

                <!-- Step Wise Form Content -->
                <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST">

                    <div id="alerts"></div>

                    <section id="step-1" class="form-step">
                        <div class="mt-3">
                            <div class="form-group" style="width: 160px;">
                            <label>Birth of date</label>
                            <input type="date"
                                   class="form-control" name="bod" id="bod" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                        </div>
                    </section>

                    <section id="step-2" class="form-step d-none">
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-sm-5 form-group">
                                <label>Firstname</label>
                                <input type="text"
                                       class="form-control" name="fname" id="fname" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="col-sm-5 form-group">
                                <label>Lastname</label>
                                <input type="text"
                                       class="form-control" name="lname" id="lname" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5 form-group">
                                <label>Email</label>
                                <input type="email"
                                       class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="col-sm-5 form-group">
                                <label>Contact number</label>
                                <input type="tel"
                                       class="form-control" name="contact" id="contact" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                            <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
                        </div>
                    </section>
                    
                    <section id="step-3" class="form-step d-none">
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-md-5 form-group">
                                <label>Province</label>
                                <select class="form-control" name="province" id="province" onchange="mapDistricts()">
                                    <option hidden disabled selected value> -- select the province -- </option>
                                </select>
                                </div>
                                <div class="col-md-5 form-group">
                                <label>District</label>
                                <select class="form-control" name="district" id="district" disabled onchange="enableCity()">
                                    <option hidden disabled selected value> -- select the district -- </option>
                                </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" maxlength="40" name="city" id="city">
                                </div>
                                <div class="col-sm-4 form-group">
                                <label>Street</label>
                                <input class="form-control" type="text" maxlength="30" name="street" id="street">
                                </div>
                                <div class="col-sm-4 form-group">
                                <label>House number</label>
                                <input class="form-control" type="text" maxlength="15" name="house" id="house">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
                            <button class="button btn-navigate-form-step" type="button" step_number="4">Next</button>
                        </div>
                    </section>

                    <section id="step-4" class="form-step d-none">
                        <div class="mt-3">
                            <div class="row col-md-5 form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" minlength="8" name="password" id="password">
                            </div>
                            <div class="row col-md-5 form-group">
                                <label>Confirm password</label>
                                <input class="form-control" type="password" minlength="8" name="cpassword" id="cpassword">
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="button btn-navigate-form-step" type="button" step_number="3">Prev</button>
                            <button class="button submit-btn" type="submit" id="registerButton">Register</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </body>

    <script>

    $(document).ready(function(){
        populateInfo();

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

    function navigateToFormStep(stepNumber){
        if(!isValid(stepNumber))
            return;

        document.querySelectorAll(".form-step").forEach((formStepElement) => {
            formStepElement.classList.add("d-none");
        });

        document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
            formStepHeader.classList.add("form-stepper-unfinished");
            formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
        });

        document.querySelector("#step-" + stepNumber).classList.remove("d-none");

        const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
        formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
        formStepCircle.classList.add("form-stepper-active");

        for (let index = 0; index < stepNumber; index++) {
            const formStepCircle = document.querySelector('li[step="' + index + '"]');

            if (formStepCircle) {
                formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
                formStepCircle.classList.add("form-stepper-completed");
            }
        }
    };

    function isValid(stepNumber){
        stepNumber--;

        switch(stepNumber){
            case 1:
                /*Age verification*/
                const val = $('#bod').val();

                if(val == "")
                    return showAlert('Enter your birth of date', 1000);

                const age = getAge(val);

                if(age < 18)
                    return showAlert('We are sorry. You are not eligible to donate blood. Donors should be older than 17years.', 3500);
                if(age > 54)
                    return showAlert('We are sorry. You are not eligible to donate blood. Donors should be younger than 54years.', 3500);

                break;

            case 2:
                const fname = $('#fname').val();
                const lname = $('#lname').val();
                const email = $('#email').val();
                const contact = $('#contact').val();   

                if(fname == "" || lname == "" || email == "" || contact == "" || contact == '+94')
                    return showAlert('Please fill in all the details', 1000);

                
                const regexName = '^[a-zA-Z]+$';
                if(!(fname.match(regexName)) || !(lname.match(regexName)))
                    return showAlert('Please enter a valid name', 1000);

                if(!($('#email')[0].checkValidity()))
                    return showAlert('Please enter a valid email', 1000);

                /* the following regex pattern was extracted from https://stackoverflow.com/a/68256427 */
                const regexPhoneNumber = '^(?:0|94|\\+94)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)(0|2|3|4|5|7|9)|7(0|1|2|4|5|6|7|8)\\d)\\d{6}$';
                
                if(!(contact.match(regexPhoneNumber)))
                    return showAlert('Please enter a valid mobile number', 1000);

                break;
            
            case 3:
                const province = $('#province').val();
                const district = $('#district').val();
                const city = $('#city').val();
                const street = $('#street').val();
                const house = $('#house').val();

                if(province == "" || district == "" || city == "" || street == "" || house == "")
                    showAlert('Please fill in all the details');
                break;
            
            case 4:
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
        $('#alerts').html(`<div class='alert alert-danger'>` + message + `</div>`);
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