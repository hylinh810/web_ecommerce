<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'wards';
    protected $primaryKey = 'id';
    protected $guarded = []; 

    public function district() {
        return $this->belongsTo(District::class,'city_id','id');
    }

    public function order() {
        return $this->hasMany(Order::class,'city','id');
    }

    public function user() {
        return $this->hasMany(User::class,'ward','id');
    }

    public function shipper() {
        return $this->hasMany(Shipper::class,'city','id');
    }
}
