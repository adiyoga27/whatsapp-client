<?php

namespace App\Http\Controllers\Wordpress;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use App\Models\Profile;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data = Profile::all()[0];
        $meta = [
            "title"=>$data->web_name,
            "des"=>$data->sub_web_name,
            "image"=>asset('storage/' . $data->logo),
        ];
        return view('wordpress.index', [
            'profile' => $data,
            // 'product' => Product::query()->where('is_active', 1)->get(),
            // 'sosmed' => SocialMedia::all()[0],
            // 'testimonial' => Testimonial::query()->where('is_active', 1)->get(),
            // 'article' => Article::query()->with('ArticleCategories', 'User')->where('is_active', 1)->get(),
            'meta'=> $meta
        ]);
    }
}
