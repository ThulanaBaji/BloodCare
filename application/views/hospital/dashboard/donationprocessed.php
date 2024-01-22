<div class="h-full w-full sm:pt-6 grid grid-rows-[auto_1fr] ">
    <div class="w-full flex justify-center items-center pb-8">
        <div class="w-fit flex">
            <a href="<?= base_url('hospital/donation') ?>" class="w-24 sm:w-28 p-2 text-xs sm:text-sm font-semibold text-gray-600 bg-gradient-to-tr hover:from-gray-300 hover:to-blue-200 border-gray-300 border rounded-l flex justify-center">Today</a>
            <a href="<?= base_url('hospital/donation/processing') ?>" class="w-24 sm:w-28 p-2 text-xs sm:text-sm font-semibold text-gray-600 bg-gradient-to-tr hover:from-gray-300 hover:to-amber-200 border-gray-300 border border-x-0 flex justify-center">Processing</a>
            <a href="<?= base_url('hospital/donation/processed') ?>" class="w-24 sm:w-28 p-2 text-xs sm:text-sm font-semibold text-gray-600 bg-gradient-to-tr from-green-200 to-green-200 hover:bg-gray-300 border-gray-300 border rounded-r flex justify-center">Processed</a>
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
            <div class="donation w-full my-3 rounded-lg border max-w-xl relative flex flex-col pb-5 sm:pb-0 sm:flex-row items-center gap-5 bg-gray-50">
                <div class="donation-status absolute top-0 right-0 p-3 pt-3 sm:p-3">
                <div class="flex gap-1 items-center bg-green-200 p-1 rounded">
                    <svg class="w-3 h-3 text-gray-600 hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97"></path>
                    </svg>
                    <svg class="w-3 h-3 text-gray-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z"></path>
                    </svg>
                    <p class="text-sm text-gray-600 font-semibold">processed</p>
                </div>
            </div>

            <div class="donation-blood bg-red-950 rounded-t-lg sm:rounded-l-lg sm:rounded-r-none shadow-lg p-3 w-full sm:w-32 h-32 flex flex-col justify-center items-center relative">
                <svg viewBox="0 0 48 48" class="w-12 h-12" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M26 17C26 16.4477 26.4477 16 27 16H29V14C29 13.4477 29.4477 13 30 13C30.5523 13 31 13.4477 31 14V16H33C33.5523 16 34 16.4477 34 17C34 17.5523 33.5523 18 33 18H31V20C31 20.5523 30.5523 21 30 21C29.4477 21 29 20.5523 29 20V18H27C26.4477 18 26 17.5523 26 17Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M14 15C14 12.2386 16.2386 10 19 10C21.7614 10 24 12.2386 24 15V19C24 21.7614 21.7614 24 19 24C16.2386 24 14 21.7614 14 19V15ZM22 15V19C22 20.6569 20.6569 22 19 22C17.3431 22 16 20.6569 16 19V15C16 13.3431 17.3431 12 19 12C20.6569 12 22 13.3431 22 15Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M23 40H18V38H14C11.7909 38 10 36.2092 10 34V10.1143C10 7.90519 11.7909 6.11433 14 6.11433H20L21.132 4.94997C22.7027 3.33439 25.2973 3.33439 26.868 4.94997L28 6.11433H34C36.2091 6.11433 38 7.90519 38 10.1143V34.0001C38 36.2092 36.2091 38 34 38H30V40H25V44H23V40ZM28 8.11433C27.4598 8.11433 26.9426 7.89581 26.566 7.50849L25.434 6.34413C24.6486 5.53633 23.3514 5.53633 22.566 6.34412L21.434 7.50849C21.0574 7.89581 20.5402 8.11433 20 8.11433H14C12.8954 8.11433 12 9.00976 12 10.1143V28.9709C13.3017 28.9498 14.5325 28.9875 15.7005 29.0306C15.8789 29.0371 16.0556 29.0438 16.2306 29.0505C17.514 29.0991 18.711 29.1444 19.8818 29.1195C22.5089 29.0636 24.924 28.6537 27.4918 27.1387C30.6105 25.2987 33.2501 25.8513 35.0748 26.9132C35.4135 27.1103 35.7222 27.3234 36 27.5388V10.1143C36 9.00976 35.1046 8.11433 34 8.11433H28Z" fill="#FFF"></path> </g></svg>
                <div class="text-gray-600 pt-2">
                    <p class="blood-volume text-white text-sm font-semibold">500 ml</p>
                </div>
            </div>

            <div class="donation-details flex flex-col items-start">
                <p class="donation-ref text-sm font-semibold text-gray-600">N4568F09</p>
                <p class="donation-ref text-sm text-gray-600 mt-2.5">processed on : 24 Jan, 2024</p>
                <p class="donation-ref text-sm text-gray-600 mb-2.5">collected on   : 19 Jan, 2024</p>
                <p class="donation-ref text-xs font-semibold text-gray-500 bg-gray-200 rounded p-1">Through appointment</p>
            </div>
            </div>

            <div class="donation w-full my-3 rounded-lg border max-w-xl relative flex flex-col pb-5 sm:pb-0 sm:flex-row items-center gap-5 bg-gray-50">
                <div class="donation-status absolute top-0 right-0 p-3 pt-3 sm:p-3">
                    <div class="flex gap-1 items-center bg-green-200 p-1 rounded">
                        <svg class="w-3 h-3 text-gray-600 hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97"></path>
                        </svg>
                        <svg class="w-3 h-3 text-gray-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z"></path>
                        </svg>
                        <p class="text-sm text-gray-600 font-semibold">processed</p>
                    </div>
                </div>

                <div class="donation-blood bg-red-950 rounded-t-lg h-32 sm:h-40  sm:rounded-l-lg sm:rounded-r-none shadow-lg p-3 w-full sm:w-32 h-32 flex flex-col justify-center items-center relative">
                    <svg viewBox="0 0 48 48" class="w-12 h-12" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M26 17C26 16.4477 26.4477 16 27 16H29V14C29 13.4477 29.4477 13 30 13C30.5523 13 31 13.4477 31 14V16H33C33.5523 16 34 16.4477 34 17C34 17.5523 33.5523 18 33 18H31V20C31 20.5523 30.5523 21 30 21C29.4477 21 29 20.5523 29 20V18H27C26.4477 18 26 17.5523 26 17Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M14 15C14 12.2386 16.2386 10 19 10C21.7614 10 24 12.2386 24 15V19C24 21.7614 21.7614 24 19 24C16.2386 24 14 21.7614 14 19V15ZM22 15V19C22 20.6569 20.6569 22 19 22C17.3431 22 16 20.6569 16 19V15C16 13.3431 17.3431 12 19 12C20.6569 12 22 13.3431 22 15Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M23 40H18V38H14C11.7909 38 10 36.2092 10 34V10.1143C10 7.90519 11.7909 6.11433 14 6.11433H20L21.132 4.94997C22.7027 3.33439 25.2973 3.33439 26.868 4.94997L28 6.11433H34C36.2091 6.11433 38 7.90519 38 10.1143V34.0001C38 36.2092 36.2091 38 34 38H30V40H25V44H23V40ZM28 8.11433C27.4598 8.11433 26.9426 7.89581 26.566 7.50849L25.434 6.34413C24.6486 5.53633 23.3514 5.53633 22.566 6.34412L21.434 7.50849C21.0574 7.89581 20.5402 8.11433 20 8.11433H14C12.8954 8.11433 12 9.00976 12 10.1143V28.9709C13.3017 28.9498 14.5325 28.9875 15.7005 29.0306C15.8789 29.0371 16.0556 29.0438 16.2306 29.0505C17.514 29.0991 18.711 29.1444 19.8818 29.1195C22.5089 29.0636 24.924 28.6537 27.4918 27.1387C30.6105 25.2987 33.2501 25.8513 35.0748 26.9132C35.4135 27.1103 35.7222 27.3234 36 27.5388V10.1143C36 9.00976 35.1046 8.11433 34 8.11433H28Z" fill="#FFF"></path> </g></svg>
                    <div class="text-gray-600 pt-2">
                        <p class="blood-volume text-white text-sm font-semibold">500 ml</p>
                    </div>
                </div>

                <div class="donation-details flex flex-col items-start">
                    <p class="donation-ref text-sm font-semibold text-gray-600">N4568F09</p>
                    <p class="donation-ref text-sm text-gray-600 mt-2.5">processed on : 24 Jan, 2024</p>
                    <p class="donation-ref text-sm text-gray-600 mb-2.5">collected on   : 19 Jan, 2024</p>
                    <p class="donation-ref text-xs font-semibold text-gray-500 bg-gray-200 rounded p-1">Through appointment</p>
                    <div class="mt-3 flex items-center max-w-sm text-xs font-semibold p-2  border-red-500 text-red-500 rounded bg-red-100">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
                        </svg>
                        <p>your blood is pig blood
                        </p>
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