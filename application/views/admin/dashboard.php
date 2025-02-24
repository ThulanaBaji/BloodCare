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
        
		<title>Admin | Dashboard</title>

        <style>
            .active {
                color: rgb(17 24 39);
                background-color: rgb(229 231 235);
            }
        </style>
    </head>
	<body class="bg-gray-100">
        
        <div class="flex justify-between">
            <button onclick="toggleSideBar(this)" id="sidebar-button"
            data-drawer-target="sidebar" data-drawer-toggle="false" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>

                <p class="lg:hidden bg-red-300 text-red-700 text-xs font-semibold rounded p-1 ml-2.5" id="breadcrumb"></p>
            </button>

            <button class="w-11 h-11 overflow-hidden mt-4 mr-6 rounded-full lg:hidden hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-gray-600" onclick="toggleProfileMenu(this)" 
            id="profilemenu-button" data-drawer-target="profilemenu" data-drawer-toggle="false">
                <img src="<?php echo base_url().'assets/images/profile.png'; ?>" class="w-14">
            </button>
        </div>
        
        <div class="fixed top-0 left-0 h-screen w-full bg-black/10 z-20 hidden lg:hidden" id="profilemenu-shadow" onclick="toggleProfileMenu(this)" data-drawer-target="profilemenu"></div>
        <div class="bg-gray-50 z-40 w-fit rounded-lg shadow hidden lg:hidden" style="position:absolute; right:16px; top:8px;" id="profilemenu">
            <div class="pt-2 text-sm text-gray-500 font-bold flex items-center gap-4" style="margin-right: 8px; margin-bottom: 8px;">
                <p></p>
                <div>
                    <p class="text-sm text-gray-500 font-semibold"><?php echo $name?></p>
                    <p class="text-sm text-gray-500 font-semibold"><?php echo $email?></p>
                </div>
                <div class="w-11 h-11 rounded-full overflow-hidden"><img src="<?php echo base_url().'assets/images/profile.png'; ?>" class="w-11"></div>
            </div>
            <div class="h-full px-2 py-2 overflow-y-auto border-t border-t-gray-200">
                <ul class="space-y-2 font-medium">
                    <li>    
                        <a href="<?php echo base_url().'admin/profile'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <div class="ms-3">My profile</div>
                        </a>
                    </li>
                    <li>    
                        <a href="<?php echo base_url().'admin/dashboard/logout'; ?>" class="flex items-center p-2 bg-red-100 text-gray-900 rounded-lg hover:bg-red-200">
                        <div class="ms-3">Logout</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="fixed top-0 left-0 h-screen w-full bg-black/10 z-20 hidden lg:hidden" id="sidebar-shadow" onclick="toggleSideBar(this)" data-drawer-target="sidebar"></div>
        <aside id="sidebar" data-active="<?php echo $active; ?>" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full lg:translate-x-0" aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
                <div class="hidden pt-2 text-sm text-gray-500 font-bold sm:flex flex-col justify-center items-center gap-4" style="margin-right: 8px; margin-bottom: 8px;">
                    <div class="w-16 h-16 md:w-20 md:h-20 lg:w-28 lg:h-28 rounded-full overflow-hidden"><img src="<?php echo base_url().'assets/images/profile.png'; ?>" class="w-16 md:w-20 lg:w-28"></div>
                    <div class="text-center">
                        <p class="text-sm text-gray-500 font-semibold"><?php echo $name?></p>
                        <p class="text-sm text-gray-500 font-semibold"><?php echo $email?></p>
                    </div>
                    <p></p>
                </div>
                <ul class="space-y-2 font-medium">
                    <li>    
                        <a href="<?php echo base_url().'admin/dashboard'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                        <div class="ms-3">Dashboard</div>
                        </a>
                    </li>
                    <li>    
                        <a href="<?php echo base_url().'admin/appointment'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                        <div class="ms-3">Appointment</div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/camps'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100  group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>
                        <div class="flex-1 ms-3 whitespace-nowrap">Donation Camps</div>
                        <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full">New</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/notifications'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100  group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="flex-1 ms-3 whitespace-nowrap">Notifications</div>
                        <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full ">3</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/donations'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100  group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                        </svg>
                        <div class="flex-1 ms-3 whitespace-nowrap">Donations</div>
                        <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full ">63</span>
                        </a>
                    </li>
                    <li class="border-t border-gray-200 pt-2">
                        <a href="<?php echo base_url().'admin/profile'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                        </svg>
                        <div class="flex-1 ms-3 whitespace-nowrap">Edit profile</div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/dashboard/logout'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg bg-red-100 hover:bg-red-200  group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                        </svg>
                        <div class="flex-1 ms-3 whitespace-nowrap">Logout</div>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="p-4 lg:ml-64">
            <?php
                if(isset($view) && $view != ''){
                    if(isset($data) && $data != ''){
                        $this->load->view($view, $data);
                    }else{
                        $this->load->view($view);
                    }
                }
            ?>
        </div>

        <script>
            $(document).ready(function(){
                const n = $('#sidebar').data('active');

                $('#sidebar div ul li:nth-child(' + n + ') a').addClass('active');
                $('#sidebar div ul li:nth-child(' + n + ') a').removeClass('hover:bg-gray-100');

                $('#breadcrumb').text($('#sidebar div ul li:nth-child(' + n + ') div').text());
            });
                
            function toggleSideBar(e){
                const btnid = "sidebar-button";

                if(e.id == btnid){
                    $(e).data('drawer-toggle', "true");
                    $('#' + $(e).data('drawer-target')).addClass('translate-x-0');
                    $('#' + $(e).data('drawer-target') + '-shadow').removeClass('hidden');
                }
                else{
                    if($('#' + btnid).data('drawer-toggle') == "true"){
                        $('#' + btnid).data('drawer-toggle', "false");
                        $('#' + $(e).data('drawer-target')).removeClass('translate-x-0');
                        $('#' + $(e).data('drawer-target') + '-shadow').addClass('hidden');
                    }
                }
            }

            function toggleProfileMenu(e){
                const btnid = "profilemenu-button";

                if(e.id == btnid){
                    $(e).data('drawer-toggle', "true");
                    $('#' + $(e).data('drawer-target')).removeClass('hidden');
                    $('#' + $(e).data('drawer-target') + '-shadow').removeClass('hidden');
                }
                else{
                    if($('#' + btnid).data('drawer-toggle') == "true"){
                        $('#' + btnid).data('drawer-toggle', "false");
                        $('#' + $(e).data('drawer-target')).addClass('hidden');
                        $('#' + $(e).data('drawer-target') + '-shadow').addClass('hidden');
                    }
                }
            }
        </script>

    </body>
</html>