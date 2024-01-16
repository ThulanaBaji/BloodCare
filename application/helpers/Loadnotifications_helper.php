<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('loadNotifications')) {
    function loadNotifications($notifications){
        foreach ($notifications as $n) {
            $image = base_url($n['image']);
            $msg = $n['message'];
            $sender = $n['sender'];
            $seen = $n['status'] == MSG_SEEN ? true : false;
            $isaction = ($n['action_name'] != NULL || $n['action_name'] != '') ? true : false;

            if($isaction){
                $action = base_url($n['action']);
                $action_name = $n['action_name'];
            }

            $id = $n['id'];
            $time = time_elapsed_string($n['time']);
            $action_color = 
                $n['type'] == MSG_WARNING ? 'bg-red-400' :
                ($n['type'] == MSG_INFO ? 'bg-blue-400' :
                    ($n['type'] == MSG_SUCCESS ? 'bg-green-400' : 'bg-amber-200'));

            $button = $isaction ? '<a href="'.$action.'" class="rounded '.$action_color.' py-1 flex items-center px-2 text-gray-800 text-xs font-semibold w-fit self-start">'.$action_name.'
                <svg class="w-3 h-3 inline ml-2 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 19">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.013 7.962a3.519 3.519 0 0 0-4.975 0l-3.554 3.554a3.518 3.518 0 0 0 4.975 4.975l.461-.46m-.461-4.515a3.518 3.518 0 0 0 4.975 0l3.553-3.554a3.518 3.518 0 0 0-4.974-4.975L10.3 3.7"/>
                </svg>    
            </a>' : '';

            $dot = $seen ? '' : '<svg viewBox="0 0 100 100" class="dot w-2 h-2 ml-auto flex-shrink-0 sm:mr-3 fill-green-400" xmlns="http://www.w3.org/2000/svg">
            <circle cx="50" cy="50" r="50" />
        </svg>';
            $seen = $seen ? 'true' : 'false';

            echo <<<BC
<div class="py-5 border-y group relative sm:pl-3 w-full hover:rounded hover:bg-gray-200 notification">
    <button onclick="delNotification(this)" data-seen="$seen" data-id="$id" class="p-1 hidden sm:group-hover:inline-flex bg-red-600 items-center justify-center rounded absolute top-2 right-2">
        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
            <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
        </svg>
    </button>
    <div class="flex gap-3 items-center">
        <div class="notification-image relative">
            <div class="w-11 h-11 sm:w-16 sm:h-16 border-2 flex items-center rounded-full overflow-hidden">
                <img src="$image" class="object-cover object-center w-16 md:w-20 lg:w-28">
            </div>
        </div>
        <div class="notification-preview flex flex-col gap-2 sm:mr-11">
            <div class="preview-text text-sm text-gray-500">
                $msg
            </div>
            <div class="preview-meta text-xs text-gray-500 flex items-center gap-2">
                $time
                <svg viewBox="0 0 100 100" class="w-1 h-1 fill-gray-500 inline" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="50" r="50" />
                </svg>
                $sender
            </div>
            
            <div class="flex gap-2">
            $button
            <button onclick="delNotification(this)" data-id="$id" class="p-1 inline-flex sm:hidden bg-red-600 items-center justify-center rounded">
                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
                </svg>
            </button>
            </div>
        </div>
        $dot
    </div>
</div>
BC;
        }
    }

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

}