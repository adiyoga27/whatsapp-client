<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VariantResource;
use App\Models\ProductVariant;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $variant  = Variant::query()
            ->with('product', 'variant_detail')
            ->when($request->id, function ($query, $id) {
                return $query->find($id);
            })
            ->paginate(10);

        return VariantResource::collection($variant)
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
            'product_id' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:255']
        ]);

        $data = Variant::query()->create($payload);

        return (new VariantResource($data))
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
    public function update(Request $request, Variant $variant)
    {
        $payload = $request->validate([
            'product_id' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:255']
        ]);

        $variant->update($payload);

        return (new VariantResource($variant))
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
    public function destroy(Variant $variant)
    {
        $variant->delete();

        ProductVariant::query()->where('variant_id', $variant)->delete();

        return response()
            ->json([
                'status' => true,
                'message' => 'success'
            ]);
    }
}
