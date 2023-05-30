<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Profile::query()->first();

        return (new ProfileResource($data))
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        $payload = $request->validated();

        $profile = Profile::query()->first();

        $old_logo = $profile['old-logo'];
        $old_imgsection1 = $profile['old_section1'];
        $old_image1 = $profile['old_image1'];
        $old_image2 = $profile['old_image2'];
        $old_image3 = $profile['old_image3'];
        $old_tagline_img = $profile['old_tagline_img'];

        $imgSection1 = $request->file('section1_img');
        $image1 = $request->file('image1');
        $image2 = $request->file('image2');
        $image3 = $request->file('image3');
        $logo = $request->file('logo');
        $tagline_img = $request->file('tagline_img');

        if ($logo) {
            $payload['logo'] = $logo->store('profile-img', ['disk' => 'public']);
            if ($old_logo != null) {
                Storage::delete($old_logo);
            }
        } else {
            $payload['logo'] = $old_logo;
        }
        if ($imgSection1) {
            $payload['section1_img'] = $imgSection1->store('profile-img', ['disk' => 'public']);
            if ($old_imgsection1 != null) {
                Storage::delete($old_imgsection1);
            }
        } else {
            $payload['section1_img'] = $old_imgsection1;
        }
        if ($image1) {
            $payload['image1'] = $image1->store('profile-img', ['disk' => 'public']);
            if ($old_image1 != null) {
                Storage::delete($old_image1);
            }
        } else {
            $payload['image1'] = $old_image1;
        }
        if ($image2) {
            $payload['image2'] = $image2->store('profile-img', ['disk' => 'public']);
            if ($old_image2 != null) {
                Storage::delete($old_image2);
            }
        } else {
            $payload['image2'] = $old_image2;
        }
        if ($image3) {
            $payload['image3'] = $image3->store('profile-img', ['disk' => 'public']);
            if ($old_image3 != null) {
                Storage::delete($old_image3);
            }
        } else {
            $payload['image3'] = $old_image3;
        }
        if ($tagline_img) {
            $payload['tagline_img'] = $tagline_img->store('profile-img', ['disk' => 'public']);
            if ($old_tagline_img != null) {
                Storage::delete($old_tagline_img);
            }
        } else {
            $payload['tagline_img'] = $old_tagline_img;
        }

        $profile->update($payload);

        return (new ProfileResource($profile))
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }
}
