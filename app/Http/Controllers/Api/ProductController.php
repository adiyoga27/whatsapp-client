<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::query()->paginate(10);

        return ProductResource::collection($data)
            ->additional([
                'status' => true,
                'message' => 'success',
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $payload = $request->validated();
        $payload['variant_id'] = 1;

        $img = $request->file('image');

        if ($img) {
            $payload['image'] = $img->store('product-img', ['disk' => 'public']);
        }

        $product = Product::query()->create($payload);
        $product->slug;

        $variant = Variant::query()->create([
            'product_id' => $product->id,
            'name' => $payload['variant_name']
        ]);

        Product::query()->find($product->id)->update([
            'variant_id' => $variant->id
        ]);

        return (new ProductResource($product))
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
    public function update(UpdateProductRequest $request, $id)
    {
        $payload = $request->validated();

        $img = $request->file('image');

        if ($img) {
            $payload['image'] = $img->store('product-img', ['disk' => 'public']);
        }

        $product = Product::query()->find($id);

        $product->update($payload);

        $variant = Variant::query()->where('product_id', $product->id)->first();

        if ($variant == null) {
            Variant::query()->create([
                'product_id' => $product->id,
                'name' => $payload['variant_name']
            ]);
        } else {
            Variant::query()->find($product->variant_id)->update([
                'name'  => $payload['variant_name']
            ]);
        }

        return (new ProductResource($product))
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
        $product = Product::query()->find($id);

        $variant = Variant::query()->where('product_id', $product->id)->first();

        if ($variant) {
            ProductVariant::query()->where('variant_id', $product->variant_id)->delete();

            Variant::query()->where('id', $product->variant_id)->delete();
        }

        Storage::delete($product->image);

        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Delete data success'
        ]);
    }
}
