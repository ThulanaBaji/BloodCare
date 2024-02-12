<div class="sm:p-3 pt-6 md:p-6 flex flex-col h-full relative ">
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

    <div class="flex w-full max-w-sm sm:max-w-xl justify-between gap-1 mb-12">
        <div>
            <select name="" onchange="filterStatus(this)" id="select-sort" class="bg-gray-50 rounded-lg text-sm border-gray-300 outline-none z-10">
                <option value="all">all camps</option>
                <option value="vacant">ongoing</option>
                <option value="filled">filled</option>
                <option value="cancelled">cancelled</option>
                <option value="revoked">revoked</option>
            </select>
        </div>
        
        <div class="relative max-w-xs w-full">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
                </svg>
            </div>
            <input onkeyup="filter(this)" type="text" id="search-input" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for blood camp name">
        </div>

        
    </div>

    <?= loadCamps($camps) ?>
</div>


<div inline-datepicker datepicker-buttons id="search-date" data-date="" class="fixed top-10 right-10 hidden xl:block"></div>


<div class="fixed top-0 left-0 h-screen w-full bg-black/10 z-40 hidden" id="modal-shadow" onclick="hideModal()" data-target=""></div>
<!-- cancel camp Modal -->
<div id="revokeModal" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-9000" id="cancel-campname">
                    Revoke camp
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="revokeModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('admin/campschedule/revoke') ?>" method="post">
                
                <input type="hidden" name="id" id="revoke-campid">
                <div class="relative flex sm:col-span-2 gap-3  rounded">
                    <div class="flex w-11 h-11 sm:w-14 sm:h-14 border items-center justify-center rounded-full overflow-hidden">
                        <img src="" alt="" id="revoke-profile">
                    </div>

                    <div class="flex flex-col gap-2">
                        <p class="text-sm px-2 font-semibold text-gray-600 " id="revoke-name"></p>
                        <p class="w-fit text-xs px-2 font-semibold text-gray-500">by <span id="revoke-hospitalname"></span></p>       
                    </div>
                </div>

                <label class="block mt-4 mb-2 text-sm font-medium text-gray-900 ">Message</label>
                <input type="text" name="message" id="revoke-message" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="reason for revoking" required>
                    
                <div class="h-4"></div>
                <button type="submit" class="cursor-pointer text-md  font-semibold px-2 mt-3 hover:shadow-lg text-gray-700 py-2 gap-1 flex items-center justify-center bg-rose-200 max-w-xl rounded">
                    <svg class="w-4 h-4 text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <p class="mb-1 ml-1">revoke</p>
                </button>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url().'assets/js/datepicker.js';?>"></script>

