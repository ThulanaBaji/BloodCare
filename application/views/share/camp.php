<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodcare | Camp</title>

    <link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css';?>">
	<script src="<?php echo base_url().'assets/js/jquery-3.7.0.js' ?>"></script>
</head>
<body class="px-3 h-screen bg-red-950">
    <div class="flex h-screen items-center justify-center">
        <div class="flex flex-col items-center">
            <a class="text-xl text-white font-semibold absolute top-10" href="<?= base_url() ?>">BloodCare</a>

            <?php if($camp != null): ?>
                <div class="z-20 flex shadow-lg sm:hidden w-16 h-16 border items-center justify-center rounded-full overflow-hidden">
                    <img src="<?= $url ?>" alt="">
                </div>
                <div class="p-1 pt-6 sm:pt-3 transform -translate-y-3.5 sm:translate-y-0 shadow-2xl pl-4 rounded-xl max-w-xl bg-gray-50 relative camp">
                        <div class="flex items-center gap-2 absolute right-0 top-0 px-3 py-1 text-gray-700 text-sm font-semibold <?= $status == CAMP_CANCELLED ? 'bg-red-400' : 'bg-green-400' ?> rounded-se-md rounded-es-md">
                            <svg class="w-3 h-3 inline text-gray-700 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"></path>
                            </svg><?= $status == CAMP_CANCELLED ? 'cancelled' : $count ?></div>

                        <div class="flex items-center justify-between w-full">
                            <div class="flex items-center gap-6">
                                <div class="hidden sm:flex w-16 h-16 border items-center justify-center rounded-full overflow-hidden">
                                    <img src="<?= $url ?>" alt="">
                                </div>
                                <div class="flex flex-col text-left text-gray-500 font-semibold gap-3 sm:gap-2">
                                    <p class="text-lg sm:text-lg leading-tight"><?= $camp->name ?></p>
                                    <p class="text-xs uppercase flex items-center gap-2 sm:gap-1">
                                        <svg class="w-4 h-4 inline-block text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                            <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"></path>
                                        </svg><?= $location ?></p>
                                    <p class="text-xs uppercase flex items-center gap-3 sm:gap-2">
                                        <svg class="w-3 h-3 inline-block text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"></path>
                                        </svg><?= $date ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="py-3 flex justify-center">
                            <div class="w-full pt-4 pr-3">
                                <div class="bg-gray-100 p-3 rounded-lg">
                                    <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3">
                                        <div class="text-gray-500 font-semibold sm:font-bold text-sm rounded w-20 sm:p-1 sm:px-2">Time</div>
                                        <div class="text-gray-500 sm:font-semibold text-sm"><?= $time ?></div>
                                    </div>
                                    <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 mt-3">
                                        <div class="text-gray-500 font-semibold sm:font-bold text-sm rounded w-20 sm:p-1 sm:px-2">Location</div>
                                        <div class="text-gray-500 sm:font-semibold text-sm underline">
                                            <a href="https://maps.app.goo.gl/XdJKfBJg5Dp9A6JS9"><u><?= $camp->location_address ?></u>
                                            <svg class="w-3 h-3 inline-block ml-1 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"></path>
                                            </svg></a>
                                        </div>
                                    </div>
                                    <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 mt-3">
                                        <div class="text-gray-500 font-semibold sm:font-bold text-sm rounded w-20 sm:p-1 sm:px-2">Organizer</div>
                                        <div class="text-gray-500 sm:font-semibold text-sm">
                                            <?= $camp->organizer ?>
                                        </div>
                                    </div>
                                    <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 mt-3">
                                        <div class="text-gray-500 font-semibold sm:font-bold text-sm rounded w-20 sm:p-1 sm:px-2">With</div>
                                        <div class="camp-details-organizer text-gray-500 sm:font-semibold text-sm">
                                            <?= $with ?>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                </div>
            <?php else: ?>
                <div class="absolute w-full sm:w-fit px-3 sm:px-0 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 items-center text-center flex flex-col">
            <div class="text-lg font-semibold text-gray-800">No such blood donation camp found<br>Check the link again and try.</div>
            <div class="relative">
                <img src="<?= base_url('assets/images/disheartwitheyes.svg') ?>" alt="" srcset="">
            </div>
        </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>