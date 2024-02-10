<div class="sm:p-3 pt-6 md:p-6 flex flex-col h-full relative ">
    <div class="absolute z-60 top-10 left-1/2 -translate-x-1/2 max-w-xs">
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
    
    <div class="max-w-2xl  flex sm:p-2 justify-between items-center">
        <button onclick="showModal('newRequest')" class="p-3 flex items-center text-white text-sm font-semibold rounded bg-red-950">
            <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"></path>
            </svg><p>new request</p>
        </button>

        <select name="" onchange="filter(this)" id="select-sort" class="bg-gray-50 rounded-lg border-gray-300 outline-none z-10">
            <option value="all">all requests</option>
            <option value="pending">pending</option>
            <option value="accepted">accepted</option>
            <option value="rejected">rejected</option>
            <option value="cancelled">cancelled</option>
        </select>
    </div>

    <div class="body-container mt-11">
        
        <ol class="relative border-s border-gray-300 dark:border-gray-700" id="request-list"> 
            <?php $counter = 0; foreach($requests as $req): $counter++; if($req['status'] == REQUEST_PENDING): ?>                 
                <li class="mb-10 ms-6" data-status="<?= $req['status'] ?>">            
                    <span class="absolute hover:w-fit flex group items-center justify-center py-2 px-2 w-8 bg-amber-200 rounded-full -start-4">
                        <svg class="w-4 h-4 flex-shrink-0 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <p class="text-xs ml-2 pr-2 text-gray-800 group-hover:flex hidden">pending</p>
                    </span>

                    <div class="request-details p-1 border bg-amber-50 w-full max-w-xl rounded-lg">
                        <div class="flex justify-between items-center">
                            <div class="p-2">
                                <span class="flex gap-3 items-center mb-3">
                                    <p class="reference text-md font-bold text-gray-600"><?= $req['reference'] ?></p>
                                    <?php if($req['priority'] == PRIORITY_URGENT) : ?>
                                        <p class="priority-level text-sm font-bold text-red-950 rounded p-1 px-2 bg-red-200">urgent !</p>
                                    <?php endif; ?>
                                </span>
                                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Requested on <?= date("F jS\, Y", substr($req['request_datetime'], 0, -3)) ?></time>
                            </div>
                            <button class="h-[94px] w-[94px] group hover:bg-black/5 rounded-lg flex items-center justify-center button-dropdown pending" data-target="chart-wrapper-<?= $counter ?>">
                                <svg class="w-5 h-5 text-gray-500 transition-all rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"></path>
                                </svg>
                            </button>
                        </div>
                        <div id="chart-wrapper-<?= $counter ?>" class="pt-3 sm:p-3 flex gap-4 sm:flex-row flex-col">
                            <div class="p-3 rounded-lg flex items-center bg-black/5">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="p-3">
                                                Blood type
                                            </th>
                                            <th scope="col" class="p-3">
                                                Volume (ml)
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $bloods = json_decode($req['request']); 
                                              $bhtml = array(
                                                    "op" => 'O<sub>positive</sub>',
                                                    "ap" => 'A<sub>positive</sub>',
                                                    "abp" => 'AB<sub>positive</sub>',
                                                    "bp" => 'B<sub>positive</sub>',
                                                    "on" => 'O<sub>negative</sub>',
                                                    "an" => 'A<sub>negative</sub>',
                                                    "abn" => 'AB<sub>negative</sub>',
                                                    "bn"=> 'B<sub>negative</sub>'
                                                );
                                              foreach($bloods as $bloodtype => $bloodvol): ?>
                                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="p-2 pl-3 whitespace-nowrap dark:text-white">
                                                <?= $bhtml[$bloodtype] ?>
                                            </th>
                                            <td class="px-6">
                                                <?= $bloodvol ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="column-chart-<?= $counter ?>" class="column-chart w-fit" data-json="<?= str_replace('"', '~', $req['request']) ?>"></div>
                        </div>

                        <a href="<?= base_url('hospital/requests/cancelRequest/'.$req['id']) ?>" class="inline-flex ml-2 mb-2 items-center px-4 py-2 text-sm font-medium text-gray-900 bg-red-200 mt-3  rounded focus:z-10 hover:shadow">
                            <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z" clip-rule="evenodd"/>
                            </svg>cancel request
                        </a>
                    </div>                
                </li>
            <?php elseif($req['status'] == REQUEST_CANCELLED || $req['status'] == REQUEST_REJECTED): ?>
                <li class="mb-10 ms-6" data-status="<?= $req['status'] ?>">            
                    <span class="absolute hover:w-fit flex group items-center justify-center py-2 px-2 w-8 bg-rose-300 rounded-full -start-4">
                        <svg class="w-4 h-4 flex-shrink-0 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6m0 12L6 6"/>
                        </svg>
                        <p class="text-xs ml-2 pr-2 text-gray-800 group-hover:flex hidden"><?= $req['status'] ?></p>
                    </span>

                    <div class="request-details p-1 border bg-rose-50 w-full max-w-xl rounded-lg">
                        <div class="flex justify-between items-center">
                            <div class="p-2">
                                <span class="flex gap-3 items-center mb-3">
                                    <p class="reference text-md font-bold text-gray-600"><?= $req['reference'] ?></p>
                                </span>
                                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Requested on <?= date("F jS\, Y", substr($req['request_datetime'], 0, -3)) ?></time>
                                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500"><?= $req['status'].' on '.date("F jS\, Y", substr($req['responsed_datetime'], 0, -3)) ?></time>
                            </div>
                            <button class="h-[94px] w-[94px] group hover:bg-black/5 rounded-lg flex items-center justify-center button-dropdown" data-target="chart-wrapper-<?= $counter ?>">
                                <svg class="w-5 h-5 text-gray-500 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"></path>
                                </svg>
                            </button>
                        </div>
                        <div id="chart-wrapper-<?= $counter ?>" class="hidden pt-3 sm:p-3 flex gap-4 sm:flex-row flex-col">
                            <div class="p-3 rounded-lg flex items-center bg-black/5">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="p-3">
                                                Blood type
                                            </th>
                                            <th scope="col" class="p-3">
                                                Volume (ml)
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $bloods = json_decode($req['request']); 
                                              $bhtml = array(
                                                    "op" => 'O<sub>positive</sub>',
                                                    "ap" => 'A<sub>positive</sub>',
                                                    "abp" => 'AB<sub>positive</sub>',
                                                    "bp" => 'B<sub>positive</sub>',
                                                    "on" => 'O<sub>negative</sub>',
                                                    "an" => 'A<sub>negative</sub>',
                                                    "abn" => 'AB<sub>negative</sub>',
                                                    "bn"=> 'B<sub>negative</sub>'
                                                );
                                              foreach($bloods as $bloodtype => $bloodvol): ?>
                                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="p-2 pl-3 whitespace-nowrap dark:text-white">
                                                <?= $bhtml[$bloodtype] ?>
                                            </th>
                                            <td class="px-6">
                                                <?= $bloodvol ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="column-chart-<?= $counter ?>" class="column-chart w-fit" data-json="<?= str_replace('"', '~', $req['request']) ?>"></div>
                        </div>
                    </div>
                </li>
            <?php else: ?>
                <li class="mb-10 ms-6" data-status="<?= $req['status'] ?>">            
                    <span class="absolute hover:w-fit flex group items-center justify-center py-2 px-2 w-8 bg-green-300 rounded-full -start-4">
                        <svg class="w-4 h-4 flex-shrink-0 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12 4.7 4.5 9.3-9"/>
                        </svg>
                        <p class="text-xs ml-2 pr-2 text-gray-800 group-hover:flex hidden">accepted</p>
                    </span>

                    <div class="request-details p-1 border bg-emerald-50 w-full max-w-xl rounded-lg">
                        <div class="flex justify-between items-center">
                            <div class="p-2">
                                <span class="flex gap-3 items-center mb-3">
                                    <p class="reference text-md font-bold text-gray-600"><?= $req['reference'] ?></p>
                                </span>
                                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Requested on <?= date("F jS\, Y", substr($req['request_datetime'], 0, -3)) ?></time>
                                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Accepted on <?= date("F jS\, Y", substr($req['responsed_datetime'], 0, -3)) ?></time>
                            </div>
                            <button class="h-[94px] w-[94px] group hover:bg-black/5 rounded-lg flex items-center justify-center button-dropdown" data-target="chart-wrapper-<?= $counter ?>">
                                <svg class="w-5 h-5 text-gray-500 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"></path>
                                </svg>
                            </button>
                        </div>
                        <div id="chart-wrapper-<?= $counter ?>" class="hidden pt-3 sm:p-3 flex gap-4 sm:flex-row flex-col">
                            <div class="p-3 rounded-lg flex items-center bg-black/5">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="p-3">
                                                Blood type
                                            </th>
                                            <th scope="col" class="p-3">
                                                Volume (ml)
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $bloods = json_decode($req['request']); 
                                              $bhtml = array(
                                                    "op" => 'O<sub>positive</sub>',
                                                    "ap" => 'A<sub>positive</sub>',
                                                    "abp" => 'AB<sub>positive</sub>',
                                                    "bp" => 'B<sub>positive</sub>',
                                                    "on" => 'O<sub>negative</sub>',
                                                    "an" => 'A<sub>negative</sub>',
                                                    "abn" => 'AB<sub>negative</sub>',
                                                    "bn"=> 'B<sub>negative</sub>'
                                                );
                                              foreach($bloods as $bloodtype => $bloodvol): ?>
                                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="p-2 pl-3 whitespace-nowrap dark:text-white">
                                                <?= $bhtml[$bloodtype] ?>
                                            </th>
                                            <td class="px-6">
                                                <?= $bloodvol ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="column-chart-<?= $counter ?>" class="column-chart w-fit" data-json="<?= str_replace('"', '~', $req['request']) ?>"></div>
                        </div>
                    </div>
                </li>
            <?php endif; endforeach; ?>
        </ol>
    </div>

