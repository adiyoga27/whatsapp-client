<?php

namespace App\Http\Controllers\Wordpress;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Profile;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class ContacContrailler extends Controller
{
    // public function index()
    // {
    //     $data = Profile::all()[0];
    //     $meta = [
    //         "title" => 'Kontak Kami',
    //         "des" => $data->sub_web_name,
    //         "image" => asset('storage/' . $data->logo),
    //     ];
    //     $all = [
    //         'article' => Article::query()->with('ArticleCategories', 'User')->where('is_active', 1)->paginate(6),
    //         'profile' => $data,
    //         'sosmed' => SocialMedia::all()[0],
    //         'meta'=>$meta
    //     ];
    //     return view(
    //         'wordpress.contact-data',
    //         $all
    //     );
    // }
}
