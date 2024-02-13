<div class="sm:p-3 pt-6 md:p-6 flex flex-col h-full relative ">
    <div class="absolute z-10 top-10 left-1/2 -translate-x-1/2 max-w-xs">
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

    <div class="flex w-full max-w-sm sm:max-w-3xl justify-between gap-1">
        <div>
            <select name="" onchange="filterStatus(this)" id="select-sort" class="bg-gray-50 rounded-lg text-sm border-gray-300 outline-none z-10">
                <option value="all">all requests</option>
                <option value="pending">pending</option>
                <option value="accepted">accepted</option>
                <option value="rejected">rejected</option>
            </select>
        </div>
        
        <div class="relative max-w-xs w-full">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input onkeyup="filter(this)" type="text" id="search-input" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for reference or hospital name">
        </div>

        
    </div>

    
<div inline-datepicker datepicker-buttons id="search-date" data-date="" class="fixed top-10 right-10 hidden xl:block"></div>

</div>

<script src="<?php echo base_url().'assets/js/datepicker.js';?>"></script>

<script>
    $(document).ready(function() {
        $($('#search-date')[0]).on('changeDate', (e) => {
            var d = $('#search-date')[0].datepicker.getDate().getTime();
            $('.camp').each(function(){
                if($(this).data('date') == (d)) $(this).removeClass('hidden');
                else $(this).addClass('hidden');
            })
        });

        $('button.clear-btn').on('click', function(e) {
            $('.request').each(function(){$(this).removeClass('hidden');});
        });
        
        $('#search-date div.datepicker div.datepicker-picker.shadow-lg').removeClass('shadow');
        $('#search-date div.datepicker').addClass('rounded-lg');
        $('#search-date div.datepicker div.datepicker-picker.shadow-lg').removeClass('shadow-lg');
        $('button.prev-btn').addClass('relative');
        $('button.next-btn').addClass('relative');

        const dates = [<?php if(isset($camps)) foreach ($camps as $camp) echo strtotime('midnight', substr($camp['start_datetime'],0 ,-3)).'000, ';?>];
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

        $('#rejectRequest').on('click', function(e) {
            if (e.target !== this && e.target.id !== 'modalbg')
                return;
            
            hideModal();
        });

        $('button.button.today-btn').on('click', function(e) {
            $('#search-date')[0].datepicker.setDate('today');
        });

        $('.column-chart').each(function(){
            var jsonstr = $(this).data('json').replaceAll('~', '"');
            jsonstr.replaceAll('~', '"',);
            
            let data = [];
            var json = JSON.parse(jsonstr);

            var bloodshtml = {
                "op": 'O+',
                "ap": 'A+',
                "abp": 'AB+',
                "bp": 'B+',
                "on": 'O-',
                "an": 'A-',
                "abn": 'AB-',
                "bn": 'B-'
            };

            for(const key in json){
                var xypair = {};
                xypair['x'] = bloodshtml[key];
                xypair['y'] = json[key];

                data.push(xypair);
            }

            console.log(data);
            loadChart(counter, data);
            counter++;
        })
    })

    function filter(e){
        var search = $(e).val().toLowerCase();

        $('.request-list').children().toArray().forEach(req => {
            var name = $(req).data('hname').toLowerCase();
            var mem = $(req).data('reference').toLowerCase();
            if(req.includes(search) || mem.includes(search)){
                $(hospital).removeClass('hidden');
            }else{
                $(hospital).addClass('hidden');
            }

        });
    }

    function filterStatus(e){
        var search = $(e).val();
        $('#search-input').val('');

        console.log(search);

        $('.request-list').children().toArray().forEach(req => {
            if(search == 'all') $(req).removeClass('hidden');
            else{
                var status = $(req).data('status').toLowerCase();
                if(status == search){
                    $(req).removeClass('hidden');
                }else{
                    $(req).addClass('hidden');
                }
            }
        });
    }

    function showModal(modal){

        $('#refinput').val($('#refnum').text());

        $('#' + modal).removeClass('hidden');
        $('#modal-shadow').removeClass('hidden');
        $('#modal-shadow').data('target', modal);
        scrollTo(0, 0);
    }
    
    function hideModal(){
        $('#' + $('#modal-shadow').data('target')).addClass('hidden');
        $('#modal-shadow').addClass('hidden');
    }
</script>