<div class="fixed top-0 left-0 h-screen w-full bg-black/10 z-40 hidden" id="modal-shadow" onclick="hideModal()" data-target=""></div>
<div id="newRequest" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-9000" id="cancel-campname">
                    Make request 
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('hospital/requests/makeRequest') ?>" method="post">
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <input type="hidden" id="refinput" value="" name="reference">
                <span class="text-lg mt-3 font-semibold text-gray-500 sm:col-span-2 inline-flex gap-2 items-center">
                    <span id="refnum">E085SIR</span>
                </span>

                <div>
                    <label class="block mb-2 mt-3 text-sm font-medium text-gray-900 ">Priority level</label>
                    <select name="priority" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="<?= PRIORITY_NORMAL ?>">Normal</option>
                        <option value="<?= PRIORITY_URGENT ?>">Urgent</option>
                    </select>
                </div>

                <div class="sm:col-span-2 ">
                    <div class="flex w-full mt-2 max-w-sm justify-between">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Request <p class="text-xs font-normal text-gray-500">(add blood type and the required volume)</p></label>
                        <button type="button" onclick="addBlood(this)" id="addame" class="disabled:bg-gray-300 p-2 rounded bg-red-950 text-white mr-3 mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-1 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M4.9 3C3.9 3 3 3.8 3 4.9V9c0 1 .8 1.9 1.9 1.9H9c1 0 1.9-.8 1.9-1.9V5c0-1-.8-1.9-1.9-1.9H5Zm10 0c-1 0-1.9.8-1.9 1.9V9c0 1 .8 1.9 1.9 1.9H19c1 0 1.9-.8 1.9-1.9V5c0-1-.8-1.9-1.9-1.9h-4Zm-10 10c-1 0-1.9.8-1.9 1.9V19c0 1 .8 1.9 1.9 1.9H9c1 0 1.9-.8 1.9-1.9v-4c0-1-.8-1.9-1.9-1.9H5ZM18 14a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 1 0 0-2h-2v-2Z" clip-rule="evenodd"/>
                            </svg>
  
                        add</button>
                    </div>
                <table class="w-full max-w-sm text-sm text-left text-gray-500 dark:text-gray-400" id="bloods">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-4">Blood type</th>
                            <th scope="col" class="px-4 py-3">Volume (ml)</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="bloods-body">
                        
                    </tbody>
                </table>
                </div>

            </div>
                <div class="h-4"></div>
                <button type="submit" class="cursor-pointer text-md hover:shadow-md font-semibold px-2 mt-3 text-white py-2 gap-1 flex items-center justify-center bg-red-950 max-w-xl rounded">
                    <svg class="w-4 h-4 rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 2c.4 0 .8.3 1 .6l7 18a1 1 0 0 1-1.4 1.3L13 19.5V13a1 1 0 1 0-2 0v6.5L5.4 22A1 1 0 0 1 4 20.6l7-18a1 1 0 0 1 1-.6Z" clip-rule="evenodd"/>
                    </svg>
                    <p class="mb-1 ml-1">send the request</p>
                </button>
                
            </form>
        </div>
    </div>
