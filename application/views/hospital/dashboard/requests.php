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
        <button class="p-3 flex items-center text-white text-sm font-semibold rounded bg-red-950">
            <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"></path>
            </svg><p>new request</p>
        </button>

        <select name="" id="select-sort" class="bg-gray-50 rounded-lg border-gray-300 outline-none z-10">
            <option value="all">all requests</option>
            <option value="pending">pending</option>
            <option value="accepted">accepted</option>
            <option value="rejected">rejected</option>
        </select>
    </div>

    <div class="body-container mt-11">
        
        <ol class="relative border-s border-gray-300 dark:border-gray-700">                  
            <li class="mb-10 ms-6">            
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
                                <p class="reference text-md font-bold text-gray-600">RQ45SD4</p>
                                <p class="priority-level text-sm font-bold text-red-950 rounded p-1 px-2 bg-red-200">urgent !</p>
                            </span>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Requested on December 2nd, 2021</time>
                        </div>
                        <button class="h-[94px] w-[94px] group hover:bg-black/5 rounded-lg flex items-center justify-center button-dropdown pending" data-target="chart-wrapper-1">
                            <svg class="w-5 h-5 text-gray-500 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"></path>
                            </svg>
                        </button>
                    </div>
                    <div id="chart-wrapper-1" class="hidden pt-3 sm:p-3 flex gap-4 sm:flex-row flex-col">
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
                                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="p-2 pl-3 whitespace-nowrap dark:text-white">
                                            O<sub>plus</sub>
                                        </th>
                                        <td class="px-6">
                                            2100
                                        </td>
                                    </tr>
                                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="p-2 pl-3 whitespace-nowrap dark:text-white">
                                            O<sub>negative</sub>
                                        </th>
                                        <td class="px-6 ">
                                            1200
                                        </td>
                                    </tr>
                                    <tr class=" dark:bg-gray-800">
                                        <th scope="row" class="p-2 pl-3 whitespace-nowrap dark:text-white">
                                            A<sub>negative</sub>
                                        </th>
                                        <td class="px-6">
                                            3000
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="column-chart" class="w-fit"></div>
                    </div>

                    <a href="#" class="inline-flex ml-2 mb-2 items-center px-4 py-2 text-sm font-medium text-gray-900 bg-red-200 mt-3  rounded focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                        <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z" clip-rule="evenodd"/>
                        </svg>cancel request
                    </a>
                </div>

                
            </li>
            <li class="mb-10 ms-6">            
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
                                <p class="reference text-md font-bold text-gray-600">RQ45SD4</p>
                            </span>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Requested on December 2nd, 2021</time>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Accepted on December 2nd, 2021</time>
                        </div>
                        <button class="h-[94px] w-[94px] group hover:bg-black/5 rounded-lg flex items-center justify-center button-dropdown" data-target="chart-wrapper-2">
                            <svg class="w-5 h-5 text-gray-500 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"></path>
                            </svg>
                        </button>
                    </div>
                    <div id="chart-wrapper-2" class="hidden pt-3 sm:p-3 flex gap-4 sm:flex-row flex-col">
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
                                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="p-2 pl-3 whitespace-nowrap dark:text-white">
                                            O<sub>plus</sub>
                                        </th>
                                        <td class="px-6">
                                            2100
                                        </td>
                                    </tr>
                                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="p-2 pl-3 whitespace-nowrap dark:text-white">
                                            O<sub>negative</sub>
                                        </th>
                                        <td class="px-6 ">
                                            1200
                                        </td>
                                    </tr>
                                    <tr class=" dark:bg-gray-800">
                                        <th scope="row" class="p-2 pl-3 whitespace-nowrap dark:text-white">
                                            A<sub>negative</sub>
                                        </th>
                                        <td class="px-6">
                                            3000
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="column-chart" class="w-fit"></div>
                    </div>
                </div>

                
            </li>
        </ol>


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
    })

    window.addEventListener("load", function() {
    const options = {
          colors: ["#1A56DB"],
          series: [
            {
              color: "#1A56DB",
              data: [
                { x: "O+", y: 231 },
                { x: "O-", y: 122 },
                { x: "A+", y: 63 },
                { x: "A-", y: 421 },
                { x: "AB+", y: 122 },
                { x: "B+", y: 323 },
                { x: "B-", y: 111 },
              ],
              
            }
          ],
          
          chart: {
            type: "bar",
            height: "200px",
            fontFamily: "Inter, sans-serif",
            toolbar: {
              show: false,
            },
            width: "250px"
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: "30%",
              borderRadiusApplication: "end",
              borderRadius: 5,
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

        if(document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
          const chart = new ApexCharts(document.getElementById("column-chart"), options);
          chart.render();
        }
  });
</script>