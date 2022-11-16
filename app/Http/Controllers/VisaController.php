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
        return redirect()->route('visa.create_visa_request')->with('email',$email);
    }
    public function create_visa_request()
    {
        return view('Visa.create_visa_request');
    }
    public function store_visa_data(Request $request)
    {    $collection = collect($request->all());
        $filtered_data = $collection;
        //sub 
        $check_out_date = $request->check_out_date;
        $check_in_date = $request->check_in_date;
        $datetime_check_out_date = new DateTime($check_out_date);
        $datetime_check_in_date = new DateTime($check_in_date);
        $check_dates = $datetime_check_out_date->diff($datetime_check_in_date);
        $diff_days = $check_dates->format('%a');//now do whatever you like with $days
        //dd($diff_days);
        if($request["is_exist_companion"] == 0 && $diff_days != 5){
            $filtered_data = $collection->except(['companion_fname', 'companion_lname','companion_date_of_birth', 'companion_gender'
            ,'companion_passport_no', 'companion_issue_date','companion_expiry_date', 'companion_arrival_date','companion_profession'
            , 'companion_organization','companion_visa_duration', 'companion_visa_status','companion_passport_picture',
             'companion_personal_picture','rom_extra_type']);
        }elseif($request["is_exist_companion"] == 0 && $diff_days == 5){
            $filtered_data = $collection->except(['companion_fname', 'companion_lname','companion_date_of_birth', 'companion_gender'
            ,'companion_passport_no', 'companion_issue_date','companion_expiry_date', 'companion_arrival_date','companion_profession'
            , 'companion_organization','companion_visa_duration', 'companion_visa_status','companion_passport_picture',
             'companion_personal_picture']);
        }elseif($request["is_exist_companion"] == 1 && $diff_days != 5){
            $filtered_data = $collection->except(['rom_extra_type']);
        }
        //$filtered_data=$filtered_data->toArray();
        //dd($filtered_data);
        // "phone" => null
        // "OTP_Verification_Number_:" => null
        // "fname" => null
        // "lname" => null
        // "date_of_birth" => null
        // "gender" => "Male"
        // "passport_no" => null
        // "issue_date" => null
        // "expiry_date" => null
        // "arrival_date" => null
        // "profession" => null
        // "organization" => null
        // "visa_duration" => "1"
        // "visa_status" => "single"
        // "passport_picture" => null
        // "personal_picture" => null
        // "is_exist_companion" => "0"
        // "companion_fname" => null
        // "companion_lname" => null
        // "companion_date_of_birth" => null
        // "companion_gender" => "Male"
        // "companion_passport_no" => null
        // "companion_issue_date" => null
        // "companion_expiry_date" => null
        // "companion_arrival_date" => null
        // "companion_profession" => null
        // "companion_organization" => null
        // "companion_visa_duration" => "1"
        // "companion_visa_status" => "single"
        // "companion_passport_picture" => null
        // "companion_personal_picture" => null
        // "check_in_date" => "2022-11-30"
        // "check_out_date" => "2022-12-01"
        // "rom_type" => "king_bed"
        // "rom_extra_type" => "king_bed"
        return redirect()->route('visa.preview_visa_data')->with('data',$filtered_data);
    }
    public function preview_visa_data()
    {
        return view('Visa.preview_visa_data');
    }
    public function store_preview_visa_data(Request $request)
    {
        dd($request);
        return redirect("/");//->with('email',$email);
    }

}
// Route::get('/index', [VisaController::class, 'index'])->name('visa.index');
// Route::post('/provide_email', [VisaController::class, 'provide_email'])->name('visa.provide_email');
// Route::get('/create_visa_request', [VisaController::class, 'create_visa_request'])->name('visa.create_visa_request');
// Route::post('/store_visa_data', [VisaController::class, 'store_visa_data'])->name('visa.store_visa_data');
// Route::get('/preview_visa_data', [VisaController::class, 'preview_visa_data'])->name('visa.preview_visa_data');
// Route::post('/store_preview_visa_data', [VisaController::class, 'store_preview_visa_data'])->name('visa.store_preview_visa_data');