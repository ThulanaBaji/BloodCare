<div class="w-full h-full p-3 md:p-6 flex flex-col items-center relative">
    <div class="absolute z-30 top-10 left-1/2 -translate-x-1/2 max-w-xs">
        <div class="mt-3 alert alert-success flex items-center p-2 px-3 text-sm text-green-800 rounded bg-green-200" style="display:none;">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
        </svg>
        <div id="alert-top-success-text"></div>
        </div>
        <div class="mt-3 alert alert-error flex items-center p-2 px-3 text-sm text-red-900 rounded bg-red-300" style="display:none;">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
        </svg>
        <div id="alert-top-error-text"></div>
        </div>
    </div>
    
    <div class="w-full h-full">
        <!-- row -->

        <div class="flex mb-11">
            <div class="rounded-xl w-fit gap-8 items-center flex p-3  bg-gradient-to-r <?= $donationCount < 50 ? 'from-slate-400 to-zinc-400' : ($donationCount < 100 ? 'from-yellow-400 to-orange-400' : 'from-purple-400 to-indigo-400') ?>">
                <span class="flex flex-col text-sm font-mono text-white/90">

                    <p class="pl-1"><?= $name ?></p>
                    <p class="pl-1"><?= $city ?></p>

                    <span class="bg-black/20 w-fit text-white/70 rounded p-1 px-2 font-sans text-xs uppercase mt-2"><?= $donationCount < 50 ? 'silver' : ($donationCount < 100 ? 'golden' : 'platinum') ?> partner</span>
                </span>

                <span class="rounded-full h-16 w-16">
                    <svg class="w-14 h-14 text-white/40" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.4 3a1 1 0 0 0-.8 0l-7 2.7a1 1 0 0 0-.6 1 17.7 17.7 0 0 0 7.4 14.1c.4.3.8.3 1.2 0A17.4 17.4 0 0 0 20 6.7a1 1 0 0 0-.6-1l-7-2.6Z"/>
                    </svg>                
                </span>
            </div>
        </div>
        
        <div class="flex gap-3 flex-wrap"> 
          
        <!-- blood colelction card -->
            <div class="max-w-md w-full mb-3 flex">

                <div class="max-w-sm shadow-md w-full bg-gradient-to-tr from-emerald-300  to-orange-200 rounded-lg dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2"><span id="collectiontotal"></span> (ml)</h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Blood collection this <span id="collectionname">week</span></p>
                        </div>
                        <div id="collectionperc"
                        class="flex items-center hidden px-2.5 py-0.5 text-base font-semibold text-green-500 text-center">
                        <span class="perc"></span>%
                        <svg class="w-3 h-3 ms-1 arrow" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                        </svg>
                        </div>
                    </div>
                    <div id="area-chart"></div>
                    <div class="grid grid-cols-1 items-center border-black/5 border-t dark:border-gray-700 justify-between">
                        <div class="flex justify-between items-center pt-5">
                            <!-- Button -->
                            <button
                                id="collectiondropdownbutton"
                                data-dropdown-toggle="collectiondropdown"
                                data-dropdown-placement="bottom"
                                class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                type="button">
                                <p>Last 7 days</p> 
                                <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="collectiondropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                    <li>
                                    <button onclick="collectionChart(1)" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-left">Last 7 days</button>
                                    </li>
                                    <li>
                                    <button onclick="collectionChart(2)" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-left">Last 30 days</button>
                                    </li>
                                    <li>
                                    <button onclick="collectionChart(3)" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-left">Last 12 months</button>
                                    </li>
                                </ul>
                            </div>
                            <a
                                href="#"
                                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-gray-500 hover:bg-black/5 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                Collection Report
                                <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <?php if($donationProcessingCount > 0): ?>
                <div class="h-[88px] w-[24px] hover:w-[184px] transition-all hover:z-30 hover:shadow group border-gray-500 self-center flex items-center justify-center bg-amber-300 rounded-r-lg">
                    <div class="hidden w-40 py-3 group-hover:block">
                        <span class="flex h-6 justify-center items-baseline"><p class="font-semibold text-md"><?= $donationProcessingCount ?></p><p class="ml-0.5 text-xs">processing blood pints</p></span>
                        <a href="<?= base_url('hospital/donation/processing') ?>" class="p-3 py-1 bg-black/5 text-sm font-semibold rounded block mt-2 ml-3 w-fit hover:bg-black/10">view</a>    
                    </div>
                    <svg class="w-4 h-4 mx-1 my-9  flex-shrink-0 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M10.3 5.6A2 2 0 0 0 7 7v10a2 2 0 0 0 3.3 1.5l5.9-4.9a2 2 0 0 0 0-3l-6-5Z" clip-rule="evenodd"/>
                    </svg>
                    
                </div>
                <?php endif; ?>

            </div>

        <!-- blood request card -->
            <div class="max-w-md w-full mb-3 flex">
                <div class="max-w-sm shadow-md w-full bg-gradient-to-tr from-purple-300  to-orange-200 rounded-lg dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2"><span id="requesttotal"></span> (ml)</h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Blood request this <span id="requestname"> week</span></p>
                        </div>
                        <div id="requestperc"
                        class="flex items-center hidden px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                        <span class="perc"></span>%
                        <svg class="w-3 h-3 ms-1 arrow" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                        </svg>
                        </div>
                    </div>
                    <div id="area-chart-2"></div>
                    <div class="grid grid-cols-1 items-center border-black/5 border-t dark:border-gray-700 justify-between">
                        <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button
                            id="requestdropdownbutton"
                            data-dropdown-toggle="requestdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            <p> Last 7 days</p>
                            <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="requestdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <button onclick="requestChart(1)" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-left">Last 7 days</button>
                                </li>
                                <li>
                                    <button onclick="requestChart(2)" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-left">Last 30 days</button>
                                </li>
                                <li>
                                    <button onclick="requestChart(3)" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-left">Last 12 months</button>
                                </li>
                            </ul>
                        </div>
                        <a
                            href="#"
                            class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-gray-500 hover:bg-black/5 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                            Request Report
                            <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                        </a>
                        </div>
                    </div>
                </div>
                
                <?php if($requestPendingCount > 0): ?>
                <div class="h-[88px] w-[24px] hover:w-[184px] transition-all group border-gray-500 self-center flex items-center justify-center bg-amber-300 rounded-r-lg">
                    <div class="hidden w-40 py-3 group-hover:block">
                        <span class="flex h-6 justify-center items-baseline"><p class="font-semibold text-md"><?= $requestPendingCount ?></p><p class="ml-0.5 text-xs">pending blood requests</p></span>
                        <a href="<?= base_url('hospital/requests') ?>" class="p-3 py-1 bg-black/5 text-sm font-semibold rounded block mt-2 ml-3 w-fit hover:bg-black/10">view</a>    
                    </div>
                    <svg class="w-4 h-4 mx-1 my-9  flex-shrink-0 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M10.3 5.6A2 2 0 0 0 7 7v10a2 2 0 0 0 3.3 1.5l5.9-4.9a2 2 0 0 0 0-3l-6-5Z" clip-rule="evenodd"/>
                    </svg>
                    
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="flex gap-3 mt-11 flex-wrap"> 
<!-- appointment card -->
            <div class="rounded-lg shadow max-w-sm w-full bg-cyan-50 p-5">
                <div class="flex gap-3 justify-between">
                    <div class="flex flex-col">
                        <span class="flex items-baseline">
                            <p class="leading-none text-3xl font-bold text-gray-900 pb-2"><?= $appointmentdetails['total'] ?></p>
                            <p class="text-sm font-semibold text-gray-900 ml-2">Total appointments</p>
                        </span>
                        <span class="flex items-center gap-2 ml-1 mt-2">
                            <p class="text-sm text-gray-500 font-semibold"><?= $appointmentdetails['today'] ?> today</p>
                            <svg viewBox="0 0 10 10" class="w-[5px] h-[5px] my-auto fill-gray-300 inline-block flex-shrink-0" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" />
                            </svg>
                            <p class="text-sm text-gray-500 font-semibold"><?= $appointmentdetails['reserved'] ?> reserved</p>
                        </span>
                    </div>
                    <div class="rounded-full flex items-start justify-center p-3">
                        <svg class="w-6 h-6 text-cyan-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4v11c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                        </svg>
                        
                    </div>
                </div>
                <a href="<?= base_url('hospital/donation/todayappointments') ?>" class="flex group items-center mt-8 p-2 w-56 text-gray-600 text-sm font-semibold bg-black/5 hover:bg-black/10 rounded shadow">
                    view today appointments
                    <svg class="w-5 h-5 ml-3 group-hover:translate-x-2 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                    </svg>
                </a>
            </div>
