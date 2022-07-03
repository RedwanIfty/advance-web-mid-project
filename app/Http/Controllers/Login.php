<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class Login extends Controller
{
    function login(){
        return view('User.login');
    }
    function loginSubmit(Request $req)
    {
        $this->validate($req,[
            "email"=>"required|exists:user,email",
            "pass"=>"required"
        ],[
            "email.exits"=>"Provide email is not registered"
        ]);
        $user = Users::where('email',$req->email)
                            ->where('password',$req->pass)->first();

        if($user){
            $check=Users::where('type','ADMIN')
                        ->where('email',$req->email)
                        ->where('password',$req->pass)->first(['type']);
            if($check){
                session()->put('logged',$user->email);
                return redirect()->route('admin.dash'); 
            }
            else
            {
                return "Another Userdashboard";
            }
            //session()->flash('msg','User Exists');
            // session()->put('logged',$user->user_id);
            // return redirect()->route('ums.dash');

        }
        else {
            session()->flash('msg','User not valid');
        return back();
        }


    }
    function dashboard(){

        $user = Users::where('email',session()->get('logged'))->first();
        return view('User.admindashboard')->with('user',$user);
    }
    // Route::get('/logout',function(){
    //     session()->forget('logged');
    //     session()->flash('msg','Sucessfully Logged out');
    //     return redirect()->route('ums.login');
    // })->name('logout');
    function logout(){
        session()->forget('logged');
        session()->flash('msg','Sucessfully Logged out');
        return redirect()->route('login');
    }

}
