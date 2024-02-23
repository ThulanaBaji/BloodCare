<div class="sm:p-3 pt-6 md:p-6 flex flex-col h-full relative items-center">
   
   <div class="w-full max-w-sm sm:max-w-3xl">
      <div class="w-full text-center text-xl pt-8 font-bold">
      Your account is revoked !
      </div>
      <div class="w-full text-center text-sm text-gray-600  pb-8">
      With immediate effect from <?= date("F j\, Y", substr($revoke['responsed_datetime'], 0, -3)) ?>.
      </div>
      <div class="mb-3 flex items-center p-2 px-3 text-sm text-red-900 rounded bg-red-300">
         <svg class="flex-shrink-0 inline w-4 h-4 me-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
               <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
         </svg>
         <div id="alert-top-error-text"><?= $revoke['message'] ?></div>
      </div>
      <div class="w-full text-sm pt-2 pb-8 ">
      Contact <a href="mailto:bloodcarelk@gmail.com" class="underline">BloodCare</a> for more information.
      </div>
   
</div>