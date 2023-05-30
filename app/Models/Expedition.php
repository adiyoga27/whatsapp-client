<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedition extends Model
{
    use HasFactory;
    protected $table = 'expedition';
    protected $fillable = [
        'code',
        'name'
    ];

    public function store()
    {
        return  $this->belongsToMany(Store::class, 'store_expedition', 'expedition_id');
    }
}
