<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'web_name',
        'store_address',
        // 'maps',
        'email',
        'phone_cs_1',
        'whatsapp',
        'logo',
        'sub_web_name',
        'template',
        'section_name_3',
        'section_title_3',
        'section_description_3',
        'section1_img',
        'image1',
        'image2',
        'image3',
        'tagline_section',
        'tagline_img',
        'notif'
    ];
}
