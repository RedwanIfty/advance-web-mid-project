<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Pharmacy;
use PDF;

class AdminController extends Controller
{
    function show(){
        $user=Users::paginate(10);
        return view('Admin.show')->with('users',$user);
    }
    function showIndividual($id){
        $user=Users::where('id',$id)->first();
        return view('Admin.showIndividual')->with('user',[$user]);
    }
    function delete($id){
        $user=Users::where('id',$id)->delete();
        return redirect()->route('admin.dash.show');
    }
    function update($id){
        return view('User.update');
    }
    function updateSubmit(Request $req,$id)
    {
        $this->validate($req,
        [
            "name"=>"required|max:20|min:3|regex:/^[a-z ,.'-]+$/i",
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
    $user=Users::where('id',$id)->first();
    //return $user;
    $name= time().'_'.$req->file('p_image')->getClientOriginalName();
    $req->file('p_image')->storeAs('uploads',$name,'public');
    $user ->name = $req->name;
    $user ->email =$req->email;
    $user ->password =$req->password;
    $user-> type = $req->type;
    $user ->pro_pic =$name;
    $user->update();
    session()->flash('updateMsg','Successfully updated');
    return redirect()->route('admin.dash.show');
    }
    function search()
    {
        return view('User.search');
    }
    function searchSubmit(Request $req){
        $this->validate($req,[
            "search"=>"required"
        ]);
        $user=Users::where('name','LIKE','%'.$req->search.'%')->get();
        session()->flash('searchRes','Searched result:');
        return view('User.search')->with('user',$user);
    }
    function showPharmacy(){
        $pharmacy=Pharmacy::all();
        return $pharmacy;
    }
    function download(){
        $users=Users::all();
        $pdf=PDF::loadView('Admin.converttopdf',compact('users'));
        // return $pdf;
         return $pdf->download('user.pdf');
 

    }
}
