<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
class VisaController extends Controller
{
    public function index()
    {
        return view('Visa.index');
    }
    public function provide_email(Request $request)
    {
        $email=$request->email;
        //dd($request);
        return redirect()->route('visa.message_check_inbox')->with('email',$email);
    }
    public function message_check_inbox()
    {
        return view('Visa.message_check_inbox');
    }
    public function create_visa_request()
    {
        $email=$_GET['email'];
        $id=$_GET['id'];

        return view('Visa.create_visa_request',compact('email','id'));
    }




}
// Route::get('/index', [VisaController::class, 'index'])->name('visa.index');
// Route::post('/provide_email', [VisaController::class, 'provide_email'])->name('visa.provide_email');
// Route::get('/create_visa_request', [VisaController::class, 'create_visa_request'])->name('visa.create_visa_request');
// Route::post('/store_visa_data', [VisaController::class, 'store_visa_data'])->name('visa.store_visa_data');
// Route::get('/preview_visa_data', [VisaController::class, 'preview_visa_data'])->name('visa.preview_visa_data');
// Route::post('/store_preview_visa_data', [VisaController::class, 'store_preview_visa_data'])->name('visa.store_preview_visa_data');