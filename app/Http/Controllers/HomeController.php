<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function imageUpload(Request $request)
    {
        $mainImg = $request->file('file');
        $fileName = time() .  '.' . $mainImg->extension();
        // Image::make($mainImg)->save(public_path('tinymce_img/' . $fileName));
        // return json_encode(['location' => asset('tinymce_img/' . $fileName)]);

        $image_path = $request->file('file')->store('tinymce_img', 'public');
        return json_encode(['location' => url('storage' . "/" . $image_path)]);
    }
}
