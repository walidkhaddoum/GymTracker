<!DOCTYPE html>
<html lang="zxx" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Gym Tracker - Admins</title>
    <link rel="icon" type="image/png" href="{{ secure_asset('images/logo/logo-c-white.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ secure_asset('css/rt-plugins.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <!-- End : Theme CSS-->
    <script src="{{ secure_asset('js/settings.js') }}" sync></script>
</head>

<body class=" font-inter dashcode-app" id="body_class">
<!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a
    href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
<main class="app-wrapper">
    <!-- BEGIN: Sidebar -->
    <!-- BEGIN: Sidebar -->
    @include('partials.sidebar')
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
            <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
                <div class="page-content">
                    <div class="transition-all duration-150 container-fluid" id="page_layout">
                        <div id="content_layout">
                            <!-- BEGIN: Breadcrumb -->
                            <div class="mb-5">
                                <ul class="m-0 p-0 list-none">
                                    <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                                        <a href="">
                                            <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                                            <iconify-icon icon="heroicons-outline:chevron-right"
                                                          class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                                        Users
                                        <iconify-icon icon="heroicons-outline:chevron-right"
                                                      class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                                    </li>
                                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                        Admins
                                    </li>
                                </ul>
                            </div>
                            <!-- END: BreadCrumb -->
                            <div class=" space-y-5">
                                <div class="card ">
                                    <main class="card-body p-0">
                                        <div
                                            class="flex justify-between flex-wrap space-y-4 px-6 pt-6 bg-slate-50 dark:bg-slate-800 pb-6 rounded-t-md">
                                            <div>
                                                <img src="{{secure_asset('images/logo/logo.svg')}}" alt=""
                                                     class="mb-10 dark_logo">
                                                <img src="{{secure_asset('images/logo/logo-white.svg')}}" alt=""
                                                     class="mb-10 white_logo">
                                                <div
                                                    class="text-slate-500 dark:text-slate-300 font-normal leading-5 mt-4 text-sm">
                                                    Gym Tracker <br> bd Mohamed Zerktouni, resid. les fleurs appt, <br>Casabalnca
                                                    - 20360, Morocco
                                                    <div class="flex space-x-2 mt-2 leading-[1] rtl:space-x-reverse">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             aria-hidden="true" role="img"
                                                             class="iconify iconify--heroicons-outline" width="1em"
                                                             height="1em" viewbox="0 0 24 24">
                                                            <path fill="none" stroke="currentColor"
                                                                  stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2" d="M3 5a2 2 0 0 1 2-2h3.28a1 1 0 0 1 .948.684l1.498 4.493a1 1 0 0 1-.502 1.21l-2.257 1.13a11.042 11.042 0 0 0 5.516
                                        5.516l1.13-2.257a1 1 0 0 1 1.21-.502l4.493 1.498a1 1 0 0 1 .684.949V19a2 2 0 0 1-2 2h-1C9.716 21 3 14.284 3 6V5Z"></path>
                                                        </svg>
                                                        <span>+212 643 522 602</span>
                                                    </div>
                                                    <div
                                                        class="mt-[6px] flex space-x-2 leading-[1] rtl:space-x-reverse">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             aria-hidden="true" role="img"
                                                             class="iconify iconify--heroicons-outline" width="1em"
                                                             height="1em" viewbox="0 0 24 24">
                                                            <path fill="none" stroke="currentColor"
                                                                  stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="m3 8l7.89 5.26a2 2 0 0 0 2.22 0L21 8M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z"></path>
                                                        </svg>
                                                        <span>walidkhaddoum@gmail.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <span
                                                    class="block text-slate-900 dark:text-slate-300 font-medium leading-5 text-xl">Member Details :</span>
                                                <div
                                                    class="text-slate-500 dark:text-slate-300 font-normal leading-5 mt-4 text-sm">{{ $member->first_name }} {{ $member->last_name }}
                                                    <br>{{ $member->address }} <br>{{ $member->date_of_birth }}
                                                    <div class="flex space-x-2 mt-2 leading-[1] rtl:space-x-reverse">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             aria-hidden="true" role="img"
                                                             class="iconify iconify--heroicons-outline" width="1em"
                                                             height="1em" viewbox="0 0 24 24">
                                                            <path fill="none" stroke="currentColor"
                                                                  stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2" d="M3 5a2 2 0 0 1 2-2h3.28a1 1 0 0 1 .948.684l1.498 4.493a1 1 0 0 1-.502 1.21l-2.257 1.13a11.042 11.042 0 0 0 5.516
                                        5.516l1.13-2.257a1 1 0 0 1 1.21-.502l4.493 1.498a1 1 0 0 1 .684.949V19a2 2 0 0 1-2 2h-1C9.716 21 3 14.284 3 6V5Z"></path>
                                                        </svg>
                                                        <span>{{ $member->phone_number }}</span>
                                                    </div>
                                                    <div
                                                        class="mt-[6px] flex space-x-2 leading-[1] rtl:space-x-reverse">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             aria-hidden="true" role="img"
                                                             class="iconify iconify--heroicons-outline" width="1em"
                                                             height="1em" viewbox="0 0 24 24">
                                                            <path fill="none" stroke="currentColor"
                                                                  stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="m3 8l7.89 5.26a2 2 0 0 0 2.22 0L21 8M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z"></path>
                                                        </svg>
                                                        <span>{{ $member->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="space-y-[2px]">
                                                <span
                                                    class="block text-slate-900 dark:text-slate-300 font-medium leading-5 text-xl mb-4">Subscription Status:</span>
                                                <h4 class="text-slate-600 font-medium dark:text-slate-300 text-xs uppercase">
                                                    {{ ucfirst($subscriptionStatus) }}</h4>
                                            </div>
                                        </div>
                                        <div
                                            class="py-10 text-center md:text-2xl text-xl font-normal text-slate-600 dark:text-slate-300">
                                            Subscription History
                                        </div>
                                        <div
                                            class="max-w-[980px] mx-auto shadow-base dark:shadow-none my-8 rounded-md overflow-x-auto">
                                            <div>
                                                <table
                                                    class="w-full border-collapse table-fixed dark:border-slate-700 dark:border">

                                                    <tr>
                                                        <th colspan="3" class="bg-slate-50 dark:bg-slate-700 dark:text-slate-300 text-xs font-medium leading-4 uppercase text-slate-600
                                    ltr:text-left ltr:last:text-right rtl:text-right rtl:last:text-left">
                                                            <span
                                                                class="block px-6 py-5 font-semibold">Membership Type</span>
                                                        </th>
                                                        <th class="bg-slate-50 dark:bg-slate-700 dark:text-slate-300 text-xs font-medium leading-4 uppercase text-slate-600
                                    ltr:text-left ltr:last:text-right rtl:text-right rtl:last:text-left">
                                                            <span
                                                                class="block px-6 py-5 font-semibold">Start Date</span>
                                                        </th>
                                                        <th class="bg-slate-50 dark:bg-slate-700 dark:text-slate-300 text-xs font-medium leading-4 uppercase text-slate-600
                                    ltr:text-left ltr:last:text-right rtl:text-right rtl:last:text-left">
                                                            <span class="block px-6 py-5 font-semibold">End Date</span>
                                                        </th>
                                                        <th class="bg-slate-50 dark:bg-slate-700 dark:text-slate-300 text-xs font-medium leading-4 uppercase text-slate-600
                                    ltr:text-left ltr:last:text-right rtl:text-right rtl:last:text-left">
                                                            <span class="block px-6 py-5 font-semibold">STATUS</span>
                                                        </th>
                                                        <th class="bg-slate-50 dark:bg-slate-700 dark:text-slate-300 text-xs font-medium leading-4 uppercase text-slate-600
                                    ltr:text-left ltr:last:text-right rtl:text-right rtl:last:text-left">
                                                            <span
                                                                class="block px-6 py-5 font-semibold">Payment Amount</span>
                                                        </th>
                                                    </tr>
                                                    @foreach($subscriptions as $subscription)
                                                        <tr class="border-b border-slate-100 dark:border-slate-700">
                                                            <td colspan="3" class="text-slate-900 dark:text-slate-300 text-sm font-normal ltr:text-left ltr:last:text-right rtl:text-right
                                    rtl:last:text-left px-6 py-4">
                                                                {{ $subscription->gymMembership->name }}</td>
                                                            <td class="text-slate-900 dark:text-slate-300 text-sm font-normal ltr:text-left ltr:last:text-right rtl:text-right
                                    rtl:last:text-left px-6 py-4">
                                                                {{ $subscription->start_date }}</td>
                                                            <td class="text-slate-900 dark:text-slate-300 text-sm font-normal ltr:text-left ltr:last:text-right rtl:text-right
                                    rtl:last:text-left px-6 py-4">
                                                                {{ $subscription->end_date }}</td>
                                                            <td class="text-slate-900 dark:text-slate-300 text-sm font-normal ltr:text-left ltr:last:text-right rtl:text-right
                                    rtl:last:text-left px-6 py-4">
                                                                @php
                                                                    $today = \Carbon\Carbon::today();
                                                                    $start_date = \Carbon\Carbon::parse($subscription->start_date);
                                                                    $end_date = \Carbon\Carbon::parse($subscription->end_date);
                                                                    $status = ($start_date->lessThanOrEqualTo($today) && $end_date->greaterThanOrEqualTo($today)) ? 'Active' : 'Expired';
                                                                @endphp
                                                                @if ($status === 'active')
                                                                    <span
                                                                        class="badge bg-success-500 text-white capitalize">
                                                                        <iconify-icon class="ltr:mr-1 rtl:ml-1"
                                                                                      icon="heroicons-outline:check"></iconify-icon>
                                                                        Active
                                                                    </span>
                                                                @else
                                                                    <span
                                                                        class="badge bg-danger-500 text-white capitalize">
                                                                        <iconify-icon class="ltr:mr-1 rtl:ml-1"
                                                                                      icon="heroicons-outline:x-mark"></iconify-icon>
                                                                        Expired
                                                                    </span>
                                                                @endif</td>
                                                            <td class="text-slate-900 dark:text-slate-300 text-sm font-normal ltr:text-left ltr:last:text-right rtl:text-right
                                    rtl:last:text-left px-6 py-4">{{ $subscription->payment->amount }}DH
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                                <div class="md:flex px-6 py-6 items-center">
                                                    <div
                                                        class="flex-1 text-slate-500 dark:text-slate-300 text-sm"></div>
                                                    <div class="flex-none min-w-[270px] space-y-3">
                                                        <div class="flex justify-between">
                                                            <span
                                                                class="font-medium text-slate-600 text-xs dark:text-slate-300 uppercase">Total Amount Paid:</span>
                                                            <span class="text-slate-900 dark:text-slate-300 font-bold">{{ $totalPaid }}DH</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="py-10 text-center md:text-2xl text-xl font-normal text-slate-600 dark:text-slate-300"></div>
                                    </main>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @include("partials.footer")

    @include("partials.mobile_header")
</main>
<!-- scripts -->
<script src="{{ secure_asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ secure_asset('js/rt-plugins.js') }}"></script>
<script src="{{ secure_asset('js/app.js') }}"></script>
</body>
</html>
