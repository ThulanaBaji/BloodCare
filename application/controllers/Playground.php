<?php

class Playground{
    public function index(){
        echo strlen(md5(time())).'<br><br>';

        //dummy config
        $unavailable_days = array(1, 2, 3); //Mo, Tu, We 
        $unavailable_dates = array(1701973800000, 1702060200000); //08 DEC, 09 DEC
        $start = "10:00";
        $end = "20:00";
        $duration = "01:00"; //30mins
        $breaks = array(
            array("start" => "14:00", "end" => "15:00"),
            array("start" => "17:00", "end" => "19:00")
        );

        $startdate=strtotime("today");
        $startdate=strtotime("+3 day", $startdate);
        $enddate=strtotime("+2 month", $startdate);

        $duration = strtotime($duration);
        $duration = date('i', $duration) + date('H', $duration) * 60;

        $array = array();

        while ($startdate < $enddate) {
            
            if((!in_array(date('w', $startdate), $unavailable_days)) && (!in_array((date('U', $startdate) * 1000), $unavailable_dates))){

                $starttime = strtotime($start);
                $endtime = strtotime($end);
                $endtime = strtotime("-".$duration." mins", $endtime);

                while ($starttime <= $endtime) {

                    $endappointmenttime = strtotime("+".$duration." mins", $starttime);
                    $timeavailable = true;

                    foreach ($breaks as $breakperiod) {
                        $breakperiodstarttime = strtotime($breakperiod['start']);
                        $breakperiodendtime = strtotime($breakperiod['end']);

                        if(($starttime >= $breakperiodstarttime && $starttime < $breakperiodendtime) ||
                           ($endappointmenttime > $breakperiodstarttime && $endappointmenttime <= $breakperiodendtime)){
                            $starttime = $breakperiodendtime;
                            $starttime = strtotime("-".$duration." mins", $starttime);

                            $timeavailable = false;
                            break;
                        }
                    }

                    if($timeavailable){
                        array_push($array, ($startdate + ((date('i', $starttime) + date('H', $starttime) * 60)*60)));
                    }

                    $starttime = strtotime("+".$duration." mins", $starttime);
                }
            }
            
            $startdate = strtotime("+1 day", $startdate);
        }

        print_r($array);
    }
}