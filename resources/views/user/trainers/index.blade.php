<!DOCTYPE html>
<html lang="zxx" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Gym Tracker - Tableau de bord</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/favicon.svg') }}">
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
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <div class="page-content">
                    <div class="transition-all duration-150 container-fluid" id="page_layout">
                        <div id="content_layout">
                            <!-- BEGIN: Breadcrumb -->
                            <div class="mb-5">
                                <ul class="m-0 p-0 list-none">
                                    <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                                        <a href="index.html">
                                            <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                                            <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                                        Utility
                                        <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                                    </li>
                                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                        Blank-Page</li>
                                </ul>
                            </div>
                            <!-- END: BreadCrumb -->
                            <div class="space-y-8">
                                <div class="grid lg:grid-cols-6 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-5">

                                    @foreach ($trainers as $trainer)
                                        <div class="bg-slate-900 dark:bg-slate-800 mb-10 mt-7 p-4 relative text-center rounded-2xl text-white">
                                            <div class="image-container">
                                                <img src="{{ asset('storage/'.$trainer->picture) }}" alt="" class="trainer-image">
                                            </div>
                                            <div class="max-w-[160px] mx-auto mt-6">
                                                <div class="widget-title">{{ $trainer->first_name }} {{ $trainer->last_name }}</div>
                                                <div class="text-xs font-normal">
                                                    @foreach ($trainer->specializations as $key => $specialization)
                                                        {{ $specialization->name }}{{ $key < count($trainer->specializations) - 1 ? ', ' : '' }}
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="mt-6">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reserveModal">
                                                    Reserve
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="reserveModal" tabindex="-1" aria-labelledby="reserveModalLabel" aria-hidden="true">
                                <!-- BEGIN: Modal -->
                                <div class="modal-dialog relative w-auto pointer-events-none">
                                    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                                                <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                                                    Reserve a session with {{ $trainer->first_name }} {{ $trainer->last_name }}
                                                </h3>
                                                <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-4">
                                                <form action="{{ route('reservations.store') }}" method="POST" id="reservation-form">
                                                    <div class="modal-body">
                                                        @php
                                                            use Illuminate\Support\Facades\Auth;
                                                        @endphp
                                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                        <input type="hidden" name="trainer_id" value="{{ $trainer->id }}">
                                                        <div class="form-group">
                                                            <label for="session_date">Session Date:</label>
                                                            <input type="date" class="form-control" id="session_date" name="session_date" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="session_time">Session Time:</label>
                                                            <input type="time" class="form-control" id="session_time" name="session_time" required>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" id="confirm-reservation" class="btn inline-flex justify-center text-white bg-black-500">Confirm Reservation</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Modals -->
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
    document.addEventListener('DOMContentLoaded', function () {
        const reservationForm = document.getElementById('reservation-form');

        reservationForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(reservationForm);
            const url = reservationForm.getAttribute('action');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: formData,
            })
                .then((response) => {
                    if (!response.ok) {
                        return response.json().then((errorData) => {
                            throw new Error(`Error: ${errorData.message}`);
                        });
                    }
                    return response.json();
                })

                .then((data) => {
                    if (data.success) {
                        // Handle success message
                        console.log(data.message);
                        // Close the modal
                        let modalEl = document.getElementById('reserveModal');
                        let modalInstance = bootstrap.Modal.getInstance(modalEl);
                        modalInstance.hide();
                    } else {
                        // Handle error message
                        console.error(data.message);
                    }
                })
                .catch((error) => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        });
    });
</script>
</body>
</html>
