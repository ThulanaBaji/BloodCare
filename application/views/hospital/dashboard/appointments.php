<script src="<?php echo base_url().'assets/js/datepicker.js';?>"></script>

<div class="p-6 divide-y flex flex-col h-full relative">
  
  
  <div id="padding-container">
  
  <div class="absolute -top-10 left-1/2 -translate-x-1/2 max-w-xs">
    <div class="mt-3 alert alert-success flex items-center p-2 px-3 text-sm text-green-800 rounded bg-green-200" style="display:none;">
      <svg class="flex-shrink-0 inline w-4 h-4 me-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <div id="alert-top-success-text"></div>
    </div>
    <div class="mt-3 alert alert-error flex items-center p-2 px-3 text-sm text-red-900 rounded bg-red-300" style="display:none;">
      <svg class="flex-shrink-0 inline w-4 h-4 me-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <div id="alert-top-error-text"></div>
		</div>
  </div>

    <div class="flex justify-between">
        <button onclick="toggleconfigure(this)" class="text-xs font-bold p-2 text-gray-500 uppercase mb-4 flex items-center hover:bg-gray-200 rounded">
        <svg class="w-3.5 h-3.5 mr-1 -rotate-90 transition-all inline-block text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M18 7.5h-.423l-.452-1.09.3-.3a1.5 1.5 0 0 0 0-2.121L16.01 2.575a1.5 1.5 0 0 0-2.121 0l-.3.3-1.089-.452V2A1.5 1.5 0 0 0 11 .5H9A1.5 1.5 0 0 0 7.5 2v.423l-1.09.452-.3-.3a1.5 1.5 0 0 0-2.121 0L2.576 3.99a1.5 1.5 0 0 0 0 2.121l.3.3L2.423 7.5H2A1.5 1.5 0 0 0 .5 9v2A1.5 1.5 0 0 0 2 12.5h.423l.452 1.09-.3.3a1.5 1.5 0 0 0 0 2.121l1.415 1.413a1.5 1.5 0 0 0 2.121 0l.3-.3 1.09.452V18A1.5 1.5 0 0 0 9 19.5h2a1.5 1.5 0 0 0 1.5-1.5v-.423l1.09-.452.3.3a1.5 1.5 0 0 0 2.121 0l1.415-1.414a1.5 1.5 0 0 0 0-2.121l-.3-.3.452-1.09H18a1.5 1.5 0 0 0 1.5-1.5V9A1.5 1.5 0 0 0 18 7.5Zm-8 6a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z"/>
        </svg>
        configure
          <svg class="w-3.5 h-3.5 ml-3 -rotate-90 transition-all text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 5.326 5.7a.909.909 0 0 0 1.348 0L13 1"/>
          </svg>
      </button>
      <button onclick="generateappointments()" class="text-md font-semibold p-2 text-gray-500 mb-4 flex items-center hover:bg-gray-200 rounded">generate appointments</button>
    </div>
    <div id="collapse-configure" class="h-0 overflow-hidden">
      <div class="border rounded-t-lg bg-white p-4">
        <p class="text-sm text-gray-900 mb-2 font-semibold">days service not available</p>
        <div class="days-of-week grid grid-cols-7 gap-1 w-fit">
          <button class="h-10 w-10 flex items-center justify-center leading-6 text-sm font-medium rounded-lg cursor-pointer text-gray-500 hover:bg-gray-100 ">Su</button>
          <button class="h-10 w-10 flex items-center justify-center leading-6 text-sm font-medium rounded-lg cursor-pointer text-gray-500 hover:bg-gray-100 ">Mo</button>
          <button class="h-10 w-10 flex items-center justify-center leading-6 text-sm font-medium rounded-lg cursor-pointer text-gray-500 hover:bg-gray-100 ">Tu</button>
          <button class="h-10 w-10 flex items-center justify-center leading-6 text-sm font-medium rounded-lg cursor-pointer text-gray-500 hover:bg-gray-100 ">We</button>
          <button class="h-10 w-10 flex items-center justify-center leading-6 text-sm font-medium rounded-lg cursor-pointer text-gray-500 hover:bg-gray-100 ">Th</button>
          <button class="h-10 w-10 flex items-center justify-center leading-6 text-sm font-medium rounded-lg cursor-pointer text-gray-500 hover:bg-gray-100 ">Fr</button>
          <button class="h-10 w-10 flex items-center justify-center leading-6 text-sm font-medium rounded-lg cursor-pointer text-gray-500 hover:bg-gray-100 ">Sa</button>
        </div>
      </div>
      <div class="border-x border-b bg-white p-4">
        <p class="text-sm text-gray-900 mb-2 font-semibold">dates service not available</p>
        <div class="relative w-fit">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
              </svg>
          </div>
          <input datepicker id="date-configure" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date(s)">
        </div>
      </div>
      <div class="border-x border-b bg-white p-4">
        <p class="text-sm text-gray-900 mb-2 font-semibold">service start & end time</p>
        <div class="flex flex-col sm:flex-row">
          <div class="relative w-fit">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                </svg>
            </div>
            <input id="service-starttime" type="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
          </div>
          <span class="mx-4 text-gray-500">to</span>
          <div class="relative w-fit">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                </svg>
            </div>
            <input id="service-endtime" type="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
          </div>
        </div>
      </div>
      <div class="border-x bg-white p-4">
        <p class="text-sm text-gray-900 mb-2 font-semibold inline-block">service duration<p class="text-xs text-gray-500 font-normal inline-block ml-1">(HH:MM)</p></p>
        <div class="relative w-fit inline-flex">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
            </svg>
          </div>
          <input id="service-duration" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="enter duration">
        </div>
      </div>
      <div class="border rounded-b-lg bg-white p-4">
        <p class="text-sm text-gray-900 mb-2 font-semibold inline-block">breaks within the day<p class="text-xs text-gray-500 font-normal inline-block ml-1">(HH:MM - HH:MM, .... )</p></p>
        <div class="relative w-fit inline-flex">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
            </svg>
          </div>
          <input id="service-breaks" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="enter time period(s)">
        </div>
      </div>
      <div class="flex gap-4">
        <button onclick="saveConfigure()" class="text-md font-semibold p-2 text-gray-500 mt-3 flex items-center hover:bg-gray-200 rounded">save configuration</button>
        <div class="mt-3 alert-configure alert-configure-error flex items-center p-1 px-3 text-sm text-red-900 rounded bg-red-300" style="display:none;">
					<svg class="flex-shrink-0 inline w-4 h-4 me-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
						<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
					</svg>
					<div id="alert-error-text"></div>
				</div>
        <div class="mt-3 alert-configure alert-configure-success flex items-center p-1 px-3 text-sm text-green-800 rounded bg-green-200" style="display:none;">
					<svg class="flex-shrink-0 inline w-4 h-4 me-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
						<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
					</svg>
					<div id="alert-success-text"></div>
				</div>
      </div>
    </div>
    
  </div>
  <div class="pt-6 flex flex-wrap justify-between">
    <div date-rangepicker class="flex items-center mr-5 mb-6" id="daterange-appointments">
      <button onclick="loadTodayAppointments()" class="text-md font-semibold p-2 text-gray-500 mr-5 flex items-center hover:bg-gray-200 rounded">Today</button>
      <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
            </svg>
        </div>
        
        <input id="appointments-start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date start">
      </div>
      <span class="mx-4 text-gray-500">to</span>
      <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
          </svg>
        </div>
        <input id="appointments-end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date end">
      </div>
      <button onclick="loadAppointments()" class="text-md font-semibold p-2 text-gray-500 ml-5 flex items-center hover:bg-gray-200 rounded">find</button>
    </div>
    <div class="flex items-center mb-6">
      <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        <svg class="flex-shrink-0 w-4 h-4 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 18" fill="currentColor">
              <path d="M18 4H16V9C16 10.0609 15.5786 11.0783 14.8284 11.8284C14.0783 12.5786 13.0609 13 12 13H9L6.846 14.615C7.17993 14.8628 7.58418 14.9977 8 15H11.667L15.4 17.8C15.5731 17.9298 15.7836 18 16 18C16.2652 18 16.5196 17.8946 16.7071 17.7071C16.8946 17.5196 17 17.2652 17 17V15H18C18.5304 15 19.0391 14.7893 19.4142 14.4142C19.7893 14.0391 20 13.5304 20 13V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4Z" fill="currentColor"></path>
              <path d="M12 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V9C0 9.53043 0.210714 10.0391 0.585786 10.4142C0.960859 10.7893 1.46957 11 2 11H3V13C3 13.1857 3.05171 13.3678 3.14935 13.5257C3.24698 13.6837 3.38668 13.8114 3.55279 13.8944C3.71889 13.9775 3.90484 14.0126 4.08981 13.996C4.27477 13.9793 4.45143 13.9114 4.6 13.8L8.333 11H12C12.5304 11 13.0391 10.7893 13.4142 10.4142C13.7893 10.0391 14 9.53043 14 9V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0Z" fill="currentColor"></path>
            </svg>
        </div>
        <input id="rejectall-message" type="text" class="bg-gray-50 border font-mono border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="message">
      </div>
      <button onclick="rejectAppointments()" class="text-md font-semibold p-2 text-gray-500 ml-5 flex items-center hover:bg-gray-200 rounded">reject all</button>
    </div>
  </div>
  <div class="py-6 overflow-y-auto" id="appointments-container">
    <?php 
      loadAppointments($appointments);
    ?>
  </div>
