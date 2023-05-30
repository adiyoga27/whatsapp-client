<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductVariant;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'product' => Product::with('product_categories')->latest()->get()
        ];
        return view('admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $product_category =  ProductCategory::all();

        return view('admin.product.create', compact('product', 'product_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        $img = $request->file('image');

        if ($img) {
            $data['image'] = $img->store('product-img', ['disk' => 'public']);
        }

        $product = Product::create($data);

        $product->slug;

        $variant = Variant::query()->create([
            'product_id' => $product->id,
            'name' => $data['variant_name']
        ]);

        Product::query()->find($product->id)->update([
            'variant_id' => $variant->id
        ]);

        return redirect()->route('product.index')->with('success', 'Add New Data Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        $data = [
            'name' => $product->name,
            'category_name' => $product->product_categories->name,
            'price' => $product->price,
            'description' => $product->description,
            'is_active' => $product->is_active,
            'image' => $product->image,
            'keyword' => $product->keyword
        ];

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::query()->with('variant')->find($id);

        $product_category =  ProductCategory::all();

        $variant = [];

        foreach ($product->variant as $item) {
            $variant[] = $item->name;
        }


        return view('admin.product.edit', compact('product', 'product_category', 'variant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['variant_id'] = $product->variant_id;

        $newImg = $request->file('image');
        $oldImg = $request->old_img;

        if ($newImg) {
            $data['image'] = $newImg->store('product-img', ['disk' => 'public']);
            Storage::delete($oldImg);
        } else {
            $data['image'] = $oldImg;
        }

        $product->update($data);

        $variant = Variant::query()->where('product_id', $product->id)->first();

        if ($variant == null) {
            Variant::query()->create([
                'product_id' => $product->id,
                'name' => $data['variant_name']
            ]);
        } else {
            Variant::query()->find($product->variant_id)->update([
                'name'  => $data['variant_name']
            ]);
        }



        return redirect()->route('product.index')->with('success', 'Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $variant = Variant::query()->where('product_id', $product->id)->first();

        if ($variant) {
            ProductVariant::query()->where('variant_id', $product->variant_id)->delete();

            Variant::query()->where('id', $product->variant_id)->delete();
        }

        Storage::delete($product->image);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Delete Data Successfully');
    }
}
