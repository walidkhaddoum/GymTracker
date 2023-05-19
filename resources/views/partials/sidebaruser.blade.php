<div class="sidebar-wrapper group">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden"></div>
    <div class="logo-segment">
        <a class="flex items-center" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('images/logo/logo-c.svg') }}" style="width: 32px" class="black_logo" alt="logo">
            <img src="{{ asset('images/logo/logo-c-white.svg') }}" style="width: 32px" class="white_logo" alt="logo">
            <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">GYM Tracker</span>
        </a>
        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
          <span class="sidebarDotIcon extend-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
        <div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150 ring-2 ring-inset ring-offset-4 ring-black-900 dark:ring-slate-400 bg-slate-900 dark:bg-slate-400 dark:ring-offset-slate-700"></div>
      </span>
            <span class="sidebarDotIcon collapsed-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
        <div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150"></div>
      </span>
        </div>
        <button class="sidebarCloseIcon text-2xl">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0"></div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50" id="sidebar_menus">
        <ul class="sidebar-menu">
            <!-- Apps Area -->
            <li class="sidebar-menu-title">Gyms</li>
            <li>
                <a href="{{ route('user.gyms.index') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:home"></iconify-icon>
            <span>List of Gyms</span>
              </span>
                </a>
            </li>
            <!-- Pages Area -->
            <li class="sidebar-menu-title">Group Sessions</li>
            <li>
                <a href="{{ route('user.group-sessions.browse') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:search"></iconify-icon>
            <span>Brows Group Sessions</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.group-sessions.upcoming') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:calendar"></iconify-icon>
            <span>UpConming Group Sessions</span>
              </span>
                </a>
            </li>
            <li class="sidebar-menu-title">Personal Trainer</li>
            <li>
                <a href="{{ route('user.trainers.index') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:badge-check"></iconify-icon>
            <span>Find a Trainer</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.personal-training.upcoming') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:clock"></iconify-icon>
            <span>Upcoming Personal Training Sessions</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.personal-training.previous') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:archive"></iconify-icon>
            <span>Previous Personal Training Sessions</span>
              </span>
                </a>
            </li>
            <li class="sidebar-menu-title">Subscription</li>
            <li>
                <a href="{{ route('user.subscription.history') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:document-text"></iconify-icon>
            <span>Subscription History</span>
              </span>
                </a>
            </li>

            <li class="sidebar-menu-title">Reservations</li>
            <li>
                <a href="{{ route('user.reservations.upcoming') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:clipboard-list"></iconify-icon>
            <span>Upcoming Reservations</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.reservations.past') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:check-circle"></iconify-icon>
            <span>Past Reservations</span>
              </span>
                </a>
            </li>
        </ul>
    </div>
</div>
