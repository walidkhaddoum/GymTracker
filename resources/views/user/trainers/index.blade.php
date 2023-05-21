<!DOCTYPE html>
<html lang="zxx" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Gym Tracker - Tableau de bord</title>
    <link rel="icon" type="image/png" href="{{ secure_asset('images/logo/logo-c-white.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- BEGIN: Theme CSS-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ secure_asset('css/rt-plugins.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <!-- End : Theme CSS-->
    <script src="{{ secure_asset('js/settings.js') }}" sync></script>
    <style>
        .heart {
            width: 100px;
            height: 100px;
            position: absolute;
            top: -25px;
            right: -25px;
            background: url(https://cssanimation.rocks/images/posts/steps/heart.png) no-repeat;
            background-position: 0 0; /* show the first frame */
            cursor: pointer;
        }


        .heart.active {
            animation: fave-heart 1s steps(28);
            background-position: -2800px 0;
        }

        @keyframes fave-heart {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: -2800px 0;
            }
        }

        .button_container {
            text-align: center; /* center the button horizontally */
            padding: 10px; /* provide some space */
        }

        .advisor_thumb img {
            height: 200px; /* adjust as needed */
            width: 100%;
            object-fit: cover;
        }


        .single_advisor_profile {
            position: relative;
            margin-bottom: 50px;
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            z-index: 1;
            border-radius: 15px;
            -webkit-box-shadow: 0 0.25rem 1rem 0 rgba(47, 91, 234, 0.125);
            box-shadow: 0 0.25rem 1rem 0 rgba(47, 91, 234, 0.125);
        }

        .single_advisor_profile .advisor_thumb {
            position: relative;
            z-index: 1;
            border-radius: 15px 15px 0 0;
            margin: 0 auto;
            background-color: #3f43fd;
            overflow: hidden;
        }

        .single_advisor_profile .advisor_thumb::after {
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            position: absolute;
            width: 150%;
            height: 80px;
            bottom: -45px;
            left: -25%;
            content: "";
            background-color: #ffffff;
            -webkit-transform: rotate(-15deg);
            transform: rotate(-15deg);
        }

        @media only screen and (max-width: 575px) {
            .single_advisor_profile .advisor_thumb::after {
                height: 160px;
                bottom: -90px;
            }
        }

        .single_advisor_profile .advisor_thumb .social-info {
            position: absolute;
            z-index: 1;
            width: 100%;
            bottom: 0;
            right: 30px;
            text-align: right;
        }

        .single_advisor_profile .advisor_thumb .social-info a {
            font-size: 14px;
            color: #020710;
            padding: 0 5px;
        }

        .single_advisor_profile .advisor_thumb .social-info a:hover,
        .single_advisor_profile .advisor_thumb .social-info a:focus {
            color: #3f43fd;
        }

        .single_advisor_profile .advisor_thumb .social-info a:last-child {
            padding-right: 0;
        }

        .single_advisor_profile .single_advisor_details_info {
            position: relative;
            z-index: 1;
            padding: 30px;
            text-align: right;
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            border-radius: 0 0 15px 15px;
            background-color: #ffffff;
        }

        .single_advisor_profile .single_advisor_details_info::after {
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            position: absolute;
            z-index: 1;
            width: 50px;
            height: 3px;
            background-color: #3f43fd;
            content: "";
            top: 12px;
            right: 30px;
        }

        .single_advisor_profile .single_advisor_details_info h6 {
            margin-bottom: 0.25rem;
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .single_advisor_profile .single_advisor_details_info h6 {
                font-size: 14px;
            }
        }

        .single_advisor_profile .single_advisor_details_info p {
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            margin-bottom: 0;
            font-size: 14px;
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .single_advisor_profile .single_advisor_details_info p {
                font-size: 12px;
            }
        }

        .single_advisor_profile:hover .advisor_thumb::after,
        .single_advisor_profile:focus .advisor_thumb::after {
            background-color: #070a57;
        }

        .single_advisor_profile:hover .advisor_thumb .social-info a,
        .single_advisor_profile:focus .advisor_thumb .social-info a {
            color: #ffffff;
        }

        .single_advisor_profile:hover .advisor_thumb .social-info a:hover,
        .single_advisor_profile:hover .advisor_thumb .social-info a:focus,
        .single_advisor_profile:focus .advisor_thumb .social-info a:hover,
        .single_advisor_profile:focus .advisor_thumb .social-info a:focus {
            color: #ffffff;
        }

        .single_advisor_profile:hover .single_advisor_details_info,
        .single_advisor_profile:focus .single_advisor_details_info {
            background-color: #070a57;
        }

        .single_advisor_profile:hover .single_advisor_details_info::after,
        .single_advisor_profile:focus .single_advisor_details_info::after {
            background-color: #ffffff;
        }

        .single_advisor_profile:hover .single_advisor_details_info h6,
        .single_advisor_profile:focus .single_advisor_details_info h6 {
            color: #ffffff;
        }

        .single_advisor_profile:hover .single_advisor_details_info p,
        .single_advisor_profile:focus .single_advisor_details_info p {
            color: #ffffff;
        }


    </style>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

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
                                <div id="messages"></div>
                                <div class="grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-5">
                                    @foreach ($trainers as $trainer)
                                        <div class="col-12 col-sm-6 col-lg-2 d-flex flex-fill">
                                            <div class="single_advisor_profile wow fadeInUp d-flex flex-column"
                                                 data-wow-delay="0.2s"
                                                 style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                                <!-- Team Thumb-->
                                                <div class="advisor_thumb"><img
                                                        src="{{ asset('storage/'.$trainer->picture) }}" alt="">
                                                    <!-- Social Info-->
                                                    <div
                                                        class="heart {{ Auth::user()->member->favorite_trainers->contains($trainer) ? 'active' : '' }}"
                                                        data-trainer-id="{{ $trainer->id }}"></div>
                                                </div>
                                                <!-- Team Details-->
                                                <div class="single_advisor_details_info">
                                                    <h6>{{ $trainer->first_name }} {{ $trainer->last_name }}</h6>
                                                    <p class="designation">@foreach ($trainer->specializations as $key => $specialization)
                                                            {{ $specialization->name }}{{ $key < count($trainer->specializations) - 1 ? ', ' : '' }}
                                                        @endforeach</p>
                                                </div>
                                                <!-- Reserve button -->
                                                <div class="button_container mt-auto">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#reserveModal">Reserve
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div
                                class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                id="reserveModal" tabindex="-1" aria-labelledby="reserveModalLabel" aria-hidden="true">
                                <!-- BEGIN: Modal -->
                                <div class="modal-dialog relative w-auto pointer-events-none">
                                    <div
                                        class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                                                <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                                                    Reserve a session
                                                    with {{ $trainer->first_name }} {{ $trainer->last_name }}
                                                </h3>
                                                <button type="button"
                                                        class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                                                        data-bs-dismiss="modal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff"
                                                         viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-4">
                                                <form action="{{ route('reservations.store') }}" method="POST"
                                                      id="reservation-form">
                                                    <div class="modal-body">
                                                        @php
                                                            use Illuminate\Support\Facades\Auth;
                                                        @endphp
                                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                        <input type="hidden" name="trainer_id"
                                                               value="{{ $trainer->id }}">
                                                        <div class="form-group">
                                                            <label for="session_date">Session Date:</label>
                                                            <input type="date" class="form-control" id="session_date"
                                                                   name="session_date" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="start_time">Start Time:</label>
                                                            <input type="time" class="form-control" id="start_time"
                                                                   name="start_time" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="end_time">End Time:</label>
                                                            <input type="time" class="form-control" id="end_time"
                                                                   name="end_time" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="duration">Duration (Minutes):</label>
                                                            <input type="number" class="form-control" id="duration"
                                                                   name="duration" required>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close
                                                        </button>
                                                        <button type="submit" id="confirm-reservation"
                                                                class="btn inline-flex justify-center text-white bg-black-500">
                                                            Confirm Reservation
                                                        </button>
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
<script src="{{ secure_asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ secure_asset('js/rt-plugins.js') }}"></script>
<script src="{{ secure_asset('js/app.js') }}"></script>
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
                        localStorage.setItem('successMsg', data.message);
                        window.location.href = data.redirect_url;
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var successMsg = localStorage.getItem('successMsg');
        if (successMsg) {
            // Create alert div
            var alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success';
            alertDiv.innerHTML = successMsg;

            // Get messages container
            var messages = document.getElementById('messages');

            // Append alert to messages container
            messages.appendChild(alertDiv);

            // Remove the message from local storage
            localStorage.removeItem('successMsg');
        }
    });
</script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".heart").on("click", function () {
        $(this).toggleClass("active");

        // get trainer id
        var trainerId = $(this).data('trainer-id');

        // send AJAX request
        $.ajax({
            method: 'POST',
            url: '/user/toggle-favorite',
            data: {trainer_id: trainerId},
            success: function (response) {
                if (response.success) {
                    console.log('Favorite status toggled successfully.');
                } else {
                    console.error('Failed to toggle favorite status.');
                }
            }
        });
    });


</script>
</body>
</html>
