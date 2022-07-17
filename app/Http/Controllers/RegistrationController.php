<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;
use Illuminate\Support\Facades\Mail;
use App\Mail\Conformation;

class RegistrationController extends Controller
{
    function register()
    {   
        return view('User.register');
    }
    function registerSubmit(Request $req){
        $this->validate($req,
            [
                "name"=>"required|max:30|min:3|regex:/^[a-z ,.'-]+$/i",
                "email"=>"required|unique:user,email",
                "type"=>"required",
                "password"=>"required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}+$/i",
                "conf_password"=>"required|min:8|same:password",
                "p_image"=>"required|mimes:jpg,png,jpeg|max:2048"
            ],
            [
                "name.required"=>"Provide your name",
                "name.regex"=>"Provide valid name",
                "password.regex"=>"Password must contain upper case,lower case,number and special characters",
                "conf_password.required"=>"Confirm your password",
                "conf_password.same"=>"Confirm password and password don't match"
            ]
        );

        $user=new Users();
        $name= time().'_'.$req->file('p_image')->getClientOriginalName();
        $req->file('p_image')->storeAs('uploads',$name,'public');
        $user ->name = $req->name;
        $user ->email =$req->email;
        $user ->password =$req->password;
        $user-> type = $req->type;
        $user -> pro_pic =$name;
    
        //Mail::to([$req->email])->send(new Conformation("Registration Confirmation","Dear you have been successfully registered"));
        $user->save();
        session()->flash('msg','Successfully Registered');
        return back();
    }
}