</div>

<script>
  $(document).ready(function() {

    const unavailabledates = $('#date-configure')[0].datepicker;
    const startdatepicker = $('#daterange-appointments')[0].rangepicker.inputs[0].datepicker;
    const enddatepicker = $('#daterange-appointments')[0].rangepicker.inputs[1].datepicker;

    let disableddates = [];
    var d = new Date();
    
    unavailabledates.config.minDate = enddatepicker.config.minDate = startdatepicker.config.minDate = d.getTime();
    unavailabledates.config.maxDate = enddatepicker.config.maxDate = startdatepicker.config.maxDate = d.getTime() + 2*30*24*60*60*1000;;
    startdatepicker.config.maxView = enddatepicker.config.maxView = 0;

    unavailabledates.config.multidate = true;
    unavailabledates.config.maxNumberOfDates = 59;

    setConfigure();

    $('.days-of-week button').click(function(){
      
      if($(this).hasClass('bg-blue-700')){
        $(this).addClass('hover:bg-gray-100');
        $(this).addClass('bg-blue-700');
        $(this).addClass('text-gray-500');
        $(this).removeClass('bg-blue-700');
        $(this).removeClass('text-white');

        unavailabledates.config.daysOfWeekDisabled.splice(unavailabledates.config.daysOfWeekDisabled.indexOf($(this).prevAll().length), 1);

      }else{
        $(this).removeClass('hover:bg-gray-100');
        $(this).removeClass('bg-blue-700');
        $(this).removeClass('text-gray-500');
        $(this).addClass('bg-blue-700');
        $(this).addClass('text-white');

        unavailabledates.config.daysOfWeekDisabled.push($(this).prevAll().length);
      }
    })

  });

  function loadAppointments(){
    var from = $('#appointments-start').val();
    var to = $('#appointments-end').val();

    if(from != '' && to != ''){
      from = $('#daterange-appointments')[0].rangepicker.getDates()[0].getTime();
      to = $('#daterange-appointments')[0].rangepicker.getDates()[1].getTime();

      if(from == to){
        to += 24*60*60*1000 - 1;
      }

      var xhttp = new XMLHttpRequest();
        
      xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          $('#appointments-container').html(xhttp.responseText);
        }
      }
      
      xhttp.open('GET', 'appointments/getappointmentswithin/' + from + '/' + to, true);
      xhttp.send();
    }
  }

  function loadTodayAppointments(){
    var d = new Date();
    var from = d.getTime();
    d.setDate(d.getDate() + 1);
    var to = d.getTime() - 1;

    var xhttp = new XMLHttpRequest();
        
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        $('#appointments-container').html(xhttp.responseText);
      }
    }
    
    xhttp.open('GET', 'appointments/getappointmentswithin/' + from + '/' + to, true);
    xhttp.send();
  }

  function generateappointments(){
    var xhttp = new XMLHttpRequest();
        
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        var text = xhttp.responseText;
        var response = text.split(':');

        if(response[0] === 'error'){
          $('.alert-error').fadeIn(200).delay(3000).fadeOut(200);
          $('#alert-top-error-text').text(response[1]);
        }
        else if(response[0] === 'success'){
          $('.alert-success').fadeIn(200).delay(3000).fadeOut(200);
          $('#alert-top-success-text').text(response[1]);
          
        }
      }
    }
    
    xhttp.open('GET', 'appointments/generateappointments', true);
    xhttp.send(); 
  }

  function rejectAppointments(){
    const arr = JSON.parse($('#appointment-ids').html());
    var safearraystring = arr.join(',');

    if(safearraystring == '') return;

    var message = $('#rejectall-message').val();
    message = ( message == "" ? "Unfortunately, service unavailble at this time" : message);
    
    $('#appointments-start').val(null);
    $('#appointments-end').val(null);

    var xhttp = new XMLHttpRequest();
        
      xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          $('#appointments-container').html(xhttp.responseText);
        }
      }
      
      xhttp.open('GET', 'appointments/rejectappointments?ids=' + safearraystring + '&message=' + message, true);
      xhttp.send();
  }

  function rejectAppointment(button){
    var id = $(button).data('id');

    var message = $(button).siblings('input').val();
    message = ( message == "" ? "Unfortunately, service unavailble at this time" : message);
    
    $('#appointments-start').val(null);
    $('#appointments-end').val(null);

    var xhttp = new XMLHttpRequest();
        
      xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          $('#appointments-container').html(xhttp.responseText);
        }
      }
      
      xhttp.open('GET', 'appointments/rejectappointments?ids=' + id + '&message=' + message, true);
      xhttp.send();

  }

  function setConfigure(){
    var config = JSON.parse('<?php echo $config; ?>');
    
    if(config.length == 0) return;
    
    const unavailabledates = $('#date-configure')[0].datepicker;

    config.days.forEach(function(i){      
      const elem = $('.days-of-week').children()[i];
        
      if(!$(elem).hasClass('bg-blue-700')){

        $(elem).removeClass('hover:bg-gray-100');
        $(elem).removeClass('bg-blue-700');
        $(elem).removeClass('text-gray-500');
        $(elem).addClass('bg-blue-700');
        $(elem).addClass('text-white');

        unavailabledates.config.daysOfWeekDisabled.push($(elem).prevAll().length);
      }
    })

    unavailabledates.setDate(config.dates);
    $('#service-starttime').val(config.start);
    $('#service-endtime').val(config.end);
    $('#service-duration').val(config.duration);
    var breakstext = '';

    config.breaks.forEach(function(b, i){
      breakstext += (i != 0 ? ', ' : '');
      breakstext += b.start.trim() + '-' + b.end.trim();
    })

    $('#service-breaks').val(breakstext);
  }

  function saveConfigure(){
    if($('#service-starttime').val() == '' || $('#service-endtime').val() == '' || $('#service-duration').val() == ''){
      $('.alert-configure-error').fadeIn(200).delay(3000).fadeOut(200);
      $('#alert-error-text').text('service duration, service start & end time shouldnt be empty');
      return;
    }

    //AJAX to dashboard controller, as a json object

    var text = `
    {
      "days"      : [],
      "dates"     : [],
      "start"     : "",
      "end"       : "",
      "duration"  : "",
      "breaks"    : []
    }
    `; 

    var obj = JSON.parse(text);

    const unavailabledates = $('#date-configure')[0].datepicker;
    const start = $('#service-starttime').val().trim();
    const end = $('#service-endtime').val().trim();
    const duration = $('#service-duration').val().trim();
    const rawbreaks = $('#service-breaks').val().trim();
    var breaks = [];
    
    if(rawbreaks != ''){
      var arrbreaks = rawbreaks.split(',');
      arrbreaks.forEach(function(b){
        let times = b.split('-');

        var array = {
          start: times[0].trim(),
          end  : times[1].trim()
        };

        breaks.push(array);
      });
    }
    
    obj.days = unavailabledates.config.daysOfWeekDisabled;
    obj.dates = unavailabledates.dates;
    obj.start = start;
    obj.end = end;
    obj.duration = duration;
    obj.breaks = breaks;

    var xhttp = new XMLHttpRequest();
        
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        $('#alert-success-text').text(xhttp.responseText);  
        $('.alert-configure-success').fadeIn(200).delay(2000).fadeOut(200);
      }
    }
    
    xhttp.open('GET', 'appointments/savehospitalconfig?configtype=appointment&obj=' + JSON.stringify(obj), true);
    xhttp.send();
  }

  function toggleconfigure(e){
    if($(e).children('svg').hasClass('-rotate-90')){
      //expand
      $('#padding-container').addClass('pb-6')
      $(e).children('svg').removeClass('-rotate-90');
      $('#collapse-configure').removeClass('overflow-hidden');
      $('#collapse-configure').removeClass('h-0');

    }else{
      //collapse
      $('#padding-container').removeClass('pb-6')
      $(e).children('svg').addClass('-rotate-90');
      $('#collapse-configure').addClass('h-0');
      $('#collapse-configure').addClass('overflow-hidden');
    }
  }
  
</script>