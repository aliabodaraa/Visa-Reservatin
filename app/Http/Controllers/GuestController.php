<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use App\Mail\SuccessRegistration;
use App\Models\Companion;

use Illuminate\Http\File;
use Illuminate\Support\Str;
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
        //dd($request->personal_picture);
        //dd($request->file('passport_picture'));
        //$decoded_image = base64_decode($encoded_image);
        $request->validate([
            'personal_picture' => 'mimes:png,jpg,jpeg|max:2048',
        ]/*,['mimes'=>'adasdasd']*/);
        //dd($request->personal_picture,$request->lecture);
        try{
            $request->phone=(int)$request->phone;
            $guest=Guest::findOrFail($request->id);

            if($request->passport_picture){
                $passport_picture_name = 'passport_picture-'.Str::random().'.'.$request->passport_picture->extension();//choose name of file via Str::random() function to be identical each time i want to create a new file
                $dir='images/passport-pictures/';
                $relativePath = $dir.$passport_picture_name;
                $absolutePath = public_path($dir);
                if(! \File::exists($absolutePath)){
                    \File::makeDirectory($absolutePath,8755,true);
                }
                $request->passport_picture->move($absolutePath, $passport_picture_name);
                //file_put_contents($relativePath, $request->passport_picture);
                $request["passport_picture"]=$relativePath;
            }
            if($request->personal_picture){
                $personal_picture_name = 'personal_picture-'.Str::random().'.'.$request->personal_picture->extension();//choose name of file via Str::random() function to be identical each time i want to create a new file
                $dir='images/personal-pictures/';
                $relativePath_ = $dir.$personal_picture_name;
                $absolutePath = public_path($dir);
                if(! \File::exists($absolutePath)){
                    \File::makeDirectory($absolutePath,8755,true);
                }
                $request->personal_picture->move($absolutePath, $personal_picture_name);
                //file_put_contents($relativePath, $request->personal_picture);
                //$request["personal_picture"]=$relativePath;//Error becaue the left side is UploadedFile and the right is strind
            }

            $guest->update($request->only('date_of_birth','gender','passport_no','phone',
            'issue_date','expiry_date','arrival_date','profession','organization',
            'visa_duration','visa_status','passport_picture','personal_picture',
            'place_of_birth','country_of_residency','place_of_issue','check_in_date',
            'check_out_date','rom_type','rom_extra_type'));
            $guest->is_registant=1;
            $guest->passport_picture=$passport_picture_name;
            $guest->personal_picture=$personal_picture_name;
            $guest->save();

            if($request->is_exist_companion){
                if($request->companion_passport_picture){
                    $companion_passport_picture_name = 'companion_passport_picture-'.Str::random().'.'.$request->companion_passport_picture->extension();//choose name of file via Str::random() function to be identical each time i want to create a new file
                    $dir='images/passport-pictures/';
                    $relativePath = $dir.$companion_passport_picture_name;
                    $absolutePath = public_path($dir);
                    if(! \File::exists($absolutePath)){
                        \File::makeDirectory($absolutePath,8755,true);
                    }
                    $request->companion_passport_picture->move($absolutePath, $companion_passport_picture_name);
                    //file_put_contents($relativePath, $request->companion_passport_picture);
                    //$request["companion_passport_picture"]=$relativePath;//Error
                }
                if($request->companion_personal_picture){
                    $companion_personal_picture_name = 'companion_personal_picture-'.Str::random().'.'.$request->companion_personal_picture->extension();//choose name of file via Str::random() function to be identical each time i want to create a new file
                    $dir='images/personal-pictures/';
                    $relativePath = $dir.$companion_personal_picture_name;
                    $absolutePath = public_path($dir);
                    if(! \File::exists($absolutePath)){
                        \File::makeDirectory($absolutePath,8755,true);
                    }
                    $request->companion_personal_picture->move($absolutePath, $companion_personal_picture_name);
                    //file_put_contents($relativePath, $request->companion_personal_picture);
                    //$request["companion_personal_picture"]=$relativePath;//Error
                }
                $companion = Companion::create($request->only('companion_fname','companion_lname','companion_date_of_birth','companion_gender','companion_passport_no',
                'companion_issue_date','companion_expiry_date','companion_arrival_date','companion_profession','companion_organization',
                'companion_visa_duration','companion_visa_status','companion_passport_picture','companion_personal_picture',
                'companion_place_of_birth','companion_country_of_residency','companion_place_of_issue','guest_id' ));
                $companion->companion_passport_picture=$companion_passport_picture_name;
                $companion->companion_personal_picture=$companion_personal_picture_name;
                $companion->save();
            }

            Mail::to($request->email)->send(new SuccessRegistration());
            $message="We send an E-mail to You please check your inbox .. !";
         }catch(\Exception $e){
            $message=$e->getMessage();
         }

        return view('guests.message_check_inbox')->with(['message'=>$message]);
    }

    public function get_type($name){
        $type=substr($name,stripos($name,".")+1);
        // dd($type);
        if(! in_array($type,['jpg','jpeg','gif','png']))
            throw new \Exception('invalid image type');

        return  $type;
    }



 
}
