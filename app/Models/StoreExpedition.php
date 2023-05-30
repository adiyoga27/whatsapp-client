<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreExpedition extends Model
{
    use HasFactory;
    protected $table = 'store_expedition';
    protected $fillable = [
        'store_id',
        'expedition_id'
    ];
}
