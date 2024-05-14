<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'industries';
    protected $primaryKey = 'id';

    public function products()
    {
        return $this->hasMany(Product::class, 'industry_id', 'id');
    }
}