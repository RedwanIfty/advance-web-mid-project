<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pharmacy;

class PharmacyController extends Controller
{
    function showPharmacy(){
        $p=Pharmacy::all();
        return $p;
    }
}
