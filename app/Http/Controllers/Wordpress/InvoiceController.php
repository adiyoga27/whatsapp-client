<?php

namespace App\Http\Controllers\Wordpress;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index($id)
    {
        $data = Profile::all()[0];
        $meta = [
            "title" => 'Invoice',
            "des" => $data->sub_web_name,
            "image" => asset('storage/' . $data->logo),
        ];
        $all = [
            'sosmed' => SocialMedia::all()[0],
            'profile' => $data,
            'meta' => $meta,
            'id' => $id
        ];

        return view(
            'wordpress.invoice',
            $all
        );
    }
}
