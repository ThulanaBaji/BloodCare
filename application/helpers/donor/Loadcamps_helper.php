<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('loadCamps')) {
    function loadCamps($camps)
    {
        foreach ($camps as $row) {
            $location = $row['location_city'] . ', ' . $row['location_district'];
            $date = date("F j\, Y", substr($row['start_datetime'], 0, -3));
            $time = date('H:i', substr($row['start_datetime'], 0, -3)).' - '.
                    date('H:i', substr((int)$row['start_datetime'] + (int)$row['duration'], 0, -3)).' in '.
                    date('j F', substr((int)$row['start_datetime'] + (int)$row['duration'], 0, -3));
            $with = $row['hname'] . ', ' . $row['hcity'];
            $count = $row['cur_seats'] . '/' . $row['max_seats'];
            $url = base_url('uploads/camp/profileimages/'.$row['profile']);

            $id = $row['id'];
            $name = $row['name'];
            $profile = $row['profile'];
            $organizer = $row['organizer'];
            $pin = $row['location_pin'];
            $district = $row['location_district'];
            $city = $row['location_city'];
            $address = $row['location_address'];
            $datetime = $row['start_datetime'];
            $duration = $row['duration'];
            $maxseats = $row['max_seats'];
            $curseats = $row['cur_seats'];

            $socialmediamessage = rawurlencode('Reserve your seat in ' . $name . ' TODAY !') . '%0A%0A';
            $socialmediamessage .= rawurlencode('📅 '.$date).'%0A'.rawurlencode('📌 '.$address).'%0A'.rawurlencode('🕑 '.$time).'%0A%0A';
            $socialmediamessage .= rawurlencode('organized by ' . $organizer) . '%0A';
            $socialmediamessage .= rawurlencode('in collaboration with ' . $with) . '%0A%0A';
            $socialmediamessage .= rawurlencode('visit: '.base_url('view/camp/'.$id));
            $viewurl = base_url('view/camp/' . $id);

            $row['status'] = $maxseats == $curseats ? CAMP_FILLED : $row['status'];

            $border = $row['status'] == CAMP_FILLED ? 'border-green-400' : '';
            $label = $row['status'] == CAMP_FILLED ?
                '<div class="flex items-center gap-2 absolute right-0 top-0 px-3 py-1 text-gray-700 text-sm font-semibold bg-green-400 rounded-se-md rounded-es-md">
                <svg class="w-3 h-3 inline text-gray-700 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>'.$maxseats.' filled</div>'
                :
                '<div class="flex items-center gap-2 absolute right-0 top-0 px-3 py-1 text-gray-700 text-sm font-semibold bg-green-400 rounded-se-md rounded-es-md">
                <svg class="w-3 h-3 inline text-gray-700 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>'.$count.'</div>';
            $footer = $row['status'] == CAMP_FILLED ?
                '<div class="pb-2"></div>'
                :
                '<div class="flex gap-1 pb-2 flex-wrap justify-end py-1 pt-4">
                    
                    <button onclick="shareCamp(this)" data-id='.$id.' class="w-20 cursor-pointer text-md font-semibold p-2 text-gray-500 hover:text-gray-800 gap-1 flex items-center justify-center hover:bg-gray-200 max-w-xl rounded">
                        share
                    </button>

                    <button onclick="joinCamp(this)" data-id='.$id.' class="w-20 cursor-pointer text-md font-semibold p-2 text-gray-500 hover:text-gray-800 gap-1 flex items-center justify-center hover:bg-gray-200 max-w-xl rounded">
                        join
                    </button>
                </div>';

            echo <<<BC

            <div class="p-1 pl-4 mb-3 rounded-xl border $border max-w-xl bg-gray-50 relative camp">
            <span class="hidden dataset" data-profile="$profile"
            data-name="$name" data-organizer="$organizer" data-socialmsg="$socialmediamessage" data-view="$viewurl"
            data-address="$address" data-city="$city" data-district="$district" data-pin="$pin" 
            data-datetime="$datetime" data-duration="$duration" data-maxseats="$maxseats"></span>
            
            $label

            <div class="flex items-center justify-between w-full">
                <div class="flex items-center gap-6">
                    <div class="hidden sm:flex w-16 h-16 border items-center justify-center rounded-full overflow-hidden">
                        <img src="$url" alt="">
                    </div>
                    <div class="flex flex-col text-left text-gray-500 font-semibold gap-3 sm:gap-2">
                        <p class="text-lg sm:text-lg leading-tight">$name</p>
                        <p class="text-xs uppercase flex items-center gap-2 sm:gap-1">
                            <svg class="w-4 h-4 inline-block text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"></path>
                            </svg>$location</p>
                        <p class="text-xs uppercase flex items-center gap-3 sm:gap-2">
                            <svg class="w-3 h-3 inline-block text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"/>
                            </svg>$date</p>
                    </div>
                </div>
                <button class="h-[114px] w-[114px] group hover:bg-gray-100 rounded-lg flex items-center justify-center button-dropdown" data-target="camp-panel-$id">
                    <svg class="w-6 h-6 text-gray-400 transition-all" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"></path>
                    </svg>
                </button> 
            </div>
            <div class="py-1 flex justify-center hidden" id="camp-panel-$id">
                <div class="w-full pt-4 pr-3">
                    <div class="bg-gray-100 p-3 rounded-lg">
                        <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3">
                            <div class="text-gray-500 font-semibold sm:font-bold text-sm rounded w-20 sm:p-1 sm:px-2">Time</div>
                            <div class="text-gray-500 sm:font-semibold text-sm">$time</div>
                        </div>
                        <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 mt-3">
                            <div class="text-gray-500 font-semibold sm:font-bold text-sm rounded w-20 sm:p-1 sm:px-2">Location</div>
                            <div class="text-gray-500 sm:font-semibold text-sm underline">
                                <a href="$pin"><u>$address</u>
                                <svg class="w-3 h-3 inline-block ml-1 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                                </svg></a>
                            </div>
                        </div>
                        <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 mt-3">
                            <div class="text-gray-500 font-semibold sm:font-bold text-sm rounded w-20 sm:p-1 sm:px-2">Organizer</div>
                            <div class="text-gray-500 sm:font-semibold text-sm">
                                $organizer
                            </div>
                        </div>
                        <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 mt-3">
                            <div class="text-gray-500 font-semibold sm:font-bold text-sm rounded w-20 sm:p-1 sm:px-2">With</div>
                            <div class="camp-details-organizer text-gray-500 sm:font-semibold text-sm">
                                $with
                            </div>
                        </div>
                    </div>
                    $footer
                </div>
            </div>
        </div>
BC;
        }
    }
}