<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'whatsapp_id',
        'title',
        'message',
        'duration',
        'batch_id'
    ];

    public function whatsapp()
    {
        return $this->belongsTo(Whatsapp::class, 'whatsapp_id')->withDefault();
    }

    public function queuemessage()
    {
        return $this->hasMany(QueueMessage::class);
    }

    public function attachmentmessage()
    {
        return $this->hasMany(AttachmentMessage::class);
    }
}
