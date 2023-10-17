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
	<body style="background-color: ;">
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
                                <input type="text"
                                       class="form-control" name="contact" id="contact" value='+94' aria-describedby="helpId" placeholder="">
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
                                <div class="col-sm-5 form-group">
                                <label>Province</label>
                                <select class="form-control" name="province" id="province" onchange="mapDistricts()">
                                    <option hidden disabled selected value> -- select the province -- </option>
                                </select>
                                </div>
                                <div class="col-sm-5 form-group">
                                <label>District</label>
                                <select class="form-control" name="district" id="district" disabled>
                                    <option hidden disabled selected value> -- select the district -- </option>
                                </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5 form-group">
                                <label>House number</label>
                                <input class="form-control" type="text" maxlength="15" name="hnumber" id="hnumber" style="width:100px;">
                                </div>
                                <div class="col-sm-5 form-group">
                                <label>Street name</label>
                                <input class="form-control" type="text" maxlength="30" name="street" id="stree">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
                            <button class="button submit-btn" type="submit">Save</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </body>

    <script>

    const navigateToFormStep = (stepNumber) => {

        if(!isValidate(stepNumber)){
            return;
        }

        document.querySelectorAll(".form-step").forEach((formStepElement) => {
            formStepElement.classList.add("d-none");
        });
        /**
         * Mark all form steps as unfinished.
         */
        document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
            formStepHeader.classList.add("form-stepper-unfinished");
            formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
        });
        /**
         * Show the current form step (as passed to the function).
         */
        document.querySelector("#step-" + stepNumber).classList.remove("d-none");
        /**
         * Select the form step circle (progress bar).
         */
        const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
        /**
         * Mark the current form step as active.
         */
        formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
        formStepCircle.classList.add("form-stepper-active");
        /**
         * Loop through each form step circles.
         * This loop will continue up to the current step number.
         * Example: If the current step is 3,
         * then the loop will perform operations for step 1 and 2.
         */
        for (let index = 0; index < stepNumber; index++) {
            /**
             * Select the form step circle (progress bar).
             */
            const formStepCircle = document.querySelector('li[step="' + index + '"]');
            /**
             * Check if the element exist. If yes, then proceed.
             */
            if (formStepCircle) {
                /**
                 * Mark the form step as completed.
                 */
                formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
                formStepCircle.classList.add("form-stepper-completed");
            }
        }
    };

    $(document).ready(function(){
        populateInfo();

        document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
        /**
         * Add a click event listener to the button.
         */
        
        formNavigationBtn.addEventListener("click", () => {
            /**
             * Get the value of the step.
             */
            const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
            
            /**
             * Call the function to navigate to the target form step.
             */
            navigateToFormStep(stepNumber);
        });
        });
    });

    /**
     * Select all form navigation buttons, and loop through them.
     */
    

    function isValidate(stepNumber){
        stepNumber--;

        switch(stepNumber){
            case 1:
                /*Age verification*/
                const val = $('#bod').val();

                if(val == ""){
                    return showAlert('Enter your birth of date', 1000);
                }

                const age = getAge(val);

                if(age < 18){
                    return showAlert('We are sorry. You are not eligible to donate blood. Donors should be older than 17years.', 3500)
                }
                if(age > 54){
                    return showAlert('We are sorry. You are not eligible to donate blood. Donors should be younger than 54years.', 3500)
                }
                break;

            case 2:
                const fname = $('#fname').val();
                const lname = $('#lname').val();
                const email = $('#email').val();
                const contact = $('#contact').val();   

                if(fname == "" || lname == "" || lname == "" || contact == "" || contact == '+94'){
                    return showAlert('Please fill in all the details', 1000);
                }

                break;
            
            case 3:
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
        const provinces = ['Western province', 'Eastern province', 'Southern province', 'Nothern province'];

        provinces.forEach(p => {
            $('#province').append('<option>'+p+'</option>');
        });
    }

    function mapDistricts(){
        const districts = {
            'Western province' : ['Colombo', 'Gampaha', 'Kalutara'],
            'Eastern province' : ['Ampara', 'Batticaloa', 'Trincomalee']
        }
        
        $('#district').removeAttr('disabled').empty();
        $('#district').append('<option hidden disabled selected value> -- select the district -- </option>');

        districts[$('#province').val()].forEach(d => {
            $('#district').append('<option>'+d+'</option>');
        });
    }

    </script>
    
</html>