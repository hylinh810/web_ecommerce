<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'districts';
    protected $primaryKey = 'id';
    protected $guarded = []; 

    public function city() {
        return $this->belongsTo(City::class,'city_id','id');
    }

    public function ward() {
        return $this->hasMany(Ward::class,'district_id','id');
    }

    public function order() {
        return $this->hasMany(Order::class,'city','id');
    }

    public function user() {
        return $this->hasMany(User::class,'district','id');
    }

    public function shipper() {
        return $this->hasMany(Shipper::class,'city','id');
    }
}
