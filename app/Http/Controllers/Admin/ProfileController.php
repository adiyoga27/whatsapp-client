<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;

use App\Models\Profile;
use App\Models\Template;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $data = [
            'profile_data' => Profile::first(),
            'css_view' => true,
            'template' => Template::query()
                ->where('is_active', 1)
                ->latest()
                ->get()
        ];

        return view('admin.profile.profile', $data);
    }

    public function update(ProfileRequest $request, $id)
    {
        $data = $request->validated();

        $old_logo = $request->input('old_logo');
        $old_imgsection1 = $request->input('old_section1');
        $old_image1 = $request->input('old_image1');
        $old_image2 = $request->input('old_image2');
        $old_image3 = $request->input('old_image3');
        $old_tagline_img = $request->input('old_tagline_img');

        $imgSection1 = $request->file('section1_img');
        $image1 = $request->file('image1');
        $image2 = $request->file('image2');
        $image3 = $request->file('image3');
        $logo = $request->file('logo');
        $tagline_img = $request->file('tagline_img');

        if ($logo) {
            $data['logo'] = $logo->store('profile-img', ['disk' => 'public']);
            if ($old_logo != null) {
                Storage::delete($old_logo);
            }
        } else {
            $data['logo'] = $old_logo;
        }
        if ($imgSection1) {
            $data['section1_img'] = $imgSection1->store('profile-img', ['disk' => 'public']);
            if ($old_imgsection1 != null) {
                Storage::delete($old_imgsection1);
            }
        } else {
            $data['section1_img'] = $old_imgsection1;
        }
        if ($image1) {
            $data['image1'] = $image1->store('profile-img', ['disk' => 'public']);
            if ($old_image1 != null) {
                Storage::delete($old_image1);
            }
        } else {
            $data['image1'] = $old_image1;
        }
        if ($image2) {
            $data['image2'] = $image2->store('profile-img', ['disk' => 'public']);
            if ($old_image2 != null) {
                Storage::delete($old_image2);
            }
        } else {
            $data['image2'] = $old_image2;
        }
        if ($image3) {
            $data['image3'] = $image3->store('profile-img', ['disk' => 'public']);
            if ($old_image3 != null) {
                Storage::delete($old_image3);
            }
        } else {
            $data['image3'] = $old_image3;
        }
        if ($tagline_img) {
            $data['tagline_img'] = $tagline_img->store('profile-img', ['disk' => 'public']);
            if ($old_tagline_img != null) {
                Storage::delete($old_tagline_img);
            }
        } else {
            $data['tagline_img'] = $old_tagline_img;
        }

        Profile::query()
            ->where('id', $id)
            ->update($data);

        return redirect(route('profile-view'))->with('success', 'Update Successfully');
    }
}
