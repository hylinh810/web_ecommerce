<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $guarded = [];
    
    public function blogComments() {
        return $this->hasMany(BlogComment::class,'blog_id','id');
    }

    public function shop()
    {
        return $this->belongsTo(User::class, 'shop_id', 'id');
    }
}