<div class="h-full w-full sm:pt-6 grid grid-rows-[auto_1fr] relative">
    <div class="w-full flex justify-center items-center pb-8">
        <div class="w-fit flex">
            <a href="<?= base_url('hospital/donation') ?>" class="w-24 sm:w-28 p-2 text-xs sm:text-sm font-semibold text-gray-600 bg-gradient-to-tr hover:from-gray-300 hover:to-blue-200 border-gray-300 border rounded-l flex justify-center">Today</a>
            <a href="<?= base_url('hospital/donation/processing') ?>" class="w-24 sm:w-28 p-2 text-xs sm:text-sm font-semibold text-gray-600 bg-gradient-to-tr from-amber-200 to-amber-200 border-gray-300 border border-x-0 flex justify-center">Processing</a>
            <a href="<?= base_url('hospital/donation/processed') ?>" class="w-24 sm:w-28 p-2 text-xs sm:text-sm font-semibold text-gray-600 bg-gradient-to-tr hover:from-gray-300 hover:to-green-200 hover:bg-gray-300 border-gray-300 border rounded-r flex justify-center">Processed</a>
        </div>
    </div>

    <div class="w-full h-full flex flex-col items-center">
        <div class="flex mb-6 max-w-xl w-full">
            <select class="bg-gray-50 rounded-l-lg border-gray-300 outline-none z-10" id="filter-selection" onchange="changeSelectionPlaceholder()">
                <option value="1">Name</option>
                <option value="2">Organizer</option>
                <option value="3">City</option>
                <option value="4">District</option>
            </select>
            <div class="relative w-full">
                <input type="search" id="search-filter" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border
                    border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="(Ex: Josephs 24th)" required="">
                <button onclick="filter()" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="flex max-w-xl w-full items-center flex-col processing-list">
            <?php 
            function time_elapsed_string($datetime, $full = false) {
                $now = new DateTime;
                $ago = new DateTime($datetime);
                $diff = $now->diff($ago);

                $diff->w = floor($diff->d / 7);
                $diff->d -= $diff->w * 7;

                $string = array(
                    'y' => 'year',
                    'm' => 'month',
                    'w' => 'week',
                    'd' => 'day',
                    'h' => 'hour',
                    'i' => 'minute',
                    's' => 'second',
                );
                foreach ($string as $k => &$v) {
                    if ($diff->$k) {
                        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                    } else {
                        unset($string[$k]);
                    }
                }

                if (!$full) $string = array_slice($string, 0, 1);
                return $string ? implode(', ', $string) . ' ago' : 'just now';
            }

            foreach($donations as $donation): ?>
            <div class="donation relative rounded-lg bg-gray-50 p-3 sm:p-4 border my-3 w-full" 
            data-reference="<?= $donation['reference'] ?>" data-name="<?= $donation['name'] ?>" data-membershipid="<?= $donation['membership_id'] ?>", data-profile="<?= base_url('uploads/donor/profileimages/'.$donation['profile']) ?>">
                <div class="flex hover:w-fit absolute top-0 left-0 py-2 px-2 w-8 -translate-x-1/2 z-20 rounded-full bg-amber-200 group">
                    <svg class="w-4 h-4 flex-shrink-0 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <p class="text-xs ml-2 pr-2 text-gray-800 group-hover:flex hidden"><?= time_elapsed_string(date("Y-m-d H:i:s", substr($donation['donated_datetime'], 0, -3))) ?></p>
                </div>
                <div class="flex justify-between items-center w-full"><div class="flex gap-6 items-center"><div class="flex w-11 h-11 sm:w-14 sm:h-14 border items-center justify-center rounded-full overflow-hidden">
                    <img src="<?= base_url('uploads/donor/profileimages/'.$donation['profile']) ?>" alt="">
                </div>
                <div class="flex flex-col gap-0.5 sm:gap-2">
                    <div class="flex sm:gap-2">
                        <p class="donation-ref text-sm font-semibold text-gray-600"><?= $donation['reference'] ?></p>
                        <svg viewBox="0 0 496 496" class="w-6 hidden sm:inline-block"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#FFF8EF;" d="M360,184v-72c0-4.8-4-8-8-8H128c-4,0-8,3.2-8,8v72c0,66.4,53.6,120,120,120S360,250.4,360,184z M104,184V48h96h80h96v136c0,64-43.2,118.4-105.6,132.8c-4,0.8-6.4,4-6.4,8V352h-48v-28c0-4-2.4-7.2-6.4-8 C147.2,302.4,104,248,104,184z"></path> <path style="fill:#EE5656;" d="M136,120h208v64c0,57.6-46.4,104-104,104s-104-46.4-104-104V120z M192,216c0,26.4,21.6,48,48,48 s48-21.6,48-48c0-24-37.6-72-41.6-76.8c-3.2-4-9.6-4-12.8,0C229.6,144,192,192,192,216z"></path> <path style="fill:#F69494;" d="M240,156.8c14.4,19.2,32,47.2,32,59.2c0,17.6-14.4,32-32,32s-32-14.4-32-32 C208,204,225.6,176,240,156.8z"></path> <rect x="208" y="16" style="fill:#EE5656;" width="64" height="16"></rect> <g> <path style="fill:#42210B;" d="M240,156.8C225.6,176,208,204,208,216c0,17.6,14.4,32,32,32s32-14.4,32-32 C272,204,254.4,176,240,156.8z M288,216c0,26.4-21.6,48-48,48s-48-21.6-48-48c0-24,37.6-72,41.6-76.8c3.2-4,9.6-4,12.8,0 C250.4,144,288,192,288,216z"></path> <path style="fill:#42210B;" d="M344,184v-64H136v64c0,57.6,46.4,104,104,104S344,241.6,344,184z M360,184c0,66.4-53.6,120-120,120 s-120-53.6-120-120v-72c0-4.8,4-8,8-8h224c4,0,8,3.2,8,8V184z"></path> <path style="fill:#42210B;" d="M208,32h64V16h-64V32z M216,352h48v-28c0-4,2.4-7.2,6.4-8C332.8,302.4,376,248,376,184V48h-96h-80 h-96v136c0,64,43.2,118.4,105.6,132.8c4,0.8,6.4,4,6.4,8V352z M200,330.4C133.6,312.8,88,252.8,88,184V40c0-4.8,3.2-8,8-8h96V8 c0-4,4-8,8-8h80c4,0,8,4,8,8v24h96c4,0,8,3.2,8,8v144c0,69.6-45.6,128.8-112,146.4V360c0,4-4,8-8,8h-24v80c0,17.6,14.4,32,32,32 s32-14.4,32-32v-80c0-26.4,21.6-48,48-48s48,21.6,48,48v120h-16V368c0-17.6-14.4-32-32-32s-32,14.4-32,32v80c0,26.4-21.6,48-48,48 s-48-21.6-48-48v-80h-24c-4,0-8-4-8-8V330.4z"></path> </g> <path style="fill:#D9CDC1;" d="M200,48h-96v32l6.4-10.4c6.4-8,16-13.6,26.4-13.6h201.6c16.8,0,30.4,13.6,30.4,30.4v144 c4.8-14.4,8-30.4,8-46.4V48H280H200z"></path> </g></svg>
                    </div>
                    <p class="donation-name text-sm font-semibold text-gray-600"><?= $donation['name'] ?></p>
                    <p class="donation-medium rounded bg-gray-200 text-xs text-gray-500 font-semibold p-1"><?= $donation['donation_medium'] ?></p>
                </div></div>
                <div class="hidden sm:flex flex-col self-end justify-around items-center gap-2">
                    <button data-modal="acceptModal" onclick="showModal(this)" data-donationid="<?= $donation['id'] ?>" class="p-2 rounded items-center group w-28 justify-center hover:text-gray-700 text-sm text-gray-500 font-semibold bg-green-200 flex gap-2">
                        <svg class="w-4 h-4 text-gray-500 group-hover:text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z"></path>
                        </svg>Accept
                    </button>
                    <button data-modal="rejectModal" onclick="showModal(this)" data-donationid="<?= $donation['id'] ?>" class="p-2 rounded items-center group w-28 justify-center hover:text-gray-700 text-gray-500 text-sm font-semibold bg-red-200 flex gap-2">
                        <svg class="w-4 h-4 text-gray-500 group-hover:text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                        </svg>Reject
                    </button>
                </div></div>
                <div class="sm:hidden mt-6 flex gap-3">
                    <button data-modal="acceptModal" onclick="showModal(this)" data-donationid="<?= $donation['id'] ?>" class="p-2 rounded items-center group flex-grow justify-center hover:text-gray-700 text-sm text-gray-500 font-semibold bg-green-200 flex gap-2">
                        <svg class="w-4 h-4 text-gray-500 group-hover:text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z"></path>
                        </svg>Accept
                    </button>
                    <button data-modal="rejectModal" onclick="showModal(this)" data-donationid="<?= $donation['id'] ?>" class="p-2 rounded items-center group flex-grow justify-center hover:text-gray-700 text-gray-500 text-sm font-semibold bg-red-200 flex gap-2">
                        <svg class="w-4 h-4 text-gray-500 group-hover:text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                        </svg>Reject
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

