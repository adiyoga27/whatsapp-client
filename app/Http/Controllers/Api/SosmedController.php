<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SosmedResource;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = SocialMedia::query()->first();

        return (new SosmedResource($data))
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
    public function update(Request $request)
    {
        $sosmed = SocialMedia::query()->first();

        $payload = $request->validate([
            'facebook' => ['required', 'string'],
            'instagram' => ['required', 'string'],
            'twitter' => ['required', 'string'],
            'email' => ['required', 'string'],
            'youtube' => ['required', 'string'],
            'is_active' => ['required', 'boolean'],
        ]);

        $sosmed->update($payload);

        return (new SosmedResource($sosmed))
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }
}
