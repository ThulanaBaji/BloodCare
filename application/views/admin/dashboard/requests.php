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

    <div class="body-container mt-11">
        
        <ol class="relative border-s border-gray-300 dark:border-gray-700" id="request-list"> 
            <?php $counter = 0; foreach($requests as $req): $counter++; if($req['status'] == REQUEST_PENDING): ?>                 
                <li class="mb-10 ms-6" data-status="<?= $req['status'] ?>" data-reference="<?= $req['reference'] ?>" data-hname="<?= $req['name'] ?>">            
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
                                <p class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500 pt-3">Requested by <a class="text-gray-500 p-1 underline rounded" href="<?= base_url('admin/hospitalverification/?search='.$req['regnumber']) ?>"><?= $req['name'].', '.$req['city'] ?></a></p>
                                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Requested on <?= date("F jS\, Y", substr($req['request_datetime'], 0, -3)) ?></time>
                            
                            </div>
                            <button class="h-[94px] w-[94px] group hover:bg-black/5 rounded-lg flex items-center self-start justify-center button-dropdown pending" data-target="chart-wrapper-<?= $counter ?>">
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

                        <div class="flex gap-3">
                            <button data-id="<?= $req['id'] ?>" data-reference="<?= $req['reference'] ?>" data-hname="<?= $req['name'].', '.$req['city'] ?>" onclick="acceptRequest(this)" class="inline-flex ml-2 mb-2 items-center px-4 py-2 text-sm font-medium text-gray-900 bg-emerald-200 mt-3  rounded focus:z-10 hover:shadow">
                                <svg class="w-4 h-4 me-2.5 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm13.7-1.3a1 1 0 0 0-1.4-1.4L11 12.6l-1.8-1.8a1 1 0 0 0-1.4 1.4l2.5 2.5c.4.4 1 .4 1.4 0l4-4Z" clip-rule="evenodd"/>
  </svg>
  accept request
                            </button>
                            <button data-id="<?= $req['id'] ?>" data-reference="<?= $req['reference'] ?>" data-hname="<?= $req['name'].', '.$req['city'] ?>" onclick="rejectRequest(this)" class="inline-flex ml-2 mb-2 items-center px-4 py-2 text-sm font-medium text-gray-900 bg-red-200 mt-3  rounded focus:z-10 hover:shadow">
                                <svg class="w-4 h-4 me-2.5 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z" clip-rule="evenodd"/>
                                </svg>reject request
                            </button>
                        </div>
                    </div>                
                </li>
            <?php elseif($req['status'] == REQUEST_CANCELLED || $req['status'] == REQUEST_REJECTED): ?>
                <li class="mb-10 ms-6" data-status="<?= $req['status'] ?>" data-reference="<?= $req['reference'] ?>" data-hname="<?= $req['name'] ?>">            
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
                                <p class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500 pt-3">Requested by <a class="text-gray-500 p-1 underline rounded" href="<?= base_url('admin/hospitalverification/?search='.$req['regnumber']) ?>"><?= $req['name'].', '.$req['city'] ?></a></p>
                                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Requested on <?= date("F jS\, Y", substr($req['request_datetime'], 0, -3)) ?></time>
                                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500"><?= $req['status'].' on '.date("F jS\, Y", substr($req['responsed_datetime'], 0, -3)) ?></time>
                            </div>
                            <button class="h-[94px] w-[94px] group hover:bg-black/5 rounded-lg flex items-center self-start justify-center button-dropdown" data-target="chart-wrapper-<?= $counter ?>">
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
                <li class="mb-10 ms-6" data-status="<?= $req['status'] ?>" data-reference="<?= $req['reference'] ?>" data-hname="<?= $req['name'] ?>">            
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
                                <p class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500 pt-3">Requested by <a class="text-gray-500 p-1 underline rounded" href="<?= base_url('admin/hospitalverification/?search='.$req['regnumber']) ?>"><?= $req['name'].', '.$req['city'] ?></a></p>
                                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Requested on <?= date("F jS\, Y", substr($req['request_datetime'], 0, -3)) ?></time>
                                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Accepted on <?= date("F jS\, Y", substr($req['responsed_datetime'], 0, -3)) ?></time>
                            </div>
                            <button class="h-[94px] w-[94px] group hover:bg-black/5 rounded-lg flex items-center self-start justify-center button-dropdown" data-target="chart-wrapper-<?= $counter ?>">
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
<!-- reject camp Modal -->
<div id="rejectModal" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-9000">
                    Reject request for blood
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="revokeModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('admin/requests/reject') ?>" method="post">
                
                <input type="hidden" name="id" id="reject-requestid">
                <div class="relative flex sm:col-span-2 gap-3  rounded">

                    <div class="flex flex-col gap-2">
                        <p class="text-sm px-2 font-semibold text-gray-600 " id="reject-reference"></p>
                        <p class="w-fit text-xs px-2 font-semibold text-gray-500">by <span id="reject-hospitalname"></span></p>       
                    </div>
                </div>

                <label class="block mt-4 mb-2 text-sm font-medium text-gray-900 ">Message</label>
                <input type="text" name="message" id="reject-message" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="reason for rejecting" required>
                    
                <div class="h-4"></div>
                <button type="submit" class="cursor-pointer text-md  font-semibold px-2 mt-3 hover:shadow-lg text-gray-700 py-2 gap-1 flex items-center justify-center bg-rose-200 max-w-xl rounded">
                    <svg class="w-4 h-4 text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <p class="mb-1 ml-1">reject</p>
                </button>
            </form>
        </div>
    </div>