<div class="fixed top-0 left-0 h-screen w-full bg-black/10 z-40 hidden" id="modal-shadow" onclick="hideModal()" data-target=""></div>

<div id="acceptModal" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-9000" id="accept-reference">
                    Process donation
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('hospital/donation/confirmDonation') ?>" method="post">
                
                <input type="hidden" name="donationid" id="accept-donationid">

                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="relative flex sm:col-span-2 gap-3 p-4 bg-gray-50 rounded">
                        <div class="flex w-11 h-11 sm:w-14 sm:h-14 border items-center justify-center rounded-full overflow-hidden">
                            <img src="http://localhost/bloodcare/uploads/donor/profileimages/1704377577952.jpg" alt="" id="accept-profile">
                        </div>

                        <div class="flex flex-col gap-2">
                            <p class="text-sm px-2 font-semibold text-gray-600 " id="accept-name">Cecilia Corey</p>
                            <p class="w-fit text-xs px-2 border font-semibold py-1 rounded-full bg-gradient-to-r from-pink-100 via-amber-100 to-cyan-100 text-gray-500" id="accept-membershipid">N345FGH5</p>       
                        </div>
                    </div>

                    <div class="sm:col-span-2 mt-3 flex gap-6">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Blood type</label>
                            <select name="bloodtype" id="" class="bg-gray-50 rounded-lg border-gray-300 outline-none z-10">
                                <option value="ap">A+</option>
                                <option value="an">A-</option>
                                <option value="bp">B+</option>
                                <option value="bn">B-</option>
                                <option value="abp">AB+</option>
                                <option value="abn">AB-</option>
                                <option value="op">O+</option>
                                <option value="on">O-</option>
                            </select>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Blood volume (ml)</label>
                            <input type="text" name="bloodvol" id="" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="enter the blood volume" required>
                        </div>
                    </div>

                </div>

                  
                <div class="h-4"></div>
                <button type="submit" class="cursor-pointer text-md font-semibold px-2 mt-3 text-gray-700 py-2 gap-1 flex items-center justify-center bg-green-200 max-w-xl rounded">
                    <svg class="w-4 h-4 text-gray-500 group-hover:text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z"></path>
                    </svg>
                    <p class="mb-1 ml-1">process donation</p>
                </button>
            </form>
        </div>
    </div>
