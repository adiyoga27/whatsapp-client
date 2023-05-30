<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    use HasFactory;


    protected $fillable = [
        'whatsapp_id',
        'title'
    ];

    public function whatsapp()
    {
        return $this->belongsTo(Whatsapp::class, 'whatsapp_id');
    }

    public function contactphonebook()
    {
        return $this->hasMany(ContactPhoneBook::class);
    }

    public function queuemessage()
    {
        return $this->hasMany(QueueMessage::class);
    }
}
