<div class="sidebar-wrapper group">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden"></div>
    <div class="logo-segment">
        <a class="flex items-center" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('images/logo/logo-c.svg') }}" class="black_logo" alt="logo">
            <img src="{{ asset('images/logo/logo-c-white.svg') }}" class="white_logo" alt="logo">
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
            <li class="sidebar-menu-title">Menu</li>
            <li>
                <a href="{{ route('admin.dashboard') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:view-grid"></iconify-icon>
            <span>Dashboard</span>
              </span>
                </a>
            </li>
            <!-- Apps Area -->
            <li class="sidebar-menu-title">Users</li>
            <li>
                <a href="{{ route('admin.admins') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:user-circle"></iconify-icon>
            <span>Admins</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.members') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
            <span>Members</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.trainers') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:users"></iconify-icon>
            <span>Trainer</span>
              </span>
                </a>
            </li>
            <!-- Pages Area -->
            <li class="sidebar-menu-title">Gym Management</li>
            <li>
                <a href="{{ route('admin.gyms') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:location-marker"></iconify-icon>
            <span>Gyms</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.spaces') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
            <span>Spaces</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.specializations') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:badge-check"></iconify-icon>
            <span>Specializations</span>
              </span>
                </a>
            </li>
            <li class="sidebar-menu-title">Memberships & Payments</li>
            <li>
                <a href="{{ route('admin.gym_memberships') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:cube-transparent"></iconify-icon>
            <span>Gym Memberships</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.subscriptions') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:calendar"></iconify-icon>
            <span>Subscriptions</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.payments') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:currency-dollar"></iconify-icon>
            <span>Payments</span>
              </span>
                </a>
            </li>
            <li class="sidebar-menu-title">Sessions</li>
            <li>
                <a href="{{ route('admin.group-sessions') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:users"></iconify-icon>
            <span>Group Sessions</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.individual_sessions') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
            <span>Individual Sessions</span>
              </span>
                </a>
            </li>
            <li class="sidebar-menu-title">Attendance & Reports</li>
            <li>
                <a href="{{ route('admin.attendances') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:check-circle"></iconify-icon>
            <span>Attendances</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reports') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:chart-bar"></iconify-icon>
            <span>Reports</span>
              </span>
                </a>
            </li>
        </ul>
    </div>
</div>
