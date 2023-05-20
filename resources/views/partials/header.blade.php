<div class="z-[9]" id="app_header">
    <div
        class="app-header z-[999] ltr:ml-[248px] rtl:mr-[248px] bg-white dark:bg-slate-800 shadow-sm dark:shadow-slate-700">
        <div class="flex justify-between items-center h-full">
            <div class="flex items-center md:space-x-4 space-x-2 xl:space-x-0 rtl:space-x-reverse vertical-box">
                <a href="index.html" class="mobile-logo xl:hidden inline-block">
                    <img src="{{ asset('images/logo/logo-c.svg') }}" style="width: 32px" class="black_logo" alt="logo">
                    <img src="{{ asset('images/logo/logo-c-white.svg') }}" style="width: 32px" class="white_logo"
                         alt="logo">
                </a>
                <button class="smallDeviceMenuController hidden md:inline-block xl:hidden">
                    <iconify-icon
                        class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white"
                        icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>
                <button class="flex items-center xl:text-sm text-lg xl:text-slate-400 text-slate-800 dark:text-slate-300 px-1
        rtl:space-x-reverse search-modal" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <iconify-icon icon="heroicons-outline:search"></iconify-icon>
                    <span class="xl:inline-block hidden ml-3">Search...
    </span>
                </button>

            </div>
            <!-- end vertcial -->
            <div class="items-center space-x-4 rtl:space-x-reverse horizental-box">
                <a href="">
                  <span class="xl:inline-block hidden">
        <img src="{{ asset('images/logo/logo-c.svg') }}" style="width: 32px" class="black_logo" alt="logo">
            <img src="{{ asset('images/logo/logo-c-white.svg') }}" style="width: 32px" class="white_logo" alt="logo">
    </span>
                    <span class="xl:hidden inline-block">
        <img src="{{ asset('images/logo/logo-c.svg') }}" style="width: 32px" class="black_logo" alt="logo">
            <img src="{{ asset('images/logo/logo-c-white.svg') }}" style="width: 32px" class="white_logo" alt="logo">
    </span>
                </a>
                <button class="smallDeviceMenuController  open-sdiebar-controller xl:hidden inline-block">
                    <iconify-icon
                        class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white"
                        icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>

            </div>
            <div class="nav-tools flex items-center lg:space-x-5 space-x-3 rtl:space-x-reverse leading-0">

                <!-- BEGIN: Language Dropdown  -->

                <div class="relative">
                    <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
            inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <iconify-icon icon="circle-flags:uk" class="mr-0 md:mr-2 rtl:ml-2 text-xl"></iconify-icon>
                        <span class="text-sm md:block hidden font-medium text-slate-600 dark:text-slate-300">
            En</span>
                    </button>
                    <!-- Language Dropdown menu -->
                    <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-900 !top-[25px] rounded-md
            overflow-hidden">
                        <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
                            <li>
                                <a href="#"
                                   class="flex items-center px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                    <iconify-icon icon="circle-flags:uk"
                                                  class="ltr:mr-2 rtl:ml-2 text-xl"></iconify-icon>
                                    <span class="font-medium">ENG</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Theme Changer -->
                <!-- END: Language Dropdown -->

                <!-- BEGIN: Toggle Theme -->
                <div>
                    <button id="themeMood"
                            class="h-[28px] w-[28px] lg:h-[32px] lg:w-[32px] lg:bg-gray-500-f7 bg-slate-50 dark:bg-slate-900 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center">
                        <iconify-icon class="text-slate-800 dark:text-white text-xl dark:block hidden" id="moonIcon"
                                      icon="line-md:sunny-outline-to-moon-alt-loop-transition"></iconify-icon>
                        <iconify-icon class="text-slate-800 dark:text-white text-xl dark:hidden block" id="sunIcon"
                                      icon="line-md:moon-filled-to-sunny-filled-loop-transition"></iconify-icon>
                    </button>
                </div>
                <!-- END: TOggle Theme -->
                <!-- Notifications Dropdown area -->
                <div class="relative md:block hidden">
                    <button class="lg:h-[32px] lg:w-[32px] lg:bg-slate-100 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer
      rounded-full text-[20px] flex flex-col items-center justify-center" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        <iconify-icon class="animate-tada text-slate-800 dark:text-white text-xl"
                                      icon="heroicons-outline:bell"></iconify-icon>
                        <span class="absolute -right-1 lg:top-0 -top-[6px] h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
        justify-center rounded-full text-white z-[99]">
      4</span>
                    </button>
                    <!-- Notifications Dropdown -->
                    <div class="dropdown-menu z-10 hidden bg-white shadow w-[335px]
      dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md overflow-hidden lrt:origin-top-right rtl:origin-top-left">
                        <div class="flex items-center justify-between py-4 px-4">
                            <h3 class="text-sm font-Inter font-medium text-slate-700 dark:text-white">Notifications</h3>
                            <a class="text-xs font-Inter font-normal underline text-slate-500 dark:text-white" href="#">See
                                All</a>
                        </div>
                        <div class="" role="none">
                            <div
                                class="bg-slate-100 dark:bg-slate-700 dark:bg-opacity-70 text-slate-800 block w-full px-4 py-2 text-sm relative">
                                <div class="flex ltr:text-left rtl:text-right">
                                    <div class="flex-none ltr:mr-3 rtl:ml-3">
                                        <div class="h-8 w-8 bg-white rounded-full">
                                            <img src="{{ asset('images/all-img/user.png') }}" alt="user"
                                                 class="border-white block w-full h-full object-cover rounded-full border">
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                before:top-0 before:left-0">
                                            Gym Tracker</a>
                                        <div class="text-slate-500 dark:text-slate-200 text-xs leading-4">Page still in
                                            develop
                                        </div>
                                        <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">
                                            3 min ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Notification Dropdown -->

                <!-- BEGIN: Profile Dropdown -->
                <!-- Profile DropDown Area -->
                <div class="md:block hidden w-full">
                    <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
      inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="lg:h-8 lg:w-8 h-7 w-7 rounded-full flex-1 ltr:mr-[10px] rtl:ml-[10px]">
                            <img src="{{ asset('images/avatar/av-1.svg') }}" alt="user"
                                 class="block w-full h-full object-cover rounded-full">
                        </div>
                        <span
                            class="flex-none text-slate-600 dark:text-white text-sm font-normal items-center lg:flex hidden overflow-hidden text-ellipsis whitespace-nowrap">{{ Auth::user()->name }}</span>
                        <svg
                            class="w-[16px] h-[16px] dark:text-white hidden lg:inline-block text-base inline-block ml-[10px] rtl:mr-[10px]"
                            aria-hidden="true" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md
      overflow-hidden">
                        <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
                            <li>
                                <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
                                            dark:text-white font-normal"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <iconify-icon icon="heroicons-outline:lock-open"
                                                  class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Header -->
                <button class="smallDeviceMenuController md:hidden block leading-0">
                    <iconify-icon class="cursor-pointer text-slate-900 dark:text-white text-2xl"
                                  icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>
                <!-- end mobile menu -->
            </div>
            <!-- end nav tools -->
        </div>
    </div>
</div>
