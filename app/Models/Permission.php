<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permission_whatsapps';
    protected $fillable = [
        'user_id',
        'whatsapp_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function whatsapp()
    {
        return $this->belongsTo(Whatsapp::class, 'whatsapp_id', 'id');
    }
}
