<div class="h-full w-full sm:pt-6 grid grid-rows-[auto_1fr] ">
    <div class="w-full flex justify-center items-center pb-8">
        <div class="w-fit flex">
            <a href="<?= base_url('hospital/donation') ?>" class="w-24 sm:w-28 p-2 text-xs sm:text-sm font-semibold text-gray-600 bg-gradient-to-tr hover:from-gray-300 hover:to-blue-200 border-gray-300 border rounded-l flex justify-center">Today</a>
            <a href="<?= base_url('hospital/donation/processing') ?>" class="w-24 sm:w-28 p-2 text-xs sm:text-sm font-semibold text-gray-600 bg-gradient-to-tr hover:from-gray-300 hover:to-amber-200 border-gray-300 border border-x-0 flex justify-center">Processing</a>
            <a href="<?= base_url('hospital/donation/processed') ?>" class="w-24 sm:w-28 p-2 text-xs sm:text-sm font-semibold text-gray-600 bg-gradient-to-tr from-green-200 to-green-200 hover:bg-gray-300 border-gray-300 border rounded-r flex justify-center">Processed</a>
        </div>
    </div>

    <div class="w-full h-full flex flex-col items-center">
        <div class="flex mb-6 max-w-xl w-full">
            <select class="bg-gray-50 rounded-l-lg border-gray-300 outline-none z-10" id="filter-selection" onchange="changeSelectionPlaceholder()">
                <option value="1">Name</option>
                <option value="2">Organizer</option>
                <option value="3">City</option>
                <option value="4">District</option>
            </select>
            <div class="relative w-full">
                <input type="search" id="search-filter" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border
                    border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="(Ex: Josephs 24th)" required="">
                <button onclick="filter()" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="flex max-w-xl w-full items-center flex-col processing-list">
            <?php foreach($donations as $donation): 
                switch ($donation['blood_type']) {
                case BLOOD_AP:
                    $icon = '<svg viewBox="0 0 48 48" class="w-12 h-12" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M20 10.2617C20.4037 10.2617 20.7678 10.5045 20.9231 10.8771L25.9231 22.8771C26.1355 23.3869 25.8944 23.9724 25.3846 24.1848C24.8748 24.3972 24.2894 24.1561 24.0769 23.6463L23.0834 21.2617H16.9167L15.9231 23.6463C15.7107 24.1561 15.1252 24.3972 14.6154 24.1848C14.1056 23.9724 13.8645 23.3869 14.0769 22.8771L19.0769 10.8771C19.2322 10.5045 19.5963 10.2617 20 10.2617ZM20 13.8617L22.25 19.2617H17.75L20 13.8617Z" fill="#FFF"></path> <path d="M30 13C30.5523 13 31 13.4477 31 14V16H33C33.5523 16 34 16.4477 34 17C34 17.5523 33.5523 18 33 18H31V20C31 20.5523 30.5523 21 30 21C29.4477 21 29 20.5523 29 20V18H27C26.4477 18 26 17.5523 26 17C26 16.4477 26.4477 16 27 16H29V14C29 13.4477 29.4477 13 30 13Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M38 10.3761V34.2618C38 36.4709 36.2091 38.2618 34 38.2618H30V40.2617H25V44.2617H23V40.2617H18V38.2618H14C11.7909 38.2618 10 36.4709 10 34.2618V10.376C10 8.16691 11.7909 6.37605 14 6.37605H20L21.132 5.21169C22.7027 3.5961 25.2973 3.5961 26.868 5.21169L28 6.37605H34C36.2091 6.37605 38 8.16691 38 10.3761ZM28 8.37605C27.4598 8.37605 26.9426 8.15753 26.566 7.77021L25.434 6.60584C24.6486 5.79805 23.3514 5.79805 22.566 6.60584L21.434 7.77021C21.0574 8.15753 20.5402 8.37605 20 8.37605H14C12.8954 8.37605 12 9.27148 12 10.376V29.2328C13.3017 29.2116 14.5325 29.2493 15.7005 29.2924C15.8789 29.299 16.0558 29.3057 16.2308 29.3123C17.5141 29.3609 18.711 29.4062 19.8818 29.3813C22.5089 29.3254 24.924 28.9155 27.4918 27.4005C30.6105 25.5605 33.2501 26.1132 35.0748 27.1751C35.4135 27.3722 35.7222 27.5852 36 27.8006V10.3761C36 9.27148 35.1046 8.37605 34 8.37605H28Z" fill="#FFF"></path> </g></svg>';
                    break;
                case BLOOD_AN:
                    $icon = '<svg viewBox="0 0 48 48" class="w-12 h-12" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M20.9231 10.8771C20.7678 10.5045 20.4037 10.2617 20 10.2617C19.5963 10.2617 19.2322 10.5045 19.0769 10.8771L14.0769 22.8771C13.8645 23.3869 14.1056 23.9724 14.6154 24.1848C15.1252 24.3972 15.7107 24.1561 15.9231 23.6463L16.9167 21.2617H23.0834L24.0769 23.6463C24.2894 24.1561 24.8748 24.3972 25.3846 24.1848C25.8944 23.9724 26.1355 23.3869 25.9231 22.8771L20.9231 10.8771ZM22.25 19.2617L20 13.8617L17.75 19.2617H22.25Z" fill="#FFF"></path> <path d="M27 16C26.4477 16 26 16.4477 26 17C26 17.5523 26.4477 18 27 18H33C33.5523 18 34 17.5523 34 17C34 16.4477 33.5523 16 33 16H27Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M38 34.2618V10.3761C38 8.16691 36.2091 6.37605 34 6.37605H28L26.868 5.21169C25.2973 3.5961 22.7027 3.5961 21.132 5.21169L20 6.37605H14C11.7909 6.37605 10 8.16691 10 10.376V34.2618C10 36.4709 11.7909 38.2618 14 38.2618H18V40.2617H23V44.2617H25V40.2617H30V38.2618H34C36.2091 38.2618 38 36.4709 38 34.2618ZM26.566 7.77021C26.9426 8.15753 27.4598 8.37605 28 8.37605H34C35.1046 8.37605 36 9.27148 36 10.3761V27.8006C35.7222 27.5852 35.4135 27.3722 35.0748 27.1751C33.2501 26.1132 30.6105 25.5605 27.4918 27.4005C24.924 28.9155 22.5089 29.3254 19.8818 29.3813C18.711 29.4062 17.5141 29.3609 16.2308 29.3123C16.0558 29.3057 15.8789 29.299 15.7005 29.2924C14.5325 29.2493 13.3017 29.2116 12 29.2328V10.376C12 9.27148 12.8954 8.37605 14 8.37605H20C20.5402 8.37605 21.0574 8.15753 21.434 7.77021L22.566 6.60584C23.3514 5.79805 24.6486 5.79805 25.434 6.60584L26.566 7.77021Z" fill="#FFF"></path> </g></svg>';
                    break;
                case BLOOD_BP:
                    $icon = '<svg viewBox="0 0 48 48" class="w-12 h-12" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M24.1169 20C24.1169 22.2448 22.2373 24 20 24H16V10H20C22.2373 10 24.1169 11.7552 24.1169 14C24.1169 15.2072 23.5733 16.2728 22.7228 17C23.5733 17.7272 24.1169 18.7928 24.1169 20ZM20 12C21.2055 12 22.1169 12.9311 22.1169 14C22.1169 15.0689 21.2055 16 20 16H18V12H20ZM18 18H20C21.2055 18 22.1169 18.9311 22.1169 20C22.1169 21.0689 21.2055 22 20 22H18V18Z" fill="#FFF"></path> <path d="M30 13C30.5523 13 31 13.4477 31 14V16H33C33.5523 16 34 16.4477 34 17C34 17.5523 33.5523 18 33 18H31V20C31 20.5523 30.5523 21 30 21C29.4477 21 29 20.5523 29 20V18H27C26.4477 18 26 17.5523 26 17C26 16.4477 26.4477 16 27 16H29V14C29 13.4477 29.4477 13 30 13Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M23 40V44H25V40H30V38H34C36.2091 38 38 36.2092 38 34.0001V10.1143C38 7.90519 36.2091 6.11433 34 6.11433H28L26.868 4.94997C25.2973 3.33439 22.7027 3.33439 21.132 4.94997L20 6.11433H14C11.7909 6.11433 10 7.90519 10 10.1143V34C10 36.2092 11.7909 38 14 38H18V40H23ZM26.566 7.50849C26.9426 7.89581 27.4598 8.11433 28 8.11433H34C35.1046 8.11433 36 9.00976 36 10.1143V27.5388C35.7222 27.3234 35.4135 27.1103 35.0748 26.9132C33.2501 25.8513 30.6105 25.2987 27.4918 27.1387C24.924 28.6537 22.5089 29.0636 19.8818 29.1195C18.711 29.1444 17.514 29.0991 16.2306 29.0505C16.0556 29.0438 15.8789 29.0371 15.7005 29.0306C14.5325 28.9875 13.3017 28.9498 12 28.9709V10.1143C12 9.00976 12.8954 8.11433 14 8.11433H20C20.5402 8.11433 21.0574 7.89581 21.434 7.50849L22.566 6.34412C23.3514 5.53633 24.6486 5.53633 25.434 6.34412L26.566 7.50849Z" fill="#FFF"></path> </g></svg>';
                    break;
                case BLOOD_BN:
                    $icon = '<svg viewBox="0 0 48 48" class="w-12 h-12" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M27 16H33C33.5523 16 34 16.4477 34 17C34 17.5523 33.5523 18 33 18H27C26.4477 18 26 17.5523 26 17C26 16.4477 26.4477 16 27 16Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 24H20C22.2373 24 24.1169 22.2448 24.1169 20C24.1169 18.7928 23.5733 17.7272 22.7228 17C23.5733 16.2728 24.1169 15.2072 24.1169 14C24.1169 11.7552 22.2373 10 20 10H16V24ZM22.1169 14C22.1169 12.9311 21.2055 12 20 12H18V16H20C21.2055 16 22.1169 15.0689 22.1169 14ZM20 18H18V22H20C21.2055 22 22.1169 21.0689 22.1169 20C22.1169 18.9311 21.2055 18 20 18Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M23 44V40H18V38H14C11.7909 38 10 36.2092 10 34V10.1143C10 7.90519 11.7909 6.11433 14 6.11433H20L21.132 4.94997C22.7027 3.33439 25.2973 3.33439 26.868 4.94997L28 6.11433H34C36.2091 6.11433 38 7.90519 38 10.1143V34.0001C38 36.2092 36.2091 38 34 38H30V40H25V44H23ZM28 8.11433C27.4598 8.11433 26.9426 7.89581 26.566 7.50849L25.434 6.34413C24.6486 5.53633 23.3514 5.53633 22.566 6.34412L21.434 7.50849C21.0574 7.89581 20.5402 8.11433 20 8.11433H14C12.8954 8.11433 12 9.00976 12 10.1143V28.9709C13.3017 28.9498 14.5325 28.9875 15.7005 29.0306C15.8789 29.0371 16.0556 29.0438 16.2306 29.0505C17.514 29.0991 18.711 29.1444 19.8818 29.1195C22.5089 29.0636 24.924 28.6537 27.4918 27.1387C30.6105 25.2987 33.2501 25.8513 35.0748 26.9132C35.4135 27.1103 35.7222 27.3234 36 27.5388V10.1143C36 9.00976 35.1046 8.11433 34 8.11433H28Z" fill="#FFF"></path> </g></svg>';
                    break;
                case BLOOD_ABP:
                    $icon = '<svg viewBox="0 0 48 48" class="w-12 h-12" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M19.3856 5.33391C21.3549 3.27379 24.6451 3.27379 26.6144 5.33391L27.1418 5.88566H32.3302C34.9092 5.88566 37 7.97642 37 10.5555V12H35V10.5555C35 9.08099 33.8047 7.88566 32.3302 7.88566H26.7143C26.4412 7.88566 26.1801 7.77402 25.9914 7.57665L25.1686 6.71587C23.9871 5.4798 22.0129 5.4798 20.8314 6.71587L20.0086 7.57665C19.8199 7.77402 19.5588 7.88566 19.2857 7.88566H14C12.3431 7.88566 11 9.22881 11 10.8857V27.9709C12.3017 27.9498 13.5325 27.9875 14.7005 28.0306C14.8788 28.0371 15.0554 28.0438 15.2304 28.0504C16.5137 28.0991 17.711 28.1444 18.8818 28.1195C21.5089 28.0636 23.924 27.6537 26.4918 26.1387C29.6105 24.2987 32.2501 24.8513 34.0748 25.9132C34.4135 26.1103 34.7222 26.3234 35 26.5388V24H37V33C37 35.7614 34.7614 38 32 38L29 38V40H24V44H22V40H17V38L14 38C11.2386 38 9 35.7614 9 33V10.8857C9 8.12425 11.2386 5.88566 14 5.88566H18.8582L19.3856 5.33391Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M18.4363 12.6489C18.29 12.2586 17.9168 12 17.5 12C17.0832 12 16.71 12.2586 16.5637 12.6489L13.0637 21.9822C12.8697 22.4993 13.1318 23.0757 13.6489 23.2697C14.166 23.4636 14.7424 23.2016 14.9363 22.6845L15.568 21H19.432L20.0637 22.6845C20.2576 23.2016 20.834 23.4636 21.3511 23.2697C21.8682 23.0757 22.1302 22.4993 21.9363 21.9822L18.4363 12.6489ZM18.682 19L17.5 15.848L16.318 19L18.682 19Z" fill="#FFF"></path> <path d="M32 18C32 17.4477 32.4477 17 33 17H35V15C35 14.4477 35.4477 14 36 14C36.5523 14 37 14.4477 37 15V17H39C39.5523 17 40 17.4477 40 18C40 18.5523 39.5523 19 39 19H37V21C37 21.5523 36.5523 22 36 22C35.4477 22 35 21.5523 35 21V19H33C32.4477 19 32 18.5523 32 18Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M26.25 12H23V23H26.25C28.0569 23 29.5876 21.5806 29.5876 19.75C29.5876 18.8664 29.231 18.0786 28.6588 17.5C29.231 16.9214 29.5876 16.1336 29.5876 15.25C29.5876 13.4194 28.0569 12 26.25 12ZM27.5876 15.25C27.5876 14.5953 27.0251 14 26.25 14H25V16.5H26.25C27.0251 16.5 27.5876 15.9047 27.5876 15.25ZM26.25 18.5H25V21H26.25C27.0251 21 27.5876 20.4047 27.5876 19.75C27.5876 19.0953 27.0251 18.5 26.25 18.5Z" fill="#FFF"></path> </g></svg>';
                    break;
                case BLOOD_ABN:
                    $icon = '<svg viewBox="0 0 48 48" class="w-12 h-12" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3856 5.33391C20.3549 3.27379 23.6451 3.27379 25.6144 5.33391L26.1418 5.88566H31.3302C33.9092 5.88566 36 7.97642 36 10.5555V14H34V10.5555C34 9.08099 32.8047 7.88566 31.3302 7.88566H25.7143C25.4412 7.88566 25.1801 7.77402 24.9914 7.57665L24.1686 6.71587C22.9871 5.4798 21.0129 5.4798 19.8314 6.71587L19.0086 7.57665C18.8199 7.77402 18.5588 7.88566 18.2857 7.88566H13C11.3431 7.88566 10 9.22881 10 10.8857V27.9709C11.3017 27.9498 12.5326 27.9875 13.7005 28.0306C13.8788 28.0371 14.0554 28.0438 14.2304 28.0504C15.5137 28.0991 16.711 28.1444 17.8818 28.1195C20.5089 28.0636 22.924 27.6537 25.4919 26.1387C28.6105 24.2987 31.2501 24.8513 33.0748 25.9132C33.4135 26.1103 33.7222 26.3234 34 26.5388V22H36V33C36 35.7614 33.7614 38 31 38L28 38V40H23V44H21V40H16V38L13 38C10.2386 38 8 35.7614 8 33V10.8857C8 8.12425 10.2386 5.88566 13 5.88566H17.8582L18.3856 5.33391Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 12C16.9168 12 17.29 12.2586 17.4363 12.6489L20.9363 21.9822C21.1302 22.4993 20.8682 23.0757 20.3511 23.2697C19.834 23.4636 19.2576 23.2016 19.0637 22.6845L18.432 21H14.568L13.9363 22.6845C13.7424 23.2016 13.166 23.4636 12.6489 23.2697C12.1318 23.0757 11.8697 22.4993 12.0637 21.9822L15.5637 12.6489C15.71 12.2586 16.0832 12 16.5 12ZM16.5 15.848L17.682 19L15.318 19L16.5 15.848Z" fill="#FFF"></path> <path d="M32 17C31.4477 17 31 17.4477 31 18C31 18.5523 31.4477 19 32 19H38C38.5523 19 39 18.5523 39 18C39 17.4477 38.5523 17 38 17H32Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M25.25 12H22V23H25.25C27.0569 23 28.5876 21.5806 28.5876 19.75C28.5876 18.8664 28.231 18.0786 27.6588 17.5C28.231 16.9214 28.5876 16.1336 28.5876 15.25C28.5876 13.4194 27.0569 12 25.25 12ZM26.5876 15.25C26.5876 14.5953 26.0251 14 25.25 14H24V16.5H25.25C26.0251 16.5 26.5876 15.9047 26.5876 15.25ZM25.25 18.5H24V21H25.25C26.0251 21 26.5876 20.4047 26.5876 19.75C26.5876 19.0953 26.0251 18.5 25.25 18.5Z" fill="#FFF"></path> </g></svg>';
                    break;
                case BLOOD_OP:
                    $icon = '<svg viewBox="0 0 48 48" class="w-12 h-12" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M26 17C26 16.4477 26.4477 16 27 16H29V14C29 13.4477 29.4477 13 30 13C30.5523 13 31 13.4477 31 14V16H33C33.5523 16 34 16.4477 34 17C34 17.5523 33.5523 18 33 18H31V20C31 20.5523 30.5523 21 30 21C29.4477 21 29 20.5523 29 20V18H27C26.4477 18 26 17.5523 26 17Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M14 15C14 12.2386 16.2386 10 19 10C21.7614 10 24 12.2386 24 15V19C24 21.7614 21.7614 24 19 24C16.2386 24 14 21.7614 14 19V15ZM22 15V19C22 20.6569 20.6569 22 19 22C17.3431 22 16 20.6569 16 19V15C16 13.3431 17.3431 12 19 12C20.6569 12 22 13.3431 22 15Z" fill="#FFF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M23 40H18V38H14C11.7909 38 10 36.2092 10 34V10.1143C10 7.90519 11.7909 6.11433 14 6.11433H20L21.132 4.94997C22.7027 3.33439 25.2973 3.33439 26.868 4.94997L28 6.11433H34C36.2091 6.11433 38 7.90519 38 10.1143V34.0001C38 36.2092 36.2091 38 34 38H30V40H25V44H23V40ZM28 8.11433C27.4598 8.11433 26.9426 7.89581 26.566 7.50849L25.434 6.34413C24.6486 5.53633 23.3514 5.53633 22.566 6.34412L21.434 7.50849C21.0574 7.89581 20.5402 8.11433 20 8.11433H14C12.8954 8.11433 12 9.00976 12 10.1143V28.9709C13.3017 28.9498 14.5325 28.9875 15.7005 29.0306C15.8789 29.0371 16.0556 29.0438 16.2306 29.0505C17.514 29.0991 18.711 29.1444 19.8818 29.1195C22.5089 29.0636 24.924 28.6537 27.4918 27.1387C30.6105 25.2987 33.2501 25.8513 35.0748 26.9132C35.4135 27.1103 35.7222 27.3234 36 27.5388V10.1143C36 9.00976 35.1046 8.11433 34 8.11433H28Z" fill="#FFF"></path> </g></svg>';
                    break;
                case BLOOD_ON:
                    $icon = '<svg viewBox="0 0 48 48" class="w-12 h-12" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M27 16C26.4477 16 26 16.4477 26 17C26 17.5523 26.4477 18 27 18H33C33.5523 18 34 17.5523 34 17C34 16.4477 33.5523 16 33 16H27Z" fill="#fff"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M14 15C14 12.2386 16.2386 10 19 10C21.7614 10 24 12.2386 24 15V19C24 21.7614 21.7614 24 19 24C16.2386 24 14 21.7614 14 19V15ZM22 15V19C22 20.6569 20.6569 22 19 22C17.3431 22 16 20.6569 16 19V15C16 13.3431 17.3431 12 19 12C20.6569 12 22 13.3431 22 15Z" fill="#fff"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M23 40V44H25V40H30V38H34C36.2091 38 38 36.2092 38 34.0001V10.1143C38 7.90519 36.2091 6.11433 34 6.11433H28L26.868 4.94997C25.2973 3.33439 22.7027 3.33439 21.132 4.94997L20 6.11433H14C11.7909 6.11433 10 7.90519 10 10.1143V34C10 36.2092 11.7909 38 14 38H18V40H23ZM26.566 7.50849C26.9426 7.89581 27.4598 8.11433 28 8.11433H34C35.1046 8.11433 36 9.00976 36 10.1143V27.5388C35.7222 27.3234 35.4135 27.1103 35.0748 26.9132C33.2501 25.8513 30.6105 25.2987 27.4919 27.1387C24.924 28.6537 22.5089 29.0636 19.8818 29.1195C18.711 29.1444 17.5142 29.0991 16.2308 29.0505C16.0558 29.0438 15.8788 29.0371 15.7005 29.0306C14.5326 28.9875 13.3017 28.9498 12 28.9709V10.1143C12 9.00976 12.8954 8.11433 14 8.11433H20C20.5402 8.11433 21.0574 7.89581 21.434 7.50849L22.566 6.34412C23.3514 5.53633 24.6486 5.53633 25.434 6.34413L26.566 7.50849Z" fill="#fff"></path> </g></svg>';
                    break;
            }
                ?>
            <div class="donation w-full my-3 rounded-lg border max-w-xl relative flex flex-col pb-5 sm:pb-0 sm:flex-row items-center gap-5 bg-gray-50">
                <div class="donation-status absolute top-0 right-0 p-3 pt-3 sm:p-3">
                    <div class="flex gap-1 items-center <?= $donation['status'] == DONATION_PROCESSED ? 'bg-green-200' : 'bg-red-200' ?> p-1 rounded">
                        <svg class="w-3 h-3 text-gray-600 <?= $donation['status'] == DONATION_PROCESSED ? 'hidden' : '' ?>" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                        </svg>
                        <svg class="w-3 h-3 text-gray-600 <?= $donation['status'] == DONATION_PROCESSED ? '' : 'hidden' ?>" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z"></path>
                        </svg>
                        <p class="text-sm text-gray-600 font-semibold"><?= $donation['status'] ?></p>
                    </div>
                </div>

                <div class="donation-blood bg-red-950 rounded-t-lg sm:rounded-l-lg sm:rounded-r-none shadow-lg p-3 w-full sm:w-32 h-40 flex flex-col justify-center items-center relative">
                    <?= $icon ?>
                    <div class="text-gray-600 pt-2">
                        <p class="blood-volume text-white text-sm font-semibold"><?= $donation['blood_vol'].' ' ?>ml</p>
                    </div>
                </div>

                <div class="donation-details flex flex-col items-start">
                    <p class="donation-ref text-sm font-semibold text-gray-600"><?= $donation['reference'] ?></p>
                    <p class="donation-ref text-sm text-gray-600 mt-2.5">processed : <?= date('F j\, Y', substr($donation['processed_datetime'], 0, -3)) ?></p>
                    <p class="donation-ref text-sm text-gray-600 mb-2.5">collected : <?= date('F j\, Y', substr($donation['donated_datetime'], 0, -3)) ?></p>
                    <p class="donation-ref text-xs font-semibold text-gray-500 bg-gray-200 rounded p-1"><?= $donation['donation_medium'] ?></p>

                    <?php if($donation['status'] == DONATION_REJECTED): ?>
                    <div class="mt-3 flex items-center max-w-sm text-xs font-semibold p-2  border-red-500 text-red-500 rounded bg-red-100">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
                        </svg>
                        <p><?= $donation['message'] ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.button-dropdown').click(function(){
            const ap = $('#' + $(this).data('target'));

            if(ap.hasClass('hidden')) {
                ap.removeClass('hidden');
                $(this).children('svg').addClass('rotate-90');
            }
            else {
                ap.addClass('hidden');
                $(this).children('svg').removeClass('rotate-90');
            }
        });
    });

    function showAllAppointments(e){
        if($(e).text() == 'more appointments'){
            $('.extra-donor').each((i, elem) => $(elem).removeClass('hidden'));
            $(e).text('less');
        }else{
            $('.extra-donor').each((i, elem) => $(elem).addClass('hidden'));
            $(e).text('more appointments');
        }
    }
</script>