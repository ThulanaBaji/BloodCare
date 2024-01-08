<div class=" relative w-full sm:pr-6 h-full flex justify-center p-3 sm:pt-8 lg:pl-6 lg:justify-start">
    
    <div class="max-w-3xl divide-y" id="notifications-container">
        <?= loadNotifications($notifications) ?>
    </div>
    
    <div class="absolute <?= $totalncount == 0 ? '' : 'hidden' ?> banner left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 items-center text-center flex flex-col">
        <div class="text-lg font-semibold text-gray-500">YAAY your inbox is empty !</div>
        <div class="relative">
            <img src="<?= base_url('assets/images/holdingheartwitheyes.svg') ?>" alt="" srcset="">
            
        </div>
    </div>
</div>

<script>
    
    $(document).ready(function(){
        
        $('.notification').each(function(e){
            let n = $('.notification')[e];
            let b = $(n).children('button')[0];
            let id = $(b).data('id');
            
            if($(b).data('seen') == false){
                var xhttp = new XMLHttpRequest();
                xhttp.open('GET', 'notifications/seen?id=' + id);
                xhttp.send();
            }
        })
    })
    
    function delNotification(e){
        var id = $(e).data('id');

        if(id == null || id == '')
            return;

        var xhttp = new XMLHttpRequest();
        
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                $('#notifications-container').html(xhttp.responseText);

                if(xhttp.responseText == ''){
                    $('.banner').removeClass('hidden');
                }
            }
        }
        
        xhttp.open('GET', 'notifications/del?id=' + id);
        xhttp.send();
    }
</script>
