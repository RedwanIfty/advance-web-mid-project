<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Pharmacy;
use App\Models\Drugs;
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
        session()->forget('searchRes');
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
    function drugs(){
        return view('drugs.add');
    }
    function drugsSubmit(Request $req){
        $this->validate($req,[
            "name"=>"required|unique:drugs,name",
            "formula"=>"required",
            "price"=>"required|numeric",
            "available"=>"required|numeric",
        ],
    [
        "name.required"=>"Please provide drugs name",
        "name.unique"=>"Already exists"
    ]);
        $drug=new Drugs();
        $drug->name=$req->name;
        $drug->formula=$req->formula;
        $drug->price=$req->price;
        $drug->available=$req->available;
        $drug->save();
        session()->flash('drugsmsg','Save successfull');
        return redirect()->route('drugs.show');
    }
    function drugsShow(){
        $drugs=Drugs::paginate(10);
        return view('drugs.show')->with('drugs',$drugs);
    }
    function drugsAdd($id){
        $name=Drugs::where('id',$id)->pluck('name')->first();
        $available=Drugs::where('id',$id)->pluck('available')->first();
        session()->put('name',$name);
        session()->put('available',$available);
        return view('drugs.adddrugs');
    }
    function drugsAddSubmit(Request $req,$id){
        $this->validate($req,[
            "available"=>"required"
        ]);
        $drugs=Drugs::find($id);
        $drugs->available=$drugs->available+$req->available;
        $drugs->update();
        session()->flash('drugsAdd','Drugs added');
        session()->forget('name');
        session()->forget('available');
        return redirect()->route('drugs.show');
    }
    function drugsDelete($id)
    {
        $drugs=Drugs::where('id',$id)->delete();
        return redirect()->route('drugs.show');
    }
    function searchDrugs(){
        session()->forget('searchDrugs');
        return view('drugs.search');
    }
    function searchDrugsSubmit(Request $req){
        $this->validate($req,[
            "search"=>"required|exists:drugs,name"
        ],
        [
            "search.required"=>"Provide drugs name",
            "search.exists"=>"This drug is not exists"
        ]
    );
    $drugs=Drugs::where('name','LIKE','%'.$req->search.'%')->get();
    session()->flash('searchDrugs','Searched result');
    return view('drugs.show')->with('drugs',$drugs);

    }
    function forgetPass(){
        return view('User.forgetpass');
    }
    function forgetPassSubmit(Request $req){
        $this->validate($req,[
            "email"=>"required|exists:user,email",
            "pass"=>"required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}+$/i",
            "conf_password"=>"required|min:8|same:pass"
        ],
    [
        "email.required"=>"Please Provide email address",
        "email.exists"=>"Email do not exists",
        "pass.required"=>"Please Provide password",
        "pass.regex"=>"Password must contain upper case,lower case,number and special characters",
        "conf_password.required"=>"Please  Confirm password",
        "conf_password.same"=>"Confirm password don't match with password"
    ]);
        $user=Users::where('email',$req->email)->first();
        $user->password=$req->pass;
        $user->update();
        session()->flash('forgetMsg','Change password successfull');
        return back();
    }
}