<!-- camp card -->
            <div class="rounded-lg shadow max-w-sm w-full bg-emerald-50 p-5">
                <div class="flex gap-3 justify-between">
                    <div class="flex flex-col">
                        <span class="flex items-baseline">
                            <p class="leading-none text-3xl font-bold text-gray-900 pb-2"><?= $campdetails['total'] ?></p>
                            <p class="text-sm font-semibold text-gray-900 ml-2">Total camps</p>
                        </span>
                        <span class="flex items-center gap-2 ml-1 mt-2">
                            <p class="text-sm text-gray-500 font-semibold"><?= $campdetails['today'] ?> today</p>
                            <svg viewBox="0 0 10 10" class="w-[5px] h-[5px] my-auto fill-gray-300 inline-block flex-shrink-0" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" />
                            </svg>
                            <p class="text-sm text-gray-500 font-semibold"><?= $campdetails['ongoing'] ?> ongoing</p>
                        </span>
                    </div>
                    <div class="rounded-full flex items-start justify-center p-3">
                        <svg class="w-6 h-6 fill-emerald-600"  viewBox="0 0 512 512" xml:space="preserve">
<g>
	<g>
		<path d="M167.141,131.229c-5.424,1.593-9.902,2.337-14.098,2.337c-27.619,0-50.087-22.468-50.087-50.087
			c0-20.788,12.631-39.081,32.174-46.603c14.564-5.604,14.125-26.493-0.734-31.429C123.353,1.783,113.071,0,102.957,0
			C47.723,0,2.783,44.94,2.783,100.174c0,55.234,44.94,100.174,100.174,100.174c33.044,0,63.945-16.326,82.674-43.668
			C194.445,143.806,182.243,126.828,167.141,131.229z"/>
	</g>
