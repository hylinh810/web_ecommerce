<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'coupons';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function shop()
    {
        return $this->belongsTo(User::class, 'shop_id', 'id');
    }
}