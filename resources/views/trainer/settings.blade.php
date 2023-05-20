<!DOCTYPE html>
<html lang="zxx" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Gym Tracker - Settings</title>
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
<!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a
    href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
<main class="app-wrapper">
    <!-- BEGIN: Sidebar -->
    <!-- BEGIN: Sidebar -->
    @include('partials.sidebartrainer')
    <!-- End: Sidebar -->
    <!-- End: Sidebar -->
    <div class="flex flex-col justify-between min-h-screen">
        <div>
            <!-- BEGIN: Header -->
            <!-- BEGIN: Header -->
            @include('partials.header')
            <!-- BEGIN: Search Modal -->
            <div
                class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
                <div class="modal-dialog relative w-auto pointer-events-none top-1/4">
                    <div
                        class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-900 bg-clip-padding rounded-md outline-none text-current">
                        <form>
                            <div class="relative">
                                <input type="text" class="form-control !py-3 !pr-12" placeholder="Search">
                                <button
                                    class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l text-xl border-l-slate-200 dark:border-l-slate-600 dark:text-slate-300 flex items-center justify-center">
                                    <iconify-icon icon="heroicons-solid:search"></iconify-icon>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END: Search Modal -->
            <!-- END: Header -->
            <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
                <div class="page-content">
                    <div class="transition-all duration-150 container-fluid" id="page_layout">
                        <div id="content_layout">




                            <!-- BEGIN: Breadcrumb -->
                            <div class="mb-5">
                                <ul class="m-0 p-0 list-none">
                                    <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                                        <a href="{{ route('trainer.dashboard') }}">                                            <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                                            <iconify-icon icon="heroicons-outline:chevron-right"
                                                          class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                                        Change Password
                                        <iconify-icon icon="heroicons-outline:chevron-right"
                                                      class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                                    </li>
                                </ul>
                            </div>
                            <!-- END: BreadCrumb -->
                            <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                                <!-- Basic Inputs -->
                                <div class="card">
                                    <div class="card-body flex flex-col p-6">
                                        <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                            <div class="flex-1">
                                                <div class="card-title text-slate-900 dark:text-white">Change Password</div>
                                            </div>
                                        </header>
                                        <div class="card-text h-full space-y-4">
                                            <form action="{{ route('trainer.changePassword') }}" method="POST">
                                                @csrf

                                                @if(session('success'))
                                                    <div class="alert alert-success">{{ session('success') }}</div>
                                                @endif

                                                <div class="input-area">
                                                    <label for="current_password">Current Password</label>
                                                    <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror">
                                                    @error('current_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class=" input-area">
                                                    <label for="new_password">New Password</label>
                                                    <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror">
                                                    @error('new_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="input-area">
                                                    <label for="new_password_confirmation">Confirm New Password</label>
                                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
                                                </div>
                                                <div class="mt-10">
                                                    <div class="input-area">
                                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Header -->
        </div>

    @include("partials.footer")

    @include("partials.mobile_header")
</main>

<!-- scripts -->
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/rt-plugins.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>

</script>
</body>
</html>
