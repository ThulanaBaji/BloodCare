<div class="h-full w-full sm:pt-6 sm:pl-6">

    

<nav class="flex mb-11 mt-3" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
    <li class="inline-flex items-center">
      <a href="./" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.484 6.166 13 4h6m0 0-3-3m3 3-3 3M1 14h5l1.577-2.253M1 4h5l7 10h6m0 0-3 3m3-3-3-3"></path>
        </svg>
        Donation
      </a>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <a href="./" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Today</a>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Camps</span>
      </div>
    </li>
  </ol>
</nav>


    <div class="w-full">


        <div class="p-1 sm:pl-4 rounded-xl mb-3 border  max-w-xl bg-gray-50 relative camp">
            <span class="hidden dataset" data-profile="default.svg" data-name="Vivekananda blood camp" data-organizer="Vivekananda college of Engineering" data-address="Sri Rama hall, Vivekananda College, Nahru Nagar, Puttur." data-city="Nahru Nagar" data-district="Puttur" data-pin="https://maps.app.goo.gl/XdJKfBJg5Dp9A6JS9" data-datetime="1728100200000" data-duration="30600000" data-maxseats="1000"></span>

        <div class="flex items-center justify-between w-full">
            <div class="flex items-center gap-6">
                <div class="hidden sm:flex w-16 h-16 border items-center justify-center rounded-full overflow-hidden">
                    <img src="http://localhost/bloodcare/uploads/camp/profileimages/1704351491Blood-Donation-Camp.jpg" alt="">
                </div>
                <div class="flex flex-col text-left text-gray-500 font-semibold gap-3 sm:gap-2">
                    <p class="text-lg sm:text-lg leading-tight">Vivekananda blood camp</p>
                    <p class="text-xs uppercase flex items-center gap-2 sm:gap-1">
                        <svg class="w-4 h-4 inline-block text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                            <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"></path>
                        </svg>Nahru Nagar, Puttur</p>
                </div>
            </div>
            <button class="h-[114px] w-[114px] group hover:bg-gray-100 rounded-lg flex items-center justify-center button-dropdown" data-target="camp-panel-1">
                <svg class="w-6 h-6 text-gray-400 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"></path>
                </svg>
            </button> 
        </div>
        <div class="pb-1 sm:pb-3 sm:py-1 flex justify-center hidden" id="camp-panel-1">
            <div class="w-full pt-1 sm:pr-3">
                <div class="w-full flex flex-col items-center bg-gray-100 p-3 rounded-lg">
                    <div class="max-w-xl relative w-full mb-6">
                        <input type="search" id="search-filter" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border
                            border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="(Ex: Joe Brown)" required="">
                        <button onclick="filter()" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="donor-list divide-y w-full flex flex-col items-center">
                        <div class="donor flex gap-2 items-center justify-between max-w-xs w-full py-2">
                            <div class="flex items-center gap-2"><div class="flex w-8 h-8 border items-center justify-center rounded-full overflow-hidden">
                                <img src="http://localhost/bloodcare/uploads/donor/profileimages/1704377577952.jpg" alt="">
                            </div>
                            <p class="text-sm font-semibold text-gray-600">Cecilia Coller</p></div>
                            <button class="self-end bg-red-950 text-sm text-gray-600 font-semibold rounded p-1.5">
                                <svg viewBox="0 0 15 15" class="w-5 h-5" version="1.1" id="blood-bank" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11.2,7.1L11.2,7.1L7.5,2L3.8,7.1h0C3.3,7.8,3,8.7,3,9.6C3,12,5,14,7.5,14c0,0,0,0,0,0C10,14,12,12,12,9.6c0,0,0,0,0,0
        C12,8.7,11.7,7.8,11.2,7.1z M10,10H8v2H7v-2H5V9h2V7h1v2h2V10z"></path> </g></svg>
                            </button>
                        </div>
                        <div class="donor flex gap-2 items-center justify-between max-w-xs w-full py-2">
                            <div class="flex items-center gap-2"><div class="flex w-8 h-8 border items-center justify-center rounded-full overflow-hidden">
                                <img src="http://localhost/bloodcare/uploads/donor/profileimages/1701351413aiony-haust-3TLl_97HNJo-unsplash.jpg" alt="">
                            </div>
                            <p class="text-sm font-semibold text-gray-600">Rogue Vinson</p></div>
                            <button class="self-end bg-red-950 text-sm text-gray-600 font-semibold rounded p-1.5">
                                <svg viewBox="0 0 15 15" class="w-5 h-5" version="1.1" id="blood-bank" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11.2,7.1L11.2,7.1L7.5,2L3.8,7.1h0C3.3,7.8,3,8.7,3,9.6C3,12,5,14,7.5,14c0,0,0,0,0,0C10,14,12,12,12,9.6c0,0,0,0,0,0
        C12,8.7,11.7,7.8,11.2,7.1z M10,10H8v2H7v-2H5V9h2V7h1v2h2V10z"></path> </g></svg>
                            </button>
                        </div>
                        <div class="donor flex gap-2 items-center justify-between max-w-xs w-full py-2">
                            <div class="flex items-center gap-2"><div class="flex w-8 h-8 border items-center justify-center rounded-full overflow-hidden">
                                <img src="http://localhost/bloodcare/uploads/donor/profileimages/1701351240toa-heftiba-O3ymvT7Wf9U-unsplash.jpg" alt="">
                            </div>
                            <p class="text-sm font-semibold text-gray-600">Diane Devreese</p></div>
                            <button class="self-end bg-red-950 text-sm text-gray-600 font-semibold rounded p-1.5">
                                <svg viewBox="0 0 15 15" class="w-5 h-5" version="1.1" id="blood-bank" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11.2,7.1L11.2,7.1L7.5,2L3.8,7.1h0C3.3,7.8,3,8.7,3,9.6C3,12,5,14,7.5,14c0,0,0,0,0,0C10,14,12,12,12,9.6c0,0,0,0,0,0
        C12,8.7,11.7,7.8,11.2,7.1z M10,10H8v2H7v-2H5V9h2V7h1v2h2V10z"></path> </g></svg>
                            </button>
                        </div>
                        <div class="donor flex gap-2 items-center justify-between max-w-xs w-full py-2">
                            <div class="flex items-center gap-2"><div class="flex w-8 h-8 border items-center justify-center rounded-full overflow-hidden">
                                <img src="http://localhost/bloodcare/uploads/donor/profileimages/1701351157gift-habeshaw-ImFZSnfobKk-unsplash.jpg" alt="">
                            </div>
                            <p class="text-sm font-semibold text-gray-600">Roslyn Chavous</p></div>
                            <button class="self-end bg-red-950 text-sm text-gray-600 font-semibold rounded p-1.5">
                                <svg viewBox="0 0 15 15" class="w-5 h-5" version="1.1" id="blood-bank" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11.2,7.1L11.2,7.1L7.5,2L3.8,7.1h0C3.3,7.8,3,8.7,3,9.6C3,12,5,14,7.5,14c0,0,0,0,0,0C10,14,12,12,12,9.6c0,0,0,0,0,0
        C12,8.7,11.7,7.8,11.2,7.1z M10,10H8v2H7v-2H5V9h2V7h1v2h2V10z"></path> </g></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
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
    });
</script>