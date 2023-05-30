<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WhatsappResource;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;

        $data = Whatsapp::query()
            ->when($id, function ($query, $id) {
                return $query->where('id', $id);
            })
            ->latest()
            ->paginate(10);

        return WhatsappResource::collection($data)
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'name' => ['required', 'string'],
            'url' => ['required', 'string'],
            'is_active' => ['required', 'boolean'],
            'expired_at' => ['required', 'date']
        ]);

        $data = Whatsapp::query()->create($payload);

        return (new WhatsappResource($data))
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Whatsapp $whatsapp)
    {
        $payload = $request->validate([
            'name' => ['required', 'string'],
            'url' => ['required', 'string'],
            'is_active' => ['required', 'boolean'],
            'expired_at' => ['required', 'date']
        ]);

        $whatsapp->update($payload);

        return (new WhatsappResource($whatsapp))
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Whatsapp $whatsapp)
    {
        $whatsapp->delete();

        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function setup(Request $request, $id)
    {
        $whatsapp = Whatsapp::query()->find($id);

        return (new WhatsappResource($whatsapp))
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }
}
