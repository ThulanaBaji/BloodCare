<div class="h-full w-full sm:pt-6 sm:pl-6">

    

<nav class="flex mb-11 mt-3" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
    <li class="inline-flex items-center mr-2 sm:mr-0">
      <a href="./" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
        <svg class="w-3 h-3 me-2.5 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.484 6.166 13 4h6m0 0-3-3m3 3-3 3M1 14h5l1.577-2.253M1 4h5l7 10h6m0 0-3 3m3-3-3-3"></path>
        </svg>
        Donation <br class="sm:hidden"> processing
      </a>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <a href="./" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Today</a>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Camps</span>
      </div>
    </li>
  </ol>
</nav>


    <div class="w-full">


        <?php $index = 0;
        foreach ($camps as $camp):
            $index++;?>
        <div class="p-1 sm:pl-4 rounded-xl mb-3 border  max-w-xl bg-gray-50 relative camp">
            <span class="hidden dataset" data-profile="<?= $camp['profile'] ?>" data-name="<?= $camp['name'] ?>" data-organizer="<?= $camp['organizer'] ?>" data-address="<?= $camp['location_address'] ?>" 
            data-city="<?= $camp['location_city'] ?>" data-district="<?= $camp['location_district'] ?>" data-pin="<?= $camp['location_pin'] ?>" data-datetime="<?= $camp['start_datetime'] ?>" data-duration="<?= $camp['duration'] ?>" data-maxseats="<?= $camp['max_seats'] ?>"></span>

        <div class="flex items-center justify-between w-full">
            <div class="flex items-center gap-6">
                <div class="hidden sm:flex w-16 h-16 border items-center justify-center rounded-full overflow-hidden">
                    <img src="<?= base_url('uploads/camp/profileimages/'.$camp['profile']) ?>" alt="">
                </div>
                <div class="flex flex-col text-left text-gray-500 font-semibold gap-3 sm:gap-2">
                    <p class="text-lg sm:text-lg leading-tight"><?= $camp['name'] ?></p>
                    <p class="text-xs uppercase flex items-center gap-2 sm:gap-1">
                        <svg class="w-4 h-4 inline-block text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                            <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"></path>
                        </svg><?= $camp['location_city'].', '.$camp['location_district'] ?></p>
                </div>
            </div>
            <button class="h-[114px] w-[114px] group hover:bg-gray-100 rounded-lg flex items-center justify-center button-dropdown" data-target="camp-panel-<?= $index ?>">
                <svg class="w-6 h-6 text-gray-400 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"></path>
                </svg>
            </button> 
        </div>
        <div class="pb-1 sm:pb-3 sm:py-1 flex justify-center hidden" id="camp-panel-<?= $index ?>">
            <div class="w-full pt-1 sm:pr-3">
                <div class="w-full flex flex-col items-center bg-gray-100 p-3 rounded-lg">
                    <div class="max-w-xl relative w-full mb-6">
                        <input type="search" id="search-filter" onkeyup="filter(this)" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border
                            border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="(Ex: Joe Brown)" required="">
                        <button class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="donor-list divide-y w-full flex flex-col items-center" data-camp="<?= $camp['name'] ?>" data-campid="<?= $camp['id'] ?>">
                        
                        <?php foreach($camp['donors'] as $donor): ?>
                        <div class="donor flex gap-2 items-center justify-between max-w-xs w-full py-2"  data-name="<?= $donor['name'] ?>" data-membership="<?= $donor['membership_id'] ?>" data-donorid="<?= $donor['id'] ?>">
                            <div class="flex items-center gap-2">
                                <div class="flex w-8 h-8 border items-center justify-center rounded-full overflow-hidden">
                                    <img src="<?= base_url('uploads/donor/profileimages/'.$donor['profile']) ?>" alt="">
                                </div>
                                <div class="flex flex-col gap-1">
                                    <p class="text-sm px-2 font-semibold text-gray-600 "><?= $donor['name'] ?></p>
                                    <p class="text-xs px-2 border font-semibold py-1 rounded-full bg-gradient-to-r from-pink-100 via-amber-100 to-cyan-100 text-gray-500"><?= $donor['membership_id'] ?></p>
                                </div>
                            </div>
                            <button onclick="addDonation(this)" data-id="<?= $donor['id'] ?>" class="self-center bg-red-950 text-sm text-gray-600 font-semibold rounded p-1.5">
                                <svg viewBox="0 0 15 15" class="w-5 h-5" version="1.1" id="blood-bank" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11.2,7.1L11.2,7.1L7.5,2L3.8,7.1h0C3.3,7.8,3,8.7,3,9.6C3,12,5,14,7.5,14c0,0,0,0,0,0C10,14,12,12,12,9.6c0,0,0,0,0,0
        C12,8.7,11.7,7.8,11.2,7.1z M10,10H8v2H7v-2H5V9h2V7h1v2h2V10z"></path> </g></svg>
                            </button>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>


