<!DOCTYPE html>
<html lang="zxx" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Gym Tracker - Reservations</title>
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
                                        Table
                                        <iconify-icon icon="heroicons-outline:chevron-right"
                                                      class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                                    </li>
                                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                        Basic-Table
                                    </li>
                                </ul>
                            </div>
                            <!-- END: BreadCrumb -->


                            <div class="grid xl:grid-cols-12 grid-cols-1 gap-5">
                                <!-- BEGIN: Striped Tables -->
                                <div class="card">
                                    <header class=" card-header noborder">
                                        <h4 class="card-title">Group Sessions</h4>
                                        <button data-bs-toggle="modal" data-bs-target="#basic_modal" class="btn inline-flex justify-center btn-outline-dark capitalize">Add Group Session</button>
                                    </header>
                                    <div class="card-body px-6 pb-6">
                                        <div class="overflow-x-auto -mx-6">
                                            <div class="inline-block min-w-full align-middle">
                                                <div class="overflow-hidden ">
                                                    <table
                                                        class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                                        <thead class="bg-slate-200 dark:bg-slate-700">
                                                        <tr>
                                                            <th scope="col" class=" table-th ">
                                                                Session Name
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Trainer
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Date
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Start Time
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                End Time
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Registered / Capacity
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Duration(Minutes)
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Action
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody
                                                            class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                                        @foreach($groupSessions as $groupSession)
                                                            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                                                <td class="table-td">
                                                                    {{ $groupSession->name }}
                                                                </td>
                                                                <td class="table-td">
                                                                        @foreach ($groupSession->trainers as $trainer)
                                                                            {{ $trainer->first_name }} {{ $trainer->last_name }}
                                                                        @endforeach
                                                                </td>
                                                                <td class="table-td">
                                                                    {{ $groupSession->date }}
                                                                </td>
                                                                <td class="table-td">
                                                                    {{ $groupSession->start_time }}
                                                                </td>
                                                                <td class="table-td">
                                                                    {{ $groupSession->end_time }}
                                                                </td>
                                                                <td class="table-td">
                                                                    @php
                                                                        $registeredMembersCount = $groupSession->registrations->count();
                                                                        $capacity = $groupSession->capacity;
                                                                        $isFull = $registeredMembersCount >= $capacity;
                                                                    @endphp
                                                                    @if($isFull)
                                                                        Full
                                                                    @else
                                                                        {{ $registeredMembersCount }} / {{ $capacity }}
                                                                    @endif
                                                                </td>

                                                                <td class="table-td">
                                                                    {{ \Carbon\Carbon::parse($groupSession->end_time)->diffInMinutes(\Carbon\Carbon::parse($groupSession->start_time)) }} Minutes
                                                                </td>
                                                                <td>
                                                                    <form method="POST"
                                                                          action="{{ route('admin.destroysession', $groupSession) }}"
                                                                          onsubmit="return confirm('Are you sure you want to delete this Group Session? This action cannot be undone.')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <span
                                                                            class="flex-none space-x-2 text-base text-secondary-500 rtl:space-x-reverse">
                                                                    <button type="submit"
                                                                            class="transition duration-150 hover:text-danger-500">
                                                                      <iconify-icon
                                                                          icon="heroicons-outline:trash"></iconify-icon>
                                                                    </button>

                                                                    </span>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="basic_modal" tabindex="-1" aria-labelledby="basic_modal" aria-hidden="true">
                                                        <!-- BEGIN: Modal -->
                                                        <div class="modal-dialog relative w-auto pointer-events-none">
                                                            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                                                                    <!-- Modal body -->
                                                                    <div class="p-6 space-y-4">
                                                                        <form method="POST" action="{{ route('admin.group-sessions.store') }}">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                @if ($errors->any())
                                                                                    <div class="alert alert-danger">
                                                                                        <ul>
                                                                                            @foreach ($errors->all() as $error)
                                                                                                <li>{{ $error }}</li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                @endif
                                                                                <div class="mb-3">
                                                                                    <label for="name" class="form-label">Session Name</label>
                                                                                    <input type="text" class="form-control" id="name" name="name" required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="trainer" class="form-label">Trainer</label>
                                                                                    <select class="form-control w-full mt-2" id="trainer" name="trainer_id" required>
                                                                                        @foreach ($trainers as $trainer)
                                                                                            <option  class="py-1 inline-block font-Inter font-normal text-sm text-slate-600" value="{{ $trainer->id }}">{{ $trainer->first_name }} {{ $trainer->last_name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="category" class="form-label">Category</label>
                                                                                    <select class="form-control w-full mt-2" id="category" name="category_id" required>
                                                                                        @foreach ($catalogues as $catalogue)
                                                                                            <option  class="py-1 inline-block font-Inter font-normal text-sm text-slate-600" value="{{ $catalogue->id }}">{{ $catalogue->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="capacity" class="form-label">Capacity</label>
                                                                                    <input type="number" class="form-control" id="capacity" name="capacity" required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="date" class="form-label">Date</label>
                                                                                    <input type="date" class="form-control" id="date" name="date" required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="start_time" class="form-label">Start Time</label>
                                                                                    <input type="time" class="form-control" id="start_time" name="start_time" required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="end_time" class="form-label">End Time</label>
                                                                                    <input type="time" class="form-control" id="end_time" name="end_time" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">

                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn inline-flex justify-center text-white bg-black-500">Save Session</button>
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
                                </div>
                                <!-- END: Striped Tables -->
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

</body>
</html>
