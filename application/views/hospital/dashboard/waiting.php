<div class="sm:p-3 pt-6 md:p-6 flex flex-col h-full relative items-center">
   
   <div class="w-full max-w-sm sm:max-w-3xl">
      <div class="w-full text-center py-8 pb-8 font-bold">
      Your application is currently being reviewed.
      </div>
   <div class="relative w-full pt-8 overflow-x-auto sm:rounded-lg">
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
                            Contact
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>
                    </tr>
                </thead>
                <tbody class="hospital-list">
                    <tr data-regnumber="<?= $h['regnumber'] ?>" data-status="<?= $h['status'] ?>" data-name="<?= $h['name'] ?>" class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="rounded-full h-14 w-14 border hidden sm:flex overflow-hidden items-center justify-center">
                                <img class="object-center object-cover" src="<?= base_url('uploads/hospital/profileimages/'.$h['profile']) ?>" alt="Jese image">
                            </div>
                            <div class="ps-3">
                                <div class="text-base font-semibold"><?= $h['name'] ?></div>
                                <div class="font-normal text-gray-500"> <?= $h['email'] ?></div>
                            </div>  
                        </th>
                        <td class="px-6 py-4">
                            <?= $h['regnumber'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <p><?= $h['contact'] ?></p>
                            </div>
                        </td>
                        <td class="px-6 py-4 w-48">
                            <div class="flex flex-col text-xs">
                                <p><?= $h['street_address'] ?>,</p>
                                <p><?= $h['city'] ?>, <?= $h['district'] ?>,</p>
                                <p><?= $h['province'] ?>.</p>
                                <p><?= $h['zipcode'] ?></p>
                            </div>
                        </td>
                     </tr>
                </tbody>
            </table>
        </div>
        <a href="<?php echo base_url().'hospital/profile'; ?>" class="p-3 mt-5 block w-fit bg-amber-200 hover:shadow rounded text-sm font-semibold">Edit details</a>
   </div>
</div>