<div class="sm:p-3 pt-6 md:p-6 flex flex-col h-full relative ">
    <div class="absolute z-30 top-10 left-1/2 -translate-x-1/2 max-w-xs">
        <div class="mt-3 alert alert-success flex items-center p-2 px-3 text-sm text-green-800 rounded bg-green-200" style="display:none;">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
        </svg>
        <div id="alert-top-success-text"></div>
        </div>
        <div class="mt-3 alert alert-error flex items-center p-2 px-3 text-sm text-red-900 rounded bg-red-300" style="display:none;">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
        </svg>
        <div id="alert-top-error-text"></div>
        </div>
    </div>

    <div class="flex w-full max-w-sm sm:max-w-4xl justify-between gap-1">
        <div>
            <select name="" onchange="filterStatus(this)" id="select-sort" class="bg-gray-50 rounded-lg text-sm border-gray-300 outline-none z-10">
                <option value="all">all hospital</option>
                <option value="pending">pending</option>
                <option value="verified">verified</option>
                <option value="accepted">accepted</option>
                <option value="revoked">revoked</option>
            </select>
        </div>
        
        <div class="relative max-w-xs w-full">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input onkeyup="filter(this)" type="text" id="search-input" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for name or reference">
        </div>

        
    </div>

    <div class="mt-8 sm:mt-14 flex flex-col max-w-4xl w-full">
    <?php 
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
        }?>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Registration
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="hospital-list">
                    <?php foreach($hospitals as $h): ?>
                    <tr data-regnumber="<?= $h['regnumber'] ?>" data-status="<?= $h['status'] ?>" data-name="<?= $h['name'] ?>" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="rounded-full h-14 w-14 border hidden sm:flex overflow-hidden items-center justify-center">
                                <img class="object-center object-cover" src="<?= base_url('uploads/hospital/profileimages/'.$h['profile']) ?>" alt="Jese image">
                            </div>
                            <div class="ps-3">
                                <div class="text-base font-semibold"><?= $h['name'] ?></div>
                                <div class="font-normal text-gray-500"> <a href="mailto:<?= $h['email'] ?>" class="underline"><?= $h['email'] ?></a></div>
                            </div>  
                        </th>
                        <td class="px-6 py-4">
                            <?= $h['regnumber'] ?>
                        </td>
                        <td class="px-6 py-4 w-48">
                            <div class="flex flex-col text-xs">
                                <p><?= $h['street_address'] ?>,</p>
                                <p><?= $h['city'] ?>, <?= $h['district'] ?>,</p>
                                <p><?= $h['province'] ?>.</p>
                                <p><?= $h['zipcode'] ?></p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-start justify-center flex-col ">
                                <?php if($h['status'] == HOSPITAL_PENDING): ?>
                                    <div class="rounded-full px-2 py-1 bg-amber-300 text-xs font-semibold flex text-gray-700">
                                        <svg class="w-4 h-4 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4a1 1 0 1 0-2 0v4c0 .3.1.5.3.7l3 3a1 1 0 0 0 1.4-1.4L13 11.6V8Z" clip-rule="evenodd"/>
                                        </svg>pending
                                    </div>
                                    <p class="text-xs mt-2 ml-1"><?= time_elapsed_string(date("Y-m-d H:i:s", strtotime($h['create_time']))) ?></p>
                                <?php elseif($h['status'] == HOSPITAL_VERIFIED): ?>
                                    <div class="rounded-full px-2 py-1 bg-rose-300 text-xs font-semibold flex text-gray-700">
                                        <svg class="w-4 h-4 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12 4.7 4.5 9.3-9"/>
                                        </svg>verified
                                    </div>
                                    <p class="text-xs mt-2 ml-1"><?= time_elapsed_string(date("Y-m-d H:i:s", substr($h['responsed_datetime'], 0, -3))) ?></p>
                                <?php elseif($h['status'] == HOSPITAL_ACCEPTED): ?>
                                    <div class="rounded-full px-2 py-1 bg-emerald-300 text-xs font-semibold flex text-gray-700">
                                        <svg class="w-4 h-4 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M12 2a3 3 0 0 0-2.1.9l-.9.9a1 1 0 0 1-.7.3H7a3 3 0 0 0-3 3v1.2c0 .3 0 .5-.2.7l-1 .9a3 3 0 0 0 0 4.2l1 .9c.2.2.3.4.3.7V17a3 3 0 0 0 3 3h1.2c.3 0 .5 0 .7.2l.9 1a3 3 0 0 0 4.2 0l.9-1c.2-.2.4-.3.7-.3H17a3 3 0 0 0 3-3v-1.2c0-.3 0-.5.2-.7l1-.9a3 3 0 0 0 0-4.2l-1-.9a1 1 0 0 1-.3-.7V7a3 3 0 0 0-3-3h-1.2a1 1 0 0 1-.7-.2l-.9-1A3 3 0 0 0 12 2Zm3.7 7.7a1 1 0 1 0-1.4-1.4L10 12.6l-1.3-1.3a1 1 0 0 0-1.4 1.4l2 2c.4.4 1 .4 1.4 0l5-5Z" clip-rule="evenodd"/>
                                        </svg>accepted
                                    </div>
                                    <p class="text-xs mt-2 ml-1"><?= time_elapsed_string(date("Y-m-d H:i:s", substr($h['responsed_datetime'], 0, -3))) ?></p>
                                <?php elseif($h['status'] == HOSPITAL_REVOKED): ?>
                                    <div class="rounded-full px-2 py-1 bg-red-400 text-xs font-semibold flex text-gray-700">
                                        <svg class="w-4 h-4 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6m0 12L6 6"/>
                                        </svg>revoked
                                    </div>
                                    <p class="text-xs mt-2 ml-1"><?= time_elapsed_string(date("Y-m-d H:i:s", substr($h['responsed_datetime'], 0, -3))) ?></p>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 w-40">
                            <?php switch($h['status']){
                                case HOSPITAL_PENDING: ?>
                                    <a href="<?= base_url('admin/hospitalverification/sendVerification/'.$h['email']) ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Send verification</a>
                                <?php break; case HOSPITAL_VERIFIED: ?>
                                    <button onclick="accepthospital(this)" data-id="<?= $h['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Accept</button>
                                    <button onclick="showModal(this)" data-modal="revokeModal" data-profile="<?= $h['profile'] ?>" data-name="<?= $h['name'] ?>" data-regnumber="<?= $h['regnumber'] ?>" data-id="<?= $h['id'] ?>" class="font-medium ml-3 text-blue-600 dark:text-blue-500 hover:underline">Revoke</button>
                                <?php break; case HOSPITAL_ACCEPTED: ?>
                                    <button onclick="showModal(this)" data-modal="revokeModal" data-profile="<?= $h['profile'] ?>" data-name="<?= $h['name'] ?>" data-regnumber="<?= $h['regnumber'] ?>" data-id="<?= $h['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Revoke</button>
                                <?php break; case HOSPITAL_REVOKED: ?>
                                    <button onclick="accepthospital(this)" data-id="<?= $h['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Accept</button>
                                
                            <?php break; default : break; } ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<div class="fixed top-0 left-0 h-screen w-full bg-black/10 z-40 hidden" id="modal-shadow" onclick="hideModal()" data-target=""></div>
