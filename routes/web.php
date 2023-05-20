<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\GroupSessionController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\GymMembershipController;
use App\Http\Controllers\IndividualSessionController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\MemberUserController;
use App\Http\Controllers\TrainerUsercontroller;
use App\Models\GroupSession;
use App\Models\GymMembership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Trainer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    $sessions = GroupSession::with('trainers')->whereHas('session_assignments', function ($query) {
        $query->where('date', '>', date('Y-m-d'));
    })->inRandomOrder()->limit(4)->get();
    $trainers = Trainer::with('specializations')->inRandomOrder()->limit(5)->get();
    return view('welcome', ['trainers' => $trainers], ['sessions' => $sessions]);
})->name('IndexPage');

Route::get('/trainers', function () {
    $trainers = Trainer::with('specializations')->get();
    $specializations = \App\Models\Specialization::all();
    return view('trainers', ['trainers' => $trainers, 'specializations' => $specializations]);
})->name('trainers');

Route::get('/trainers/{specializationId}', function ($specializationId) {
    if ($specializationId == 'All Classes') {
        $trainers = Trainer::all();
    } else {
        $trainers = Trainer::with('specializations')->whereHas('specializations', function ($query) use ($specializationId) {
            $query->where('specialization_id', $specializationId);
        })->get();
    }

    return view('trainerslist', ['trainers' => $trainers]);
});


Route::get('/trainer/{id}', 'App\Http\Controllers\TrainerController@showinformation')->name('trainer.show');

Route::get('session/{session}', 'SessionController@checkLoginAndRedirect')->name('session.redirect');
Route::get('/sessions/{catalogueId}', function ($catalogueId) {
    if ($catalogueId == 'All Classes') {
        $sessions = GroupSession::all();
    } else {
        $sessions = GroupSession::with('catalogues')->whereHas('catalogues', function ($query) use ($catalogueId) {
            $query->where('catalogue_id', $catalogueId);
        })->get();
    }

    return view('sessionslist', ['sessions' => $sessions]);
});



Route::get('/prices', function () {
    $memberships = GymMembership::all();
    return view('prices', ['memberships' => $memberships]);
})->name('prices')->middleware('check.membership');

Route::post('/subscribe', [MembershipController::class, 'subscribe']);
Route::post('/resubscribe', [MembershipController::class, 'resubscribe']);
Route::get('/member-data', function () {
    if (auth()->check()) {
        $user = auth()->user();
        $member = $user->member; // This assumes that a 'member' relationship is defined in your User model
        return response()->json($member);
    }

    return response()->json(null);
})->name('member.data');


Route::get('/courses-list', [CoursesController::class, 'index'])->name('courses-list');

Route::get('/gyms', [GymController::class, 'indexPublic'])->name('gyms');






