
<head>
<link href="{{asset('assets/css/style_navbarleft.css')}}" rel="stylesheet"  type="text/css">
<link rel="stylesheet"  type="text/css" href="{{ asset('css/style_navbarleft.css') }}">
<link rel="stylesheet"  type="text/css" href="{{ URL::asset('css/style_navbarleft.css') }}" />
</head>
<nav id="navbarContent" class="page__navbar -translate-x-full fixed top-[66px] left-0 z-50 w-64 w-full-mobile h-screen transition-transform -translate-x-full bg-white1 border-r border-r-gray-200 border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700 custom-side-shadow">
    <div class="h-full pb-4 overflow-y-auto bg-white1 dark:bg-gray-800 p-4">
        <ul>
            <li class="mb-3">
                <div class="flex justify-between w-full gap-4">
                    <button class="btn-menu-mission ">
                        <div class="btn-menu-mission-text">
                            <h1>Mission</h1>
                        </div>
                        <img src="{{ asset('assets/images/images-fix/quests.png') }}" alt="" width="40">
                    </button>
                    <button class="btn-menu-rotate  ">
                        <div class="btn-menu-rotate-text">
                            <h1>Rotate</h1>
                        </div>
                        <div class="spin-anim">      
                            <img class="img-spinbg" src="{{ asset('assets/images/images-fix/bg.png') }}" alt="">
                            <img class="img-turntable" src="{{ asset('assets/images/images-fix/spini.png') }}" alt="">
                            <!-- <img class="img-pointer" src="assets/images/images-fix/download.png" alt=""> -->
                        </div>
                    </button>
                </div>
            </li>
            <li class="mb-4">
                <button type="button" class="promo-register transition duration-700 text-sm ease-in-out font-bold py-2 rounded-lg px-3 w-full">
                    <div class="flex justify-center text-center self-center items-center">
                        <img src="{{ asset('/assets/images/images-fix/refer.webp') }}" alt="" width="30" class="mr-3"> Double your balance
</div>

                </button>
            </li>
        </ul>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <a href="{{ url('/') }}" class="category-active bg-gray-300/20 flex flex-col items-center justify-center text-center p-3 hover:dark:bg-gray-700/20 dark:bg-gray-700 rounded-xl">
                    <img src="{{ asset('/assets/images/images-fix/home.svg') }}" alt="" width="27">
                    <span class="text-[12px] mt-2">Home</span>
                </a>
            </div>
            <div>
                <a href="#" class="bg-gray-300/20 flex flex-col items-center justify-center text-center p-3 hover:dark:bg-gray-700/20 dark:bg-gray-700 rounded-xl">
                    <img src="{{ asset('/assets/images/images-fix/fortune.svg') }}" alt="" width="27">
                    <span class="text-[12px] mt-2">Casino</span>
                </a>
            </div>
        </div>
        <div class="mt-4">
            <div class="grid grid-cols-2 gap-4 mt-4 mb-4">
                                <a href="/games?tab=all" class="h-20 bg-gray-300/20 flex flex-col items-center justify-center text-center p-3 hover:dark:bg-gray-700/20 dark:bg-gray-700 rounded-xl">
                    <img src="{{ asset('/assets/images/images-fix/all.svg') }}" alt="All" width="27">
                    <span class="text-[12px] mt-2">All</span>
                </a>
                <a href="#" class="h-20 bg-gray-300/20 flex flex-col items-center justify-center text-center p-3 hover:dark:bg-gray-700/20 dark:bg-gray-700 rounded-xl">
                    <img src="{{ asset('/assets/images/images-fix/slotg.svg') }}" alt="" width="27">
                    <span class="text-[12px] mt-2">Slots</span>
                </a>
                  @foreach($categories as $category)
                <a href="games?tab={{$category->name}}" class="h-20 bg-gray-300/20 flex flex-col items-center justify-center text-center p-3 hover:dark:bg-gray-700/20 dark:bg-gray-700 rounded-xl">
                    <img src="{{ asset('/assets/images/images-fix/slotg.svg') }}" alt="" width="27">
                    <span class="text-[12px] mt-2">{{$category->name}}</span>
                </a>
                @endforeach
                <a href="#" class="h-20 bg-gray-300/20 flex flex-col items-center justify-center text-center p-3 hover:dark:bg-gray-700/20 dark:bg-gray-700 rounded-xl">
                    <img src="{{ asset('/assets/images/images-fix/card.svg') }}" alt="" width="27">
                    <span class="text-[12px] mt-2">Cards</span>
                </a>
                <a href="#" class="h-20 bg-gray-300/20 flex flex-col items-center justify-center text-center p-3 hover:dark:bg-gray-700/20 dark:bg-gray-700 rounded-xl">
                    <img src="{{ asset('/assets/images/images-fix/vivo.svg') }}" alt="" width="27">
                    <span class="text-[12px] mt-2">Live</span>
                </a>
                <a href="#" class="h-20 bg-gray-300/20 flex flex-col items-center justify-center text-center p-3 hover:dark:bg-gray-700/20 dark:bg-gray-700 rounded-xl">
                    <img src="{{ asset('/assets/images/images-fix/popular.svg') }}" alt="" width="27">
                    <span class="text-[12px] mt-2">Popular</span>
                </a>
                <a href="#" class="h-20 bg-gray-300/20 flex flex-col items-center justify-center text-center p-3 hover:dark:bg-gray-700/20 dark:bg-gray-700 rounded-xl">
                    <img src="{{ asset('/assets/images/images-fix/rouler.svg') }}" alt="" width="27">
                    <span class="text-[12px] mt-2">Roller shutter</span>
                </a>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <a href="#t" class="bg-gray-300/20 flex flex-col items-center justify-center text-center p-3 hover:dark:bg-gray-700/20 dark:bg-gray-700 rounded-xl">
