<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueueAttachment extends Model
{
    use HasFactory;
    protected $fillable = [
        'queue_id',
        'attachment_id'
    ];
}