</g>
<g>
	<g>
		<path d="M492.522,144.696h-16.696V128c0-9.223-7.473-16.696-16.696-16.696c-9.223,0-16.696,7.473-16.696,16.696v16.696h-16.696
			c-9.223,0-16.696,7.473-16.696,16.696c0,9.223,7.473,16.696,16.696,16.696h16.696v16.696c0,9.223,7.473,16.696,16.696,16.696
			c9.223,0,16.696-7.473,16.696-16.696v-16.696h16.696c9.223,0,16.696-7.473,16.696-16.696
			C509.217,152.169,501.744,144.696,492.522,144.696z"/>
	</g>
</g>
<g>
	<g>
		<path d="M392.348,33.391h-16.696V16.696C375.652,7.473,368.179,0,358.957,0c-9.223,0-16.696,7.473-16.696,16.696v16.696h-16.696
			c-9.223,0-16.696,7.473-16.696,16.696s7.473,16.696,16.696,16.696h16.696v16.696c0,9.223,7.473,16.696,16.696,16.696
			c9.223,0,16.696-7.473,16.696-16.696V66.783h16.696c9.223,0,16.696-7.473,16.696-16.696S401.57,33.391,392.348,33.391z"/>
	</g>
</g>
<g>
	<g>
		<path d="M492.522,378.435c-9.223,0-16.696,7.473-16.696,16.696v47.205L272.462,151.815c-6.542-9.229-20.474-9.711-27.359,0
			L41.739,442.336V395.13c0-9.223-7.473-16.696-16.696-16.696c-9.223,0-16.696,7.473-16.696,16.696v100.174
			c0,9.366,7.721,16.696,16.696,16.696c46.81,0,420.628,0,467.478,0c8.894,0,16.696-7.337,16.696-16.696V395.13
			C509.217,385.908,501.744,378.435,492.522,378.435z M275.478,478.609V372.237c50.601,96.367,35.347,67.316,55.854,106.371H275.478
			z"/>
	</g>
