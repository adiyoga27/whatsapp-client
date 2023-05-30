<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SosmedController extends Controller
{
    public function index()
    {
        $data = [
            'sosmed' => SocialMedia::all()[0]
        ];
        return view('admin.sosmed.view', $data);
    }

    public function edit($id)
    {
        $data = [
            'sosmed' => SocialMedia::find($id)
        ];

        return view('admin.sosmed.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'email' => 'required|max:50|email',
            'youtube' => 'required'

        ]);

        SocialMedia::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Edit Data Successfully');
    }


}