<img src="{{ asset('/assets/images/images-fix/wallet-money.svg') }}" alt="" width="27">
                    <span class="text-[12px] mt-2">Portfolio</span>
                </a>
            </div>
            <div>
            
                <a href="#" class="bg-gray-300/20 flex flex-col items-center justify-center text-center p-3 hover:dark:bg-gray-700/20 dark:bg-gray-700 rounded-xl">
                    <img src="{{ asset('/assets/images/images-fix/folder-favourite.svg') }}" alt="" width="27">
                    <span class="text-[12px] mt-2">Favorites</span>
                </a>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <a href="#" class="relative">
                    <img src="       {{ asset('/assets/images/images-fix/eventos.png') }}" alt="" class="w-full">
                    <h1 class="button-title-menu">Events</h1>
                </a>
            </div>
            <div>
                <a href="#" class="relative">
                    <img src="   {{ asset('/assets/images/images-fix/juros.png') }}" alt="" class="w-full">
                    <h1 class="button-title-menu">Recent</h1>
                </a>
            </div>
            <div>
                <a href="#" class="relative">
                    <img src="{{ asset('/assets/images/images-fix/pendente.png') }}" alt="" class="w-full">
                    <h1 class="button-title-menu">Awards</h1>
                </a>
            </div>
            <div>
                <a href="#" class="relative">
                    <img src="{{ asset('/assets/images/images-fix/rebate.png') }}" alt="" class="w-full">
                    <h1 class="button-title-menu">Records</h1>
                </a>
            </div>
            <div>
                <a href="#" class="relative">
                    <img src="{{ asset('/assets/images/images-fix/vip.png') }}" alt="" class="w-full">
                    <h1 class="button-title-menu">Vip</h1>
                </a>
            </div>
            <div>
                <a href="#" class="relative">
                    <img src="{{ asset('/assets/images/images-fix/coletas.png') }}" alt="" class="w-full">
                    <h1 class="button-title-menu">Bonus</h1>
                </a>
            </div>
        </div>
        <ul class="font-medium mt-5 mb-[200px]">
            <li class="px-3">
                <a href="#" class="l-5 flex items-center w-full p-2 text-gray-700 font-normal transition duration-700 rounded-lg group dark:text-gray-400 dark:hover:text-white">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.2 13.6V14.024C15.1937 14.3381 15.0645 14.6372 14.8402 14.857C14.6158 15.0769 14.3141 15.2001 14 15.2H10V16H14C14.5304 16 15.0391 15.7893 15.4142 15.4142C15.7893 15.0391 16 14.5304 16 14V12.8C15.7748 13.1052 15.5052 13.3748 15.2 13.6Z" fill="#414952"></path>
                        <path d="M0 10.5839C0.049109 9.80103 0.327312 9.04988 0.8 8.42389V8.30389C0.289133 8.88313 0.00499042 9.62758 0 10.3999C0 10.4639 0 10.5199 0 10.5839Z" fill="#414952"></path>
                        <path d="M8 0C5.87827 0 3.84344 0.842855 2.34315 2.34315C0.842855 3.84344 0 5.87827 0 8H0C0.244633 7.6957 0.529976 7.42651 0.848 7.2C1.05156 5.44594 1.89262 3.82784 3.21126 2.65338C4.5299 1.47892 6.23417 0.829998 8 0.829998C9.76583 0.829998 11.4701 1.47892 12.7887 2.65338C14.1074 3.82784 14.9484 5.44594 15.152 7.2C15.47 7.42651 15.7554 7.6957 16 8C16 5.87827 15.1571 3.84344 13.6569 2.34315C12.1566 0.842855 10.1217 0 8 0V0Z" fill="#414952"></path>
                        <path d="M3.2 7.20001C2.35131 7.20001 1.53737 7.53715 0.937258 8.13727C0.337142 8.73739 0 9.55132 0 10.4C0 11.2487 0.337142 12.0626 0.937258 12.6628C1.53737 13.2629 2.35131 13.6 3.2 13.6V7.20001Z" fill="#8C9099"></path>
                        <path d="M12.8 13.6C13.6487 13.6 14.4626 13.2629 15.0627 12.6628C15.6628 12.0626 16 11.2487 16 10.4C16 9.55132 15.6628 8.73739 15.0627 8.13727C14.4626 7.53715 13.6487 7.20001 12.8 7.20001V13.6Z" fill="#8C9099"></path>
