<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'cities';
    protected $primaryKey = 'id';
    protected $guarded = []; 

    public function district() {
        return $this->hasMany(District::class,'city_id','id');
    }

    public function order() {
        return $this->hasMany(Order::class,'city','id');
    }

    public function user() {
        return $this->hasMany(User::class,'city','id');
    }

    public function shipper() {
        return $this->hasMany(Shipper::class,'city','id');
    }
}