</div>

<div id="rejectModal" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-9000" id="reject-reference">
                    Reject donation
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('hospital/donation/rejectDonation') ?>" method="post">
                
                <input type="hidden" name="donationid" id="reject-donationid">

                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="relative flex sm:col-span-2 gap-3 p-4 bg-gray-50 rounded">
                        <div class="flex w-11 h-11 sm:w-14 sm:h-14 border items-center justify-center rounded-full overflow-hidden">
                            <img src="http://localhost/bloodcare/uploads/donor/profileimages/1704377577952.jpg" alt="" id="reject-profile">
                        </div>

                        <div class="flex flex-col gap-2">
                            <p class="text-sm px-2 font-semibold text-gray-600 " id="reject-name">Cecilia Corey</p>
                            <p class="w-fit text-xs px-2 border font-semibold py-1 rounded-full bg-gradient-to-r from-pink-100 via-amber-100 to-cyan-100 text-gray-500" id="reject-membershipid">N345FGH5</p>       
                        </div>
                    </div>

                    <div class="sm:col-span-2 mt-3 flex gap-6">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Blood type</label>
                            <select name="bloodtype" id="" class="bg-gray-50 rounded-lg border-gray-300 outline-none z-10">
                                <option value="ap">A+</option>
                                <option value="an">A-</option>
                                <option value="bp">B+</option>
                                <option value="bn">B-</option>
                                <option value="abp">AB+</option>
                                <option value="abn">AB-</option>
                                <option value="op">O+</option>
                                <option value="on">O-</option>
                            </select>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Blood volume (ml)</label>
                            <input type="text" name="bloodvol" id="" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="enter the blood volume" required>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Message</label>
                    <input type="text" name="message" id="" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Message for blood rejection reference" required>
                </div>

                <div class="h-4"></div>
                <button type="submit" class="cursor-pointer text-md font-semibold px-2 mt-3 text-gray-700 py-2 gap-1 flex items-center justify-center bg-rose-200 max-w-xl rounded">
                    <svg class="w-4 h-4 text-gray-500 group-hover:text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <p class="mb-1 ml-1">reject donation</p>
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

        $('#acceptModal').on('click', function(e) {
            if (e.target !== this && e.target.id !== 'modalbg')
                return;
            
            hideModal();
        });

        $('#rejectModal').on('click', function(e) {
            if (e.target !== this && e.target.id !== 'modalbg')
                return;
            
            hideModal();
        });
    });

    function showModal(e){

        var modal = $(e).data('modal');

        if(modal == 'rejectModal'){
            $('#reject-donationid').val($(e).data('donationid'));
            $('#reject-reference').text('Reject donation: ' + $($(e).parents('.donation')).data('reference'));
            $('#reject-name').text($($(e).parents('.donation')).data('name'));
            $('#reject-membershipid').text($($(e).parents('.donation')).data('membershipid'));
            $('#reject-profile').attr('src', $($(e).parents('.donation')).data('profile'));
        }else{
            $('#accept-donationid').val($(e).data('donationid'));
            $('#accept-reference').text('Reject donation: ' + $($(e).parents('.donation')).data('reference'));
            $('#accept-name').text($($(e).parents('.donation')).data('name'));
            $('#accept-membershipid').text($($(e).parents('.donation')).data('membershipid'));
            $('#accept-profile').attr('src', $($(e).parents('.donation')).data('profile'));
        }

        $('#' + modal).removeClass('hidden');
        $('#modal-shadow').removeClass('hidden');
        $('#modal-shadow').data('target', modal);
        scrollTo(0, 0);
    }
    
    function hideModal(){
        $('#' + $('#modal-shadow').data('target')).addClass('hidden');
        $('#modal-shadow').addClass('hidden');
    }

    function showAllAppointments(e){
        if($(e).text() == 'more appointments'){
            $('.extra-donor').each((i, elem) => $(elem).removeClass('hidden'));
            $(e).text('less');
        }else{
            $('.extra-donor').each((i, elem) => $(elem).addClass('hidden'));
            $(e).text('more appointments');
        }
    }
</script>