<path d="M3.20001 7.20001H4.00001C4.21219 7.20001 4.41567 7.2843 4.5657 7.43433C4.71573 7.58436 4.80001 7.78784 4.80001 8.00001V12.8C4.80001 13.0122 4.71573 13.2157 4.5657 13.3657C4.41567 13.5157 4.21219 13.6 4.00001 13.6H3.20001V7.20001Z" fill="#414952"></path>
                        <path d="M12 7.20001H12.8V13.6H12C11.7878 13.6 11.5844 13.5157 11.4343 13.3657C11.2843 13.2157 11.2 13.0122 11.2 12.8V8.00001C11.2 7.78784 11.2843 7.58436 11.4343 7.43433C11.5844 7.2843 11.7878 7.20001 12 7.20001Z" fill="#414952"></path>
                        <path d="M6.8 14H9.2C9.41217 14 9.61566 14.0843 9.76569 14.2343C9.91571 14.3843 10 14.5878 10 14.8V16H6.8C6.58783 16 6.38434 15.9157 6.23431 15.7657C6.08429 15.6157 6 15.4122 6 15.2V14.8C6 14.5878 6.08429 14.3843 6.23431 14.2343C6.38434 14.0843 6.58783 14 6.8 14Z" fill="#8C9099"></path>
                    </svg>
                    <span class="ml-3">Support</span>
                </a>
            </li>
            <li class="px-3">
                <a href="#" class="l-5 flex items-center w-full p-2 text-gray-700 font-normal transition duration-700 rounded-lg group dark:text-gray-400 dark:hover:text-white">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 10C10.7614 10 13 7.76142 13 5C13 2.23858 10.7614 0 8 0C5.23858 0 3 2.23858 3 5C3 7.76142 5.23858 10 8 10Z" fill="#8C9099"></path>
                        <path d="M13.8 8.89999C12.7 10.6 10.8 11.8 8.60001 12L10.5 16L12.4 12.9L16 13.4L13.8 8.89999Z" fill="#414952"></path>
                        <path d="M2.2 8.89999L0 13.4L3.6 12.9L5.4 16L7.3 12C5.2 11.8 3.3 10.6 2.2 8.89999Z" fill="#414952"></path>
                    </svg>
                    <span class="ml-3">Promotions</span>
                </a>
            </li>
            <li class="px-3">
                <a href="#" class="l-5 flex items-center w-full p-2 text-gray-700 font-normal transition duration-700 rounded-lg group dark:text-gray-400 dark:hover:text-white">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.1787 9.63885L10.0651 10.062L9.64343 10.1738L7.47002 10.7646L6.30222 16.6091C6.43671 16.7378 6.59606 16.8387 6.77085 16.9058C6.94564 16.9728 7.1323 17.0047 7.31982 16.9995C7.50733 16.9942 7.69187 16.9521 7.86254 16.8754C8.03321 16.7988 8.18652 16.6892 8.31343 16.5532L16.561 8.30548C16.8332 8.04213 16.9905 7.68478 16.9996 7.30918C17.0087 6.93358 16.8688 6.56926 16.6097 6.29346L10.7707 7.45915L10.1787 9.63885Z" fill="#414952"></path>
                        <path d="M9.7004 1.43115L1.43658 9.67885C1.16573 9.94455 1.00948 10.3029 1.00042 10.6792C0.991353 11.0556 1.13017 11.4208 1.38792 11.6989L9.49765 9.48723L11.6954 1.38324C11.5612 1.25742 11.4032 1.15886 11.2303 1.09317C11.0574 1.02748 10.8731 0.995965 10.6878 1.00041C10.5026 1.00486 10.32 1.04519 10.1506 1.1191C9.98117 1.193 9.82819 1.29904 9.7004 1.43115Z" fill="#8C9099"></path>
                        <path d="M1.18518 1.39122L6.26187 1.38324" stroke="#8C9099" stroke-miterlimit="10" stroke-linecap="round"></path>
                        <path d="M1.18518 3.7865H4.42907" stroke="#8C9099" stroke-miterlimit="10" stroke-linecap="round"></path>
                        <path d="M1.18518 6.18176H1.99615" stroke="#8C9099" stroke-miterlimit="10" stroke-linecap="round"></path>
                        <path d="M6.52948 11.1639L2.07724 12.3775L5.58065 15.8906L6.52948 11.1639Z" fill="#8C9099"></path>
                        <path d="M15.8879 5.57496L12.3845 2.06989L11.1681 6.52508L15.8879 5.57496Z" fill="#8C9099"></path>
                    </svg>
                    <span class="ml-3">Refer a friend</span>
                </a>
            </li>
            <li class="px-3">
                <a href="#" class="transition duration-700 bg-gray-100 dark:bg-transparent hover:bg-gray-200 dark:hover:bg-transparent flex items-center p-2 text-gray-700 font-normal rounded-lg dark:text-gray-400 dark:hover:text-white group">
<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_31_225)">
                            <path d="M4 8H0V12.9C0 13.9 0.7 14.8 1.7 15C2.9 15.2 4 14.2 4 13V8Z" fill="#414952"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 1H6.99999C6.39999 1 5.99999 1.4 5.99999 2V13C5.99999 13.7 5.79999 14.4 5.39999 15H13C14.7 15 16 13.7 16 12V2C16 1.4 15.6 1 15 1ZM13.6 5H8.79999V7H13.6V5ZM8.79999 9H13.6V11H8.79999V9Z" fill="#8C9099"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_31_225">
                                <rect width="16" height="16" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Support Center</span>
                </a>
            </li>
        </ul>
    </div>
</nav>