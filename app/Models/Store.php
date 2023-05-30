<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        "provice_id",
        "province_name",
        "city_id",
        "city_name",
        "subdistrict_id",
        "subdistrict_name",
        "store_address",
        "take_to_store"
    ];

    public function expedition()
    {
        return  $this->belongsToMany(Expedition::class, 'store_expedition', 'store_id');
    }
}
