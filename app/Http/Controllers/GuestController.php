<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use App\Mail\SuccessRegistration;
use App\Models\Companion;

class GuestController extends Controller
{

    public function complete_visa_info($id)
    {
        $email=$_GET['email'];
        $first_name=$_GET['first_name'];
        $last_name=$_GET['last_name'];
        //Auth::logout();
        return view("guests.complete_visa_info",compact("id","email","first_name","last_name"));
    }


    public function store_visa_info(Request $request)
    {
        try{

            $request->phone=(int)$request->phone;
            //dd($request->country_of_residency);
            $guest=Guest::findOrFail($request->id);
            $collection = collect($request->all());
            $filtered_data = $collection; 
            $guest->update($request->only('date_of_birth','gender','passport_no','phone',
            'issue_date','expiry_date','arrival_date','profession','organization',
            'visa_duration','visa_status','passport_picture','personal_picture',
            'place_of_birth','country_of_residency','place_of_issue','check_in_date',
            'check_out_date','rom_type','rom_extra_type'));
            $guest->is_registant=1;
            $guest->save();

            if($request->is_exist_companion){
                //$request->guest_id=$guest->id;
                $companion = Companion::create($request->only('companion_fname','companion_lname','companion_date_of_birth','companion_gender','companion_passport_no',
                'companion_issue_date','companion_expiry_date','companion_arrival_date','companion_profession','companion_organization',
                'companion_visa_duration','companion_visa_status','companion_passport_picture','companion_personal_picture',
                'companion_place_of_birth','companion_country_of_residency','companion_place_of_issue','guest_id' ));
                $companion->save();
            }
            Mail::to($request->email)->send(new SuccessRegistration());
            $message="We send an E-mail to You please check your inbox .. !";
         }catch(\Exception $e){
            $message=$e->getMessage();
         }

        return view('guests.message_check_inbox')->with(['message'=>$message]);
    }




 
}
