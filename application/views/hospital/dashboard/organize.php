<script src="<?= base_url('assets/js/datepicker.js') ?>"></script>

<div class="sm:p-3 pt-6 md:p-6 flex flex-col h-full relative ">
    <div class="absolute z-60 top-10 left-1/2 -translate-x-1/2 max-w-xs">
        <div class="mt-3 alert alert-success flex items-center p-2 px-3 text-sm text-green-800 rounded bg-green-200" style="display:none;">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
        </svg>
        <div id="alert-top-success-text">s</div>
        </div>
        <div class="mt-3 alert alert-error flex items-center p-2 px-3 text-sm text-red-900 rounded bg-red-300" style="display:none;">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
        </svg>
        <div id="alert-top-error-text"></div>
        </div>
    </div>  
    <a href="<?= base_url('hospital/organize/history') ?>" class="<?= count($camps) > 0 ? 'max-w-xl' : '' ?> cursor-pointer text-md font-semibold p-2 text-gray-500 mb-4 gap-1 flex items-center justify-center bg-gray-200 sm:bg-transparent hover:bg-gray-200 rounded">
            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M1 5h1.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 1 0 0-2H8.576a3.228 3.228 0 0 0-6.152 0H1a1 1 0 1 0 0 2Zm18 4h-1.424a3.228 3.228 0 0 0-6.152 0H1a1 1 0 1 0 0 2h10.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 0 0 0-2Zm0 6H8.576a3.228 3.228 0 0 0-6.152 0H1a1 1 0 0 0 0 2h1.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 0 0 0-2Z"/>
            </svg>
            <p class="mb-1 ml-2">previous camps</p>
            <svg class="w-3 h-3 text-gray-500 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
            </svg>
        </a>  
    <div class="body-container <?= count($camps) > 0 ? '' : 'hidden' ?>">

        <!-- filter by component -->
        <div class="flex mb-6 max-w-xl">
            <select class="bg-gray-50 rounded-l-lg border-gray-300 outline-none z-10" id="filter-selection" onchange="changeSelectionPlaceholder()">
                <option value="1">Name</option>
                <option value="2">Organizer</option>
                <option value="3">City</option>
                <option value="4">District</option>
            </select>
            <div class="relative w-full">
                <input type="search" id="search-filter" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border
                    border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="(Ex: Josephs 24th)" required>
                <button onclick="filter()" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </button>
            </div>
        </div>

        <button onclick="showModal('newcampModal')" class="cursor-pointer text-md font-semibold px-2 shadow-lg text-gray-700 mb-6 py-2 gap-1 flex items-center justify-center bg-green-200 max-w-xl rounded">
            <svg class="w-4 h-4 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
            <p class="mb-1 ml-1">new camp</p>
        </button>

        <?= loadCamps($camps) ?>
    </div>
    <div class="absolute <?= count($camps) == 0 ? '' : 'hidden' ?> w-full sm:w-fit px-3 sm:px-0 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 items-center text-center flex flex-col">
        <div class="text-lg font-semibold text-gray-500">There's no bloodcamp open for registration as of now<br>Lets organize a camp</div>
        <div class="relative">
            <img src="<?= base_url('assets/images/holdingheartwitheyes.svg') ?>" alt="" srcset="">
            <img class="absolute top-0 left-0 z-20" src="<?= base_url('assets/images/holdinghearthandsonly.svg') ?>" alt="" srcset="">
        </div>
        <button onclick="showModal('newcampModal')" class="transform -translate-y-11 w-64 shadow hover:shadow-md border border-green-400 cursor-pointer text-md font-semibold p-2 text-green-500 gap-1 flex items-center justify-center bg-green-200 max-w-xl rounded">
            <svg class="w-4 h-4 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
            <p class="mb-1 ml-1">new camp</p>
        </button>
    </div>

