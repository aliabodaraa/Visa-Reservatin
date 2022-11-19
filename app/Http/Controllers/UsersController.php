<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guest;
use App\Models\Companion;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;
use Illuminate\Http\Request;
class UsersController extends Controller
{
    /**
     * Display all users
     *
     * @return \Illuminate\Http\Response
     */

    public function guests()
    {
        $person_type=null;
        if(isset($_GET["person"])){
            if($_GET["person"] == "registant"){
                $person_type = "registant";
            }else{
                $person_type = "invitee";
            }
        }
        return view('dashboard.guests.index', compact('person_type'));
    }


    public function send_invite($id)
    {
        return view('dashboard.users.send_invite');
    }

    public function store_invite(Request $request , $id){
        $data=[
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ];
        $visa_info=null;
        try{
            $visa_info=Guest::create(['email'=>$request->email,'fname'=>$request->first_name,'lname'=>$request->last_name,'is_registant'=>0]);
            $data['id']=$visa_info->id;
            Mail::to($request->email)->send(new Welcome($data));
            $message="We send an E-mail to ".$request->first_name." ".$request->last_name." !";
        }catch(\Exception $e){
            $message=$e->getMessage();
            if($visa_info)
            {
                $visa_info->delete();
            }
                
        }  
        return redirect()->route('dashboard.index')->with("message",$message);
    }
    
    public function index()
    {
        //dd(3);
        $users = User::latest()->paginate(20);
        $users = User::all();

        return view('dashboard.users.index', compact('users'));
    }
    public function profile(User $user)
    {
            return view('dashboard.users.profile', [
                'user' => $user
            ]);
    }
    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create(
            [
                'username'=> $request->username,
                'email'=> $request->email,
                'password' => $request['password'],
            ]
        );

        return redirect()->route('dashboard.users.index')->with('message','User created successfully.');

    }

    /**
     * Show user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    // public function show(User $user)
    // {
    //     return view('dashboard.users.show', [
    //         'user' => $user
    //     ]);
    // }
                          
    /**
     * Edit user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {  
        if($request['old_password'] && $request['new_password'] && $request['new_password_verification']){
            if(Auth::attempt(['email'=>$user->email,'password'=>$request['old_password']])){
                if($request['new_password'] == $request['new_password_verification']){
                    $user->update(['password' => $request['new_password']]);
                }else{
                return redirect()->back()->with('password-message','incorrect verification password.');
                }
            }else{
                return redirect()->back()->with('password-message','incorrect old password.');
            }
        }
        $user->update($request->all());
        return redirect()->route('dashboard.users.index')->with('message','User updated successfully.');
    }

    /**
     * Delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard.users.index')->with('message','User deleted successfully.');

    }

    public function show_companion($guest_id, Companion $companion)
    {
        
        return view('companion.show', [
            'companion' => $companion
        ]);
    }
}