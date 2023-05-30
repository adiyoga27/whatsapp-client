<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'variant_id',
        'name',
        'price',
        'weight',
    ];

    public function variant()
    {
        return $this->belongsTo(Variant::class, 'variant_id');
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
