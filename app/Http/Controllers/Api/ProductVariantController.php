<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductVariantResource;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = ProductVariant::query()
            ->with('variant')
            ->paginate(20);

        return ProductVariantResource::collection($data)
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
            'variant_id' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'weight' => ['required', 'integer']
        ]);

        $data = ProductVariant::query()->create($payload);

        return (new ProductVariantResource($data))
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
    public function update(Request $request, $id)
    {
        $payload = $request->validate([
            'variant_id' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'weight' => ['required', 'integer']
        ]);

        $product_variant = ProductVariant::query()->find($id);

        $product_variant->update($payload);

        return (new ProductVariantResource($product_variant))
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
    public function destroy($id)
    {
        ProductVariant::query()->find($id)->delete();

        return response()
            ->json([
                'status' => true,
                'message' => 'success'
            ]);
    }
}
