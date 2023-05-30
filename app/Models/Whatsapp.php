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
        'expired_at',
        'prefix',
        'response',
        'apikey'
    ];

    protected $casts = [
        'response' => 'array'
    ];

    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function whatsapp()
    {
        return $this->hasMany(PhoneBook::class);
    }

    public function permission()
    {
       return $this->hasMany(Permission::class, 'whatsapp_id', 'id');
    }
}
