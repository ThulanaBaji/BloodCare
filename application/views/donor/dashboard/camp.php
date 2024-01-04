<div class="p-3 pt-6 md:p-6 flex flex-col h-full relative justify-between">
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

<div class="fixed top-0 left-0 h-screen w-full bg-black/10 z-40 hidden" id="modal-shadow" onclick="hideModal()" data-target=""></div>

<div id="sharecampModal" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-9000" id="cancel-campname">
                    Share camp 
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="sharecampModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            
            <div class="flex gap-2">
                <input readonly type="text" name="message" id="share-link" class=" bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="" required>
                <button onclick="copyViewUrl(this)" class="cursor-pointer text-md  font-semibold px-2 text-gray-700 py-2 gap-1 flex items-center justify-center w-20 hover:bg-gray-200 max-w-xl rounded">
                    copy</p>
                </button>
            </div>
            <div class="mt-6 flex justify-center flex-wrap gap-2">
                
                <a id="share-tw" class="text-white bg-black hover:bg-black/90 font-medium rounded-full text-sm px-4 py-4 text-center inline-flex items-center me-2 mb-2" 
                href="" target="_blank" title="Tweet">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path fill="currentColor" d="M12.186 8.672 18.743.947h-2.927l-5.005 5.9-4.44-5.9H0l7.434 9.876-6.986 8.23h2.927l5.434-6.4 4.82 6.4H20L12.186 8.672Zm-2.267 2.671L8.544 9.515 3.2 2.42h2.2l4.312 5.719 1.375 1.828 5.731 7.613h-2.2l-4.699-6.237Z"/>
                    </svg>
                </a>

                <a id="share-wa" class="text-white bg-[#25D366] hover:bg-[#25D366]/90 font-medium rounded-full text-sm px-3 py-2 text-center inline-flex items-center me-2 mb-2" 
                href="" target="_blank" title="Whatsapp">
                    <svg fill="#fff" class="w-6 h-6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	                    viewBox="0 0 308 308" xml:space="preserve">
                        <g id="XMLID_468_">
                            <path id="XMLID_469_" d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156
                                c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687
                                c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887
                                c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153
                                c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348
                                c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802
                                c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922
                                c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0
                                c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458
                                C233.168,179.508,230.845,178.393,227.904,176.981z"/>
                            <path id="XMLID_470_" d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716
                                c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396
                                c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z
                                M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188
                                l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677
                                c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867
                                C276.546,215.678,222.799,268.994,156.734,268.994z"/>
                        </g>
                    </svg>
                </a>

                <a id="share-fb" class="text-white bg-[#1877F2] hover:bg-[#1877F2]/90 font-medium rounded-full text-sm px-4 py-4 text-center inline-flex items-center me-2 mb-2" 
                href="" target="_blank" title="Facebook">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                        <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                    </svg>
                </a>
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

        $('#sharecampModal').on('click', function(e) {
            if (e.target !== this && e.target.id != 'modalbg')
                return;
            
            hideModal();
        });
    })
        
    function showModal(modal){
        $('#' + modal).removeClass('hidden');
        $('#modal-shadow').removeClass('hidden');
        $('#modal-shadow').data('target', modal);
        scrollTo(0, 0);
    }
    
    function hideModal(){
        $('#' + $('#modal-shadow').data('target')).addClass('hidden');
        $('#modal-shadow').addClass('hidden');
    }

    function joinCamp(e){
        var campid = $(e).data('id');
        window.location.replace('<?= base_url() ?>donor/camp/joincamp?campid=' + campid);
    }

    function shareCamp(e){
        scrollTo(0, 0);

        var campid = $(e).data('id');
        var campElem = $(e).parents('.camp')[0];
        var dataset = $(campElem).children('span.dataset')[0];

        var msg = $(dataset).data('socialmsg');
        var view = $(dataset).data('view');

        $('#share-link').val(view);
        $('#share-tw').attr('href', 'https://twitter.com/intent/tweet?text=' + msg);
        $('#share-wa').attr('href', 'https://api.whatsapp.com/send?text=' + msg);
        $('#share-fb').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=' + msg);

        showModal('sharecampModal');
    }

    function copyViewUrl(e){
        var copyText = document.getElementById("share-link");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);

        $(e).html('copied');

        window.setTimeout(() => {     
            $(e).html('copy');
        }, 2000);
        
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