<div class="sm:p-3 pt-6 md:p-6 flex flex-col h-full relative">
    <div class="absolute z-10 shadow top-10 left-1/2 -translate-x-1/2 max-w-xs">
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

<div class="max-w-xs w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6 relative xl:fixed xl:top-10 xl:right-10">
  <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
    <div class="flex items-center">
      <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-950" viewBox="0 0 512 512">
                                <g>
                                    <g>
                                        <path d="M270.889,7.072c-7.683-9.435-22.104-9.425-29.778,0C188.88,71.214,66.464,237.176,66.464,322.464
                                            C66.464,426.974,151.49,512,256,512s189.537-85.026,189.537-189.537C445.537,237.147,322.549,70.511,270.889,7.072z
                                            M146.169,341.651c-10.6-0.008-19.187-8.589-19.187-19.187c0-6.528,1.773-21.674,13.646-49.772
                                            c4.127-9.768,15.391-14.34,25.159-10.213c9.768,4.128,14.34,15.391,10.213,25.159c-10.483,24.81-10.618,34.728-10.618,34.825
                                            c-0.014,10.595-8.607,19.187-19.2,19.187C146.176,341.651,146.172,341.651,146.169,341.651z M256,451.483
                                            c-41.992,0-81.504-20.595-105.694-55.092c-6.088-8.682-3.986-20.657,4.696-26.745s20.656-3.985,26.743,4.696
                                            c17.01,24.258,44.768,38.74,74.254,38.74c10.604,0,19.2,8.597,19.2,19.2C275.2,442.886,266.604,451.483,256,451.483z" fill="currentColor"></path>
                                    </g>
                                </g>
                            </svg>
      </div>
      <div>
        <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1"><?= $total > 1000 ? strval($total/1000).'k' : $total ?> (ml)</h5>
        <p class="text-sm font-normal red-200 text-gray-500 dark:text-gray-400">Present blood storage</p>
      </div>
      <button onclick="showModal('adjustLevel')" class="p-2 hover:bg-gray-200 absolute top-2 right-2 text-gray-900 rounded flex items-center justify-center">
        <svg class="w-5 h-5 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13v-2a1 1 0 0 0-1-1h-.8l-.7-1.7.6-.5a1 1 0 0 0 0-1.5L17.7 5a1 1 0 0 0-1.5 0l-.5.6-1.7-.7V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.8l-1.7.7-.5-.6a1 1 0 0 0-1.5 0L5 6.3a1 1 0 0 0 0 1.5l.6.5-.7 1.7H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.8l.7 1.7-.6.5a1 1 0 0 0 0 1.5L6.3 19a1 1 0 0 0 1.5 0l.5-.6 1.7.7v.8a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.8l1.7-.7.5.6a1 1 0 0 0 1.5 0l1.4-1.4a1 1 0 0 0 0-1.5l-.6-.5.7-1.7h.8a1 1 0 0 0 1-1Z"/>
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
        </svg>
      </button>
    </div>
  </div>

  <div id="column-chart"></div>
</div>

    <div class="flex w-full max-w-sm sm:max-w-3xl mt-11 xl:mt-0 justify-between gap-1 flex-wrap">
        <div class="flex gap-2 flex-wrap">
            <button onclick="showModal('newInflow')" class="p-2 inline-flex pr-3 items-center rounded bg-red-950 hover:shadow text-white text-sm">
                <svg class="w-5 h-5 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19V5m0 14-4-4m4 4 4-4"/>
                </svg>new inflow
            </button>
            <button onclick="showModal('newOutflow')" class="p-2 inline-flex pr-3 items-center rounded bg-red-950 hover:shadow text-white text-sm">
                <svg class="w-5 h-5 mr-1 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19V5m0 14-4-4m4 4 4-4"/>
                </svg>new outflow
            </button>
        </div>  

        <div>
            <select name="" onchange="filterStatus(this)" id="select-sort" class="bg-gray-50 rounded-lg text-sm border-gray-300 outline-none z-10">
                <option value="all">all transactions</option>
                <option value="inflow">inflow</option>
                <option value="outflow">outflow</option>
            </select>
        </div>
        
        <div class="relative max-w-xs w-full">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input onkeyup="filter(this)" type="text" id="search-input" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for reference">
        </div>

        <div class="body-container mt-11 max-w-lg w-full">
        
        <ol class="relative dark:border-gray-700" id="transaction-list"> 
            <?php $counter = 0; foreach($transactions as $t): $counter++; ?>                 
                <li class="mb-4" data-type="<?= $t['type'] ?>" data-reference="<?= $t['reference'] ?>">            
                    <div class="transaction-details p-1 border bg-gray-50 w-full max-w-xl rounded-lg">
                        <div class="flex justify-between items-center">
                            <div class="p-2">
                                <span class="flex gap-3 items-center mb-3">
                                    <p class="reference text-md font-bold text-gray-600"><?= $t['reference'] ?></p>
                                    <p class="priority-level text-sm font-bold text-red-950 rounded p-1 px-2 bg-red-200"><?= $t['type'] ?></p>
                                </span>
                                <p class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500 pt-3">Keyed by <a class="text-gray-500 p-1 underline rounded" href="mailto:<?= $email ?>"><?= $name ?></a></p>
                                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Occurred on <?= date("F j\, Y", strtotime($t['create_time'])) ?></time>
                            
                            </div>
                            <button class="h-[94px] w-[94px] group hover:bg-black/5 rounded-lg flex items-center self-start justify-center button-dropdown pending" data-target="chart-wrapper-<?= $counter ?>">
                                <svg class="w-5 h-5 text-gray-500 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"></path>
                                </svg>
                            </button>
                        </div>
                        <div id="chart-wrapper-<?= $counter ?>" class="pt-3 hidden sm:p-3 flex gap-4 sm:flex-row flex-col">
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
                                        <?php $bloods = json_decode($t['tran_bloods']); 
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
                            <div id="tcolumn-chart-<?= $counter ?>" class="tcolumn-chart w-fit" data-json="<?= str_replace('"', '~', $t['tran_bloods']) ?>"></div>
                        </div>


                        <span class="inline-flex p-3 items-baseline text-lg font-semibold text-gray-500"><?= $t['tran_total'] > 1000 ? strval($t['tran_total']/1000).'k' : $t['tran_total'] ?><span class="text-sm text-gray-500 ml-1 font-normal">total blood <?= $t['type'] ?></span></span>
                    </div>                
                </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>

