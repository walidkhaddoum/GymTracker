<!DOCTYPE html>
<html lang="zxx" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Gym Tracker - Tableau de bord</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo-c-white.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset('css/rt-plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- End : Theme CSS-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <script src="{{ asset('js/settings.js') }}" sync></script>
    <style>
        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
        }
        .btn-a-brc-tp:not(.disabled):not(:disabled).active, .btn-brc-tp, .btn-brc-tp:focus:not(:hover):not(:active):not(.active):not(.dropdown-toggle), .btn-h-brc-tp:hover, .btn.btn-f-brc-tp:focus, .btn.btn-h-brc-tp:hover {
            border-color: transparent;
        }
        .btn-outline-blue {
            color: #0d6ce1;
            border-color: #5a9beb;
            background-color: transparent;
        }
        .btn {
            cursor: pointer;
            position: relative;
            z-index: auto;
            border-radius: .175rem;
            transition: color .15s,background-color .15s,border-color .15s,box-shadow .15s,opacity .15s;
        }
        .border-2 {
            border-width: 2px!important;
            border-style: solid!important;
            border-color: transparent;
        }
        .bgc-white {
            background-color: #fff!important;
        }


        .text-green-d1 {
            color: #277b5d!important;
        }
        .letter-spacing {
            letter-spacing: .5px!important;
        }
        .font-bolder, .text-600 {
            font-weight: 600!important;
        }
        .text-170 {
            font-size: 1.7em!important;
        }

        .text-purple-d1 {
            color: #6d62b5!important;
        }

        .text-primary-d1 {
            color: #276ab4!important;
        }
        .text-secondary-d1 {
            color: #5f718b!important;
        }
        .text-180 {
            font-size: 1.8em!important;
        }
        .text-150 {
            font-size: 1.5em!important;
        }
        .text-danger-m3 {
            color: #e05858!important;
        }
        .rotate-45 {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }
        .position-l {
            left: 0;
        }
        .position-b, .position-bc, .position-bl, .position-br, .position-center, .position-l, .position-lc, .position-r, .position-rc, .position-t, .position-tc, .position-tl, .position-tr {
            position: absolute!important;
            display: block;
        }
        .mt-n475, .my-n475 {
            margin-top: -2.5rem!important;
        }
        .ml-35, .mx-35 {
            margin-left: 1.25rem!important;
        }

        .text-dark-l1 {
            color: #56585e!important;
        }
        .text-90 {
            font-size: .9em!important;
        }
        .text-left {
            text-align: left!important;
        }

        .mt-25, .my-25 {
            margin-top: .75rem!important;
        }

        .text-110 {
            font-size: 1.1em!important;
        }

        .deleted-text{
            text-decoration:line-through;;
        }
    </style>
</head>

<body class=" font-inter dashcode-app" id="body_class">
<!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a
    href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
<main class="app-wrapper">
    <!-- BEGIN: Sidebar -->
    <!-- BEGIN: Sidebar -->
    @include('partials.sidebaruser')
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
            <!-- END: Header -->
        </div>
        <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
            <div class="page-content">
                <div class="transition-all duration-150 container-fluid" id="page_layout">
                    <div id="content_layout">
                        <div class="mt-5">
                            @foreach($gyms as $gym)
                            <div class="d-style btn btn-brc-tp border-2 bgc-white btn-outline-blue btn-h-outline-blue btn-a-outline-blue w-100 my-2 py-3 shadow-sm">
                                <!-- Basic Plan -->
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-4">
                                        <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                                            {{ $gym->name }}
                                        </h4>

                                        <div class="text-secondary-d1 text-120">
                                            {{ $gym->address }}
                                        </div>
                                    </div>

                                    <ul class="list-unstyled mb-0 col-12 col-md-4 text-dark-l1 text-90 text-left my-4 my-md-0">
                                        @foreach($gym->spaces as $space)
                                        <li class="mt-25">
                                            <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i>
                                            <span class="text-110">
                                                {{ $space->name }}
                                            </span>
                                        </li>
                                        @endforeach
                                    </ul>

                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
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