<div class="fixed top-0 left-0 h-screen w-full bg-black/10 z-40 hidden" id="modal-shadow" onclick="hideModal()" data-target=""></div>
<!-- new camp modal -->
<div id="newcampModal" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow  sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    New camp
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="newcampModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('hospital/organize/addcamp') ?>" method="post" enctype="multipart/form-data">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="relative flex flex-col sm:col-span-2">
                        <div class="text-center relative rounded-[50%] w-[90px] h-[90px] overflow-hidden flex justify-center items-center">

                            <img id="profilepreview" class=" object-cover object-center" src="<?php echo base_url().'/uploads/camp/profileimages/default.svg';?>">

                            <input class="hidden" type="file" name="profile" id="profileimage" accept="image/*" onchange="previewImage(this)">
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
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type bloodcamp name" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Organizer</label>
                        <input type="text" name="organizer" id="organizer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5      " required>
                    </div>
                    <div class="sm:col-span-2 grid sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Date</label>
                            <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input datepicker name="date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" required placeholder="Select date">
                            </div>
                        </div> 
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Time</label>
                            <div class="relative">
                                <input name="time" type="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            </div>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Duration</label>
                            <div class="relative inline-flex">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"></path>
                                    </svg>
                                </div>
                                <input name="duration" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" required placeholder="hh:mm">
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-2 grid sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Location pin</label>
                            <input type="text" name="pin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="google location pin" required>
                        </div> 
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Location district</label>
                            <input type="text" name="district" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Location city</label>
                            <input type="text" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required>
                        </div>
                    </div>
                    
                    <div class>
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Location Address</label>
                        <textarea id="address" required name="address" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="full address which will be displayed to the donor" ></textarea>                    
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Maximum donors</label>
                        <input type="number" name="maxseats" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="(ex: 1000)" required>
                    </div>
                </div>
                
                <button type="submit" class="cursor-pointer text-md font-semibold px-2 shadow-lg text-gray-700 py-2 gap-1 flex items-center justify-center bg-green-200 max-w-xl rounded">
                    <svg class="w-4 h-4 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"></path>
                        </svg>
                    <p class="mb-1 ml-1">add new camp</p>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- edit camp Modal -->
<div id="editcampModal" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-autom" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-900" id="edit-campname">
                    Edit camp
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="editcampModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('hospital/organize/editcamp') ?>" method="post" enctype="multipart/form-data">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="relative flex flex-col sm:col-span-2">
                        <div class="text-center relative rounded-[50%] w-[90px] h-[90px] overflow-hidden flex justify-center items-center">

                            <img id="edit-profilepreview" class="edit object-cover object-center" src="<?php echo base_url().'/uploads/camp/profileimages/default.svg';?>">

                            <input class="hidden" type="file" name="profile" id="edit-profileimage" accept="image/*" onchange="previewImage(this)">
                            <label for="edit-profileimage" class="absolute top-0 left-0 h-full w-full text-blue-500 bg-white/90 border-2 border-blue-500 rounded-full text-xs font-bold opacity-0 flex items-center justify-center transition-all cursor-pointer hover:opacity-100">
                                <div class="text-center">
                                    <div class="mb-2">
                                        <i class="fa fa-camera fa-2x"></i>
                                    </div>
                                    <div class="uppercase text-xs">
                                        Update <br /> Profile image
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                        <input type="text" name="name" id="edit-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type bloodcamp name" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Organizer</label>
                        <input type="text" name="organizer" id="edit-organizer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5      " required>
                    </div>
                    <input type="hidden" name="campid" id="campid">
                    <div class="sm:col-span-2 grid sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Date</label>
                            <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input datepicker name="date" id="edit-date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" required placeholder="Select date">
                            </div>
                        </div> 
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Time</label>
                            <div class="relative">
                                <input name="time" id="edit-time" type="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            </div>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Duration</label>
                            <div class="relative inline-flex">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"></path>
                                    </svg>
                                </div>
                                <input name="duration" id="edit-duration" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" required placeholder="hh:mm">
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-2 grid sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Location pin</label>
                            <input type="text" name="pin" id="edit-pin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="google location pin" required>
                        </div> 
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Location district</label>
                            <input type="text" name="district" id="edit-district" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Location city</label>
                            <input type="text" name="city" id="edit-city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required>
                        </div>
                    </div>
                    
                    <div class>
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Location Address</label>
                        <textarea id="edit-address" required name="address" id="address" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="full address which will be displayed to the donor" ></textarea>                    
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Maximum donors</label>
                        <input type="number" name="maxseats" id="edit-maxseats" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="(ex: 1000)" required>
                    </div>
                </div>
                
                <button type="submit" class="cursor-pointer text-md font-semibold px-2 shadow-lg text-gray-700 py-2 gap-1 flex items-center justify-center bg-yellow-100 max-w-xl rounded">
                    <svg class="w-4 h-4 text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 20">
                        <path d="M20.168 6.136 14.325.293a1 1 0 0 0-1.414 0l-1.445 1.444a1 1 0 0 0 0 1.414l5.844 5.843a1 1 0 0 0 1.414 0l1.444-1.444a1 1 0 0 0 0-1.414Zm-4.205 2.927L11.4 4.5a1 1 0 0 0-1-.25L4.944 5.9a1 1 0 0 0-.652.624L.518 17.206a1 1 0 0 0 .236 1.04l.023.023 6.606-6.606a2.616 2.616 0 1 1 3.65 1.304 2.615 2.615 0 0 1-2.233.108l-6.61 6.609.024.023a1 1 0 0 0 1.04.236l10.682-3.773a1 1 0 0 0 .624-.653l1.653-5.457a.999.999 0 0 0-.25-.997Z"/>
                        <path d="M10.233 11.1a.613.613 0 1 0-.867-.868.613.613 0 0 0 .867.868Z"/>
                    </svg>
                    <p class="mb-1 ml-1">edit camp</p>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- cancel camp Modal -->
