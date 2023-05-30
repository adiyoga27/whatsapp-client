<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice_number',
        'customer_name',
        'customer_phone',
        'customer_address',
        'total',
        'status',
        'expired_at',
        'paid_at',
        'approve_by',
        'shipping_subdistrict_id',
        'shipping_province_name',
        'shipping_city_name',
        'shipping_subdistrict_name',
        'shipping_expedition',
        'shipping_fee',
        'uuid',
        'total_amount'
    ];


    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
