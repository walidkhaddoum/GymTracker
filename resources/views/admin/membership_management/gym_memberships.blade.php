<!DOCTYPE html>
<html lang="zxx" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Gym Tracker - Gym Membership</title>
    <link rel="icon" type="image/png" href="{{ secure_asset('images/logo/logo-c-white.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ secure_asset('css/rt-plugins.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <!-- End : Theme CSS-->
    <script src="{{ secure_asset('js/settings.js') }}" sync></script>
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
                                    <div id="temp-alert" class="py-[18px] px-6 font-normal font-Inter text-sm rounded-md bg-success-500 text-white dark:bg-success-500 dark:text-slate-300 hidden">
                                        <div class="flex items-start space-x-3 rtl:space-x-reverse">
                                            <div class="flex-1">
                                                Data inserted successfully! Check it out!
                                            </div>
                                        </div>
                                    </div>
                                    <header class=" card-header noborder">
                                        <h4 class="card-title">Memberships Lists </h4>
                                        <button data-bs-toggle="modal" data-bs-target="#basic_modal" class="btn inline-flex justify-center btn-outline-dark capitalize">Add New membership</button>
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
                                                                <td class="table-td">{{ $gym_membership->price }} DH</td>
                                                                <td class="table-td">{{ $gym_membership->duration }} days</td>
                                                                <td>
                                                                    <a href="#" class="text-indigo-500 hover:text-indigo-700 ml-2 edit-btn" data-id="{{ $gym_membership->id }}" id="editBtn_{{ $gym_membership->id }}">
                                                                        <iconify-icon icon="heroicons-outline:pencil-square" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                                                                    </a>
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
                            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="basic_modal" tabindex="-1" aria-labelledby="basic_modal" aria-hidden="true">
                                <!-- BEGIN: Modal -->
                                <div class="modal-dialog relative w-auto pointer-events-none">
                                    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                                            <!-- Modal header -->
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-4">
                                                <form action="{{ route('admin.gym_memberships.store') }}" method="POST" id="add_membership_form">
                                                    @csrf
                                                    <div>
                                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                                        <input type="text" name="name" id="name" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </div>
                                                    <div>
                                                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                                        <input type="number" step="0.01" name="price" id="price" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </div>
                                                    <div>
                                                        <label for="duration" class="block text-sm font-medium text-gray-700">Duration (days)</label>
                                                        <input type="number" min="1" name="duration" id="duration" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                                <button type="submit" form="add_membership_form" class="btn inline-flex justify-center text-white bg-black-500">Add Membership</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Modals -->
                            </div>
                            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="edit_modal" tabindex="-1" aria-labelledby="edit_modal" aria-hidden="true">
                                <div class="modal-dialog relative w-auto pointer-events-none">
                                    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                                            <div class="p-6 space-y-4">
                                                <form action="#" method="POST" id="edit_membership_form">
                                                    @csrf
                                                    <input type="hidden" name="gym_membership_id" id="edit_gym_membership_id">
                                                    <div>
                                                        <label for="edit_name" class="block text-sm font-medium text-gray-700">Name</label>
                                                        <input type="text" name="edit_name" id="edit_name" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </div>
                                                    <div>
                                                        <label for="edit_price" class="block text-sm font-medium text-gray-700">Price</label>
                                                        <input type="number" step="0.01" name="edit_price" id="edit_price" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </div>
                                                    <div>
                                                        <label for="edit_duration" class="block text-sm font-medium text-gray-700">Duration (days)</label>
                                                        <input type="number" min="1" name="edit_duration" id="edit_duration" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                                <button type="submit" form="edit_membership_form" class="btn inline-flex justify-center text-white bg-black-500">Update Membership</button>
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
<!-- Check if data_inserted session variable exists -->
@if (session('data_inserted'))
    <script>
        // Call showAlert function when the page loads
        document.addEventListener("DOMContentLoaded", function() {
            showAlert(3000); // Show the alert for 3000 milliseconds (3 seconds)
        });
    </script>
@endif
<script src="{{ secure_asset('js/jquery-3.6.0.min.js') }}"></script>
<script>
    function openModal(id) {
        var modalId = 'view_modal_' + id;
        var modalElement = document.getElementById(modalId);

        if (modalElement) {
            modalElement.classList.add('show');
            modalElement.style.display = 'block';
        }
    }

    function showAlert(duration) {
        const alertElement = document.getElementById('temp-alert');
        alertElement.classList.remove('hidden');

        setTimeout(() => {
            alertElement.classList.add('hidden');
        }, duration);
    }
    $(document).ready(function() {
        @foreach($gym_memberships as $gym_membership)
        $.ajax({
            url: '{{ route('admin.gym_memberships.active_subscriptions', $gym_membership->id) }}',
            method: 'GET',
            success: function(data) {
                $('#active_subscriptions_{{ $gym_membership->id }}').text(data);
            },
            error: function() {
                $('#active_subscriptions_{{ $gym_membership->id }}').text('Error fetching data');
            }
        });
        @endforeach
    });


    $(document).ready(function() {
        $('.edit-btn').on('click', function() {
            let gymMembershipId = $(this).data('id');
            fetchGymMembershipData(gymMembershipId);
        });
    });

    function fetchGymMembershipData(gymMembershipId) {
        $.ajax({
            url: '/admin/gym_memberships/' + gymMembershipId + '/edit',
            type: 'GET',
            success: function(response) {
                $('#edit_gym_membership_id').val(response.id);
                $('#edit_name').val(response.name);
                $('#edit_price').val(response.price);
                $('#edit_duration').val(response.duration);
                $('#edit_modal').modal('show');
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    $('#edit_membership_form').on('submit', function(e) {
        e.preventDefault();

        let gymMembershipId = $('#edit_gym_membership_id').val();
        let formData = $(this).serialize();

        $.ajax({
            url: '/admin/gym_memberships/' + gymMembershipId,
            type: 'PUT',
            data: formData,
            success: function(response) {
                location.reload();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

</script>
<script src="{{ secure_asset('js/rt-plugins.js') }}"></script>
<script src="{{ secure_asset('js/app.js') }}"></script>
</body>
</html>