</div>

<div id="acceptModal" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-9000">
                    Accept request for blood
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="revokeModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('admin/requests/accept') ?>" method="post">
                
                <input type="hidden" name="id" id="accept-requestid">
                <div class="relative flex sm:col-span-2 gap-3  rounded">

                    <div class="flex flex-col gap-2">
                        <p class="text-sm px-2 font-semibold text-gray-600 " id="accept-reference"></p>
                        <p class="w-fit text-xs px-2 font-semibold text-gray-500">by <span id="accept-hospitalname"></span></p>       
                    </div>
                </div>

                <label class="block mt-4 mb-2 text-sm font-medium text-gray-900 ">Message</label>
                <input type="text" name="message" id="accept-message" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="optional message detailing blood request fulfillment">
                    
                <div class="h-4"></div>
                <button type="submit" class="cursor-pointer text-md  font-semibold px-2 mt-3 hover:shadow-lg text-gray-700 py-2 gap-1 flex items-center justify-center bg-emerald-200 max-w-xl rounded">
                    <svg class="w-4 h-4 text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm13.7-1.3a1 1 0 0 0-1.4-1.4L11 12.6l-1.8-1.8a1 1 0 0 0-1.4 1.4l2.5 2.5c.4.4 1 .4 1.4 0l4-4Z" clip-rule="evenodd"/>
                    </svg>
  
                    <p class="mb-1 ml-1">accept</p>
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

        $('#select-sort').children('option[value="pending"]').attr('selected', 'selected');
        filterStatus($('#select-sort'));

        $('#rejectModal').on('click', function(e) {
            if (e.target !== this && e.target.id !== 'modalbg')
                return;
            
            hideModal();
        });

        $('#acceptModal').on('click', function(e) {
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

            loadChart(counter, data);
            counter++;
        })
    })

    function acceptRequest(e){
        var id = $(e).data('id');
        var name = $(e).data('hname');
        var ref = $(e).data('reference');

        $('#accept-requestid').val(id);
        $('#accept-hospitalname').text(name);
        $('#accept-reference').text(ref);
        showModal('acceptModal');
    }

    function rejectRequest(e){
        var id = $(e).data('id');
        var name = $(e).data('hname');
        var ref = $(e).data('reference');

        $('#reject-requestid').val(id);
        $('#reject-hospitalname').text(name);
        $('#reject-reference').text(ref);
        showModal('rejectModal');
    }

    function filter(e){
        var search = $(e).val().toLowerCase();

        $('#request-list').children().toArray().forEach(req => {
            var name = $(req).data('hname').toLowerCase();
            var mem = $(req).data('reference').toLowerCase();
            if(name.includes(search) || mem.includes(search)){
                $(req).removeClass('hidden');
            }else{
                $(req).addClass('hidden');
            }

        });
    }

    function filterStatus(e){
        var search = $(e).val();
        $('#search-input').val('');

        $('#request-list').children().toArray().forEach(req => {
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

        $('#' + modal).removeClass('hidden');
        $('#modal-shadow').removeClass('hidden');
        $('#modal-shadow').data('target', modal);
        scrollTo(0, 0);
    }
    
    function hideModal(){
        $('#' + $('#modal-shadow').data('target')).addClass('hidden');
        $('#modal-shadow').addClass('hidden');
    }

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