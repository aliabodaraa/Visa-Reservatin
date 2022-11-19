<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CompanionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{

    //Route::get('dashboard/users/create', [UsersController::class, 'create'])->name('dashboard.users.create');
    //Route::post('dashboard/users/create', [UsersController::class, 'store'])->name('dashboard.users.store');
    //Login
    Route::group(['middleware' => ['guest']], function() {
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });
    // From inside the email !
    Route::get('/guests/{id}/complete_visa_info', [GuestController::class, 'complete_visa_info'])->name('guests.complete_visa_info');
    // Final Submit by the guest
    Route::post('/guests/{id}/complete_visa_info', [GuestController::class, 'store_visa_info'])->name('guests.store_visa_info');
    Route::group(['middleware' => ['auth']], function() {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
            Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
            Route::group(['prefix' => 'dashboard/users'], function() {
                //Control Invitations
                Route::get('/guests', [UsersController::class, 'guests'])->name('dashboard.guests.index');
                Route::get('/{id}/guests/send_invite', [UsersController::class, 'send_invite'])->name('dashboard.users.send_invite');
                Route::post('/{id}/guests/store_invite', [UsersController::class, 'store_invite'])->name('dashboard.users.store_invite');
                Route::get('/guests/{guest_id}/companions/{companion}/show', [UsersController::class, 'show_companion'])->name('dashboard.companion.show');
                //Control Admins(Users)
                Route::get('', [UsersController::class, 'index'])->name('dashboard.users.index');

                Route::get('/create', [UsersController::class, 'create'])->name('dashboard.users.create');
                Route::post('/create', [UsersController::class, 'store'])->name('dashboard.users.store');

                Route::get('/{user}/show', [UsersController::class, 'show'])->name('dashboard.users.show');
                Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('dashboard.users.edit');
                Route::get('/{user}/profile', 'UsersController@profile')->name('dashboard.users.profile');
                Route::patch('/{user}/update', [UsersController::class, 'update'])->name('dashboard.users.update');
        });
    });

});
