<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisaController;
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
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        //Visa Group
        Route::group(['prefix' => 'visa'], function() {
            Route::get('/index', [VisaController::class, 'index'])->name('visa.index');
            Route::post('/provide_email', [VisaController::class, 'provide_email'])->name('visa.provide_email');
            Route::get('/create_visa_request', [VisaController::class, 'create_visa_request'])->name('visa.create_visa_request');
            Route::post('/store_visa_data', [VisaController::class, 'store_visa_data'])->name('visa.store_visa_data');
            Route::get('/preview_visa_data', [VisaController::class, 'preview_visa_data'])->name('visa.preview_visa_data');
            Route::post('/store_preview_visa_data', [VisaController::class, 'store_preview_visa_data'])->name('visa.store_preview_visa_data');
        });
    });

    Route::group(['middleware' => ['auth'/*, 'permission'*/]], function() {


    });
});
