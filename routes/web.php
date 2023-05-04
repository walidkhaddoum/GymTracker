<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\GroupSessionController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\GymMembershipController;
use App\Http\Controllers\IndividualSessionController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

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

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::get('admins', [AdminController::class, 'admins'])->name('admins');
        Route::get('members', [MemberController::class, 'index'])->name('members');
        Route::get('trainers', [TrainerController::class, 'index'])->name('trainers');
        Route::get('gyms', [GymController::class, 'index'])->name('gyms');
        Route::get('spaces', [SpaceController::class, 'index'])->name('spaces');
        Route::get('specializations', [SpecializationController::class, 'index'])->name('specializations');
        Route::get('subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions');
        Route::get('payments', [PaymentController::class, 'index'])->name('payments');
        Route::get('group-sessions', [GroupSessionController::class, 'index'])->name('group-sessions');
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

});
