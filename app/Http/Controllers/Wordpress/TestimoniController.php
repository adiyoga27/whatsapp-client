<?php

namespace App\Http\Controllers\Wordpress;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $data = Profile::all()[0];
        $meta = [
            "title" => 'Testimoni',
            "des" => $data->sub_web_name,
            "image" => asset('storage/' . $data->logo),
        ];
        $all = [
            'testimonial' => Testimonial::query()->where('is_active', 1)->orderBy('id', 'DESC')->paginate(6),
            'sosmed' => SocialMedia::all()[0],
            'profile' => $data,
            'meta' => $meta
        ];

        return view(
            'wordpress.testimonial',
            $all
        );
    }
}