<div class="fixed top-0 left-0 h-screen w-full bg-black/10 z-40 hidden" id="modal-shadow" onclick="hideModal()" data-target=""></div>
<div id="adjustLevel" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-9000" id="cancel-campname">
                    Adjust blood level
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('admin/inventory/adjust') ?>" method="post">
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <input type="hidden" value="adjust" name="token">
                <span class="sm:col-span-2 text-gray-500 text-sm">warnings on blood running low and overstocking are determined by the following desired blood levels <br> all the numeric values are in (ml)</span>

                <div class="flex">
                    <div>
                        <label class="block mb-2 mt-3 text-sm font-medium text-gray-900">A<sub>positive</sub></label>
                        <input min="0" type="number" name="ap" class="relative focus:z-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block mb-2 mt-3 text-sm font-medium text-gray-900 ">A<sub>negative</sub></label>
                        <input min="0" type="number" name="an" class="relative focus:z-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                </div>

                <div class="flex">
                    <div>
                        <label class="block mb-2 mt-3 text-sm font-medium text-gray-900 ">B<sub>positive</sub></label>
                        <input min="0" type="number" name="bp" class="relative focus:z-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block mb-2 mt-3 text-sm font-medium text-gray-900 ">B<sub>negative</sub></label>
                        <input min="0" type="number" name="bn" class="relative focus:z-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                </div>

                <div class="flex">
                    <div>
                        <label class="block mb-2 mt-3 text-sm font-medium text-gray-900 ">AB<sub>positive</sub></label>
                        <input min="0" type="number" name="abp" class="relative focus:z-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block mb-2 mt-3 text-sm font-medium text-gray-900 ">AB<sub>negative</sub></label>
                        <input min="0" type="number" name="abn" class="relative focus:z-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                </div>

                <div class="flex">
                    <div>
                        <label class="block mb-2 mt-3 text-sm font-medium text-gray-900 ">O<sub>positive</sub></label>
                        <input min="0" type="number" name="op" class="relative focus:z-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block mb-2 mt-3 text-sm font-medium text-gray-900 ">O<sub>negative</sub></label>
                        <input min="0" type="number" name="on" class="relative focus:z-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                </div>
            </div>
                <div class="h-4"></div>
                <button type="submit" class="cursor-pointer text-md hover:shadow-md font-semibold px-2 mt-3 text-white py-2 gap-1 flex items-center justify-center bg-red-950 max-w-xl rounded">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 20V7m0 13-4-4m4 4 4-4m4-12v13m0-13 4 4m-4-4-4 4"/>
  </svg>
                    <p class="mb-1 ml-1">readjust the level</p>
                </button>
                
            </form>
        </div>
    </div>
