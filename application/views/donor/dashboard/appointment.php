<div class="p-3 pt-6 md:p-6 flex flex-col h-full relative justify-between ">
    <div class="absolute -top-10 left-1/2 -translate-x-1/2 max-w-xs">
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
    <div class="body-container <?= $appointmentscount > 0 ? '' : 'hidden' ?>">

        <a href="<?= base_url('donor/appointment/ongoing') ?>" class="cursor-pointer text-md font-semibold p-2 text-gray-500 mb-4 gap-1 flex items-center justify-center bg-gray-200 sm:bg-transparent max-w-xl hover:bg-gray-200 rounded">
            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 20">
                <path d="M18.012 13.453c-.219-1.173-2.163-1.416-2.6-3.76l-.041-.217c0 .006 0-.005-.007-.038v.021l-.017-.09-.005-.025v-.006l-.265-1.418a5.406 5.406 0 0 0-5.051-4.408.973.973 0 0 0 0-.108L9.6 1.082a1 1 0 0 0-1.967.367l.434 2.325a.863.863 0 0 0 .039.1A5.409 5.409 0 0 0 4.992 9.81l.266 1.418c0-.012 0 0 .007.037v-.007l.006.032.009.046v-.01l.007.038.04.215c.439 2.345-1.286 3.275-1.067 4.447.11.586.22 1.173.749 1.074l12.7-2.377c.523-.098.413-.684.303-1.27ZM1.917 9.191h-.074a1 1 0 0 1-.924-1.07 9.446 9.446 0 0 1 2.426-5.648 1 1 0 1 1 1.482 1.343 7.466 7.466 0 0 0-1.914 4.449 1 1 0 0 1-.996.926Zm5.339 8.545A3.438 3.438 0 0 0 10 19.1a3.478 3.478 0 0 0 3.334-2.5l-6.078 1.136Z"/>
            </svg>
            <p class="mb-1">ongoing appointments
                <?php if ($ongoingcount > 0) : ?>  
                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-200 rounded-full"><?= $ongoingcount ?></span>
                <?php endif; ?></p>
            <svg class="w-3 h-3 text-gray-500 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
            </svg>
        </a>
        <!-- filter by component -->
        <div class="flex mb-6 max-w-xl">
            <select class="bg-gray-50 rounded-l-lg border-gray-300 outline-none z-10" id="filter-selection" onchange="changeSelectionPlaceholder()">
                <option value="1">City</option>
                <option value="2">Zipcode</option>
                <option value="3">District</option>
                <option value="4">Province</option>
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
    </div>
    <div class="absolute <?= $appointmentscount == 0 ? '' : 'hidden' ?> w-full sm:w-fit px-3 sm:px-0 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 items-center text-center flex flex-col">
        <div class="text-lg font-semibold text-gray-500">It seems there's no appointment available as of now, come again later<br>Until then check the appointments YOU have !</div>
        <div class="relative">
            <img src="<?= base_url('assets/images/disheartwitheyes.svg') ?>" alt="" srcset="">
            <img src="<?= base_url('assets/images/disheartwitheyeshandonly.svg') ?>" class="absolute top-0 left-0 z-20" alt="" srcset="">
        </div>
        <a href="<?= base_url('donor/appointment/ongoing') ?>" class="transform -translate-y-6 w-64 shadow hover:shadow-md border border-gray-400 cursor-pointer text-md font-semibold p-2 text-gray-500 gap-1 flex items-center justify-center bg-gray-200 max-w-xl hover:bg-gray-200 rounded">
            <p class="mb-1">ongoing appointments</p>
            <svg class="w-4 h-4 text-gray-500 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path d="M5 9V4.13a2.96 2.96 0 0 0-1.293.749L.879 7.707A2.96 2.96 0 0 0 .13 9H5Zm11.066-9H9.829a2.98 2.98 0 0 0-2.122.879L7 1.584A.987.987 0 0 0 6.766 2h4.3A3.972 3.972 0 0 1 15 6v10h1.066A1.97 1.97 0 0 0 18 14V2a1.97 1.97 0 0 0-1.934-2Z"/>
                <path d="M11.066 4H7v5a2 2 0 0 1-2 2H0v7a1.969 1.969 0 0 0 1.933 2h9.133A1.97 1.97 0 0 0 13 18V6a1.97 1.97 0 0 0-1.934-2Z"/>
            </svg>
        </a>
    </div>

    <!-- reserve appointment component -->
    <div class="mt-3 sticky bottom-4 w-full h-auto flex items-center justify-center hidden" id="appointment-reserve">
        <div class="flex flex-wrap justify-around p-4 gap-4 sm:gap-20 h-full w-fit bg-green-400 rounded-xl drop-shadow-2xl p-4">
            <div class="flex flex-col gap-3 justify-around">
                <div class="inline-flex gap-3 items-center">
                    <svg class="shrink-0 w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                        <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                    </svg>
                    <p class="text-md text-gray-100 font-semibold location">Asiri Hospitals<br>Nawala, Colombo.</p>
                </div>
                <div class="inline-flex gap-3 items-center">
                    <svg class="shrink-0 w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                    </svg>
                    <p class="text-md text-gray-100 font-semibold time">10:00am-10:30am<br>12<sup>th</sup> Jan, 2023</p>
                </div>
                <div class="inline-flex gap-3 items-center message hidden">
                    <svg class="shrink-0 w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 18" fill="currentColor">
                        <path d="M18 4H16V9C16 10.0609 15.5786 11.0783 14.8284 11.8284C14.0783 12.5786 13.0609 13 12 13H9L6.846 14.615C7.17993 14.8628 7.58418 14.9977 8 15H11.667L15.4 17.8C15.5731 17.9298 15.7836 18 16 18C16.2652 18 16.5196 17.8946 16.7071 17.7071C16.8946 17.5196 17 17.2652 17 17V15H18C18.5304 15 19.0391 14.7893 19.4142 14.4142C19.7893 14.0391 20 13.5304 20 13V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4Z" fill="currentColor"></path>
                        <path d="M12 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V9C0 9.53043 0.210714 10.0391 0.585786 10.4142C0.960859 10.7893 1.46957 11 2 11H3V13C3 13.1857 3.05171 13.3678 3.14935 13.5257C3.24698 13.6837 3.38668 13.8114 3.55279 13.8944C3.71889 13.9775 3.90484 14.0126 4.08981 13.996C4.27477 13.9793 4.45143 13.9114 4.6 13.8L8.333 11H12C12.5304 11 13.0391 10.7893 13.4142 10.4142C13.7893 10.0391 14 9.53043 14 9V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0Z" fill="currentColor"></path>
                    </svg>
                    <p class="text-sm text-gray-800 font-mono font-semibold">arrive 5mins prior to the appointment time</p>
                </div>
        
            </div> 
            <div class="flex items-center w-full sm:w-fit">
                <button onclick="reserveAppointment(this)" class="px-3 py-1.5 text-md shadow-lg bg-white rounded-md w-full reserve-button" data-id="">reserve</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var obj = <?php echo $appointmentsJSON ?>;
        loadAppointments(obj);
    });

    function loadAppointments(obj){
        var count = 0;

        obj.forEach(h => {
            var name = h.name;
            var profile = h.profile;
            var c = h.city;
            var z = h.zipcode;
            var d = h.district;
            var p = h.province;

            var hospitalwrapper = $('<div class="p-1 pl-4 mb-3 rounded-xl border max-w-xl w- bg-gray-50 relative appointment"></div>');
            var dataspan = $(`<span class="hidden" data-name="${name}" data-location="${c}, ${d}" data-city="${c}" data-zipcode="${z}" data-district="${d}" data-province="${p}"></span>`);
            hospitalwrapper.append(dataspan);

            var hospitalheader = $(`<div class="flex items-center justify-between w-full">
                <div class="flex items-center gap-6">
                    <div class="hidden sm:flex w-16 h-16 border items-center rounded-full overflow-hidden">
                        <img src="http://localhost/bloodcare/uploads/hospital/profileimages/${profile}" class="object-cover object-center w-16">
                    </div>
                    <div class="flex flex-col text-left text-gray-500 font-semibold gap-3 sm:gap-2">
                        <p class="text-lg sm:text-lg leading-tight">${name}</p>
                        <p class="text-xs uppercase flex items-center gap-2 sm:gap-1">
                            <svg class="w-4 h-4 inline-block text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                            </svg>${c}, ${d}</p>
                    </div>
                </div>
                <button class="h-[114px] w-[114px] group hover:bg-gray-100 rounded-lg flex items-center justify-center button-dropdown" data-target="appointments-panel-${count}">
                    <svg class="w-6 h-6 text-gray-400 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                    </svg>
                </button>
            </div>`);
            hospitalwrapper.append(hospitalheader);

            var appointmentspanel = $(`<div class="p-3 pl-0 flex justify-center hidden" id="appointments-panel-${count}"></div>`);
            var calendarwrapper = $(`<div class="rounded-lg flex w-full flex-col justify-center items-center bg-white"></div>`);
            
            var calendarheader = $(`<div class="flex flex-grow py-2"></div>`).append(`<button disabled data-target="appointment-slot-${count}" class="appointmentspanel-buttonprev rounded-lg group text-gray-500 disabled:hover:bg-white hover:bg-gray-100 text-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <svg class="w-4 h-4 text-gray-800 group-disabled:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"></path>
                        </svg>
                    </button>`);
            var order = 0;
            h.dates.forEach(i => {
                calendarheader.append(`<span class="text-sm rounded-lg text-gray-900 font-semibold py-2.5 px-5 ${order == 0 ? '' : 'hidden'}" data-order="${order}">${i[0].date}</span>`);
                order++;
            });
            calendarheader.append(`<button ${order == 1 ? 'disabled' : ''} data-target="appointment-slot-${count}" class="appointmentspanel-buttonnext rounded-lg group disabled:hover:bg-white hover:bg-gray-100 text-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <svg class="w-4 h-4 text-gray-800 group-disabled:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                        </svg>
                    </button>`);
                    
            var calendarbody = $(`<div class="w-full" id="appointment-slot-${count}"></div>`);
            
            var order = 0;
            
            h.dates.forEach(i => {
                var dategrid = $(`<div class="w-full grid grid-cols-2 px-4 mb-4 sm:grid-cols-4 gap-1 ${order == 0 ? '' : 'hidden'}" data-order="${order}"></div>`);

                i.forEach(j => {
                    dategrid.append(`<div>
                            <input type="radio" id="ap${j.id}" class="hidden peer" name="appointment-selection" data-id="${j.id}" data-datetime="${j.datetime}" data-date="${j.date}" data-start="${j.start}" data-duration="${j.duration}" data-message="${j.message}">
                            <label for="ap${j.id}" class="hover:bg-gray-100 px-2 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center font-semibold text-sm text-gray-500 peer-checked:bg-blue-700 peer-checked:text-white">${j.start}</label>
                        </div>`);
                })

                calendarbody.append(dategrid);
                order++;
            });
            
            calendarwrapper.append(calendarheader);
            calendarwrapper.append(calendarbody);
            appointmentspanel.append(calendarwrapper);
            hospitalwrapper.append(appointmentspanel);

            $('.body-container').append(hospitalwrapper);

            count++;
        });

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
            const currentDate = $(as).children('div:not(.hidden)')[0];
            const currentOrder = $(currentDate).data('order');

            if(currentOrder <= 0)
                return;

            $(this).siblings('.appointmentspanel-buttonnext').removeAttr('disabled');
            const currentDateSpan = $(this).siblings('span')[currentOrder];
            $(currentDateSpan).addClass('hidden');
            $(currentDate).addClass('hidden');

            const prevtDate = $(as).children('div')[(currentOrder - 1)];
            const prevDateSpan = $(this).siblings('span')[(currentOrder - 1)];
            $(prevDateSpan).removeClass('hidden');
            $(prevtDate).removeClass('hidden');

            if(currentOrder - 1 == 0)
                $(this).attr('disabled', true);
        });

        $('.appointmentspanel-buttonnext').click(function(){
            const as = $('#' + $(this).data('target'))[0];
            const count = $(as).children('div').length;
            const currentDate = $(as).children('div:not(.hidden)')[0];
            const currentOrder = $(currentDate).data('order');

            if(count == currentOrder + 1)
                return;

            $(this).siblings('.appointmentspanel-buttonprev').removeAttr('disabled');
            const currentDateSpan = $(this).siblings('span')[currentOrder];
            $(currentDateSpan).addClass('hidden');
            $(currentDate).addClass('hidden');

            const nextDate = $(as).children('div')[currentOrder + 1];
            const nextDateSpan = $(this).siblings('span')[currentOrder + 1];
            $(nextDateSpan).removeClass('hidden');
            $(nextDate).removeClass('hidden');

            if(count == currentOrder + 1 + 1)
                $(this).attr('disabled', true);
        });
        
        $('input[type=radio][name=appointment-selection]').on('change', function(){
            const slots = $(this).parents('.appointment');
            const dataelem = $(slots).children('span.hidden');
            var timestr = $(this).data('start') + ' ' + $(this).data('duration');
            var date = $(this).data('date');
            
            loadReserveModal(($(dataelem).data('name') + '<br>' + $(dataelem).data('location')), (timestr + '<br>' + date), $(this).data('message'), $(this).data('id'));
        });
    }

    function changeSelectionPlaceholder(){
        const selection = $('#filter-selection').val();
        
        switch (selection) {
            case "1":
                $('#search-filter').attr('placeholder', '(Ex: seeduwa)');
                break;
            case "2":
                $('#search-filter').attr('placeholder', '(Ex: 0700)');
                break;
            case "3":
                $('#search-filter').attr('placeholder', '(Ex: rathnapura)');
                break;
            case "4":
                $('#search-filter').attr('placeholder', '(Ex: uva)');
                break;
        }
    }

    function filter(){
        destroyReserveModal();
        
        $('input[type=radio][name=appointment-selection]').prop('checked', false);

        const selection = $('#filter-selection').val();
        const search = $('#search-filter').val().toLowerCase().trim();

        switch (selection) {
            //city
            case "1":
                $('.body-container .appointment').toArray().forEach(e => {
                    const dataelem = $(e).children('span');
                    if($(dataelem).data('city').toLowerCase().includes(search))
                        $(e).removeClass('hidden');
                    else   
                        $(e).addClass('hidden');
                });
                break;

            case "2":
                $('.body-container .appointment').toArray().forEach(e => {
                    const dataelem = $(e).children('span');
                    if($(dataelem).data('zipcode') == search)
                        $(e).removeClass('hidden');
                    else   
                        $(e).addClass('hidden');
                });
                break;

            case "3":
                $('.body-container .appointment').toArray().forEach(e => {
                    const dataelem = $(e).children('span');
                    if($(dataelem).data('district').toLowerCase().includes(search))
                        $(e).removeClass('hidden');
                    else   
                        $(e).addClass('hidden');
                });
                break;

            case "4":
                $('.body-container .appointment').toArray().forEach(e => {
                    const dataelem = $(e).children('span');
                    if($(dataelem).data('province').toLowerCase().includes(search))
                        $(e).removeClass('hidden');
                    else   
                        $(e).addClass('hidden');
                });
                break;
        
            default:
                break;
        }
    }

    function loadReserveModal(location, time, message, id){
    
        $('#appointment-reserve').removeClass('hidden');
        $('#appointment-reserve p.location').html(location);
        $('#appointment-reserve p.time').html(time);

        if(message == null || message == "null" || message == undefined || message == "")
        {
            $('#appointment-reserve .message').addClass('hidden');
        }
        else{
            $('#appointment-reserve .message').removeClass('hidden');
            $('#appointment-reserve .message p').text(message);
        }

        $('#appointment-reserve .reserve-button').data('id', id);
    }

    function destroyReserveModal(){
        $('#appointment-reserve').addClass('hidden');
    }

    function reserveAppointment(button){
        var id = $(button).data('id');
        var max = <?= MAX_MAKEAPPOINTMENT ?>;
        var cur = <?= $ongoingcount ?>;

        if(cur >= max){
            $('.alert-error').fadeIn(200).delay(3000).fadeOut(200);
            $('#alert-top-error-text').text("max number of appointment reservations has reached !");
            return;
        }
        
        if(!(id == null || id == "null" || id == undefined || id == ""))
            window.location.href = '<?= base_url() ?>donor/appointment/reserveappointment?id=' + id;        
    }
</script>