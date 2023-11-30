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
        
		<title>Donor | Dashboard</title>

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

            <button class="w-11 h-11 border-2 flex items-center overflow-hidden mt-4 mr-6 rounded-full lg:hidden hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-gray-600" onclick="toggleProfileMenu(this)" 
            id="profilemenu-button" data-drawer-target="profilemenu" data-drawer-toggle="false">
                <img class="w-14 object-cover object-center" src="<?php echo base_url().'uploads/donor/profileimages/'.$profile; ?>">
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
                <div class="w-11 h-11 border-2 flex items-center rounded-full overflow-hidden">
                    <img class="w-14 object-cover object-center" src="<?php echo base_url().'uploads/donor/profileimages/'.$profile; ?>">
                </div>
            </div>
            <div class="h-full px-2 py-2 overflow-y-auto border-t border-t-gray-200">
                <ul class="space-y-2 font-medium">
                    <li>    
                        <a href="<?php echo base_url().'donor/profile'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <div class="ms-3">My profile</div>
                        </a>
                    </li>
                    <li>    
                        <a href="<?php echo base_url().'donor/dashboard/logout'; ?>" class="flex items-center p-2 bg-red-100 text-gray-900 rounded-lg hover:bg-red-200">
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
                    <div class="w-16 h-16 border-2 flex items-center md:w-20 md:h-20 lg:w-28 lg:h-28 rounded-full overflow-hidden"><img src="<?php echo base_url().'uploads/donor/profileimages/'.$profile; ?>" class="object-cover object-center w-16 md:w-20 lg:w-28"></div>
                    <div class="text-center">
                        <p class="text-sm text-gray-500 font-semibold"><?php echo $name?></p>
                        <p class="text-sm text-gray-500 font-semibold"><?php echo $email?></p>
                    </div>
                    <p></p>
                </div>
                <ul class="space-y-2 font-medium">
                    <li>    
                        <a href="<?php echo base_url().'donor/dashboard'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.024 22C16.2771 22 17.3524 21.9342 18.2508 21.7345C19.1607 21.5323 19.9494 21.1798 20.5646 20.5646C21.1798 19.9494 21.5323 19.1607 21.7345 18.2508C21.9342 17.3524 22 16.2771 22 15.024V12C22 10.8954 21.1046 10 20 10H12C10.8954 10 10 10.8954 10 12V20C10 21.1046 10.8954 22 12 22H15.024Z" fill="currentColor"/>
                            <path d="M2 15.024C2 16.2771 2.06584 17.3524 2.26552 18.2508C2.46772 19.1607 2.82021 19.9494 3.43543 20.5646C4.05065 21.1798 4.83933 21.5323 5.74915 21.7345C5.83628 21.7538 5.92385 21.772 6.01178 21.789C7.09629 21.9985 8 21.0806 8 19.976L8 12C8 10.8954 7.10457 10 6 10H4C2.89543 10 2 10.8954 2 12V15.024Z" fill="currentColor"/>
                            <path d="M8.97597 2C7.72284 2 6.64759 2.06584 5.74912 2.26552C4.8393 2.46772 4.05062 2.82021 3.4354 3.43543C2.82018 4.05065 2.46769 4.83933 2.26549 5.74915C2.24889 5.82386 2.23327 5.89881 2.2186 5.97398C2.00422 7.07267 2.9389 8 4.0583 8H19.976C21.0806 8 21.9985 7.09629 21.789 6.01178C21.772 5.92385 21.7538 5.83628 21.7345 5.74915C21.5322 4.83933 21.1798 4.05065 20.5645 3.43543C19.9493 2.82021 19.1606 2.46772 18.2508 2.26552C17.3523 2.06584 16.2771 2 15.024 2H8.97597Z" fill="currentColor"/>
                        </svg>
                        <div class="ms-3">Dashboard</div>
                        </a>
                    </li>
                    <li>    
                        <a href="<?php echo base_url().'donor/appointment'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                            <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2Zm-3 15H4.828a1 1 0 0 1 0-2h6.238a1 1 0 0 1 0 2Zm0-4H4.828a1 1 0 0 1 0-2h6.238a1 1 0 1 1 0 2Z"/>
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
                        </svg>
                        <div class="ms-3">Appointment</div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'donor/camps'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100  group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 280 280">
                            <g>
                                <path d="M36.071,242.425h56.215c2.066,0,4.073-0.683,5.711-1.942c25.672-19.74,41.615-56.115,50.503-83.33
                                    c8.889,27.215,24.832,63.59,50.503,83.33c1.638,1.26,3.645,1.942,5.711,1.942h56.215c5.174,0,9.369-4.195,9.369-9.369v-98.375
                                    c0-3.755-2.242-7.147-5.696-8.619c-42.68-18.191-69.613-42.597-84.691-59.868c-16.348-18.725-22.707-33.364-22.784-33.543
                                    c-1.468-3.464-4.864-5.715-8.627-5.715c-3.771,0-7.176,2.262-8.637,5.739c-0.243,0.58-25.316,58.373-107.465,93.387
                                    c-3.454,1.472-5.696,4.864-5.696,8.619v98.375C26.702,238.23,30.897,242.425,36.071,242.425z" fill="currentColor"/>
                                <path d="M287.631,251.326H9.369c-5.174,0-9.369,4.195-9.369,9.369s4.195,9.369,9.369,9.369h278.262
                                    c5.174,0,9.369-4.195,9.369-9.369S292.805,251.326,287.631,251.326z" fill="currentColor"/>
                            </g>
                        </svg>
                        <div class="flex-1 ms-3 whitespace-nowrap">Donation Camps</div>
                        <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full">New</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'donor/notifications'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100  group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="flex-1 ms-3 whitespace-nowrap">Notifications</div>
                        <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full ">3</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'donor/donations'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100  group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900"
                            viewBox="0 0 512 512" >
                            <g>
                                <g>
                                    <path d="M270.889,7.072c-7.683-9.435-22.104-9.425-29.778,0C188.88,71.214,66.464,237.176,66.464,322.464
                                        C66.464,426.974,151.49,512,256,512s189.537-85.026,189.537-189.537C445.537,237.147,322.549,70.511,270.889,7.072z
                                        M146.169,341.651c-10.6-0.008-19.187-8.589-19.187-19.187c0-6.528,1.773-21.674,13.646-49.772
                                        c4.127-9.768,15.391-14.34,25.159-10.213c9.768,4.128,14.34,15.391,10.213,25.159c-10.483,24.81-10.618,34.728-10.618,34.825
                                        c-0.014,10.595-8.607,19.187-19.2,19.187C146.176,341.651,146.172,341.651,146.169,341.651z M256,451.483
                                        c-41.992,0-81.504-20.595-105.694-55.092c-6.088-8.682-3.986-20.657,4.696-26.745s20.656-3.985,26.743,4.696
                                        c17.01,24.258,44.768,38.74,74.254,38.74c10.604,0,19.2,8.597,19.2,19.2C275.2,442.886,266.604,451.483,256,451.483z" fill="currentColor"/>
                                </g>
                            </g>
                        </svg>
                        <div class="flex-1 ms-3 whitespace-nowrap">Donations</div>
                        <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full ">63</span>
                        </a>
                    </li>
                    <li class="border-t border-gray-200 pt-2">
                        <a href="<?php echo base_url().'donor/profile'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                            <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z"/>
                        </svg>
                        <div class="flex-1 ms-3 whitespace-nowrap">Edit profile</div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'donor/dashboard/logout'; ?>" class="flex items-center p-2 text-gray-900 rounded-lg bg-red-100 hover:bg-red-200  group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
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