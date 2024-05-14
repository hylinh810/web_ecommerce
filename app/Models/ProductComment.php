<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;
    protected $fillable = ['comment', 'user_id', 'product_id'];

    public $timestamps = false;
    protected $table = 'product_comment';
    protected $primaryKey = 'id';
    protected $guarded = []; 

    public function product() {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function rating()
    {
        return $this->hasOne(Rating::class, 'comment_id', 'id');
    }
}