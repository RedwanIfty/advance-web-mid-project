<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table="user";
    // public function user_pharmacy(){
    //     return $this->hasMany(User_Pharmacy::class,'u_id','id');
    // }
}
