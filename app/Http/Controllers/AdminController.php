<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

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
}
