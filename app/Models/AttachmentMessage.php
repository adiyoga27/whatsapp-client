<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_id',
        'url',
        'type'
    ];

    public function message()
    {
        return $this->belongsTo(Message::class, 'message_id');
    }
}
