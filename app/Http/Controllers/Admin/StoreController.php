<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expedition;
use App\Models\Store;
use App\Models\StoreExpedition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function index()
    {
        $province = Http::timeout(5)->get('https://api-mobile.saddannusantara.com/gsongkir/v2/province.php')->json()['data'];
        $expedition = Expedition::all();
        $province_data = Store::all()[0];

        $city_data = $city = Http::timeout(5)->get('https://api-mobile.saddannusantara.com/gsongkir/v2/city.php?province=' . $province_data->provice_id)->json()['data'];
        $subdistrict_data = Http::timeout(5)->get('https://api-mobile.saddannusantara.com/gsongkir/v2/subdistrict.php?city=' . $province_data->city_id)->json()['data'];
        $store_expedition = StoreExpedition::query()->pluck('expedition_id')->all();

        return view('admin.store.index', compact(
            'province',
            'expedition',
            'province_data',
            'city_data',
            'subdistrict_data',
            'store_expedition',
        ));
    }

    public function getCity($id)
    {
        $city = Http::timeout(5)->get('https://api-mobile.saddannusantara.com/gsongkir/v2/city.php?province=' . $id)->json()['data'];

        return $city;
    }

    public function getSubdistrict($id)
    {
        $district = Http::timeout(5)->get('https://api-mobile.saddannusantara.com/gsongkir/v2/subdistrict.php?city=' . $id)->json()['data'];
        return $district;
    }

    public function update(Request $request, $id)
    {
        $payload = $request->validate([
            "provice_id" => 'required', 'numeric',
            "province_name" => ['required', 'string'],
            "city_id" => ['required', 'numeric'],
            "city_name" => ['required', 'string'],
            "subdistrict_id" => ['required', 'numeric'],
            "subdistrict_name" => ['required', 'string'],
            "store_address" => ['sometimes'],
            'take_to_store' => ['sometimes', 'boolean'],
            "expedition" => ['sometimes'],
        ]);

        $expedition = $payload['expedition'] ?? null;

        Store::query()->find($id)->update($payload);

        StoreExpedition::query()->where('store_id', $id)->delete();
        if ($expedition) {
            foreach ($expedition as $item) {
                StoreExpedition::query()->create([
                    'store_id' => $id,
                    'expedition_id' => $item
                ]);
            }
        }

        return redirect()->back()->with('success', 'Update setting successfully');
    }
}