</div>
<div id="newInflow" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-9000" id="cancel-campname">
                    Blood inflow
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('admin/inventory/bloodinflow') ?>" method="post">
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <input type="hidden" id="refinput" class="inflow" value="" name="reference">

                <span class="text-lg font-semibold text-gray-500 sm:col-span-2 inline-flex gap-2 items-center">
                    <span id="refnum" class="inflow"></span>
                </span>

                <div class="sm:col-span-2 ">
                    <div class="flex w-full mt-2 max-w-sm justify-between">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Inflow <p class="text-xs font-normal text-gray-500">(add blood type and the received volume)</p></label>
                        <button type="button" data-target="inflow" onclick="addBlood(this)" id="addame" class="inflow disabled:bg-gray-300 p-2 rounded bg-red-950 text-white mr-3 mb-2 flex items-center">
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
                    <tbody id="bloods-body" class="inflow">
                        
                    </tbody>
                </table>
                <div id="bar-chart-inflow" class="max-w-sm w-full"></div>
                </div>

            </div>
                <div class="h-4"></div>
                <button type="submit" class="cursor-pointer text-md hover:shadow-md font-semibold px-2 mt-3 text-white py-2 gap-1 flex items-center justify-center bg-red-950 max-w-xl rounded">
                    <svg class="w-4 h-4 rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 2c.4 0 .8.3 1 .6l7 18a1 1 0 0 1-1.4 1.3L13 19.5V13a1 1 0 1 0-2 0v6.5L5.4 22A1 1 0 0 1 4 20.6l7-18a1 1 0 0 1 1-.6Z" clip-rule="evenodd"/>
                    </svg>
                    <p class="mb-1 ml-1">confirm the inflow</p>
                </button>
                
            </form>
        </div>
    </div>
</div>
<div id="newOutflow" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-9000" id="cancel-campname">
                    Blood outflow
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('admin/inventory/bloodoutflow') ?>" method="post">
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <input type="hidden" id="refinput" class="outflow" value="" name="reference">
                <span class="text-lg font-semibold text-gray-500 sm:col-span-2 inline-flex gap-2 items-center">
                    <span id="refnum" class="outflow"></span>
                </span>

                <div class="sm:col-span-2 ">
                    <div class="flex w-full mt-2 max-w-sm justify-between">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Outflow <p class="text-xs font-normal text-gray-500">(add blood type and the released volume)</p></label>
                        <button type="button" data-target="outflow" onclick="addBlood(this)" id="addame" class="outflow disabled:bg-gray-300 p-2 rounded bg-red-950 text-white mr-3 mb-2 flex items-center">
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
                    <tbody id="bloods-body" class="outflow">
                        
                    </tbody>
                </table>

                <div id="bar-chart-outflow"></div>

                </div>

            </div>
                <div class="h-4"></div>
                <button type="submit" class="cursor-pointer text-md hover:shadow-md font-semibold px-2 mt-3 text-white py-2 gap-1 flex items-center justify-center bg-red-950 max-w-xl rounded">
                    <svg class="w-4 h-4 rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 2c.4 0 .8.3 1 .6l7 18a1 1 0 0 1-1.4 1.3L13 19.5V13a1 1 0 1 0-2 0v6.5L5.4 22A1 1 0 0 1 4 20.6l7-18a1 1 0 0 1 1-.6Z" clip-rule="evenodd"/>
                    </svg>
                    <p class="mb-1 ml-1">confirm the outflow</p>
                </button>
                
            </form>
        </div>
    </div>
</div>

</div>