</g>
</svg>
                        
                    </div>
                </div>
                <a href="<?= base_url('hospital/donation/todaycamps') ?>" class="flex group items-center mt-8 p-2 w-44 text-gray-600 text-sm font-semibold bg-black/5 hover:bg-black/10 rounded shadow">
                    view today camps
                    <svg class="w-5 h-5 ml-3 group-hover:translate-x-2 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                    </svg>
                </a>
            </div>
<!-- donation card -->
            <div class="rounded-lg shadow max-w-sm w-full bg-pink-50 p-5">
                <div class="flex gap-3 justify-between">
                    <div class="flex flex-col">
                        <span class="flex items-baseline">
                            <p class="leading-none text-3xl font-bold text-gray-900 pb-2"><?=$donationCount ?></p>
                            <p class="text-sm font-semibold text-gray-900 ml-2">Total donations</p>
                        </span>
                        <span class="flex items-center gap-2 ml-1 mt-2">
                            <p class="text-sm text-gray-500 font-semibold"><?= $donationdetails['appointment'] ?> from appointments</p>
                            <svg viewBox="0 0 10 10" class="w-[5px] h-[5px] my-auto fill-gray-300 inline-block flex-shrink-0" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" />
                            </svg>
                            <p class="text-sm text-gray-500 font-semibold"><?= $donationdetails['camp'] ?> from camps</p>
                        </span>
                    </div>
                    <div class="rounded-full flex items-start justify-center p-3">
                        <svg class="w-5 h-5 text-pink-600 transition" viewBox="0 0 512 512">
                                <g>
                                    <g>
                                        <path d="M270.889,7.072c-7.683-9.435-22.104-9.425-29.778,0C188.88,71.214,66.464,237.176,66.464,322.464
                                            C66.464,426.974,151.49,512,256,512s189.537-85.026,189.537-189.537C445.537,237.147,322.549,70.511,270.889,7.072z
                                            M146.169,341.651c-10.6-0.008-19.187-8.589-19.187-19.187c0-6.528,1.773-21.674,13.646-49.772
                                            c4.127-9.768,15.391-14.34,25.159-10.213c9.768,4.128,14.34,15.391,10.213,25.159c-10.483,24.81-10.618,34.728-10.618,34.825
                                            c-0.014,10.595-8.607,19.187-19.2,19.187C146.176,341.651,146.172,341.651,146.169,341.651z M256,451.483
                                            c-41.992,0-81.504-20.595-105.694-55.092c-6.088-8.682-3.986-20.657,4.696-26.745s20.656-3.985,26.743,4.696
                                            c17.01,24.258,44.768,38.74,74.254,38.74c10.604,0,19.2,8.597,19.2,19.2C275.2,442.886,266.604,451.483,256,451.483z" fill="currentColor"></path>
                                    </g>
                                </g>
                            </svg>
                    </div>
                </div>
                <a href="<?= base_url('hospital/donation/processed') ?>" class="flex group items-center mt-8 p-2 w-40 text-gray-600 text-sm font-semibold bg-black/5 hover:bg-black/10 rounded shadow">
                    view donations
                    <svg class="w-5 h-5 ml-3 group-hover:translate-x-2 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('node_modules/apexcharts/dist/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('assets/js/flowbite.js') ?>"></script>

