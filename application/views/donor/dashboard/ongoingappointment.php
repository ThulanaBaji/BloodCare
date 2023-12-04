<div class="p-0 pt-6 md:p-6 h-full relative">
    <a href="http://localhost/bloodcare/donor/appointment/" class="mx-3 cursor-pointer text-md font-semibold p-2 text-gray-500 gap-1 flex items-center justify-center bg-gray-200 sm:bg-transparent max-w-xl hover:bg-gray-200 rounded">
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
        <ol class="mt-6 relative border-s border-gray-200">
            <li class="mb-10 ms-4">
                <div class="absolute -start-[22px] translate-y-4 w-11 h-11 ring-1 ring-gray-400 border-gray-50 border-2 flex items-center rounded-full overflow-hidden">
                    <img class="w-14 object-cover object-center" src="<?= base_url('uploads/hospital/profileimages/1701353336asiri.png') ?>">
                </div>
                <div class="transition-shadow rounded-lg max-w-xl p-4 border border-gray-400 group hover:shadow-lg bg-gray-50">
                    <div class="flex justify-between items-start">
                        <div class="flex flex-col">
                        <time class="mb-1 text-sm leading-none text-gray-600 font-semibold inline-block">13:00 (1hr)</time>
                        <time class="mb-1 text-sm leading-none text-gray-600 font-semibold inline-block">13 Jan 2023</time></div>
                        <p class="mb-8 ml-11 text-xs leading-none p-1.5 rounded bg-gray-200 text-gray-600 font-bold inline-block uppercase">reserved</p>
                    </div>

                    <h3 class="text-lg font-semibold text-gray-500 ">Asiri Hospitals</h3>
                    <p class="text-xs text-gray-500 font-semibold uppercase flex items-center gap-1">
                            Colombo 10, Colombo</p>
                    <span class="hidden group-hover:flex flex-col sm:items-center sm:flex-row mt-3 p-3 w-full rounded bg-gray-100  gap-2">
                        <svg class="flex-shrink-0 w-4 h-4 text-gray-600 mb-2 sm:mb-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 18" fill="currentColor">
                            <path d="M18 4H16V9C16 10.0609 15.5786 11.0783 14.8284 11.8284C14.0783 12.5786 13.0609 13 12 13H9L6.846 14.615C7.17993 14.8628 7.58418 14.9977 8 15H11.667L15.4 17.8C15.5731 17.9298 15.7836 18 16 18C16.2652 18 16.5196 17.8946 16.7071 17.7071C16.8946 17.5196 17 17.2652 17 17V15H18C18.5304 15 19.0391 14.7893 19.4142 14.4142C19.7893 14.0391 20 13.5304 20 13V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4Z" fill="currentColor"/>
                            <path d="M12 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V9C0 9.53043 0.210714 10.0391 0.585786 10.4142C0.960859 10.7893 1.46957 11 2 11H3V13C3 13.1857 3.05171 13.3678 3.14935 13.5257C3.24698 13.6837 3.38668 13.8114 3.55279 13.8944C3.71889 13.9775 3.90484 14.0126 4.08981 13.996C4.27477 13.9793 4.45143 13.9114 4.6 13.8L8.333 11H12C12.5304 11 13.0391 10.7893 13.4142 10.4142C13.7893 10.0391 14 9.53043 14 9V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0Z" fill="currentColor"/>
                        </svg>
                        <input class="flex-grow ml-1 font-bold font-mono bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="message"/>
                        <button onclick="rejectAppointment(this)" class="flex-auto w-fit text-md font-semibold p-2 text-gray-500 hover:bg-gray-200 rounded" data-id="$id">cancel</button>
                    </span>
                </div>
            </li>
        </ol>
    </div>
<div>