<script>
    var bloods = <?= json_encode($bloods) ?>;

    var desiredbloods = <?= $desired ?>;

    $(document).ready(function(){
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

        $('#newInflow').on('click', function(e) {
            if (e.target !== this && e.target.id !== 'modalbg')
                return;
            
            hideModal();
        });

        $('#newOutflow').on('click', function(e) {
            if (e.target !== this && e.target.id !== 'modalbg')
                return;
            
            hideModal();
        });

        $('#adjustLevel').on('click', function(e) {
            if (e.target !== this && e.target.id !== 'modalbg')
                return;
            
            hideModal();
        });

        const series = [{
              name: "Positive",
              color: "rgb(251, 213, 213)",
              data: '',
            },
            {
              name: "Negative",
              color: "rgb(253, 164, 175)",
              data: '',
            }];
        const pdata = [];
        const ndata = [];

        Object.keys(bloods).forEach(key => {
            var group = key.slice(0, -1).toUpperCase() + ' group';

            console.log($("#modalbg > div > form > div.grid.gap-4.mb-4.sm\\:grid-cols-2 div div input[name='" + key + "']").val(desiredbloods[key]));

            var type = key[key.length - 1];
            if(type == 'n') ndata.push({
                x: group,
                y: bloods[key],
                goals: [{
                    name: 'Desired',
                    value: desiredbloods[key],
                    strokeHeight: 4,
                    strokeColor: 'rgb(227, 52, 78)'
                }]
            });
            else if(type == 'p') pdata.push({
                x: group,
                y: bloods[key],
                goals: [{
                    name: 'Desired',
                    value: desiredbloods[key],
                    strokeHeight: 4,
                    strokeColor: 'rgb(227, 52, 78)'
                }]
            });
        });

        series[0]['data'] = pdata;
        series[1]['data'] = ndata;

        loadChart('column-chart', ["rgb(251, 213, 213)", "rgb(253, 164, 175)"], series);

        var counter = 1;

        $('.tcolumn-chart').each(function(){
            var jsonstr = $(this).data('json').replaceAll('~', '"');
            console.log(jsonstr);
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

            loadTChart(counter, data);
            counter++;
        })
    })

    function filter(e){
        var search = $(e).val().toLowerCase();

        $('#transaction-list').children().toArray().forEach(t => {
            var ref = $(t).data('reference').toLowerCase();
            if(ref.includes(search)){
                $(t).removeClass('hidden');
            }else{
                $(t).addClass('hidden');
            }

        });
    }

    function filterStatus(e){
        var search = $(e).val();
        $('#search-input').val('');

        $('#transaction-list').children().toArray().forEach(t => {
            if(search == 'all') $(t).removeClass('hidden');
            else{
                var type = $(t).data('type').toLowerCase();
                if(type == search){
                    $(t).removeClass('hidden');
                }else{
                    $(t).addClass('hidden');
                }
            }
        });
    }

    function showModal(modal){

        if(modal == 'newInflow') {
            var reference = 'i' + randomID(8);
            reference = reference.toUpperCase();
            $('#refnum.inflow').text(reference)
            $('#refinput.inflow').val(reference);
        }
        if(modal == 'newOutflow') {
            var reference = 'o' + randomID(8);
            reference = reference.toUpperCase();
            $('#refnum.outflow').text(reference)
            $('#refinput.outflow').val(reference);
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

    function randomID(length) {
        return Math.random().toString(36).substring(2, length+2);
    };

    function addBlood(e){
        var bloods = ['op', 'on', 'ap', 'an', 'bp', 'bn', 'abp', 'abn'];
        var target = $(e).data('target');

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

        $('#bloods-body.' + target + ' tr th input.bloodtype').each(function() {
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
        var row = $('<tr><td>'+ selectElem +'</td><td><input onkeypress="key(this)" id="new-bloodvol" type="text" class="border bg-white rounded mt-3 p-2 w-24"></td><td><button onclick="confirmItem(this)" data-target="' + target + '" class="inline-flex items-center p-2 text-sm font-medium text-center hover:text-green-800 hover:bg-gray-100 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button"><svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12 4.7 4.5 9.3-9"/></svg></button></td></tr>'); //create row

        $('#bloods-body.' + target).append(row);
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

        var target = $(e).data('target');
        
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

        var row = $('<tr class="border-b dark:border-gray-700"><th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">'+ bloodshtml[$('#new-bloodtype').val()] +'<input type="hidden" class="bloodtype" value="'+ $('#new-bloodtype').val()  +'"></th><td class="px-4 py-3">'+ $('#new-bloodvol').val() +'<input type="hidden" name="bloods['+ $('#new-bloodtype').val() +']" value="'+ $('#new-bloodvol').val() +'"></td><td class="py-2 flex items-center"><button onclick="delItem(this)" data-target="' + target + '" class="inline-flex items-center p-2 text-sm font-medium text-center hover:text-rose-800 hover:bg-gray-100 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button"><svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M8.6 2.6A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4c0-.5.2-1 .6-1.4ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/></svg></button></td></tr>');
        $($(e).parents('tr')).remove();
        $('#bloods-body.' + target).append(row);

        $('#addame.' + target).removeAttr('disabled');
    }

    function delItem(e){
        $($(e).parents('tr')).remove();
    }

    function key(e){
        $(e).removeClass('border-red-500');
    }

    function loadChart (chartid, colors, series) {
        const options = {
          colors: colors,
          series: series,
          chart: {
            type: "bar",
            height: "320px",
            fontFamily: "Inter, sans-serif",
            toolbar: {
              show: false,
            },
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: "70%",
              borderRadiusApplication: "end",
              borderRadius: 8,
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
              right: 2,
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
                cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
              }
            },
            axisBorder: {
              show: false,
            },
            axisTicks: {
              show: false,
            },
          },
          yaxis: {
            show: false,
          },
          fill: {
            opacity: 1,
          },
        }

        if(document.getElementById(chartid) && typeof ApexCharts !== 'undefined') {
          const chart = new ApexCharts(document.getElementById(chartid), options);
          chart.render();
        }
    }

    function loadTChart (chartid, data) {
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

        if(document.getElementById("tcolumn-chart-"+chartid) && typeof ApexCharts !== 'undefined') {
          const chart = new ApexCharts(document.getElementById("tcolumn-chart-"+chartid), options);
          chart.render();
        }
    }
</script>



<script src="<?= base_url('node_modules/apexcharts/dist/apexcharts.min.js') ?>"></script>