<div id="cancelcampModal" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-9000" id="cancel-campname">
                    Cancel camp - 
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="cancelcampModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('hospital/organize/cancelcamp') ?>" method="get">
                
                <input type="hidden" name="campid" id="cancel-campid">
                <label class="block mb-2 text-sm font-medium text-gray-900 ">Message</label>
                <input type="text" name="message" id="cancel-message" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="message informing registered donors" required>
                    
                <div class="h-4"></div>
                <button type="submit" class="cursor-pointer text-md  font-semibold px-2 mt-3 shadow-lg text-gray-700 py-2 gap-1 flex items-center justify-center bg-rose-200 max-w-xl rounded">
                    <svg class="w-4 h-4 text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <p class="mb-1 ml-1">cancel camp</p>
                </button>
            </form>
        </div>
    </div>
</div>

</div>


<script>
    $(document).ready(function() {
        $('.button-dropdown').click(function(){
            const ap = $('#' + $(this).data('target'));

            if(ap.hasClass('hidden')) {
                ap.removeClass('hidden');
                $(this).children('svg').addClass('rotate-90');
            }
            else {
                ap.addClass('hidden');
                $(this).children('svg').removeClass('rotate-90');
            }
        });

        $('#newcampModal').on('click', function(e) {
            if (e.target !== this && e.target.id !== 'modalbg')
                return;
            
            hideModal();
        });

        $('#editcampModal').on('click', function(e) {
            if (e.target !== this && e.target.id !== 'modalbg')
                return;
            
            hideModal();
        });

        $('#cancelcampModal').on('click', function(e) {
            if (e.target !== this && e.target.id != 'modalbg')
                return;
            
            hideModal();
        });

        var success = <?= isset($success) ? "'".$success."'" : '""' ?>;
        var error =   <?= isset($error)   ? "'".$error."'"   : '""' ?>;

        if(success != ''){
            $('.alert-success').fadeIn(200).delay(3000).fadeOut(200);
            $('#alert-top-success-text').text(success);
        }
        if(error != ''){
            $('.alert-error').fadeIn(200).delay(3000).fadeOut(200);
            $('#alert-top-error-text').text(error);
        }
    })

    function showModal(modal){
        $('#' + modal).removeClass('hidden');
        $('#modal-shadow').removeClass('hidden');
        $('#modal-shadow').data('target', modal);
        scrollTo(0, 0);
    }
    
    function hideModal(){
        $('#' + $('#modal-shadow').data('target')).addClass('hidden');
        $('#modal-shadow').addClass('hidden');
    }

    function editCamp(e){
        var campid = $(e).data('id');
        
        var campElem = $(e).parents('.camp')[0];
        var dataset = $(campElem).children('span.dataset')[0];

        var arr = {id: campid};
        arr.name = $(dataset).data('name');
        arr.profile = $(dataset).data('profile'); 
        arr.organizer = $(dataset).data('organizer');
        arr.pin = $(dataset).data('pin');
        arr.city = $(dataset).data('city');
        arr.district = $(dataset).data('district');
        arr.address = $(dataset).data('address');
        arr.maxseats = $(dataset).data('maxseats');

        var duration = $(dataset).data('duration');
        var date = new Date(parseInt($(dataset).data('datetime')));

        var sec_num = parseInt(duration / 1000);
	    var secsUsed = 0;
        var hours = Math.floor((sec_num - secsUsed) / 3600);
        if (hours>0) secsUsed += (hours * 3600);
        var minutes = Math.floor((sec_num - secsUsed) / 60);
        hours = hours < 10 ? hours == 0 ? '00' : '0' + hours : hours;
        minutes = minutes < 10 ? minutes == 0 ? '00' : '0' + minutes : minutes;

        $('img#profilepreview.edit').attr('src', '<?= base_url() ?>uploads/camp/profileimages/' + arr.profile);
        $('#edit-name').val(arr.name);
        $('#edit-organizer').val(arr.organizer);
        $('#edit-pin').val(arr.pin);
        $('#edit-city').val(arr.city);
        $('#edit-district').val(arr.district);
        $('#edit-address').val(arr.address);
        $('#edit-date')[0].datepicker.setDate(date);
        $('#edit-duration').val(hours + ':' + minutes); 
        $('#edit-maxseats').val(arr.maxseats);
        $('#campid').val(campid);

        $('#edit-campname').text('Edit camp - ' + arr.name);

        hours = date.getHours(); minutes = date.getMinutes();
        hours = hours < 10 ? hours == 0 ? '00' : '0' + hours : hours;
        minutes = minutes < 10 ? minutes == 0 ? '00' : '0' + minutes : minutes;
        $('#edit-time').val(hours + ':' + minutes + ':00');

        showModal('editcampModal');
    }

    function cancelCamp(e){
        var campid = $(e).data('id');
        var campElem = $(e).parents('.camp')[0];
        var dataset = $(campElem).children('span.dataset')[0];

        $('#cancel-campid').val(campid);
        $('#cancel-campname').text('Cancel camp - ' + $(dataset).data('name'));
        showModal('cancelcampModal');
    }

    function changeSelectionPlaceholder(){
        const selection = $('#filter-selection').val();
        
        switch (selection) {
            case "1":
                $('#search-filter').attr('placeholder', '(Ex: Josephs 24th)');
                break;
            case "2":
                $('#search-filter').attr('placeholder', '(Ex: companyabc)');
                break;
            case "3":
                $('#search-filter').attr('placeholder', '(Ex: seeduwa)');
                break;
            case "4":
                $('#search-filter').attr('placeholder', '(Ex: rathnapura)');
                break;
        }
    }

    function filter(){
        const selection = $('#filter-selection').val();
        const search = $('#search-filter').val().toLowerCase().trim();
        
        switch (selection) {
            //name
            case "1":
                
                $('.body-container .camp').toArray().forEach(e => {
                    const dataelem = $(e).children('span');
                    
                    if($(dataelem).data('name').toLowerCase().includes(search))
                        $(e).removeClass('hidden');
                    else   
                        $(e).addClass('hidden');
                });
                break;
            //organizer
            case "2":
                $('.body-container .camp').toArray().forEach(e => {
                    const dataelem = $(e).children('span');
                    if($(dataelem).data('organizer').toLowerCase().includes(search))
                        $(e).removeClass('hidden');
                    else   
                        $(e).addClass('hidden');
                });
                break;
            //city
            case "3":
                $('.body-container .camp').toArray().forEach(e => {
                    const dataelem = $(e).children('span');
                    if($(dataelem).data('city').toLowerCase().includes(search))
                        $(e).removeClass('hidden');
                    else   
                        $(e).addClass('hidden');
                });
                break;
            //district
            case "4":
                $('.body-container .camp').toArray().forEach(e => {
                    const dataelem = $(e).children('span');
                    if($(dataelem).data('district').toLowerCase().includes(search))
                        $(e).removeClass('hidden');
                    else   
                        $(e).addClass('hidden');
                });
                break;
        
            default:
                break;
        }
    }

    function previewImage(e){
        var files = e.files || [];
        if (!files.length || !window.FileReader) 
            return;


        if (/^image/.test(files[0].type)) {
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);

            reader.onloadend = function () {
                if(e.id == 'edit-profileimage')
                    $("#edit-profilepreview").attr('src', this.result);
                else
                    $("#profilepreview").attr('src', this.result);
            }
        }
    }
</script>