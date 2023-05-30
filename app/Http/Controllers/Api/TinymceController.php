<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TinymceController extends Controller
{
    public function imageUpload(Request $request)
    {
        // $mainImg = $request->file('file');
        // $fileName = time() .  '.' . $mainImg->extension();
        // Image::make($mainImg)->save(public_path('tinymce_img/' . $fileName));
        // return json_encode(['location' => asset('tinymce_img/' . $fileName)]);

        $image_path = $request->file('file')->store('tinymce_img', 'public');
        return json_encode(['location' => url('storage/' .  $image_path)]);
    }
}