<div class="fixed top-0 left-0 h-screen w-full bg-black/10 z-40 hidden" id="modal-shadow" onclick="hideModal()" data-target=""></div>
<!-- record donation details Modal -->
<div id="donationModal" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-9000" id="cancel-campname">
                    Add donation 
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="donationModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('hospital/donation/addDonation') ?>" method="post">
                
                <input type="hidden" name="campid" id="donation-campid">
                <input type="hidden" name="donationmedium" id="donation-campname">
                <input type="hidden" name="donorid" id="donation-donorid">

                <div class="flex items-center gap-2 my-6">
                    <div class="flex w-16 h-16 border items-center justify-center rounded-full overflow-hidden mr-2">
                        <img src="http://localhost/bloodcare/uploads/donor/profileimages/1704377577952.jpg" id="modal-profile" alt="">
                    </div>
                    <div>
                        <p class="text-sm px-2 font-semibold text-gray-600 mb-1" id="modal-donorname"></p>
                        <p class="text-xs px-2 font-semibold  text-gray-500" id="modal-memid"></p>
                        <p class="text-xs px-2 mt-2 font-semibold text-gray-600 p-1 bg-gray-200 rounded" id="modal-campname"></p>
                    </div>
                </div>

                <label class="block mb-2 text-sm font-medium text-gray-900 ">Reference number</label>
                <input type="text" name="reference" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="blood donation reference" required>
                    
                <div class="h-4"></div>
                <button type="submit" class="cursor-pointer text-md  font-semibold px-2 mt-3 shadow-lg text-gray-700 py-2 gap-1 flex items-center justify-center bg-red-950 max-w-xl rounded"
                data-campid="" data-donorid="" id="modal-addbutton">
                    <svg viewBox="0 0 15 15" class="w-5 h-5" version="1.1" id="blood-bank" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11.2,7.1L11.2,7.1L7.5,2L3.8,7.1h0C3.3,7.8,3,8.7,3,9.6C3,12,5,14,7.5,14c0,0,0,0,0,0C10,14,12,12,12,9.6c0,0,0,0,0,0
C12,8.7,11.7,7.8,11.2,7.1z M10,10H8v2H7v-2H5V9h2V7h1v2h2V10z"></path> </g></svg>
                    <p class="mb-1 ml-1 text-white">add donation</p>
                </button>
            </form>
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

        $('#donationModal').on('click', function(e) {
            if (e.target !== this && e.target.id != 'modalbg')
                return;
            
            hideModal();
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
    });

    function addDonation(e){
        var p = $(e).siblings()[0];
        $('#modal-profile').attr('src', $($(p).children()[0]).children('img')[0].currentSrc);
        $('#modal-donorname').text($($(p).children()[1]).children()[0].innerText);
        $('#modal-memid').text($($(p).children()[1]).children()[1].innerText);
        $('#modal-campname').text($($(e).parents('.donor-list')).data('camp'));

        $('#donation-campid').val($($(e).parents('.donor-list')).data('campid'));
        $('#donation-campname').val($($(e).parents('.donor-list')).data('camp'));
        $('#donation-donorid').val($($(e).parents('.donor')).data('donorid'));

        showModal('donationModal');
    }

    function filter(e){
        var p = $(e).parent();
        var donorlist = $(p).siblings('.donor-list');
        var search = $(e).val().toLowerCase();


        $(donorlist).children().toArray().forEach(donor => {
            var name = $(donor).data('name').toLowerCase();
            var mem = $(donor).data('membership').toLowerCase();
            if(name.includes(search) || mem.includes(search)){
                $(donor).removeClass('hidden');
            }else{
                console.log(search);
                console.log();
                $(donor).addClass('hidden');
            }

        });
    }

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
</script>