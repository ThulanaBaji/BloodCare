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
        <?= loadtodayappointmentcard($todayappointments) ?>

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

    function showAllCamps(e){
        if($(e).text() == 'more camps'){
            $('.extra-camp').each((i, elem) => $(elem).removeClass('hidden'));
            $(e).text('less');
        }else{
            $('.extra-camp').each((i, elem) => $(elem).addClass('hidden'));
            $(e).text('more camps');
        }
    }
</script>