<script>

    $(document).ready(function(){
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

        $($('#search-date')[0]).on('changeDate', (e) => {
            var d = $('#search-date')[0].datepicker.getDate().getTime();
            $('.camp').each(function(){
                if($(this).data('date') == (d)) $(this).removeClass('hidden');
                else $(this).addClass('hidden');
            })
        });

        $('button.clear-btn').on('click', function(e) {
            $('.camp').each(function(){$(this).removeClass('hidden');});
        });
        
        $('#search-date div.datepicker div.datepicker-picker.shadow-lg').removeClass('shadow');
        $('#search-date div.datepicker').addClass('rounded-lg');
        $('#search-date div.datepicker div.datepicker-picker.shadow-lg').removeClass('shadow-lg');
        $('button.prev-btn').addClass('relative');
        $('button.next-btn').addClass('relative');

        const dates = [<?php foreach ($camps as $camp) echo strtotime('midnight', substr($camp['start_datetime'],0 ,-3)).'000, ';?>];
        dates.forEach(d => {
            $("#search-date > div > div > div.datepicker-main.p-1 > div > div > div.datepicker-grid.w-64.grid.grid-cols-7 > span[data-date='"+ d +"']").addClass('bg-rose-300');
            
            lastday = $("#search-date > div > div > div.datepicker-main.p-1 > div > div > div.datepicker-grid.w-64.grid.grid-cols-7 > span:last-child")[0].dataset['date'];
            firstday = $("#search-date > div > div > div.datepicker-main.p-1 > div > div > div.datepicker-grid.w-64.grid.grid-cols-7 > span:first-child")[0].dataset['date'];

            if(d < firstday)
                $('button.prev-btn').append($('<div class="active-circle absolute top-2 left-3 rounded-full w-2 h-2 bg-pink-300"></div>'));
            if(d > lastday)
                $('button.next-btn').append($('<div class="active-circle absolute top-2 left-3 rounded-full w-2 h-2 bg-pink-300"></div>'));
             
        });
        
        $('button.prev-btn').on('click', function(e) {
            $('button.next-btn').children('div.active-circle').remove();
            $('button.prev-btn').children('div.active-circle').remove();
            
            lastday = $("#search-date > div > div > div.datepicker-main.p-1 > div > div > div.datepicker-grid.w-64.grid.grid-cols-7 > span:last-child")[0].dataset['date'];
            firstday = $("#search-date > div > div > div.datepicker-main.p-1 > div > div > div.datepicker-grid.w-64.grid.grid-cols-7 > span:first-child")[0].dataset['date'];

            dates.forEach(d => {
                $("#search-date > div > div > div.datepicker-main.p-1 > div > div > div.datepicker-grid.w-64.grid.grid-cols-7 > span[data-date='"+ d +"']").addClass('bg-rose-300');
 
                if(d < firstday)
                {
                    $('button.prev-btn').children('div.active-circle').remove();
                    $('button.prev-btn').append($('<div class="active-circle absolute top-2 left-3 rounded-full w-2 h-2 bg-pink-300"></div>'));
                }
                if(d > lastday)
                {
                    $('button.next-btn').children('div.active-circle').remove();
                    $('button.next-btn').append($('<div class="active-circle absolute top-2 left-3 rounded-full w-2 h-2 bg-pink-300"></div>'));
                }
            });
        });

        $('button.next-btn').on('click', function(e) {
            $('button.next-btn').children('div.active-circle').remove();
            $('button.prev-btn').children('div.active-circle').remove();

            lastday = $("#search-date > div > div > div.datepicker-main.p-1 > div > div > div.datepicker-grid.w-64.grid.grid-cols-7 > span:last-child")[0].dataset['date'];
            firstday = $("#search-date > div > div > div.datepicker-main.p-1 > div > div > div.datepicker-grid.w-64.grid.grid-cols-7 > span:first-child")[0].dataset['date'];

            dates.forEach(d => {
                $("#search-date > div > div > div.datepicker-main.p-1 > div > div > div.datepicker-grid.w-64.grid.grid-cols-7 > span[data-date='"+ d +"']").addClass('bg-rose-300');
            
                if(d < firstday)
                { 
                    $('button.prev-btn').children('div.active-circle').remove();
                    $('button.prev-btn').append($('<div class="active-circle absolute top-2 left-3 rounded-full w-2 h-2 bg-pink-300"></div>'));
                }
                if(d > lastday)
                {
                    $('button.next-btn').children('div.active-circle').remove();
                    $('button.next-btn').append($('<div class="active-circle absolute top-2 left-3 rounded-full w-2 h-2 bg-pink-300"></div>'));
                }
            });
        });

        
        console.log($('#search-date')[0].datepicker);

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
        
        $('#revokeModal').on('click', function(e) {
            if (e.target !== this && e.target.id !== 'modalbg')
                return;
            
            hideModal();
        });

        $('button.button.today-btn').on('click', function(e) {
            $('#search-date')[0].datepicker.setDate('today');
        });
    })
    
    function showModal(e){

        var modal = $(e).data('modal');

        if(modal == 'revokeModal'){
            $('#revoke-campid').val($(e).data('id'));
            $('#revoke-name').text($(e).data('name'));
            $('#revoke-hospitalname').text($(e).data('hname'));
            $('#revoke-profile').attr('src', $(e).data('profile'));
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

    function filter(e){
        var search = $(e).val().toLowerCase();

        $('.camp').toArray().forEach(camp => {
            var name = $($(camp).children('span')).data('name').toLowerCase();
            if(name.includes(search)){
                $(camp).removeClass('hidden');
            }else{
                $(camp).addClass('hidden');
            }

        });
    }

    function filterStatus(e){
        var search = $(e).val();
        $('#search-input').val('');

        $('.camp').toArray().forEach(camp => {
            if(search == 'all') $(camp).removeClass('hidden');
            else{
                var status = $(camp).data('status').toLowerCase();
                if(status == search){
                    $(camp).removeClass('hidden');
                }else{
                    $(camp).addClass('hidden');
                }
            }
        });
    }
</script>