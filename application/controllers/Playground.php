<?php

class Playground{
    public function index(){
        $arr = explode(',', '0');
            foreach($arr as $appointment_id){
                echo $appointment_id;
            }
    }
}