<script>
    $(document).ready(function(){
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

        requestChart(1);
        collectionChart(1);
    });

    function collectionChart(num){
        $('#collectiondropdown').addClass('hidden');
        $('#collectionperc').addClass('text-red-500');
        $('#collectionperc').addClass('text-green-500');
        $('#collectionperc').removeClass('hidden');

        const week = <?= $collectionData['week'] ?>;
        const weekperc = <?= $collectionData['weekperc'] ?>;
        const weekcat = <?= $collectionchart['week']['category'] ?>;
        const weekdata = <?= $collectionchart['week']['data'] ?>;

        const month = <?= $collectionData['month'] ?>;
        const monthperc = <?= $collectionData['monthperc'] ?>;
        const monthcat = <?= $collectionchart['month']['category'] ?>;
        const monthdata = <?= $collectionchart['month']['data'] ?>;

        const year = <?= $collectionData['year'] ?>;
        const yearperc = <?= $collectionData['yearperc'] ?>;
        const yearcat = <?= $collectionchart['year']['category'] ?>;
        const yeardata = <?= $collectionchart['year']['data'] ?>;

        switch(num){
            case 1:
                $('#collectiondropdownbutton p').text('Last 7 days');
                $('#collectionname').text('week');

                var weekstr = week > 1000 ? week/1000 + 'k' : week;
                $('#collectiontotal').text(weekstr);

                if(weekperc == 0) $('#collectionperc').addClass('hidden');
                else {
                    $('#collectionperc span.perc').text(Math.abs(weekperc));

                    if(weekperc < 0) 
                        {
                        $('#collectionperc svg.arrow').addClass('rotate-180');
                        $('#collectionperc').addClass('text-red-500');
                    }
                    else
                        {
                        $('#collectionperc').addClass('text-green-500');
                        $('#collectionperc svg.arrow').removeClass('rotate-180');
                    }
                }

                loadChart('area-chart', 'rgb(227, 52, 78)', '', 2, weekcat, weekdata);
                break;
            case 2:
                $('#collectiondropdownbutton p').text('Last 30 days');
                $('#collectionname').text('month');
                
                var monthstr = month > 1000 ? month/1000 + 'k' : month;
                $('#collectiontotal').text(monthstr);

                if(monthperc == 0) $('#collectionperc').addClass('hidden');
                else {
                    $('#collectionperc span.perc').text(Math.abs(monthperc));

                    if(monthperc < 0) {
                        $('#collectionperc svg.arrow').addClass('rotate-180');
                        $('#collectionperc').addClass('text-red-500');
                    }
                    else
                        {
                        $('#collectionperc').addClass('text-green-500');
                        $('#collectionperc svg.arrow').removeClass('rotate-180');
                    }
                }

                loadChart('area-chart', 'rgb(227, 52, 78)', '', 2, monthcat, monthdata);
                break;
            case 3:
                $('#collectiondropdownbutton p').text('Last 12 months');
                $('#collectionname').text('year');
                
                var yearstr = year > 1000 ? year/1000 + 'k' : year;
                $('#collectiontotal').text(yearstr);

                if(yearperc == 0) $('#collectionperc').addClass('hidden');
                else {
                    $('#collectionperc span.perc').text(Math.abs(yearperc));

                    if(yearperc < 0) 
                        {
                        $('#collectionperc svg.arrow').addClass('rotate-180');
                        $('#collectionperc').addClass('text-red-500');
                    }
                    else
                        {
                        $('#collectionperc').addClass('text-green-500');
                        $('#collectionperc svg.arrow').removeClass('rotate-180');
                    }
                }

                loadChart('area-chart', 'rgb(227, 52, 78)', '', 2, yearcat, yeardata);

                break;
        }
    }

    function requestChart(num){
        $('#requestdropdown').addClass('hidden');
        $('#requestperc').addClass('text-red-500');
        $('#requestperc').addClass('text-green-500');
        $('#requestperc').removeClass('hidden');

        const week = <?= $requestData['week'] ?>;
        const weekperc = <?= $requestData['weekperc'] ?>;
        const weekcat = <?= $requestchart['week']['category'] ?>;
        const weekdata = <?= $requestchart['week']['data'] ?>;

        const month = <?= $requestData['month'] ?>;
        const monthperc = <?= $requestData['monthperc'] ?>;
        const monthcat = <?= $requestchart['month']['category'] ?>;
        const monthdata = <?= $requestchart['month']['data'] ?>;

        const year = <?= $requestData['year'] ?>;
        const yearperc = <?= $requestData['yearperc'] ?>;
        const yearcat = <?= $requestchart['year']['category'] ?>;
        const yeardata = <?= $requestchart['year']['data'] ?>;

        switch(num){
            case 1:
                $('#requestdropdownbutton p').text('Last 7 days');
                $('#requestname').text('week');

                var weekstr = week > 1000 ? week/1000 + 'k' : week;
                $('#requesttotal').text(weekstr);

                if(weekperc == 0) $('#requestperc').addClass('hidden');
                else {
                    $('#requestperc span.perc').text(Math.abs(weekperc));

                    if(weekperc < 0) 
                        {
                        $('#requestperc svg.arrow').addClass('rotate-180');
                        $('#requestperc').addClass('text-red-500');
                    }
                    else
                        {
                        $('#requestperc').addClass('text-green-500');
                        $('#requestperc svg.arrow').removeClass('rotate-180');
                    }
                }

                loadChart('area-chart-2', 'rgb(227, 52, 78)', '', 2, weekcat, weekdata);
                break;
            case 2:
                $('#requestdropdownbutton p').text('Last 30 days');
                $('#requestname').text('month');
                
                var monthstr = month > 1000 ? month/1000 + 'k' : month;
                $('#requesttotal').text(monthstr);

                if(monthperc == 0) $('#requestperc').addClass('hidden');
                else {
                    $('#requestperc span.perc').text(Math.abs(monthperc));

                    if(monthperc < 0) 
                        {
                        $('#requestperc svg.arrow').addClass('rotate-180');
                        $('#requestperc').addClass('text-red-500');
                    }
                    else
                        {
                        $('#requestperc').addClass('text-green-500');
                        $('#requestperc svg.arrow').removeClass('rotate-180');
                    }
                }

                loadChart('area-chart-2', 'rgb(227, 52, 78)', '', 2, monthcat, monthdata);
                break;
            case 3:
                $('#requestdropdownbutton p').text('Last 12 months');
                $('#requestname').text('year');
                
                var yearstr = year > 1000 ? year/1000 + 'k' : year;
                $('#requesttotal').text(yearstr);

                if(yearperc == 0) $('#requestperc').addClass('hidden');
                else {
                    $('#requestperc span.perc').text(Math.abs(yearperc));

                    if(yearperc < 0) 
                        {
                        $('#requestperc svg.arrow').addClass('rotate-180');
                        $('#requestperc').addClass('text-red-500');
                    }
                    else{
                        $('#requestperc').addClass('text-green-500');
                        $('#requestperc svg.arrow').removeClass('rotate-180');
                    }
                }

                loadChart('area-chart-2', 'rgb(227, 52, 78)', '', 2, yearcat, yeardata);
                break;
        }
    }

    function loadChart(id, color, gradcolor, strokewidth, category, data) {
        let options = {
        chart: {
            height: "50%",
            maxWidth: "100%",
            type: "area",
            fontFamily: "Inter, sans-serif",
            dropShadow: {
            enabled: false,
            },
            toolbar: {
            show: false,
            },
        },
        tooltip: {
            enabled: true,
            x: {
            show: false,
            },
        },
        fill: {
            type: "gradient",
            gradient: {
            opacityFrom: 0.3,
            opacityTo: 0,
            shade: gradcolor,
            gradientToColors: [gradcolor],
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: strokewidth,
        },
        grid: {
            show: false,
            strokeDashArray: 4,
            padding: {
            left: 2,
            right: 2,
            top: 0
            },
        },
        series: [
            {
            name: "Blood volume (ml)",
            data: data,
            color: color,
            },
        ],
        xaxis: {
            categories: category,
            labels: {
            show: false,
            },
            axisBorder: {
            show: false,
            },
            axisTicks: {
            show: false,
            },
        },
        yaxis: {
            show: false,
        },
        }

        if (document.getElementById(id) && typeof ApexCharts !== 'undefined') {
            $('#' + id).children().remove();
        const chart = new ApexCharts(document.getElementById(id), options);
        chart.render();
        }
    }

</script>