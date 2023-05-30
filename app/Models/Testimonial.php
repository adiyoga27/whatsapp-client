<?php

namespace App\Models;

use Database\Factories\TestimonialFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return TestimonialFactory::new();
    }
    protected $fillable = [
        'name', 'phone', 'photo', 'description', 'is_active', 'rate_star'
    ];
}
