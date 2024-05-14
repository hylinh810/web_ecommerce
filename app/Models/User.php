<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    protected $fillable = [
        'name',
        'birthdate',
        'email',
        'phone',
        'level',
        'address',
        'district',
        'ward',
        'city',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function order() {
        return $this->hasMany(Order::class,'user_id','id');
    }
    public function shop()
    {
        return $this->hasMany(Product::class, 'shop_id', 'id');
    }

    public function category()
    {
        return $this->hasMany(Category::class, 'shop_id', 'id');
    }

    public function getCity() {
        return $this->belongsTo(City::class,'city','id');
    }

    public function getDistrict() {
        return $this->belongsTo(District::class,'district','id');
    }

    public function getWard() {
        return $this->belongsTo(Ward::class,'ward','id');
    }
    public function shopID()
    {
        return $this->belongsTo(Order::class, 'id', 'shop_id');
    }

    public function coupon()
    {
        return $this->hasMany(Coupon::class, 'shop_id', 'id');
    }
    public function blog()
    {
        return $this->hasMany(Blog::class, 'shop_id', 'id');
    }
}