</div>
</div>

<script src="<?= base_url('node_modules/apexcharts/dist/apexcharts.min.js') ?>"></script>

<script>
    $(document).ready(function() {

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

        $('.button-dropdown .pending').click();

        $('#newRequest').on('click', function(e) {
            if (e.target !== this && e.target.id !== 'modalbg')
                return;
            
            hideModal();
        });

        var counter = 1;

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

        switch ($(e).val()) {
            case "all":
                $('#request-list').children().each(function(){
                    $(this).removeClass('hidden');
                })
                break;

            case "pending":
                $('#request-list').children().each(function(){
                    if($(this).data('status') == "pending")
                        $(this).removeClass('hidden');
                    else
                        $(this).addClass('hidden');
                })
                break;

            case "rejected":
                $('#request-list').children().each(function(){
                    if($(this).data('status') == "rejected")
                        $(this).removeClass('hidden');
                    else
                        $(this).addClass('hidden');
                })
                break;

            case "cancelled":
                $('#request-list').children().each(function(){
                    if($(this).data('status') == "cancelled")
                        $(this).removeClass('hidden');
                    else
                        $(this).addClass('hidden');
                })
                break;

            case "accepted":
                $('#request-list').children().each(function(){
                    if($(this).data('status') == "accepted")
                        $(this).removeClass('hidden');
                    else
                        $(this).addClass('hidden');
                })
                break;
            default:
                break;
        }
    }

    function showModal(modal){

        $('#refnum').text('<?= strtoupper($name[0].$city[0]) ?>' + randomID(8).toUpperCase());
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

    function addBlood(e){
        var bloods = ['op', 'on', 'ap', 'an', 'bp', 'bn', 'abp', 'abn'];

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

        $('tr th input.bloodtype').each(function() {
            console.log($(this));
            var b = $(this).val();
            bloods = bloods.filter(function(e) { return e !== b });
        });

        var selectElem = '<select id="new-bloodtype" type="text" class="border bg-white rounded mt-3 p-2 w-24">';

        bloods.forEach(d => {
            $(row).children('#new-bloodtype').append('<option>'+d+'</option>');
            selectElem += '<option value="'+ d +'">'+ bloodshtml[d] +'</option>';
        });

        selectElem += '</select>';
        var row = $('<tr><td>'+ selectElem +'</td><td><input onkeypress="key(this)" id="new-bloodvol" type="text" class="border bg-white rounded mt-3 p-2 w-24"></td><td><button onclick="confirmItem(this)" class="inline-flex items-center p-2 text-sm font-medium text-center hover:text-green-800 hover:bg-gray-100 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button"><svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12 4.7 4.5 9.3-9"/></svg></button></td></tr>'); //create row

        $('#bloods-body').append(row);
        $(e).attr('disabled', 'disabled');
    }

    function confirmItem(e){
        var empty = false;
        $($(e).parents('tr')).find('input').each(function(){
            if($(this).val() == "") {
                $(this).addClass('border-red-500');
                empty=true;
            }
        })
        
        if(empty) return;

        var bloodshtml = {
            "op": 'O<sub>positive</sub>',
            "ap": 'A<sub>positive</sub>',
            "abp": 'AB<sub>positive</sub>',
            "bp": 'B<sub>positive</sub>',
            "on": 'O<sub>negative</sub>',
            "an": 'A<sub>negative</sub>',
            "abn": 'AB<sub>negative</sub>',
            "bn": 'B<sub>negative</sub>'
        };

        var row = $('<tr class="border-b dark:border-gray-700"><th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">'+ bloodshtml[$('#new-bloodtype').val()] +'<input type="hidden" class="bloodtype" value="'+ $('#new-bloodtype').val()  +'"></th><td class="px-4 py-3">'+ $('#new-bloodvol').val() +'<input type="hidden" name="bloods['+ $('#new-bloodtype').val() +']" value="'+ $('#new-bloodvol').val() +'"></td><td class="py-2 flex items-center"><button onclick="delItem(this)" class="inline-flex items-center p-2 text-sm font-medium text-center hover:text-rose-800 hover:bg-gray-100 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button"><svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M8.6 2.6A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4c0-.5.2-1 .6-1.4ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/></svg></button></td></tr>');
        $($(e).parents('tr')).remove();
        $('#bloods-body').append(row);

        $('#addame').removeAttr('disabled');
    }

    function delItem(e){
        $($(e).parents('tr')).remove();
    }

    function key(e){
        $(e).removeClass('border-red-500');
    }

    function randomID(length) {
        return Math.random().toString(36).substring(2, length+2);
    };  

    function loadChart (chartid, data) {
        const options = {
          colors: ["#1A56DB"],
          series: [
            {
              color: "#1A56DB",
              name: "volume (ml)",
              data : data,  
            }
          ],
          
          chart: {
            type: "bar",
            height: "200px",
            fontFamily: "Inter, sans-serif",
            toolbar: {
              show: false,
            }
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: "15px",
              borderRadiusApplication: "end",
              borderRadius: 7,
            },
          },
          tooltip: {
            shared: true,
            intersect: false,
            style: {
              fontFamily: "Inter, sans-serif",
            },
            
          },
          states: {
            hover: {
              filter: {
                type: "darken",
                value: 1,
              },
            },
          },
          stroke: {
            show: true,
            width: 0,
            colors: ["transparent"],
          },
          grid: {
            show: false,
            strokeDashArray: 4,
            padding: {
              left: 2,
              right: 0,
              top: -14
            },
          },
          dataLabels: {
            enabled: false,
          },
          legend: {
            show: false,
          },
          xaxis: {
            floating: false,
            labels: {
              show: true,
              style: {
                fontFamily: "Inter, sans-serif",
                cssClass: 'text-sm font-normal fill-gray-500 dark:fill-gray-400'
              }
            },
            tickPlacement: "between",
            axisBorder: {
              show: true,
            },
            axisTicks: {
              show: false,
            },
          },
          yaxis: {
            show: true,
          },
          fill: {
            opacity: 1,
          },
        }

        if(document.getElementById("column-chart-"+chartid) && typeof ApexCharts !== 'undefined') {
          const chart = new ApexCharts(document.getElementById("column-chart-"+chartid), options);
          chart.render();
        }
    }
</script>