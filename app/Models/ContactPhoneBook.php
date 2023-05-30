<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPhoneBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'phonebook_id',
        'name',
        'phone'
    ];

    public function phonebook()
    {
        return $this->belongsTo(PhoneBook::class, 'phonebook_id');
    }
}