<!-- cancel camp Modal -->
<div id="revokeModal" tabindex="-1" aria-hidden="true" class="hidden flex overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto" id="modalbg">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-9000" id="cancel-campname">
                    Revoke partnership
                </h3>
                <button onclick="hideModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="revokeModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('admin/hospitalverification/revoke') ?>" method="post">
                
                <input type="hidden" name="id" id="revoke-hospitalid">
                <div class="relative flex sm:col-span-2 gap-3  rounded">
                    <div class="flex w-11 h-11 sm:w-14 sm:h-14 border items-center justify-center rounded-full overflow-hidden">
                        <img src="" alt="" id="revoke-profile">
                    </div>

                    <div class="flex flex-col gap-2">
                        <p class="text-sm px-2 font-semibold text-gray-600 " id="revoke-name"></p>
                        <p class="w-fit text-xs px-2 font-semibold py-1 text-gray-500" id="revoke-regnumber"></p>       
                    </div>
                </div>

                <label class="block mt-4 mb-2 text-sm font-medium text-gray-900 ">Message</label>
                <input type="text" name="message" id="revoke-message" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="reason for revoking" required>
                    
                <div class="h-4"></div>
                <button type="submit" class="cursor-pointer text-md  font-semibold px-2 mt-3 hover:shadow-lg text-gray-700 py-2 gap-1 flex items-center justify-center bg-rose-200 max-w-xl rounded">
                    <svg class="w-4 h-4 text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <p class="mb-1 ml-1">revoke</p>
                </button>
            </form>
        </div>
    </div>
</div>

</div>

<script>

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
        
        $('#revokeModal').on('click', function(e) {
            if (e.target !== this && e.target.id !== 'modalbg')
                return;
            
            hideModal();
        });
    })
    
    function showModal(e){

        var modal = $(e).data('modal');

        if(modal == 'revokeModal'){
            $('#revoke-hospitalid').val($(e).data('id'));
            $('#revoke-name').text($(e).data('name'));
            $('#revoke-regnumber').text($(e).data('regnumber'));
            $('#revoke-profile').attr('src', '<?= base_url('uploads/hospital/profileimages') ?>/' + $(e).data('profile'));
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

    function accepthospital(e){
        var id = $(e).data('id');
        window.location.replace('<?= base_url('admin/hospitalverification/accept') ?>/' + id);
    }

    function filter(e){
        var search = $(e).val().toLowerCase();

        $('.hospital-list').children().toArray().forEach(hospital => {
            var name = $(hospital).data('name').toLowerCase();
            var mem = $(hospital).data('regnumber').toLowerCase();
            if(name.includes(search) || mem.includes(search)){
                $(hospital).removeClass('hidden');
            }else{
                $(hospital).addClass('hidden');
            }

        });
    }

    function filterStatus(e){
        var search = $(e).val();
        $('#search-input').val('');

        console.log(search);

        $('.hospital-list').children().toArray().forEach(hospital => {
            if(search == 'all') $(hospital).removeClass('hidden');
            else{
                var status = $(hospital).data('status').toLowerCase();
                if(status == search){
                    $(hospital).removeClass('hidden');
                }else{
                    $(hospital).addClass('hidden');
                }
            }
        });
    }
</script>