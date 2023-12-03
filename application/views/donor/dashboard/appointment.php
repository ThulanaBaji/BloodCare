<div class="py-6 px-0 sm:px-6 flex flex-col h-full relative">
  <div class="p-1 pl-4 mb-3 rounded-xl border max-w-xl bg-gray-50 relative">
    <div class="flex items-center justify-between w-full">
        <div class="flex items-center gap-6">
            <div class="hidden sm:flex w-16 h-16 border items-center rounded-full overflow-hidden">
                <img src="http://localhost/bloodcare/uploads/hospital/profileimages/1701012794logo-small.jpg" class="object-cover object-center w-16">
            </div>
            <div class="flex flex-col text-left text-gray-500 font-semibold gap-3 sm:gap-2">
                <p class="text-lg sm:text-lg leading-tight">Durdans Hospitals long name</p>
                <p class="text-xs uppercase flex items-center gap-2 sm:gap-1">
                    <svg class="w-4 h-4 inline-block text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                        <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                    </svg> nugegoda, colombo</p>
            </div>
        </div>
        <button class="h-[114px] w-[114px] group hover:bg-gray-100 rounded-lg flex items-center justify-center button-dropdown" data-target="appointments-panel-1">
        <svg class="w-6 h-6 text-gray-400 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
        </svg>
        </button>
    </div>

    <div class="pt-3 pb-3 pr-3 flex justify-center hidden" id="appointments-panel-1">
        <div class="rounded-lg flex flex-grow flex-col justify-center items-center bg-white">
        <div class="flex justify-between flex-grow py-2">
            <button disabled data-target="appointment-slot-1" class="appointmentspanel-buttonprev rounded-lg group text-gray-500 disabled:hover:bg-white hover:bg-gray-100 text-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <svg class="w-4 h-4 text-gray-800 group-disabled:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"></path>
                </svg>
            </button>
            <span class="text-sm rounded-lg text-gray-900 font-semibold py-2.5 px-5" data-order="1">December 2023</span>
            <span class="text-sm rounded-lg text-gray-900 font-semibold py-2.5 px-5 hidden" data-order="2">January 2023</span>
            <span class="text-sm rounded-lg text-gray-900 font-semibold py-2.5 px-5 hidden" data-order="3">February 2023</span>
            <button data-target="appointment-slot-1" class="appointmentspanel-buttonnext rounded-lg group disabled:hover:bg-white hover:bg-gray-100 text-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <svg class="w-4 h-4 text-gray-800 group-disabled:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                </svg>
            </button>
        </div>
        <div class="w-full" id="appointment-slot-1">
            <div class="w-full grid grid-cols-2 px-4 mb-4 sm:grid-cols-4 gap-1" data-order="1">
                <div>
                    <input type="radio" id="1" class="hidden peer" name="appointment-selection">
                    <label for="1" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">08:00</span></label>
                </div>
            </div>
            <div class="w-full grid grid-cols-2 px-4 mb-4 sm:grid-cols-4 gap-1 hidden" data-order="2">
                <div>
                    <input type="radio" id="2" class="hidden peer" name="appointment-selection">
                    <label for="2" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">08:00</span></label>
                </div>
                <div>
                    <input type="radio" id="3" class="hidden peer" name="appointment-selection">
                    <label for="3" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">08:00</span></label>
                </div>
                <div>
                    <input type="radio" id="4" class="hidden peer" name="appointment-selection">
                    <label for="4" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">14:00</span></label>
                </div>
                <div>
                    <input type="radio" id="5" class="hidden peer" name="appointment-selection">
                    <label for="5" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">13:00</span></label>
                </div>
                <div>
                    <input type="radio" id="6" class="hidden peer" name="appointment-selection">
                    <label for="6" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">16:00</span></label>
                </div>
                <div>
                    <input type="radio" id="7" class="hidden peer" name="appointment-selection">
                    <label for="7" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">18:00</span></label>
                </div>
            </div>
            <div class="w-full grid grid-cols-2 px-4 mb-4 sm:grid-cols-4 gap-1 hidden" data-order="3">
                <div>
                    <input type="radio" id="8" class="hidden peer" name="appointment-selection">
                    <label for="8" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">14:00</span></label>
                </div>
                <div>
                    <input type="radio" id="9" class="hidden peer" name="appointment-selection">
                    <label for="9" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">13:00</span></label>
                </div>
                <div>
                    <input type="radio" id="10" class="hidden peer" name="appointment-selection">
                    <label for="10" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">16:00</span></label>
                </div>
                <div>
                    <input type="radio" id="11" class="hidden peer" name="appointment-selection">
                    <label for="11" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">18:00</span></label>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>

  <div class="p-1 pl-4 mb-3 rounded-xl border max-w-xl bg-gray-50 relative">
    <div class="flex items-center justify-between w-full">
        <div class="flex items-center gap-6">
            <div class="hidden sm:flex w-16 h-16 border items-center rounded-full overflow-hidden">
                <img src="http://localhost/bloodcare/uploads/hospital/profileimages/1701010031asiri.png" class="object-cover object-center w-16">
            </div>
            <div class="flex flex-col text-left text-gray-500 font-semibold gap-3 sm:gap-2">
                <p class="text-lg sm:text-lg leading-tight">Asiri Hospitals long name</p>
                <p class="text-xs uppercase flex items-center gap-2 sm:gap-1">
                    <svg class="w-4 h-4 inline-block text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                        <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                    </svg> nugegoda, colombo</p>
            </div>
        </div>
        <button class="h-[114px] w-[114px] group hover:bg-gray-100 rounded-lg flex items-center justify-center button-dropdown" data-target="appointments-panel-2">
        <svg class="w-6 h-6 text-gray-400 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
        </svg>
        </button>
    </div>

    <div class="pt-3 pb-3 pr-3 flex justify-center hidden" id="appointments-panel-2">
        <div class="rounded-lg flex flex-grow flex-col justify-center items-center bg-white">
        <div class="flex justify-between flex-grow py-2">
            <button disabled data-target="appointment-slot-2" class="appointmentspanel-buttonprev rounded-lg group text-gray-500 disabled:hover:bg-white hover:bg-gray-100 text-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <svg class="w-4 h-4 text-gray-800 group-disabled:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"></path>
                </svg>
            </button>
            <span class="text-sm rounded-lg text-gray-900 font-semibold py-2.5 px-5" data-order="1">March 2023</span>
            <span class="text-sm rounded-lg text-gray-900 font-semibold py-2.5 px-5 hidden" data-order="2">April 2023</span>
            <button data-target="appointment-slot-2" class="appointmentspanel-buttonnext rounded-lg group disabled:hover:bg-white hover:bg-gray-100 text-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <svg class="w-4 h-4 text-gray-800 group-disabled:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                </svg>
            </button>
        </div>
        <div class="w-full" id="appointment-slot-2">
            <div class="w-full grid grid-cols-2 px-4 mb-4 sm:grid-cols-4 gap-1" data-order="1">
                <div>
                    <input type="radio" id="21" class="hidden peer" name="appointment-selection">
                    <label for="21" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">08:00</span></label>
                </div>
                <div>
                    <input type="radio" id="22" class="hidden peer" name="appointment-selection">
                    <label for="22" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">12:00</span></label>
                </div>
                <div>
                    <input type="radio" id="23" class="hidden peer" name="appointment-selection">
                    <label for="23" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">14:00</span></label>
                </div>
            </div>
            <div class="w-full grid grid-cols-2 px-4 mb-4 sm:grid-cols-4 gap-1 hidden" data-order="2">
                <div>
                    <input type="radio" id="24" class="hidden peer" name="appointment-selection">
                    <label for="24" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">08:00</span></label>
                </div>
                <div>
                    <input type="radio" id="25" class="hidden peer" name="appointment-selection">
                    <label for="25" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">08:00</span></label>
                </div>
                <div>
                    <input type="radio" id="26" class="hidden peer" name="appointment-selection">
                    <label for="26" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">14:00</span></label>
                </div>
                <div>
                    <input type="radio" id="27" class="hidden peer" name="appointment-selection">
                    <label for="27" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">13:00</span></label>
                </div>
                <div>
                    <input type="radio" id="28" class="hidden peer" name="appointment-selection">
                    <label for="28" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">16:00</span></label>
                </div>
                <div>
                    <input type="radio" id="29" class="hidden peer" name="appointment-selection">
                    <label for="29" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-gray-100"><span class="">18:00</span></label>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div>

