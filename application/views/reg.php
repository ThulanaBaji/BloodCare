<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8">
		<!-- <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
 -->
		<script src="<?php echo base_url().'assets/js/jquery-3.7.0.js' ?>"></script>
		<script src="<?php echo base_url().'assets/js/jquery-ui.js' ?>"></script>
		<script src="<?php echo base_url().'assets/js/popper.min.js' ?>"></script>
		<script src="<?php echo base_url().'assets/js/bootstrap.js' ?>"></script>

		<title>Home</title>

    <style>
        body{
            height: 100%;
        }

        .navbar{
            position: fixed;
            top: 0px;
            width: 100%;
        }

        div.content{
            height: calc(100vh - 58px);
            min-height: 100px;

/*             position: relative;
            top: 0px;
 */
            border: 1px solid red;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            min-height: 534px;
        }

        div.center{
            /* position: absolute;
            top: 50%;
            left: 50%; */

           /*  transform: translate(-50%, -50%); */

            border: 1px solid black;

            overflow: hidden;
        }
   
        .alert{
            text-align: center;
            max-width: 300px;
            left: 50%;
            transform: translate(-50%, -0%);
        }

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

        .button{
            background-color: #e3344e;
            min-width: 234px;
            min-height: 201px;
            padding: 10px;
        }

        div.navi{
            background-color: paleturquoise;

            overflow: hidden;
            min-height: min-content;
        }

        div.navi button.nav-item{         
            width: 60px;
            height: 30px;

            border: 1px solid black;

            float: left;
        }

        div.navi button.right{
            float: right;
        }
</style>
</head>
<body>
    <div class="navi">
        <nav>
            <button class="nav-item">Home</button>
            <button class="nav-item">Services</button>
            <button class="nav-item">About</button>
            <button class="nav-item right">Logout</button>
        </nav>
    </div>

    <div class="content">
        <div class="center ">
            <h1 style="color: #fff;">Wants to become a member as, A</h1>

            <div class="row d-flex justify-content-around align-items-center">
                <div class="col-sm-4 button">
                    <h1 class="display-4">Hospital</h1>
                    <p class="lead">
                        Request blood, Support blood donation.
                    </p>
                </div>
                <div class="col-sm-4 button">
                    <h1 class="display-4">Donor</h1>
                    <p class="lead">
                        Donate blood.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.js"></script>
</body>
</html>