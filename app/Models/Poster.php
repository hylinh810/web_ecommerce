<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'posters';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = ['name', 'image', 'user_id', 'content'];

    public function poster()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}