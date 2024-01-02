<div class="p-0 pt-6 md:p-6 h-full relative">
    <div class="absolute top-10 left-1/2 -translate-x-1/2 max-w-xs">
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
    <a href="<?= base_url('hospital/organize') ?>" class="mx-3 <?= count($camps) > 0 ? '' : 'hidden' ?> cursor-pointer text-md font-semibold p-2 text-gray-500 gap-1 flex items-center justify-center bg-gray-200 sm:bg-transparent max-w-xl hover:bg-gray-200 rounded">
        <svg class="w-3 h-3 text-gray-500 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
        </svg>
        <p class="mb-1">organize a camp</p>
        <svg class="w-4 h-4 text-gray-500 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
        </svg>
    </a>
    <div class="p-5  pt-2 pr-3 pl-8 mb-4 border border-gray-100 rounded-lg max-w-xl">
        <ol class="mt-6 relative border-s border-gray-200 appointment-list">
            <?php loadOrganizedCamps($camps) ?>
        </ol>
    </div>

    <div class="absolute <?= count($camps) == 0 ? '' : 'hidden' ?> left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 items-center text-center flex flex-col">
        <div class="text-lg font-semibold text-gray-500">Organize a blood camp TODAY !</div>
        <div class="relative">
            <img src="<?= base_url('assets/images/holdingheartwitheyes.svg') ?>" alt="" srcset="">
            <img class="absolute top-0 left-0 z-20" src="<?= base_url('assets/images/holdinghearthandsonly.svg') ?>" alt="" srcset="">
        </div>
        <a href="<?= base_url('hospital/organize') ?>" class="transform -translate-y-11 w-52 shadow hover:shadow-md border border-gray-400 cursor-pointer text-md font-semibold p-2 text-gray-500 gap-1 flex items-center justify-center bg-gray-200 max-w-xl hover:bg-gray-200 rounded">
            <p class="mb-1">organize a camp</p>
            <svg class="w-4 h-4 text-gray-500 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
        </svg>
        </a>
    </div>
</div>

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
    })
</script>