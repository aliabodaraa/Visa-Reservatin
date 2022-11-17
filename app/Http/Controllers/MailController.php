<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;
use App\Mail\SuccessRegistration;
use App\Models\Visa;
use DateTime;
class MailController extends Controller
{
    public function sendWelcomeEmail(Request $request){
        $data=[
            'email' => $request->email,
        ];
        $visa_info=null;

        try{
            $visa_info=Visa::create(['email'=>$request->email]);
            $data['id']=$visa_info->id;
            Mail::to($request->email)->send(new Welcome($data));
            $message="We send an E-mail to You please check your inbox .. !";
            //dd($request->email);
            
            //session(['id' => $visa_info->id]);
            //dd(session('id'));
           // dd($message);
       }catch(\Exception $e){
            $message="Sorry, there is something wrong !";
            if($visa_info)
            {
                $visa_info->delete();
            }
                
           // dd($message);
        }
        
        return view('Visa.message_check_inbox')->with(['message'=>$message]);
    }





    public function store_visa_data(Request $request)
    {
        try{
            
            
            $request->phone=(int)$request->phone;
            //dd($request->country_of_residency);
            $visa_info=Visa::findOrFail($request->id);
            $collection = collect($request->all());
            $filtered_data = $collection; 
            $visa_info->update($request->all());
            $visa_info->save();

            //Sending Email 
            Mail::to($request->email)->send(new SuccessRegistration());
            $message="We send an E-mail to You please check your inbox .. !";
         }catch(\Exception $e){
            $message="Sorry, there is something wrong !";
         }

        return view('Visa.message_check_inbox')->with(['message'=>$message]);
    }
}
