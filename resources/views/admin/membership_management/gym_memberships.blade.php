<!DOCTYPE html>
<html lang="zxx" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Gym Tracker - Gym Membership</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
                            <!-- BEGIN: Breadcrumb -->
                            <div class="mb-5">
                                <ul class="m-0 p-0 list-none">
                                    <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                                        <a href="">
                                            <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                                            <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                                        Gym Management
                                        <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                                    </li>
                                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                        Memberships Lists</li>
                                </ul>
                            </div>
                            <!-- END: BreadCrumb -->
                            <div class=" space-y-5">
                                <div class="card">
                                    <header class=" card-header noborder">
                                        <h4 class="card-title">Memberships Lists
                                        </h4>
                                    </header>
                                    <div class="card-body px-6 pb-6">
                                        <div class="overflow-x-auto -mx-6 dashcode-data-table">
                                            <span class=" col-span-8  hidden"></span>
                                            <span class="  col-span-4 hidden"></span>
                                            <div class="inline-block min-w-full align-middle">
                                                <div class="overflow-hidden ">
                                                    <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" id="data-table">
                                                        <thead class=" border-t border-slate-100 dark:border-slate-800">
                                                        <tr>

                                                            <th scope="col" class=" table-th ">
                                                                Id
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Name
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Price
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Duration
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Action
                                                            </th>

                                                        </tr>
                                                        </thead>
                                                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                                        @foreach($gym_memberships as $gym_membership)
                                                            <tr>
                                                                <td class="table-td">{{ $gym_membership->id }}</td>
                                                                <td class="table-td">{{ $gym_membership->name }}</td>
                                                                <td class="table-td">${{ $gym_membership->price }}</td>
                                                                <td class="table-td">{{ $gym_membership->duration }} days</td>
                                                                <td class="table-td">
                                                                    <a href="{{ route('admin.gym_memberships.view', $gym_membership->id) }}" class="btn btn-primary">View</a>
                                                                    <a href="{{ route('admin.gym_memberships.edit', $gym_membership->id) }}" class="btn btn-secondary">Edit</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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
