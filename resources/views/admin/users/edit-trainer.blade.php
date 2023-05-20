<!DOCTYPE html>
<!-- Template Name: DashCode - HTML, React, Vue, Tailwind Admin Dashboard Template Author: Codeshaper Website: https://codeshaper.net Contact: support@codeshaperbd.net Like: https://www.facebook.com/Codeshaperbd Purchase: https://themeforest.net/item/dashcode-admin-dashboard-template/42600453 License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project. -->
<html lang="zxx" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Gym Tracker - Trainers Lists</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo-c-white.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset('css/rt-plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- End : Theme CSS-->
    <script src="{{ asset('js/settings.js') }}" sync></script>
</head>

<body class=" font-inter dashcode-app" id="body_class">
<!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
<main class="app-wrapper">
    <!-- BEGIN: Sidebar -->
    <!-- BEGIN: Sidebar -->
    @include('partials.sidebar')
    <!-- End: Sidebar -->
    <!-- End: Sidebar -->
    <!-- BEGIN: Settings -->

    <!-- BEGIN: Settings -->
    <!-- Settings Toggle Button -->
    <button class="fixed ltr:md:right-[-29px] ltr:right-0 rtl:left-0 rtl:md:left-[-29px] top-1/2 z-[888] translate-y-1/2 bg-slate-800 text-slate-50 dark:bg-slate-700 dark:text-slate-300 cursor-pointer transform rotate-90 flex items-center text-sm font-medium px-2 py-2 shadow-deep ltr:rounded-b rtl:rounded-t" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
        <iconify-icon class="text-slate-50 text-lg animate-spin" icon="material-symbols:settings-outline-rounded"></iconify-icon>
        <span class="hidden md:inline-block ltr:ml-2 rtl:mr-2">Settings</span>
    </button>

    <!-- BEGIN: Settings Modal -->
    <!-- END: Settings Modal -->
    <!-- END: Settings -->

    <!-- End: Settings -->
    <div class="flex flex-col justify-between min-h-screen">
        <div>
            <!-- BEGIN: Header -->
            <!-- BEGIN: Header -->
            @include('partials.header')
            <!-- BEGIN: Search Modal -->
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
                <div class="modal-dialog relative w-auto pointer-events-none top-1/4">
                    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-900 bg-clip-padding rounded-md outline-none text-current">
                        <form>
                            <div class="relative">
                                <input type="text" class="form-control !py-3 !pr-12" placeholder="Search">
                                <button class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l text-xl border-l-slate-200 dark:border-l-slate-600 dark:text-slate-300 flex items-center justify-center">
                                    <iconify-icon icon="heroicons-solid:search"></iconify-icon>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END: Search Modal -->
            <!-- END: Header -->
            <!-- END: Header -->
            <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
                <div class="page-content">
                    <div class="transition-all duration-150 container-fluid" id="page_layout">
                        <div id="content_layout">

                            <div class="card">
                                <div class="card-body flex flex-col p-6">
                                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                        <div class="flex-1">
                                            <div class="card-title text-slate-900 dark:text-white">Basic Inputs</div>
                                        </div>
                                    </header>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('admin.update-trainer', $trainer->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="filegroup">
                                            <label for="picture">Profile Photo*</label>
                                            <input id="picture" type="file" name="picture">
                                        </div>
                                        <div class="input-area">
                                            <label for="first_name">First Name*</label>
                                            <input id="first_name" type="text" name="first_name" value="{{ $trainer->first_name }}" placeholder="First Name">
                                        </div>
                                        <div class="input-area">
                                            <label for="last_name">Last Name*</label>
                                            <input id="last_name" type="text" name="last_name" value="{{ $trainer->last_name }}" placeholder="Last Name">
                                        </div>
                                        <div class="input-area">
                                            <label for="phone_number">Phone Number *</label>
                                            <input id="phone_number" type="text" name="phone_number" value="{{ $trainer->phone_number }}" placeholder="Phone Number">
                                        </div>
                                        <select name="gym_id">
                                            @foreach ($gyms as $gym)
                                                <option value="{{ $gym->id }}" {{ $gym->id == $trainer->gym_id ? 'selected' : '' }}>{{ $gym->name }}</option>
                                            @endforeach
                                        </select>
                                        @foreach ($specializations as $specialization)
                                            <div class="checkbox-area">
                                                <label>
                                                    <input type="checkbox" name="specializations[]" value="{{ $specialization->id }}"
                                                           @if(in_array($specialization->id, $trainer->specializations->pluck('id')->toArray())) checked @endif>
                                                    <span>{{ $specialization->name }}</span>
                                                </label>
                                            </div>
                                        @endforeach

                                        <button type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN: Footer For Desktop and tab -->
        <footer class="md:block hidden" id="footer">
            <div class="site-footer px-6 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-300 py-4 ltr:ml-[248px] rtl:mr-[248px]">
                <div class="grid md:grid-cols-2 grid-cols-1 md:gap-5">
                    <div class="text-center ltr:md:text-start rtl:md:text-right text-sm">
                        COPYRIGHT ©
                        <span id="thisYear"></span>
                        DashCode, All rights Reserved
                    </div>
                    <div class="ltr:md:text-right rtl:md:text-end text-center text-sm">
                        Hand-crafted &amp; Made by
                        <a href="https://codeshaper.net" target="_blank" class="text-primary-500 font-semibold">
                            Codeshaper
                        </a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END: Footer For Desktop and tab -->

        <div class="bg-white bg-no-repeat custom-dropshadow footer-bg dark:bg-slate-700 flex justify-around items-center
    backdrop-filter backdrop-blur-[40px] fixed left-0 bottom-0 w-full z-[9999] bothrefm-0 py-[12px] px-4 md:hidden">
            <a href="chat.html">
                <div>
            <span class="relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
          text-slate-900 ">
        <iconify-icon icon="heroicons-outline:mail"></iconify-icon>
        <span class="absolute right-[5px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
            justify-center rounded-full text-white z-[99]">
          10
        </span>
            </span>
                    <span class="block text-[11px] text-slate-600 dark:text-slate-300">
        Messages
      </span>
                </div>
            </a>
            <a href="profile.html" class="relative bg-white bg-no-repeat backdrop-filter backdrop-blur-[40px] rounded-full footer-bg dark:bg-slate-700
      h-[65px] w-[65px] z-[-1] -mt-[40px] flex justify-center items-center">
                <div class="h-[50px] w-[50px] rounded-full relative left-[0px] hrefp-[0px] custom-dropshadow">
                    <img src="assets/images/users/user-1.jpg" alt="" class="w-full h-full rounded-full border-2 border-slate-100">
                </div>
            </a>
            <a href="#">
                <div>
            <span class=" relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
          text-slate-900">
        <iconify-icon icon="heroicons-outline:bell"></iconify-icon>
        <span class="absolute right-[17px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
            justify-center rounded-full text-white z-[99]">
          2
        </span>
            </span>
                    <span class=" block text-[11px] text-slate-600 dark:text-slate-300">
        Notifications
      </span>
                </div>
            </a>
        </div>
    </div>
</main>
<!-- scripts -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
