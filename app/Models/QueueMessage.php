<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueueMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'phonebook_id',
        'message_id',
        'phone',
        'name',
        'status',
        'response'
    ];

    public function phonebook()
    {
        return $this->belongsTo(PhoneBook::class, 'phonebook_id')->withDefault();
    }

    public function message()
    {
        return $this->hasOne(Message::class, 'id', 'message_id');
    }

    public function files()
    {
        return $this->hasMany(AttachmentMessage::class, 'message_id', 'message_id');
    }
}
