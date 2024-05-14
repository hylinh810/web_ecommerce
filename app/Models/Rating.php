<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['user_id', 'product_id', 'rating', 'order_id', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function comment()
    {
        return $this->belongsTo(ProductComment::class);
    }
}