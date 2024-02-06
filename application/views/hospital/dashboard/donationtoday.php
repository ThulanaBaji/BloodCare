<div class="h-full w-full sm:pt-6 grid grid-rows-[auto_1fr] ">
    <div class="w-full flex justify-center items-center pb-8">
        <div class="w-fit flex">
            <a href="<?= base_url('hospital/donation') ?>" class="w-24 sm:w-28 p-2 text-xs sm:text-sm font-semibold text-gray-600 bg-gradient-to-tr from-blue-200 to-blue-200 border-gray-300 border rounded-l flex justify-center">Today</a>
            <a href="<?= base_url('hospital/donation/processing') ?>" class="w-24 sm:w-28 p-2 text-xs sm:text-sm font-semibold text-gray-600 bg-gradient-to-tr hover:from-gray-300 hover:to-amber-200 border-gray-300 border border-x-0 flex justify-center">Processing</a>
            <a href="<?= base_url('hospital/donation/processed') ?>" class="w-24 sm:w-28 p-2 text-xs sm:text-sm font-semibold text-gray-600 bg-gradient-to-tr hover:from-gray-300 hover:to-green-200 hover:bg-gray-300 border-gray-300 border rounded-r flex justify-center">Processed</a>
        </div>
    </div>

    <div class="w-full sm:flex sm:gap-6 h-full items-center justify-center">
        
        <?= loadtodaycampcard($todaycamps) ?>

        <div class="block p-6 bg-white border max-w-sm w-full border-gray-200 mb-4 sm:mb-0 rounded-lg shadow">
            <div class="info flex gap-2 items-center mb-6">
                <p class="text-3xl text-gray-600 font-bold">8</p>
                <svg class="w-4 h-4 self-baseline fill-gray-500" viewBox="0 0 18 20">
                    <path d="M5 9V4.13a2.96 2.96 0 0 0-1.293.749L.879 7.707A2.96 2.96 0 0 0 .13 9H5Zm11.066-9H9.829a2.98 2.98 0 0 0-2.122.879L7 1.584A.987.987 0 0 0 6.766 2h4.3A3.972 3.972 0 0 1 15 6v10h1.066A1.97 1.97 0 0 0 18 14V2a1.97 1.97 0 0 0-1.934-2Z"/>
                    <path d="M11.066 4H7v5a2 2 0 0 1-2 2H0v7a1.969 1.969 0 0 0 1.933 2h9.133A1.97 1.97 0 0 0 13 18V6a1.97 1.97 0 0 0-1.934-2Z"/>
                </svg>
            </div>

            <div class="divide-y w-full max-h-32 overflow-y-auto">
                <div class="camp flex justify-between items-center max-w-xs w-full py-2">
                    <div class="flex items-center gap-2"><div class="flex w-8 h-8 border items-center justify-center rounded-full overflow-hidden">
                        <img src="http://localhost/bloodcare/uploads/donor/profileimages/1704377577952.jpg" alt="">
                    </div>
                    <p class="text-sm font-semibold text-gray-600">Smile Coop</p></div>
                    <div class="self-end text-md text-gray-800 font-semibold rounded p-2 flex ">15:30
                        
                    </div>
                </div>
                <div class="camp flex justify-between items-center max-w-xs w-full py-2">
                    <div class="flex items-center gap-2"><div class="flex w-8 h-8 border items-center justify-center rounded-full overflow-hidden">
                        <img src="http://localhost/bloodcare/uploads/donor/profileimages/1704377577952.jpg" alt="">
                    </div>
                    <p class="text-sm font-semibold text-gray-600">Smile Coop</p></div>
                    <div class="self-end text-md text-gray-800 font-semibold rounded p-2 flex ">15:30
                        
                    </div>
                </div>
                <div class="camp flex justify-between items-center max-w-xs w-full py-2 hidden extra-donor">
                    <div class="flex items-center gap-2"><div class="flex w-8 h-8 border items-center justify-center rounded-full overflow-hidden">
                        <img src="http://localhost/bloodcare/uploads/donor/profileimages/1704377577952.jpg" alt="">
                    </div>
                    <p class="text-sm font-semibold text-gray-600">Smile Coop</p></div>
                    <div class="self-end text-md text-gray-800 font-semibold rounded p-2 flex ">15:30
                        
                    </div>
                </div>
                <div class="camp flex justify-between items-center max-w-xs w-full py-2 hidden extra-donor">
                    <div class="flex items-center gap-2"><div class="flex w-8 h-8 border items-center justify-center rounded-full overflow-hidden">
                        <img src="http://localhost/bloodcare/uploads/donor/profileimages/1701351413aiony-haust-3TLl_97HNJo-unsplash.jpg" alt="">
                    </div>
                    <p class="text-sm font-semibold text-gray-600">Joe Brown</p></div>
                    <div class="self-end text-md text-gray-800 font-semibold rounded p-2 flex ">16:00
                        
                    </div>
                </div>
                
            </div>
            <button onclick="showAllAppointments(this)" type="button" class="block bg-transparent hover:underline text-blue-500 text-xs">more appointments</button>

            <a href="<?= base_url('hospital/donation/todayappointments') ?>" class="inline-flex items-center px-3 py-2 mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                View appointments
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
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