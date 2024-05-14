<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'shippers';
    protected $primaryKey = 'id';
    protected $guarded = [];  
    
    public function order() {
        return $this->hasMany(Order::class,'shipper_id','id');
    }

    public function getcity(){
        return $this->belongsTo(City::class,'city','id');
    }

    public function getdistrict(){
        return $this->belongsTo(District::class,'district','id');
    }

    public function getward(){
        return $this->belongsTo(Ward::class,'ward','id');
    }
}
