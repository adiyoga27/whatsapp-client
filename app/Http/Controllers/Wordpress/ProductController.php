<?php

namespace App\Http\Controllers\Wordpress;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Profile;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Profile::all()[0];
        $meta = [
            "title" => 'Produk Perusahaan',
            "des" => $data->sub_web_name,
            "image" => asset('storage/' . $data->logo),
        ];
        $all = [
            'product' => Product::query()->where('is_active', 1)->orderBy('id', 'DESC')->paginate(6),
            'profile' => $data,
            'sosmed' => SocialMedia::all()[0],
            'meta' => $meta

        ];

        return view('wordpress.product', $all);
    }
    public function show($id)
    {
        $data = Product::query()
            ->where('slug', $id)->first();
        $meta = [
            "title" => $data->name,
            "des" => strip_tags($data->description),
            "image" => asset('storage/' . $data->image),
        ];
        $all = [
            'product' => $data,
            'sosmed' => SocialMedia::all()[0],
            'profile' => Profile::all()[0],
            'meta' => $meta
        ];
        return view(
            'wordpress.detail-product',
            $all
        );
    }
}
