<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Whatsapp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'url',
        'is_active',
        'expired_at'
    ];

    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function whatsapp()
    {
        return $this->hasMany(PhoneBook::class);
    }
}
