<div class="p-0 pt-6 md:p-6 h-full relative">
    <a href="<?= base_url('donor/appointment') ?>" class="mx-3 <?= count($appointments) > 0 ? '' : 'hidden' ?> cursor-pointer text-md font-semibold p-2 text-gray-500 gap-1 flex items-center justify-center bg-gray-200 sm:bg-transparent max-w-xl hover:bg-gray-200 rounded">
        <svg class="w-3 h-3 text-gray-500 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
        </svg>
        <p class="mb-1">make appointment</p>
        <svg class="w-4 h-4 text-gray-500 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
            <path d="M2 18V5.828a4.979 4.979 0 0 1 .332-1.761A.992.992 0 0 0 2 4a2 2 0 0 0-2 2v12a1.97 1.97 0 0 0 1.934 2h8.1a1.99 1.99 0 0 0 1.994-2H2ZM9 5V.13a2.98 2.98 0 0 0-1.293.749L4.879 3.707A2.98 2.98 0 0 0 4.13 5H9Z"/>
            <path d="M14.066 0H11v5a2 2 0 0 1-2 2H4v7a1.97 1.97 0 0 0 1.934 2h8.132A1.97 1.97 0 0 0 16 14V2a1.97 1.97 0 0 0-1.934-2Z"/>
        </svg>
    </a>
    <div class="p-5 pt-2 pr-3 pl-8 mb-4 border border-gray-100 rounded-lg max-w-xl">
        <ol class="mt-6 relative border-s border-gray-200 appointment-list">
            <?php loadOngoingAppointments($appointments) ?>
        </ol>
    </div>

    <div class="absolute <?= count($appointments) == 0 ? '' : 'hidden' ?> left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 items-center text-center flex flex-col">
        <div class="text-lg font-semibold text-gray-500">Make your blood donation appointment TODAY !</div>
        <div class="relative">
            <img src="<?= base_url('assets/images/holdingheartwitheyes.svg') ?>" alt="" srcset="">
            <img class="absolute top-0 left-0 z-20" src="<?= base_url('assets/images/holdinghearthandsonly.svg') ?>" alt="" srcset="">
        </div>
        <a href="<?= base_url('donor/appointment') ?>" class="transform -translate-y-11 w-52 shadow hover:shadow-md border border-gray-400 cursor-pointer text-md font-semibold p-2 text-gray-500 gap-1 flex items-center justify-center bg-gray-200 max-w-xl hover:bg-gray-200 rounded">
            <p class="mb-1">make one</p>
            <svg class="w-4 h-4 text-gray-500 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
            <path d="M2 18V5.828a4.979 4.979 0 0 1 .332-1.761A.992.992 0 0 0 2 4a2 2 0 0 0-2 2v12a1.97 1.97 0 0 0 1.934 2h8.1a1.99 1.99 0 0 0 1.994-2H2ZM9 5V.13a2.98 2.98 0 0 0-1.293.749L4.879 3.707A2.98 2.98 0 0 0 4.13 5H9Z"/>
            <path d="M14.066 0H11v5a2 2 0 0 1-2 2H4v7a1.97 1.97 0 0 0 1.934 2h8.132A1.97 1.97 0 0 0 16 14V2a1.97 1.97 0 0 0-1.934-2Z"/>
        </svg>
        </a>
    </div>
</div>

<script>
    function cancelAppointment(button){
        var id = $(button).data('id');
        var msg = $($(button).siblings('input')).val().trim();

        msg = msg == "" ? "<?= $name ?>" + ' cancelled the appointment' : msg;

        var xhttp = new XMLHttpRequest();
        
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
            $('.appointment-list').html(xhttp.responseText);
            }
        }
        
        xhttp.open('GET', 'cancelappointment?id=' + id + '&message=' + msg, true);
        xhttp.send();
    }
</script>