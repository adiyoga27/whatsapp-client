<?php

namespace App\Http\Controllers\Wordpress;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Profile;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class ArticelController extends Controller
{
    public function index()
    {
        $data = Profile::all()[0];
        $meta = [
            "title" => 'Artikel',
            "des" => $data->sub_web_name,
            "image" => asset('storage/' . $data->logo),
        ];
        $all = [
            'article' => Article::query()->with('ArticleCategories', 'User')->where('is_active', 1)->orderBy('id', 'DESC')->paginate(6),
            'profile' => $data,
            'sosmed' => SocialMedia::all()[0],
            'meta' => $meta
        ];
        return view(
            'wordpress.articel',
            $all
        );
    }
    public function show($slug)
    {
        $data = Article::query()->where('slug', $slug)->first();
        $meta = [
            "title" => $data->title,
            "des" => strip_tags($data->description),
            "image" => asset('storage/' . $data->image),
        ];
        $all = [
            'article' => $data,
            'profile' => Profile::all()[0],
            'sosmed' => SocialMedia::all()[0],
            'meta' => $meta
        ];

        return view(
            'wordpress.detail-articel',
            $all
        );
    }
}
