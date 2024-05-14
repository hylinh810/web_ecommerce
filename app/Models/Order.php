<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = []; 

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }

    public function getCity() {
        return $this->belongsTo(City::class,'city','id');
    }

    public function shipper() {
        return $this->belongsTo(Shipper::class,'shipper_id','id');
    }

    public function getDistrict() {
        return $this->belongsTo(District::class,'district','id');
    }

    public function getWard() {
        return $this->belongsTo(Ward::class,'ward','id');
    }
    public function shop()
    {
        return $this->belongsTo(User::class, 'id', 'shop_id');
    }
    
}