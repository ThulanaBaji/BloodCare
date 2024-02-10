<div class="w-full h-full p-3 md:p-6 flex flex-col items-center relative">
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
    <div class="flex flex-col items-center">
        <div class="flex flex-col items-center">
            <form class="relative mt-8 sm:mt-0" action="<?= base_url('hospital/profile/updateimage/').$profile ?>" method="post" enctype="multipart/form-data">
                <div class="text-center relative border-2 flex items-center w-20 h-20 lg:w-28 lg:h-28 rounded-full overflow-hidden justify-center">
                    <img id="edit-profilepreview" class="edit object-cover object-center" src="<?= base_url('uploads/hospital/profileimages/').$profile ?>">
                    <input class="hidden" type="file" name="profile" id="edit-profileimage" accept="image/*" onchange="previewImage(this)">
                    <label for="edit-profileimage" id="label-editprofile" class="hidden absolute top-0 left-0 h-full w-full text-blue-500 bg-white/90 border-2 border-blue-500 rounded-full text-xs font-bold opacity-0 flex items-center justify-center transition-all cursor-pointer hover:opacity-100">
                        <div class="text-center">
                            <div class="mb-2">
                                <i class="fa fa-camera fa-2x"></i>
                            </div>
                            <div class="uppercase text-xs">
                                Update <br> Profile image
                            </div>
                        </div>
                    </label>
                </div>
                <button onclick="toggle(this)" data-type="edit" data-field="profile" class="cursor-pointer absolute bottom-0 right-0 hover:border border border-gray-100  hover:border-gray-700 text-md font-semibold px-2 hover:shadow-lg text-gray-700 py-2 gap-1 flex items-center justify-center bg-yellow-200 max-w-xl rounded-full">
                    <svg class="w-4 h-4 text-gray-700 edit" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 20">
                        <path d="M20.168 6.136 14.325.293a1 1 0 0 0-1.414 0l-1.445 1.444a1 1 0 0 0 0 1.414l5.844 5.843a1 1 0 0 0 1.414 0l1.444-1.444a1 1 0 0 0 0-1.414Zm-4.205 2.927L11.4 4.5a1 1 0 0 0-1-.25L4.944 5.9a1 1 0 0 0-.652.624L.518 17.206a1 1 0 0 0 .236 1.04l.023.023 6.606-6.606a2.616 2.616 0 1 1 3.65 1.304 2.615 2.615 0 0 1-2.233.108l-6.61 6.609.024.023a1 1 0 0 0 1.04.236l10.682-3.773a1 1 0 0 0 .624-.653l1.653-5.457a.999.999 0 0 0-.25-.997Z"></path>
                        <path d="M10.233 11.1a.613.613 0 1 0-.867-.868.613.613 0 0 0 .867.868Z"></path>
                    </svg>
                    <svg class="w-4 h-4 text-gray-700 confirm hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                    </svg>
                </button>
            </form>
            <form class="flex mt-8 self-start form-name" action="<?= base_url('hospital/profile/updatename') ?>" method="post">
                <input disabled placeholder="registration number" type="text" name="regnum" id="regnum" class="max-w-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-s-lg focus:ring-blue-500 focus:border-blue-500 focus:z-20 inline-block w-full p-2.5 disabled:bg-gray-100 disabled:text-gray-600" value="<?= $regnumber ?>">
                <input disabled placeholder="hospital name" type="text" name="name" id="name" class="max-w-xs bg-gray-50 border-y border-x-0 border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 focus:z-20 focus:border-x inline-block w-full p-2.5 disabled:bg-gray-100 disabled:text-gray-600" value="<?= $name ?>">
                <button onclick="toggle(this)" data-type="edit" data-field="name" class="cursor-pointer hover:border border border-gray-300  hover:border-gray-700 text-md font-semibold px-2 hover:shadow-lg text-gray-700 py-2 gap-1 flex items-center justify-center bg-yellow-200 max-w-xl rounded-e-lg">
                    <svg class="w-4 h-4 text-gray-700 edit" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 20">
                        <path d="M20.168 6.136 14.325.293a1 1 0 0 0-1.414 0l-1.445 1.444a1 1 0 0 0 0 1.414l5.844 5.843a1 1 0 0 0 1.414 0l1.444-1.444a1 1 0 0 0 0-1.414Zm-4.205 2.927L11.4 4.5a1 1 0 0 0-1-.25L4.944 5.9a1 1 0 0 0-.652.624L.518 17.206a1 1 0 0 0 .236 1.04l.023.023 6.606-6.606a2.616 2.616 0 1 1 3.65 1.304 2.615 2.615 0 0 1-2.233.108l-6.61 6.609.024.023a1 1 0 0 0 1.04.236l10.682-3.773a1 1 0 0 0 .624-.653l1.653-5.457a.999.999 0 0 0-.25-.997Z"></path>
                        <path d="M10.233 11.1a.613.613 0 1 0-.867-.868.613.613 0 0 0 .867.868Z"></path>
                    </svg>
                    <svg class="w-4 h-4 text-gray-700 confirm hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                    </svg>
                </button>
            </form>
            <form action="<?= base_url('hospital/profile/updatecontact') ?>" method="post" class="flex mt-4 flex-grow w-full sm:w-fit self-start">
                <input disabled placeholder="contact number" type="tel" name="contact" id="contact" class="border-e-0 max-w-2xl bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-s-lg focus:ring-blue-500 focus:border-blue-500 focus:border-e focus:z-20 inline-block w-full p-2.5 disabled:bg-gray-100 disabled:text-gray-600" value="<?= $contact ?>">
                <button onclick="toggle(this)" data-type="edit" data-field="contact" class="cursor-pointer hover:border border border-gray-300  hover:border-gray-700 text-md font-semibold px-2 hover:shadow-lg text-gray-700 py-2 gap-1 flex items-center justify-center bg-yellow-200 max-w-xl rounded-e-lg">
                    <svg class="w-4 h-4 text-gray-700 edit" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 20">
                        <path d="M20.168 6.136 14.325.293a1 1 0 0 0-1.414 0l-1.445 1.444a1 1 0 0 0 0 1.414l5.844 5.843a1 1 0 0 0 1.414 0l1.444-1.444a1 1 0 0 0 0-1.414Zm-4.205 2.927L11.4 4.5a1 1 0 0 0-1-.25L4.944 5.9a1 1 0 0 0-.652.624L.518 17.206a1 1 0 0 0 .236 1.04l.023.023 6.606-6.606a2.616 2.616 0 1 1 3.65 1.304 2.615 2.615 0 0 1-2.233.108l-6.61 6.609.024.023a1 1 0 0 0 1.04.236l10.682-3.773a1 1 0 0 0 .624-.653l1.653-5.457a.999.999 0 0 0-.25-.997Z"></path>
                        <path d="M10.233 11.1a.613.613 0 1 0-.867-.868.613.613 0 0 0 .867.868Z"></path>
                    </svg>
                    <svg class="w-4 h-4 text-gray-700 confirm hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                    </svg>
                </button>
            </form>
            <form action="<?= base_url('hospital/profile/updatelocation') ?>" method="post" class="flex mt-4 max-w-sm self-start w-full">
                <div class="flex flex-col w-full">
                    <input disabled placeholder="zipcode" type="text" name="zipcode" id="zipcode" class="border-b-0 rounded-ss-lg max-w-sm border-e-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:border-b focus:ring-blue-500 focus:border-blue-500 focus:border-e focus:z-20 inline-block w-full p-2.5 disabled:bg-gray-100 disabled:text-gray-600" value="<?= $zipcode ?>"> 
                    <input disabled placeholder="street address" type="text" name="street" id="street" class="max-w-sm border-b-0 border-e-0 focus:border-b bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 focus:border-e focus:z-20 inline-block w-full p-2.5 disabled:bg-gray-100 disabled:text-gray-600" value="<?= $street_address ?>">
                    <input disabled placeholder="city" type="text" name="city" id="city" class="max-w-sm border-b-0 border-e-0 focus:border-b bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 focus:border-e focus:z-20 inline-block w-full p-2.5 disabled:bg-gray-100 disabled:text-gray-600" value="<?= $city ?>"> 
                    <select disabled placeholder="district" id="district" name="district" class="max-w-sm border-b-0 border-e-0 focus:border-b bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 focus:border-e focus:z-20 inline-block w-full p-2.5 disabled:bg-gray-100">
                    </select>
                    <select disabled placeholder="province" id="province" name="province" class="rounded-es-lg max-w-sm border-e-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 focus:border-e focus:z-20 inline-block w-full p-2.5 disabled:bg-gray-100" onchange="mapDistricts()">
                    </select>
                </div>
                <button onclick="toggle(this)" data-type="edit" data-field="location" class="cursor-pointer hover:border border border-gray-300  hover:border-gray-700 text-md font-semibold px-2 hover:shadow-lg text-gray-700 py-2 gap-1 flex items-center justify-center bg-yellow-200 max-w-xl rounded-e-lg">
                    <svg class="w-4 h-4 text-gray-700 edit" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 20">
                        <path d="M20.168 6.136 14.325.293a1 1 0 0 0-1.414 0l-1.445 1.444a1 1 0 0 0 0 1.414l5.844 5.843a1 1 0 0 0 1.414 0l1.444-1.444a1 1 0 0 0 0-1.414Zm-4.205 2.927L11.4 4.5a1 1 0 0 0-1-.25L4.944 5.9a1 1 0 0 0-.652.624L.518 17.206a1 1 0 0 0 .236 1.04l.023.023 6.606-6.606a2.616 2.616 0 1 1 3.65 1.304 2.615 2.615 0 0 1-2.233.108l-6.61 6.609.024.023a1 1 0 0 0 1.04.236l10.682-3.773a1 1 0 0 0 .624-.653l1.653-5.457a.999.999 0 0 0-.25-.997Z"></path>
                        <path d="M10.233 11.1a.613.613 0 1 0-.867-.868.613.613 0 0 0 .867.868Z"></path>
                    </svg>
                    <svg class="w-4 h-4 text-gray-700 confirm hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                    </svg>
                </button>
            </form>
        </div>
        <div class="mt-8 border-t w-full border-t-gray-400 pt-6">
            <button onclick="togglepassword(this)" class="w-fit text-xs font-bold p-2 text-gray-500 uppercase mb-4 flex items-center hover:bg-gray-200 rounded">
                <svg class="w-3.5 h-3.5 mr-1 transition-all inline-block text-gray-500 -rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M18 7.5h-.423l-.452-1.09.3-.3a1.5 1.5 0 0 0 0-2.121L16.01 2.575a1.5 1.5 0 0 0-2.121 0l-.3.3-1.089-.452V2A1.5 1.5 0 0 0 11 .5H9A1.5 1.5 0 0 0 7.5 2v.423l-1.09.452-.3-.3a1.5 1.5 0 0 0-2.121 0L2.576 3.99a1.5 1.5 0 0 0 0 2.121l.3.3L2.423 7.5H2A1.5 1.5 0 0 0 .5 9v2A1.5 1.5 0 0 0 2 12.5h.423l.452 1.09-.3.3a1.5 1.5 0 0 0 0 2.121l1.415 1.413a1.5 1.5 0 0 0 2.121 0l.3-.3 1.09.452V18A1.5 1.5 0 0 0 9 19.5h2a1.5 1.5 0 0 0 1.5-1.5v-.423l1.09-.452.3.3a1.5 1.5 0 0 0 2.121 0l1.415-1.414a1.5 1.5 0 0 0 0-2.121l-.3-.3.452-1.09H18a1.5 1.5 0 0 0 1.5-1.5V9A1.5 1.5 0 0 0 18 7.5Zm-8 6a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z"></path>
                </svg>
                change password
                <svg class="w-3.5 h-3.5 ml-3 transition-all text-gray-500 -rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 5.326 5.7a.909.909 0 0 0 1.348 0L13 1"></path>
                </svg>
            </button>
            <div id="collapse-password" class="h-0 overflow-hidden pb-3">
                <div class="mt-3 flex items-center max-w-sm text-xs font-semibold p-2 border border-blue-500 text-blue-500 rounded bg-blue-100">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
						<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
					</svg>
                    <p>Password should be minimum 8 characters and contain at least one letter, one number and one special character
                    </p>
                </div>
                <form class="flex mt-3 max-w-sm" action="<?= base_url('hospital/profile/changepassword') ?>" method="post">
                    <div class="flex flex-col flex-grow max-w-sm">
                        <input onkeyup="passwordtextchange()" type="password" name="oldp" id="oldp"   class="flex-grow border-e-0 focus:border-e rounded-es-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-s-lg focus:ring-blue-500 focus:border-blue-500 focus:z-20 inline-block w-full p-2.5 disabled:bg-gray-100 disabled:text-gray-600" placeholder="old password">
                        <input onkeyup="passwordtextchange()" minlength="8" type="password" name="newp" id="newp"   class="inputpass flex-grow bg-gray-50 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 focus:z-20 focus:border inline-block w-full p-2.5 border-0 border-gray-300 border-s" placeholder="new password">
                        <input onkeyup="passwordtextchange()" minlength="8" type="password" name="newpc" id="newpc" class="inputpass flex-grow border-s rounded-es-lg bg-gray-50 border-y border-x-0 border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 focus:z-20 focus:border-x inline-block w-full p-2.5 disabled:bg-gray-100 disabled:text-gray-600" placeholder="confirm password">
                    </div>
                    <button onclick="changepassword()" disabled data-type="edit" id="button-changep" data-field="password" class="cursor-pointer hover:border border border-gray-300 disabled:hover:border-gray-300 disabled:hover:shadow-none bg-green-200 hover:border-gray-700 text-md font-semibold px-2 hover:shadow-lg disabled:text-gray-300 py-2 gap-1 flex items-center justify-center disabled:bg-gray-200 max-w-xl rounded-e-lg">
                        <svg class="w-4 h-4 confirm" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                        </svg>
                    </button>
                </form>
                
            </div>
            
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.inputpass').on('input', function() {
            var c = this.selectionStart,
                r = /[^\S]/gi,
                v = $(this).val();
            if(r.test(v)) {
                $(this).val(v.replace(r, ''));
                c--;
            }
            this.setSelectionRange(c, c);
        });

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

        populateInfo();
        $('#province').val('<?= $province ?>');
        mapDistricts();
        $('#district').val('<?= $district ?>');
    });

    function toggle(e){
        var edit = 'edit';
        var confirm = 'confirm';        
        var yellow = 'bg-yellow-200';
        var green = 'bg-green-300';

        if($(e).attr('data-type') == edit){
            enableEdit(e);

            $(e).removeClass(yellow);
            $(e).addClass(green);
            $(e).children('svg.edit').addClass('hidden');
            $(e).children('svg.confirm').removeClass('hidden');

            $(e).attr('data-type', confirm);
            event.preventDefault();
        }
        else if($(e).attr('data-type') == confirm){
            change(e);

            //if refreshing no need below
            $(e).addClass(yellow);
            $(e).removeClass(green);
            $(e).children('svg.edit').removeClass('hidden');
            $(e).children('svg.confirm').addClass('hidden');

            $(e).attr('data-type', edit);
        }
    }

    function enableEdit(e){
        var field = $(e).data('field');

        if(field == 'profile'){
            $('#label-editprofile').removeClass('hidden');
            $('#label-editprofile').click();
        }
        else if(field == 'name'){
            $('#regnum').removeAttr('disabled');
            $('#name').removeAttr('disabled');
        }
        else if(field == 'contact'){
            $('#contact').removeAttr('disabled');
        }
        else if(field == 'location'){
            $('#zipcode').removeAttr('disabled');
            $('#street').removeAttr('disabled');
            $('#city').removeAttr('disabled');
            $('#district').removeAttr('disabled');
            $('#province').removeAttr('disabled');
        }
        
    }

    function change(e){
        var field = $(e).data('field');

        if(field == 'profile'){
            $('#label-editprofile').addClass('hidden');
            $($(e).parent('form')).submit();
        }
        else if(field == 'name'){
            $($(e).parent('form')).submit();
        }
        else if(field == 'contact'){
            $($(e).parent('form')).submit();

        }
        else if(field == 'location'){
            $($(e).parent('form')).submit();
        }
    }

    function passwordtextchange(){
        var oldp = $('#oldp').val();
        var newp = $('#newp').val();
        var newpc = $('#newpc').val();
        const regexPassword = '^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$';

        if(oldp.length == 0 || newp.length < 8 || newpc.length < 8 || newp != newpc || !newp.match(regexPassword))
            $('#button-changep').attr('disabled', true);
        else
            $('#button-changep').removeAttr('disabled');
    }

    function changepassword(){
        var oldp = $('#oldp').val();
        var newp = $('#newp').val();
        var newpc = $('#newpc').val();
        const regexPassword = '^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$';

        if(oldp.length == 0 || newp.length < 8 || newpc.length < 8 || newp != newpc || !newp.match(regexPassword))
            return;
        
    }

    function togglepassword(e){
        if($(e).children('svg').hasClass('-rotate-90')){
        //expand
        $(e).children('svg').removeClass('-rotate-90');
        $('#collapse-password').removeClass('overflow-hidden');
        $('#collapse-password').removeClass('h-0');

        }else{
        //collapse
        $(e).children('svg').addClass('-rotate-90');
        $('#collapse-password').addClass('h-0');
        $('#collapse-password').addClass('overflow-hidden');
        }
    }

    function populateInfo(){
        const provinces = ['Western province',
                           'Southern province', 
                           'Central province', 
                           'Eastern province',
                           'Nothern province', 
                           'Sabaragamuwa province', 
                           'Uva province',
                           'North Central province',
                           'North Western province'];
        
        $('#province').empty();
        provinces.forEach(p => {
            $('#province').append('<option>'+p+'</option>');
        });
    }

    function mapDistricts(){
        const districts = {
            'Western province'       : ['Colombo', 'Gampaha', 'Kalutara'],
            'Southern province'      : ['Galle', 'Matara', 'Hambantota'], 
            'Central province'       : ['Kandy', 'Matale', 'Nuwara Eliya'],
            'Eastern province'       : ['Ampara', 'Batticaloa', 'Trincomalee'],
            'Nothern province'       : ['Jaffna', 'Kilinochchi', 'Mullaitivu'], 
            'Sabaragamuwa province'  : ['Kegalle', 'Rathnapura'], 
            'Uva province'           : ['Badulla', 'Monaragala'],
            'North Central province' : ['Anuraghapura', 'Polonnaruwa'],
            'North Western province' : ['Kurunegala', 'Puttalam']
        }
        
        $('#district').empty();
        $('#district').append('<option hidden disabled selected value> -- select the district -- </option>');

        districts[$('#province').val()].forEach(d => {
            $('#district').append('<option>'+d+'</option>');
        });
    }

    function previewImage(e){
        var files = e.files || [];
        if (!files.length || !window.FileReader) 
            return;

        if (/^image/.test(files[0].type)) {
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);

            reader.onloadend = function () {
                
                $("#edit-profilepreview").attr('src', this.result);
            }
        }
    }
</script>