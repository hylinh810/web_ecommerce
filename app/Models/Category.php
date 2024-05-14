<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $guarded = []; 

    public function products() {
        return $this->hasMany(Product::class,'cate_id','id');
    }

    public function shop()
    {
        return $this->belongsTo(User::class, 'id', 'shop_id');
    }
}
