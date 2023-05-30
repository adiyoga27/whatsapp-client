<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExpeditionResource;
use App\Http\Resources\StoreResource;
use App\Models\Expedition;
use App\Models\Store;
use App\Models\StoreExpedition;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $store = Store::query()
            ->with('expedition')
            ->first();

        return (new StoreResource($store))
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }

    public function expedition()
    {
        $data = Expedition::all();

        return ExpeditionResource::collection($data)
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }

    public function update(Request $request)
    {
        $payload = $request->validate([
            "provice_id" => 'required', 'numeric',
            "province_name" => ['required', 'string'],
            "city_id" => ['required', 'numeric'],
            "city_name" => ['required', 'string'],
            "subdistrict_id" => ['required', 'numeric'],
            "subdistrict_name" => ['required', 'string'],
            "store_address" => ['required', 'string'],
            'take_to_store' => ['sometimes', 'boolean'],
            "expedition" => ['required'],
        ]);

        $store = Store::query()->first();

        $expedition = $payload['expedition'];

        $store->update($payload);

        StoreExpedition::query()->where('store_id', $store->id)->delete();

        foreach ($expedition as $item) {
            StoreExpedition::query()->create([
                'store_id' => $store->id,
                'expedition_id' => $item
            ]);
        }
        return (new StoreResource($store))
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }
}