Route::get('/add-trainer', [TrainerController::class, 'create']);
Route::post('/add-trainer', [TrainerController::class, 'store']);







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/get-schedule', 'App\Http\Controllers\ScheduleController@getSchedule');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'getDashboardData'])->name('admin.dashboard');

    Route::get('/trainer/dashboard', function () {
        // Your trainer dashboard logic here
    })->name('trainer.dashboard');

    Route::get('/user/dashboard', function () {
        // Your user dashboard logic here
    })->name('user.dashboard');


    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('admins', [AdminController::class, 'admins'])->name('admins');
        Route::delete('admins/{user}', [AdminController::class, 'deleteuser'])->name('destroy');
        Route::get('members', [MemberController::class, 'index'])->name('members');
        Route::get('trainers', [TrainerController::class, 'index'])->name('trainers');
        Route::delete('trainers/{trainer}', [AdminController::class, 'deletetrainer'])->name('destroytrainer');
        Route::post('update-trainer/{id}', [TrainerController::class, 'update'])->name('update-trainer');
        Route::get('trainer/{id}/edit', [TrainerController::class, 'edit'])->name('edit-trainer');
        Route::get('gyms', [GymController::class, 'index'])->name('gyms');
        Route::get('spaces', [SpaceController::class, 'index'])->name('spaces');
        Route::get('specializations', [SpecializationController::class, 'index'])->name('specializations');
        Route::get('subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions');
        Route::get('payments', [PaymentController::class, 'index'])->name('payments');
        Route::get('/group-sessions/browse', [MemberUserController::class, 'browseGroupSessions'])->middleware('active.subscription')->name('user.group-sessions.browse');

        Route::get('group-sessions', [GroupSessionController::class, 'index'])->name('group-sessions');
        Route::delete('group-sessions/{groupSession}', [AdminController::class, 'destroySession'])->name('destroysession');
        Route::post('group-sessions/', 'App\Http\Controllers\GroupSessionController@store')->name('group-sessions.store');

        Route::get('individual_sessions', [IndividualSessionController::class, 'index'])->name('individual_sessions');
        Route::get('attendances', [AttendanceController::class, 'index'])->name('attendances');
        Route::get('reports', [ReportController::class, 'index'])->name('reports');
        Route::get('manage-gym-memberships', [GymMembershipController::class, 'index'])->name('gym_memberships');
        Route::get('gym-memberships/{id}/view', 'AdminController@gymMembershipView')->name('gym_memberships.view');
        Route::get('gym-memberships/{id}/edit', 'AdminController@gymMembershipEdit')->name('gym_memberships.edit');
        Route::get('profile/view', 'AdminController@viewProfile')->name('profile.view');
        Route::get('profile/change-password', 'AdminController@changePasswordView')->name('profile.change_password');
        Route::post('gym-memberships/store', [GymMembershipController::class, 'store'])->name('gym_memberships.store');
        Route::get('gym-memberships/{id}/active-subscriptions', [GymMembershipController::class, 'active_subscriptions'])->name('gym_memberships.active_subscriptions');
        Route::get('equipments', [EquipmentController::class, 'index'])->name('equipments');
        Route::delete('equipments/{equipment}', [AdminController::class, 'destroyequipment'])->name('destroyequipment');
        Route::get('equipments/create', [EquipmentController::class, 'create'])->name('equipments.create');
        Route::post('equipments/store', [EquipmentController::class, 'store'])->name('equipments.store');


    });
    Route::get('/admin/gym_memberships/{id}/edit', [GymMembershipController::class, 'edit'])->name('admin.gym_memberships.edit');
    Route::put('/admin/gym_memberships/{id}', [GymMembershipController::class, 'update'])->name('admin.gym_memberships.update');
    Route::get('/admin/subscriptions', [SubscriptionController::class, 'subscriptions'])->name('admin.subscriptions');
    Route::get('/admin/subscriptions/{id}', [SubscriptionController::class, 'show']);
    Route::get('/trainers/{id}', [TrainerController::class, 'show']);

    Route::get('/members/{member}', [App\Http\Controllers\MemberController::class, 'show'])->name('members.show');
    //Route::put('/admin/spaces/{space}', [\App\Http\Controllers\SpaceController::class, 'update'])->name('admin.spaces.update');
    Route::put('/admin/spaces/{id}', 'App\Http\Controllers\SpaceController@update')->name('admin.spaces.update');
    Route::post('/admin/spaces', [App\Http\Controllers\SpaceController::class, 'store'])->name('admin.spaces.store');
    Route::get('/admin/spaces/{space}/edit', [\App\Http\Controllers\SpaceController::class, 'edit'])->name('admin.spaces.edit');
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');

    ////////////////////////
    ///
    ///

    Route::get('/admin/catalogues', [CatalogueController::class, 'index'])->name('admin.catalogues');
    Route::put('/admin/catalogues/{id}', 'App\Http\Controllers\CatalogueController@update')->name('admin.catalogues.update');
    Route::post('/admin/catalogues', [App\Http\Controllers\CatalogueController::class, 'store'])->name('admin.catalogues.store');
    Route::get('/admin/catalogues/{catalogue}/edit', [\App\Http\Controllers\CatalogueController::class, 'edit'])->name('admin.catalogues.edit');
    Route::post('/admin/catalogues/store', [CatalogueController::class, 'store'])->name('catalogues.store');
    Route::delete('/admins/catalogues/{catalogue}', [AdminController::class, 'deletecatalogue'])->name('admin.destroyCatalogue');

    /////////////////////
    ///
    ///
    ///
    ///
    ///
    ///
    ///
    Route::put('/admin/equipments/{id}', 'App\Http\Controllers\EquipmentController@update')->name('admin.materiels.update');
    Route::post('/admin/equipments', [App\Http\Controllers\EquipmentController::class, 'store'])->name('admin.materiels.store');
    Route::get('/admin/equipments/{equipment}/edit', [\App\Http\Controllers\EquipmentController::class, 'edit'])->name('admin.materiels.edit');
    ///
    ///
    ///
    ///
    ///
    ///
    ///
    ///
    ///
    /////////////////////

    Route::prefix('user')->group(function () {
        Route::get('/gyms', [MemberUserController::class, 'gymsIndex'])->middleware('active.subscription')->name('user.gyms.index');
        Route::get('/group-sessions/browse', [MemberUserController::class, 'browseGroupSessions'])->middleware('active.subscription')->name('user.group-sessions.browse');
        Route::get('/group-sessions/upcoming', [MemberUserController::class, 'upcomingGroupSessions'])->middleware('active.subscription')->name('user.group-sessions.upcoming');
        Route::get('/group-sessions/reserve/{id}', [MemberUserController::class, 'reserveGroupSession'])->middleware('active.subscription')->name('user.group-sessions.reserve');
        Route::get('/personal-training', [MemberUserController::class, 'personalTrainingIndex'])->middleware('active.subscription')->name('user.personal-training.index');
        Route::get('/trainers', [MemberUserController::class, 'trainersIndex'])->middleware('active.subscription')->name('user.trainers.index');
        Route::get('/trainers/reserve/{id}', [MemberUserController::class, 'reserveTrainer'])->middleware('active.subscription')->name('user.trainers.reserve');
        Route::get('/personal-training/upcoming', [MemberUserController::class, 'upcomingPersonalTrainingSessions'])->middleware('active.subscription')->name('user.personal-training.upcoming');
        Route::get('/personal-training/previous', [MemberUserController::class, 'previousPersonalTrainingSessions'])->middleware('active.subscription')->name('user.personal-training.previous');
        Route::get('/subscription', [MemberUserController::class, 'subscriptionIndex'])->middleware('active.subscription')->name('user.subscription.index');
        Route::get('/subscription/details', [MemberUserController::class, 'subscriptionDetails'])->middleware('active.subscription')->name('user.subscription.details');
        Route::get('/subscription/history', [MemberUserController::class, 'subscriptionHistory'])->middleware('active.subscription')->name('user.subscription.history');
        Route::get('/subscription/change', [MemberUserController::class, 'changeSubscription'])->middleware('active.subscription')->name('user.subscription.change');
        Route::get('/reservations', [MemberUserController::class, 'reservationsIndex'])->middleware('active.subscription')->name('user.reservations.index');
        Route::get('/reservations/upcoming', [MemberUserController::class, 'upcomingReservations'])->middleware('active.subscription')->name('user.reservations.upcoming');
        Route::get('/reservations/past', [MemberUserController::class, 'pastReservations'])->middleware('active.subscription')->name('user.reservations.past');
        Route::post('/reservations', [ReservationController::class, 'store'])->middleware('active.subscription')->name('reservations.store');
        Route::post('/group-sessions/reserve/{session}', [ReservationController::class, 'reserveGroupSession'])->middleware('active.subscription')->name('user.reserveGroupSession');
        Route::post('/toggle-favorite', function (Request $request) {
            $trainer = App\Models\Trainer::find($request->trainer_id);
            $member = Auth::user()->member;

            if ($member->favorite_trainers->contains($trainer)) {
                $member->favorite_trainers()->detach($trainer);
            } else {
                $member->favorite_trainers()->attach($trainer);
            }

            return response()->json(['success' => true]);
        })->middleware('auth')->middleware('active.subscription');

    });


    Route::prefix('trainer-space')->name('trainer.')->group(function () {
        Route::get('/', function () {
            return redirect()->route('trainer.groupSessions');
        })->name('dashboard');
        Route::get('/group-sessions', [TrainerUsercontroller::class, 'groupSessions'])->name('groupSessions');
        Route::get('/individual-sessions', [TrainerUsercontroller::class, 'individualSessions'])->name('individualSessions');
        Route::delete('individual-sessions/{individualSession}', [TrainerUsercontroller::class, 'destroyindividualsessions'])->name('destroyindividualsessions');
        Route::get('/reservations', [TrainerUsercontroller::class, 'reservations'])->name('reservations');
        Route::get('/upcoming-events', [TrainerUsercontroller::class, 'upcomingEvents'])->name('upcomingEvents');
        Route::get('/settings', [TrainerUsercontroller::class, 'settings'])->name('settings');
        Route::post('/update-reservation', [TrainerUsercontroller::class, 'updateReservation'])->name('updateReservation');
        Route::post('/change-password', [TrainerUsercontroller::class, 'changePassword'])->name('changePassword');
    });





});
