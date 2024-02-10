<div class="p-3 pt-6 md:p-6 h-full">
    

    <div class="body-container w-full pb-3">
        <div class="<?= $donationscount > 0 ? '' : 'hidden' ?> w-full h-fit stat-containter mb-4 sm:mb-6 flex justify-center items-center sticky top-0 z-20">
            <div class="stat-bar shadow bg-gray-50 rounded-md p-3 w-fit flex gap-3">
                <span class="text-xs font-semibold"><?= $donationscount ?> dontaion</span>
                <svg viewBox="0 0 10 10" class="w-[5px] h-[5px] my-auto fill-gray-500 inline-block flex-shrink-0" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="5" cy="5" r="5" />
                </svg>
                <span class="text-xs font-semibold"><?= $donationscount*500 ?> ml blood</span>
                <svg viewBox="0 0 10 10" class="w-[5px] h-[5px] my-auto fill-gray-500 inline-block flex-shrink-0" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="5" cy="5" r="5" />
                </svg>
                <span class="text-xs font-semibold"><?= $donationscount*3 ?> lives saved</span>
            </div>
        </div>
        
        <?= loadDonations($donations) ?>
    </div>
</div>