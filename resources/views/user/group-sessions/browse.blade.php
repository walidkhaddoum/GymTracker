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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
                <div class="page-content">
                    <div class="transition-all duration-150 container-fluid" id="page_layout">
                        <div id="content_layout">
                            <!-- BEGIN: Breadcrumb -->
                            <div class="mb-5">
                                <ul class="m-0 p-0 list-none">
                                    <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                                        <a href="index.html">
                                            <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                                            <iconify-icon icon="heroicons-outline:chevron-right"
                                                          class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                                        Utility
                                        <iconify-icon icon="heroicons-outline:chevron-right"
                                                      class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                                    </li>
                                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                        Blank-Page
                                    </li>
                                </ul>
                            </div>
                            <!-- END: BreadCrumb -->
                            <div class="space-y-8">
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                    <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th scope="col" class=" table-th ">Name</th>
                                        <th scope="col" class=" table-th ">Date</th>
                                        <th scope="col" class=" table-th ">Duration</th>
                                        <th scope="col" class=" table-th ">Remaining Capacity</th>
                                        <th scope="col" class=" table-th ">Trainer</th>
                                        <th scope="col" class=" table-th ">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($group_sessions as $session)
                                        <tr>
                                            <td class="table-td">{{ $session->name }}</td>
                                            <td class="table-td">{{ $session->date }}</td>
                                            <td class="table-td">{{ Carbon\Carbon::parse($session->start_time)->diff(Carbon\Carbon::parse($session->end_time))->format('%H:%I') }}</td>
                                            <td class="table-td">{{ $session->remaining_capacity }}</td>
                                            <td class="table-td">{{ $session->sessionAssignments->first()->trainer->first_name }} {{ $session->sessionAssignments->first()->trainer->last_name }}</td>
                                            <td class="table-td">
                                                @php
                                                    $user_id = Auth::user()->member->id;
                                                @endphp
                                                @php
                                                    $registered = $session->sessionRegistrations->contains('member_id', $user_id);
                                                    $capacity_reached = $session->sessionRegistrations->count() >= $session->capacity;
                                                @endphp

                                                @if(!$registered && !$capacity_reached)
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservationModal{{ $session->id }}">Reserve</button>
                                                @else
                                                    @if($registered)
                                                        <span class="text-warning">Already registered</span>
                                                    @else
                                                        <span class="text-danger">Session full</span>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @foreach($group_sessions as $session)
                                        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="reservationModal{{ $session->id }}"  tabindex="-1" aria-labelledby="reservationModalLabel{{ $session->id }}"  aria-hidden="true">
                                            <div class="modal-dialog top-1/2 !-translate-y-1/2 relative w-auto pointer-events-none">
                                                <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                    rounded-md outline-none text-current">
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                                                        <!-- Modal header -->
                                                        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                                                            <h3 class="text-xl font-medium text-white dark:text-white capitalize" id="reservationModalLabel{{ $session->id }}">Reserve Group Session
                                                            </h3>
                                                            <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                                dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                                                                <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                        11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="p-6 space-y-4">
                                                            <div class="modal-body">
                                                                Are you sure you want to register for the "{{ $session->name }}" session with {{ $session->sessionAssignments->first()->trainer->first_name }} {{ $session->sessionAssignments->first()->trainer->last_name }}?
                                                            </div>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                                            <form action="{{ route('user.reserveGroupSession', $session->id) }}" method="POST">
                                                                @csrf
                                                                <button class="btn inline-flex justify-center text-white bg-black-500" type="submit">Reserve</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


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
</body>
</html>
