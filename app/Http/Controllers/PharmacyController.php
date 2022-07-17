<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pharmacy;

class PharmacyController extends Controller
{
    function pharmacy(){
        $pharmacy=Pharmacy::paginate(10);
        return view('pharmacy.showpharmacy')->with('pharmacy',$pharmacy);
    }
    function pharmacyAdd(){
        return view('pharmacy.addPharmacy');
    }
    function pharmacyAddSubmit(Request $req){
        $this->validate($req,[
            "name"=>"required",
            "address"=>"required",
            "phone_no"=>"required|numeric|regex:/^(^\+?(88)?0?1[3456789][0-9]{8})+$/i"
        ]);
        $pharmacy=new Pharmacy();
        $pharmacy->name=$req->name;
        $pharmacy->address=$req->address;
        $pharmacy->phone_no=$req->phone_no;
        $pharmacy->save();
        session()->flash('msgPharmacy','New Pharmacy details added suceessfully');
        return redirect()->route('show.pharmacy');
    }
    function search()
    {
        session()->forget('searchPharmacy');
        return view('pharmacy.search');
    }
    function searchSubmit(Request $req){
        $this->validate(
            $req,[
                "search"=>"required"
            ]
        );
        $pharmacy=Pharmacy::where('name','LIKE','%'.$req->search.'%')->get();
        session()->flash('searchPharmacy','Search Res');
        return view('pharmacy.showpharmacy')->with('pharmacy',$pharmacy);
    }
    function delete($id){
        $name=Pharmacy::where('id',$id)->pluck('name')->first();
        $pharmacy=Pharmacy::where('id',$id)->delete();
        session()->flash('deletemsg',$name.' removed');
        return redirect()->route('show.pharmacy');
    }
    function update($id){
        return view('pharmacy.update');
    }
    function updateSubmit(Request $req,$id){
        $this->validate($req,[
            "name"=>"required",
            "address"=>"required",
            "phone_no"=>"required|numeric|regex:/^(^\+?(88)?0?1[3456789][0-9]{8})+$/i"
        ]);
        $name=Pharmacy::where('id',$id)->pluck('name')->first();
        $pharmacy=Pharmacy::where('id',$id)->first();
        $pharmacy->name=$req->name;
        $pharmacy->address=$req->address;
        $pharmacy->phone_no=$req->phone_no;
        $pharmacy->update();
        session()->flash('pharmacyUpdate',$name.' updated successfully');
        return redirect()->route('show.pharmacy');

    }
}