<script>

    function loadAppointments(obj){

    }

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

    $('.appointmentspanel-buttonprev').click(function(){
        const as = $('#' + $(this).data('target'))[0];
        const count = $(as).children().length;
        const currentDate = $(as).children(':not(.hidden)')[0];
        const currentOrder = $(currentDate).data('order');

        console.log(count);
        console.log(currentOrder);

        if(currentOrder <= 1)
            return;

        $(this).siblings('.appointmentspanel-buttonnext').removeAttr('disabled');
        const currentDateSpan = $(this).siblings('span')[currentOrder - 1];
        $(currentDateSpan).addClass('hidden');
        $(currentDate).addClass('hidden');

        const prevtDate = $(as).children()[currentOrder - 2];
        const prevDateSpan = $(this).siblings('span')[currentOrder - 2];
        $(prevDateSpan).removeClass('hidden');
        $(prevtDate).removeClass('hidden');

        if(currentOrder - 1 == 1)
            $(this).attr('disabled', true);
    });

    $('.appointmentspanel-buttonnext').click(function(){
        const as = $('#' + $(this).data('target'))[0];
        const count = $(as).children().length;
        const currentDate = $(as).children(':not(.hidden)')[0];
        const currentOrder = $(currentDate).data('order');

        console.log(count);
        console.log(currentOrder);

        if(count == currentOrder)
            return;

        $(this).siblings('.appointmentspanel-buttonprev').removeAttr('disabled');
        const currentDateSpan = $(this).siblings('span')[currentOrder - 1];
        $(currentDateSpan).addClass('hidden');
        $(currentDate).addClass('hidden');

        const nextDate = $(as).children()[currentOrder];
        const nextDateSpan = $(this).siblings('span')[currentOrder];
        $(nextDateSpan).removeClass('hidden');
        $(nextDate).removeClass('hidden');

        if(count == currentOrder + 1)
            $(this).attr('disabled', true);
    });
</script>