<div class="p-3 pt-6 md:p-6 flex flex-col h-full relative justify-between">
    <div class="absolute -top-1 left-1/2 -translate-x-1/2 max-w-xs">
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
    <div class="body-container">

        <a href="<?= base_url('donor/camp/joined') ?>" class="cursor-pointer text-md font-semibold p-2 text-gray-500 mb-4 gap-1 flex items-center justify-center bg-gray-200 sm:bg-transparent max-w-xl hover:bg-gray-200 rounded">
            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 20">
                <path d="M18.012 13.453c-.219-1.173-2.163-1.416-2.6-3.76l-.041-.217c0 .006 0-.005-.007-.038v.021l-.017-.09-.005-.025v-.006l-.265-1.418a5.406 5.406 0 0 0-5.051-4.408.973.973 0 0 0 0-.108L9.6 1.082a1 1 0 0 0-1.967.367l.434 2.325a.863.863 0 0 0 .039.1A5.409 5.409 0 0 0 4.992 9.81l.266 1.418c0-.012 0 0 .007.037v-.007l.006.032.009.046v-.01l.007.038.04.215c.439 2.345-1.286 3.275-1.067 4.447.11.586.22 1.173.749 1.074l12.7-2.377c.523-.098.413-.684.303-1.27ZM1.917 9.191h-.074a1 1 0 0 1-.924-1.07 9.446 9.446 0 0 1 2.426-5.648 1 1 0 1 1 1.482 1.343 7.466 7.466 0 0 0-1.914 4.449 1 1 0 0 1-.996.926Zm5.339 8.545A3.438 3.438 0 0 0 10 19.1a3.478 3.478 0 0 0 3.334-2.5l-6.078 1.136Z"/>
            </svg>
            <p class="mb-1 ml-1">joined camps
                <?php if ($joinedcount > 0) : ?>
                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-200 rounded-full"><?= $ongoingcount ?></span>
                <?php endif; ?></p>
            <svg class="w-3 h-3 text-gray-500 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
            </svg>
        </a>
        <!-- filter by component -->
        <div class="flex mb-6 max-w-xl">
            <select class="bg-gray-50 rounded-l-lg border-gray-300 outline-none z-10" id="filter-selection">
                <option value="4">Name</option>
                <option value="4">Date</option>
                <option value="1">City</option>
                <option value="3">District</option>
            </select>
            <div class="relative w-full">
                <input type="search" id="search-filter" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border
                    border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="(Ex: Colombo)" required>
                <button onclick="filter()" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </button>
            </div>
        </div>
        <?= loadCamps($camps) ?>
        <!-- <div class="p-1 pl-4 mb-3 rounded-xl border max-w-xl bg-gray-50 relative camp">
            <span class="hidden" data-name="Asiri Hospital" data-location="Colombo 10, Colombo" data-city="Colombo 10" data-zipcode="10600" data-district="Colombo" data-province="Western province"></span>
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center gap-6">
                    <div class="hidden sm:flex w-16 h-16 border items-center justify-center rounded-full">
                        <svg fill="#9CA3AF" class="h-11 w-11 fill-gray-400 object-cover" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                viewBox="0 0 512 512" xml:space="preserve">
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
                    <div class="flex flex-col text-left text-gray-500 font-semibold gap-3 sm:gap-2">
                        <p class="text-lg sm:text-lg leading-tight">National Vocational 53rd bloodcamp</p>
                        <p class="text-xs uppercase flex items-center gap-2 sm:gap-1">
                            <svg class="w-4 h-4 inline-block text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"></path>
                            </svg>Colombo 10, Colombo</p>
                        <p class="text-xs uppercase flex items-center gap-3 sm:gap-2">
                            <svg class="w-3 h-3 inline-block text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"/>
                            </svg>24 Jan, 2023</p>
                    </div>
                </div>
                <button class="h-[114px] w-[114px] group hover:bg-gray-100 rounded-lg flex items-center justify-center button-dropdown" data-target="camp-panel-0">
                    <svg class="w-6 h-6 text-gray-400 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"></path>
                    </svg>
                </button> 
            </div>
            <div class="py-1 flex justify-center hidden divide-y" id="camp-panel-0">
                <div></div>
                <div class="w-full pt-4 divide-y">
                    <div>
                        <div class="flex items-center gap-3">
                            <div class="bg-gray-200 text-gray-500 font-bold text-xs rounded w-fit p-1 px-2">Time</div>
                            <pre> </pre>
                            <div class="camp-details-time text-gray-500 font-semibold text-sm">09.00-16.00</div>
                        </div>
                        <div class="flex items-center gap-3 mt-2">
                            <div class="bg-gray-200 text-gray-500 font-bold text-xs rounded w-fit p-1 px-2">Location</div>
                            <div class="camp-details-location text-gray-500 font-semibold text-sm underline">
                                <a href="https://maps.app.goo.gl/6yECdUueCKVe9KSz5"><u>Main ground, St Thomas College, Mount Lavinia</u>
                                <svg class="w-3 h-3 inline-block ml-1 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                                </svg></a>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 mt-2">
                            <div class="bg-gray-200 text-gray-500 font-bold text-xs rounded w-fit p-1 px-2">Organizer</div>
                            <div class="camp-details-organizer text-gray-500 font-semibold text-sm">
                                NAITA Rathmalana
                            </div>
                        </div>
                        <div class="flex items-center gap-3 mt-2">
                            <div class="bg-gray-200 text-gray-500 font-bold text-xs rounded w-fit p-1 px-2">With</div>
                            <pre> </pre>
                            <div class="camp-details-organizer text-gray-500 font-semibold text-sm">
                                Durdans Hospital, Colombo
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 mt-4 pb-2 flex items-center justify-end">
                        <p class="text-sm font-semibold text-gray-500 mr-1">100/1000</p>
                        <svg class="w-4 h-4 mr-5 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                        </svg>
                        <button onclick="joinCamp(this)" class="mr-3 px-3 py-1.5 text-white text-md shadow-lg bg-green-400 rounded-md w-fit" data-id="">Join Camp</button>
                    </div>
                </div>
            </div>
        </div> -->
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
    })
</script>