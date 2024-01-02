<div class="p-3 pt-6 md:p-6 flex flex-col h-full relative justify-between">
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
    <div class="body-container <?= count($camps) > 0 ? '' : 'hidden' ?>">

        <a href="<?= base_url('donor/camp/joined') ?>" class="cursor-pointer text-md font-semibold p-2 text-gray-500 mb-4 gap-1 flex items-center justify-center bg-gray-200 sm:bg-transparent max-w-xl hover:bg-gray-200 rounded">
            <svg class="w-4 h-4 text-gray-500 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z"/>
            </svg>
            <p class="mb-1 ml-1">joined camps
                <?php if ($joinedcount > 0) : ?>
                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-200 rounded-full"><?= $joinedcount ?></span>
                <?php endif; ?></p>
            <svg class="w-3 h-3 text-gray-500 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
            </svg>
        </a>
        <!-- filter by component -->
        <div class="flex mb-6 max-w-xl">
            <select class="bg-gray-50 rounded-l-lg border-gray-300 outline-none z-10" id="filter-selection" onchange="changeSelectionPlaceholder()">
                <option value="1">Name</option>
                <option value="2">Date</option>
                <option value="3">City</option>
                <option value="4">District</option>
            </select>
            <div class="relative w-full">
                <input type="search" id="search-filter" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border
                    border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="(Ex: Josephs 24th)" required>
                <button onclick="filter()" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </button>
            </div>
        </div>
        <?= loadCamps($camps) ?>
        
    </div>
    <div class="absolute <?= count($camps) == 0 ? '' : 'hidden' ?> w-full sm:w-fit px-3 sm:px-0 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 items-center text-center flex flex-col">
        <div class="text-lg font-semibold text-gray-500">It seems there's no bloodcamp organized as of now, come again later<br>Until then have a look at the camps YOU joined !</div>
        <div class="relative">
            <img src="<?= base_url('assets/images/disheartwitheyes.svg') ?>" alt="" srcset="">
            <img src="<?= base_url('assets/images/disheartwitheyeshandonly.svg') ?>" class="absolute top-0 left-0 z-20" alt="" srcset="">
        </div>
        <a href="<?= base_url('donor/camp/joined') ?>" class="transform -translate-y-6 w-52 shadow hover:shadow-md border border-gray-400 cursor-pointer text-md font-semibold p-2 text-gray-500 gap-1 flex items-center justify-center bg-gray-200 max-w-xl hover:bg-gray-200 rounded">
            <p class="mb-1">joined camps</p>
            <svg class="w-4 h-4 text-gray-500 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z"/>
            </svg>
        </a>
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

    function joinCamp(e){
        var campid = $(e).data('id');
        window.location.replace('<?= base_url() ?>donor/camp/joincamp?campid=' + campid);
    }

    function changeSelectionPlaceholder(){
        const selection = $('#filter-selection').val();
        
        switch (selection) {
            case "1":
                $('#search-filter').attr('placeholder', '(Ex: Josephs 24th)');
                break;
            case "2":
                $('#search-filter').attr('placeholder', 'MM.DD.YYYY (Ex: 01.13.2024)');
                break;
            case "3":
                $('#search-filter').attr('placeholder', '(Ex: seeduwa)');
                break;
            case "4":
                $('#search-filter').attr('placeholder', '(Ex: rathnapura)');
                break;
        }
    }

    function filter(){
        const selection = $('#filter-selection').val();
        const search = $('#search-filter').val().toLowerCase().trim();
        
        switch (selection) {
            //name
            case "1":
                
                $('.body-container .camp').toArray().forEach(e => {
                    const dataelem = $(e).children('span');
                    
                    if($(dataelem).data('name').toLowerCase().includes(search))
                        $(e).removeClass('hidden');
                    else   
                        $(e).addClass('hidden');
                });
                break;
            //date
            case "2":
                $('.body-container .camp').toArray().forEach(e => {
                    const dataelem = $(e).children('span');
                    var searchdaystart = Date.parse(search);
                    var searchdayend = searchdaystart + 86400000;
                    var time = parseInt($(dataelem).data('datetime'));

                    if(time > searchdaystart && time < searchdayend)
                        $(e).removeClass('hidden');
                    else   
                        $(e).addClass('hidden');
                });
                break;
            //city
            case "3":
                $('.body-container .camp').toArray().forEach(e => {
                    const dataelem = $(e).children('span');
                    if($(dataelem).data('city').toLowerCase().includes(search))
                        $(e).removeClass('hidden');
                    else   
                        $(e).addClass('hidden');
                });
                break;
            //district
            case "4":
                $('.body-container .camp').toArray().forEach(e => {
                    const dataelem = $(e).children('span');
                    if($(dataelem).data('district').toLowerCase().includes(search))
                        $(e).removeClass('hidden');
                    else   
                        $(e).addClass('hidden');
                });
                break;
        
            default:
                break;
        }
    }
</script>