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
                                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                        Tableau de bord
                                    </li>
                                </ul>
                            </div>
                            <!-- END: BreadCrumb -->
                            <div class=" space-y-5">
                                <div class="grid grid-cols-12 gap-5">
                                    <div class="lg:col-span-8 col-span-12 space-y-5">
                                        <div class="card p-6">
                                            <div class="grid xl:grid-cols-4 lg:grid-cols-2 col-span-1 gap-3">

                                                <!-- BEGIN: Group Chart4 -->


                                                <div
                                                    class="bg-warning-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                                                    <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                                                        <img src="{{ asset('images/all-img/shade-1.png') }}" alt=""
                                                             draggable="false" class="w-full h-full object-contain">
                                                    </div>
                                                    <span
                                                        class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                                                        Total Members
                                                    </span>
                                                    <span
                                                        class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                                                        {{ $totalMembers }}
                                                    </span>
                                                    <div class="flex space-x-2 rtl:space-x-reverse">
                                                        <div class="flex-none text-xl  text-primary-500">
                                                            <iconify-icon
                                                                icon="heroicons:arrow-trending-up"></iconify-icon>
                                                        </div>
                                                        <div class="flex-1 text-sm">
                                                              <span class="block mb-[2px] text-primary-500">
                                                                    25.67%
                                                              </span>
                                                            <span class="block mb-1 text-slate-600 dark:text-slate-300">
                                                        From last week
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="bg-info-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                                                    <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                                                        <img src="{{ asset('images/all-img/shade-2.png') }}" alt=""
                                                             draggable="false" class="w-full h-full object-contain">
                                                    </div>
                                                    <span
                                                        class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                                                        Total Trainers
                                                    </span>
                                                    <span
                                                        class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                                                        {{$totalTrainers}}
                                                    </span>
                                                    <div class="flex space-x-2 rtl:space-x-reverse">
                                                        <div class="flex-none text-xl  text-primary-500">
                                                            <iconify-icon
                                                                icon="heroicons:arrow-trending-up"></iconify-icon>
                                                        </div>
                                                        <div class="flex-1 text-sm">
                                                            <span class="block mb-[2px] text-primary-500">
                                                                8.67%
                                                            </span>
                                                            <span class="block mb-1 text-slate-600 dark:text-slate-300">
                                                                From last week
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="bg-primary-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                                                    <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                                                        <img src="{{ asset('images/all-img/shade-3.png') }}" alt=""
                                                             draggable="false" class="w-full h-full object-contain">
                                                    </div>
                                                    <span
                                                        class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                                                        Total Gyms
                                                    </span>
                                                    <span
                                                        class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                                                        {{ $totalGyms }}
                                                    </span>
                                                    <div class="flex space-x-2 rtl:space-x-reverse">
                                                        <div class="flex-none text-xl  text-danger-500">
                                                            <iconify-icon
                                                                icon="heroicons:arrow-trending-down"></iconify-icon>
                                                        </div>
                                                        <div class="flex-1 text-sm">
                                                          <span class="block mb-[2px] text-danger-500">
                                                            1.67%
                                                            </span>
                                                            <span class="block mb-1 text-slate-600 dark:text-slate-300">
                                                                Total
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="bg-success-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                                                    <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                                                        <img src="{{ asset('images/all-img/shade-4.png') }}" alt=""
                                                             draggable="false" class="w-full h-full object-contain">
                                                    </div>
                                                    <span
                                                        class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                                                            Monthly Revenue
                                                        </span>
                                                    <span
                                                        class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                                                                {{ $monthlyRevenue }}
                                                        </span>
                                                    <div class="flex space-x-2 rtl:space-x-reverse">
                                                        <div class="flex-none text-xl  text-primary-500">
                                                            <iconify-icon
                                                                icon="heroicons:arrow-trending-up"></iconify-icon>
                                                        </div>
                                                        <div class="flex-1 text-sm">
                                  <span class="block mb-[2px] text-primary-500">
                            11.67%
                        </span>
                                                            <span class="block mb-1 text-slate-600 dark:text-slate-300">
                            From last week
                        </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- END: Group Chart3 -->
                                            </div>
                                        </div>
                                        <div class="card p-6">
                                            <header class="md:flex md:space-y-0 space-y-4">
                                                <h6 class="flex-1 text-slate-900 dark:text-white capitalize">
                                                    New Client Statistic
                                                </h6>
                                            </header>
                                            <div class="card-body p-6">
                                                <div>
                                                    <div id="areaChart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lg:col-span-4 col-span-12 space-y-5">
                                        <div class="lg:col-span-4 col-span-12 space-y-5">
                                            <div class="card">
                                                <header class="card-header">
                                                    <h4 class="card-title">
                                                        Most Popular Gyms (Top 5)
                                                    </h4>
                                                    <div>
                                                        <!-- BEGIN: Card Dropdown -->
                                                        <div class="relative">
                                                            <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full "
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                      <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
                    rounded dark:text-slate-400">
                <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
            </span>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                    <li>
                                                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                                                                            Last 28 Days</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                                                                            Last Month</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                                                                            Last Year</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- END: Card Droopdown -->
                                                    </div>
                                                </header>
                                                <div class="card-body p-6">
                                                    <ul class="divide-y divide-slate-100 dark:divide-slate-700">
                                                        @foreach($top5Gyms as $gym)
                                                            <li class="text-sm text-slate-600 dark:text-slate-300 py-2">
                                                                <div class="flex justify-between">
                                                                    <span>{{ $gym->name }}</span>
                                                                    <span>{{ $gym->attendance_count }}</span>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                </div>
                                            </div>
                                            <div class="card">
                                                <header class="card-header">
                                                    <h4 class="card-title">
                                                        Member Demographics
                                                    </h4>
                                                    <div>
                                                        <!-- BEGIN: Card Dropdown -->
                                                        <div class="relative">
                                                            <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full "
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                      <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
                    rounded dark:text-slate-400">
                <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
            </span>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                    <li>
                                                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                                                                            Last 28 Days</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                                                                            Last Month</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                                                                            Last Year</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- END: Card Droopdown -->
                                                    </div>
                                                </header>
                                                <div class="card-body p-6">
                                                    <div class="legend-ring3">
                                                        <canvas id="myPieChart" width="393" height="393"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- BEGIN: Advanced Table 2 -->


                                <div class="card">
                                    <header class=" card-header noborder">
                                        <h4 class="card-title">Latest Subscriptions
                                        </h4>
                                    </header>
                                    <div class="card-body px-6 pb-6">
                                        <div class="overflow-x-auto -mx-6 dashcode-data-table">
                                            <span class=" col-span-8  hidden"></span>
                                            <span class="  col-span-4 hidden"></span>
                                            <div class="inline-block min-w-full align-middle">
                                                <div class="overflow-hidden ">
                                                    <table
                                                        class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                                                        <thead class=" bg-slate-200 dark:bg-slate-700">
                                                        <tr>

                                                            <th scope="col" class=" table-th ">
                                                                Full Name
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Membership Type
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Amount Paid
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Date Start
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Amount
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Duration
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Status
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Action
                                                            </th>

                                                        </tr>
                                                        </thead>
                                                        <tbody
                                                            class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                                        @foreach($latestSubscriptions as $latestSubscription)
                                                            <tr>
                                                                <td class="table-td"><span class="flex"><span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{ $latestSubscription->first_name }} {{ $latestSubscription->last_name }}</span></span></td>
                                                                <td class="table-td ">{{ $latestSubscription->membership_name }}</td>
                                                                <td class="table-td ">{{ $latestSubscription->amount }} DH</td>
                                                                <td class="table-td"> {{ Carbon\Carbon::parse($latestSubscription->start_date)->format('F j, Y') }}</td>
                                                                <td class="table-td ">
                                                                    <div>
                                                                        {{ $latestSubscription->payment_method }}
                                                                    </div>
                                                                </td>
                                                                <td class="table-td ">
                                                                    <div>
                                                                        {{ $latestSubscription->date_diff }} Days
                                                                    </div>
                                                                </td>
                                                                <td class="table-td ">

                                                                    <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                        bg-success-500">
                                                                        paid
                                                                    </div>

                                                                </td>
                                                                <td class="table-td ">
                                                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                                                        <button class="action-btn" type="button">
                                                                            <iconify-icon
                                                                                icon="heroicons:eye"></iconify-icon>
                                                                        </button>
                                                                    </div>
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
                                <!-- END: Advanced Table -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @include("partials.footer")

    @include("partials.mobile_header")
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<input type="hidden" id="memberDemographics" value="{{ json_encode($memberDemographics) }}" />
<input type="hidden" id="newClientsJson" value="{{ $newClientsJson }}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // New Clients Area Chart
    const areaChartLabels = ['2022-01', '2022-02', '2022-03', '2022-04', '2022-05'];
    const areaChartData = [15, 28, 23, 35, 40];
    const areaChartConfig = {
        type: 'line',
        data: {
            labels: areaChartLabels,
            datasets: [{
                label: 'New Clients',
                data: areaChartData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'New Client Statistics'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const areaChartCtx = document.getElementById('newClientsAreaChart').getContext('2d');
    const newClientsAreaChart = new Chart(areaChartCtx, areaChartConfig);

    // Member Demographics Pie Chart
    const pieChartData = {
        labels: ['Under 18', 'Between 18 and 30', 'Over 30'],
        datasets: [{
            data: [50, 100, 150], // Replace these values with the actual member demographics data
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
            hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
        }]
    };

    const pieChartConfig = {
        type: 'pie',
        data: pieChartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Member Demographics'
                }
            }
        },
    };

    const pieChartCtx = document.getElementById('myPieChart').getContext('2d');
    const memberDemographicsPieChart = new Chart(pieChartCtx, pieChartConfig);
</script>

<!-- scripts -->
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/rt-plugins.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>

</script>
</body>
</html>
