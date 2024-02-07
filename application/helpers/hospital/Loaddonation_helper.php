<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function loadtodaycampcard($camps){

    $numcamps = count($camps);
    $numdonors = 0;
    $camplist = "";
    $counter = 0;

    foreach ($camps as $camp) {
        $counter++;
        $numdonors += intval($camp['registered']);
        $profile = $camp['profile'];
        $name = $camp['name'];
        $num = $camp['registered'];

        $addhidden = $counter > 2 ? 'extra-camp hidden' : '';


        $camplist .= '<div class="camp '.$addhidden.' flex justify-between items-center max-w-xs w-full py-2">
                <div class="flex items-center gap-2"><div class="flex w-8 h-8 border items-center justify-center rounded-full overflow-hidden">
                    <img src="'.base_url('uploads/camp/profileimages/'.$profile).'" alt="">
                </div>
                <p class="text-sm font-semibold text-gray-600">'.$name.'</p></div>
                <div class="self-end text-md text-gray-800 font-semibold rounded p-2 flex ">'.$num.'
                    <svg class="w-3 h-3 self-center ml-1 fill-gray-500" viewBox="0 0 14 18">
                        <path d="M7 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm2 1H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"></path>
                    </svg>
                </div>
            </div>';
    }

    $link = base_url('hospital/donation/todaycamps');
    $more = $numcamps > 2 ? '<button onclick="showAllCamps(this)" type="button" class="block bg-transparent hover:underline text-blue-500 text-xs">more camps</button>' : '';
    
    echo <<<BC
    <div class="block p-6 bg-white border max-w-sm w-full border-gray-200 rounded-lg shadow mb-6 sm:mb-0">
        <div class="info flex gap-2 items-center mb-6">
            <p class="text-3xl text-gray-600 font-bold">$numcamps</p>
            <svg class="w-4 h-4 self-baseline text-gray-500" viewBox="0 0 280 280" xmlns="http://www.w3.org/2000/svg">
                <g fill="currentColor">
                <path d="m36.071 242.42h56.215c2.066 0 4.073-0.683 5.711-1.942 25.672-19.74 41.615-56.115 50.503-83.33 8.889 27.215 24.832 63.59 50.503 83.33 1.638 1.26 3.645 1.942 5.711 1.942h56.215c5.174 0 9.369-4.195 9.369-9.369v-98.375c0-3.755-2.242-7.147-5.696-8.619-42.68-18.191-69.613-42.597-84.691-59.868-16.348-18.725-22.707-33.364-22.784-33.543-1.468-3.464-4.864-5.715-8.627-5.715-3.771 0-7.176 2.262-8.637 5.739-0.243 0.58-25.316 58.373-107.46 93.387-3.454 1.472-5.696 4.864-5.696 8.619v98.375c0 5.174 4.195 9.369 9.369 9.369z"></path>
                <path d="m287.63 251.33h-278.26c-5.174 0-9.369 4.195-9.369 9.369s4.195 9.369 9.369 9.369h278.26c5.174 0 9.369-4.195 9.369-9.369s-4.195-9.369-9.369-9.369z"></path>
                </g>    
            </svg>
            <svg viewBox="0 0 10 10" class="w-1 h-1 mx-2 fill-gray-400" xmlns="http://www.w3.org/2000/svg">
                <circle cx="5" cy="5" r="5"></circle>
            </svg>
            <p class="text-3xl text-gray-600 font-bold">$numdonors</p>
            <svg class="w-3 h-3 self-baseline fill-gray-500" viewBox="0 0 20 18">
                <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"></path>
            </svg>
        </div>

        <div class="divide-y w-full max-h-32 overflow-y-auto">
            $camplist
        </div>

        $more

        <a href="$link" class="inline-flex items-center px-3 py-2 mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            View camps
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"></path>
            </svg>
        </a>
    </div>
BC;
}

function loadtodayappointmentcard($appointments){
    $num = count($appointments);
    $appointmentlist = "";
    $counter = 0;

    foreach($appointments as $app){
        $counter++;
        $profile = base_url('uploads/donor/profileimages/'.$app['profile']);
        $name = $app['name'];
        $time = date('H:i', substr($app['starttime'], 0, -3));

        $addhidden = $counter > 2 ? 'extra-donor hidden' : '';

        $appointmentlist .= '<div class="appointment'.$addhidden.' flex justify-between items-center max-w-xs w-full py-2">
                    <div class="flex items-center gap-2"><div class="flex w-8 h-8 border items-center justify-center rounded-full overflow-hidden">
                        <img src="'.$profile.'" alt="">
                    </div>
                    <p class="text-sm font-semibold text-gray-600">'.$name.'</p></div>
                    <div class="self-end text-md text-gray-800 font-semibold rounded p-2 flex ">'.$time.'</div>
                </div>';
    }

    $link = base_url('hospital/donation/todayappointments');

    $more = $num > 2 ? '<button onclick="showAllAppointments(this)" type="button" class="block bg-transparent hover:underline text-blue-500 text-xs">more appointments</button>' : '';

    echo <<<BC
        <div class="block p-6 bg-white border max-w-sm w-full border-gray-200 mb-4 sm:mb-0 rounded-lg shadow">
            <div class="info flex gap-2 items-center mb-6">
                <p class="text-3xl text-gray-600 font-bold">$num</p>
                <svg class="w-4 h-4 self-baseline fill-gray-500" viewBox="0 0 18 20">
                    <path d="M5 9V4.13a2.96 2.96 0 0 0-1.293.749L.879 7.707A2.96 2.96 0 0 0 .13 9H5Zm11.066-9H9.829a2.98 2.98 0 0 0-2.122.879L7 1.584A.987.987 0 0 0 6.766 2h4.3A3.972 3.972 0 0 1 15 6v10h1.066A1.97 1.97 0 0 0 18 14V2a1.97 1.97 0 0 0-1.934-2Z"></path>
                    <path d="M11.066 4H7v5a2 2 0 0 1-2 2H0v7a1.969 1.969 0 0 0 1.933 2h9.133A1.97 1.97 0 0 0 13 18V6a1.97 1.97 0 0 0-1.934-2Z"></path>
                </svg>
            </div>

            <div class="divide-y w-full max-h-32 overflow-y-auto">
                
                $appointmentlist
                
            </div>

            $more

            <a href="$link" class="inline-flex items-center px-3 py-2 mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                View appointments
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                </svg>
            </a>
        </div>
BC;

}