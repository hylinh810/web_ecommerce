<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = []; 

    protected $fillable = [
        'product_name',
        'sdescription',
        'cate_id',
        'description',
        'price',
        'discount',
        'stocks',
        'alias',
        'featured',
        'published',
        'shop_id',
        'industry_id'
    ];

    public function productCategory() {
        return $this->belongsTo(Category::class,'cate_id','id');
    }


    public function productIndustry()
    {
        return $this->belongsTo(Industry::class, 'industry_id', 'id');
    }

    public function productImage() {
        return $this->hasMany(productImage::class,'product_id','id');
    }

    public function productComment() {
        return $this->hasMany(ProductComment::class,'product_id','id');
    }

    public function orderDetail() {
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }
    public function shop()
    {
        return $this->belongsTo(User::class, 'shop_id', 'id' );
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}