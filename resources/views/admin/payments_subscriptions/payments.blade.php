<!DOCTYPE html>
<html lang="zxx" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Gym Tracker - Payments</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/favicon.svg') }}">
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
                                        Payments Subscription
                                        <iconify-icon icon="heroicons-outline:chevron-right"
                                                      class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                                    </li>
                                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                        Payments
                                    </li>
                                </ul>
                            </div>
                            <!-- END: BreadCrumb -->
                            <div class="card-body px-6 pb-6">
                                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                                    <span class=" col-span-8  hidden"></span>
                                    <span class="  col-span-4 hidden"></span>
                                    <div class="inline-block min-w-full align-middle">
                                        <div class="overflow-hidden ">
                                            <table
                                                class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700"
                                                id="data-table">
                                                <thead class=" border-t border-slate-100 dark:border-slate-800">
                                                <tr>

                                                    <th scope="col" class=" table-th ">ID</th>
                                                    <th scope="col" class=" table-th ">Member Name</th>
                                                    <th scope="col" class=" table-th ">Membership</th>
                                                    <th scope="col" class=" table-th ">Amount</th>
                                                    <th scope="col" class=" table-th ">Payment Date</th>
                                                    <th scope="col" class=" table-th ">Payment Method</th>
                                                    <th scope="col" class=" table-th ">Payment Status</th>
                                                    <th scope="col" class=" table-th ">Actions</th>

                                                </tr>
                                                </thead>
                                                <tbody
                                                    class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                                @foreach($payments as $payment)
                                                    <tr>
                                                        <td class="table-td">{{ $payment->id }}</td>
                                                        <td class="table-td">{{ $payment->subscription->member->first_name }} {{ $payment->subscription->member->last_name }}</td>
                                                        <td class="table-td">{{ $payment->subscription->gymMembership->name }}</td>
                                                        <td class="table-td">{{ $payment->amount }}</td>
                                                        <td class="table-td">{{ \Carbon\Carbon::parse($payment->payment_date)->format('F j, Y') }}</td>
                                                        <td class="table-td">{{ $payment->payment_method }}</td>
                                                        <td class="table-td">
                                                            @if($payment->payment_status == 1)
                                                                <span
                                                                    class="badge bg-success-500 text-white capitalize inline-flex items-center">
                                                                    <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons-outline:check"></iconify-icon>
                                                                    success</span>
                                                            @else
                                                                <<span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                                                <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons-outline:x-mark"></iconify-icon>
                                                                failed</span>
                                                            @endif
                                                        </td>
                                                        <td class="table-td">

                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div
                                        class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                        id="details_modal" tabindex="-1" aria-labelledby="details_modal"
                                        aria-hidden="true">
                                        <!-- BEGIN: Modal -->
                                        <div class="modal-dialog relative w-auto pointer-events-none">
                                            <div
                                                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                                                        <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                                                            Subscription Details
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
                                                        <div class="flex flex-col">
                                                            <label for="modal_membership_name"
                                                                   class="text-base text-slate-900 dark:text-white font-semibold leading-6">Membership:</label>
                                                            <span
                                                                class="text-base text-slate-600 dark:text-slate-400 leading-6"
                                                                id="modal_membership_name"></span>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <label for="modal_payment_method"
                                                                   class="text-base text-slate-900 dark:text-white font-semibold leading-6">Payment
                                                                Method:</label>
                                                            <span
                                                                class="text-base text-slate-600 dark:text-slate-400 leading-6"
                                                                id="modal_payment_method"></span>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <label for="modal_member_name"
                                                                   class="text-base text-slate-900 dark:text-white font-semibold leading-6">Member
                                                                Name:</label>
                                                            <span
                                                                class="text-base text-slate-600 dark:text-slate-400 leading-6"
                                                                id="modal_member_name"></span>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <label for="modal_start_date"
                                                                   class="text-base text-slate-900 dark:text-white font-semibold leading-6">Start
                                                                Date:</label>
                                                            <span
                                                                class="text-base text-slate-600 dark:text-slate-400 leading-6"
                                                                id="modal_start_date"></span>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <label for="modal_end_date"
                                                                   class="text-base text-slate-900 dark:text-white font-semibold leading-6">End
                                                                Date:</label>
                                                            <span
                                                                class="text-base text-slate-600 dark:text-slate-400 leading-6"
                                                                id="modal_end_date"></span>
                                                        </div>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div
                                                        class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                                        <button data-bs-dismiss="modal"
                                                                class="btn inline-flex justify-center text-white bg-black-500">
                                                            Accept
                                                        </button>
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
</body>
</html>
