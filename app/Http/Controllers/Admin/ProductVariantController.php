<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'product_variant' => ProductVariant::query()->with('variant')->get()
        ];
        return view('admin.product-variant.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'variant' => Variant::all()
        ];

        return view('admin.product-variant.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'variant_id' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'weight' => ['required', 'integer']
        ]);

        ProductVariant::query()->create($data);

        return redirect()->route('product-variant.index')->with('success', 'Add data successfully');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'variant' => Variant::all(),
            'product_variant' => ProductVariant::query()->find($id)
        ];

        return view('admin.product-variant.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductVariant $product_variant)
    {
        $data = $request->validate([
            'variant_id' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'weight' => ['required', 'integer']
        ]);

        $product_variant->update($data);

        return redirect()->route('product-variant.index')->with('success', 'Update data successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVariant $product_variant)
    {
        $product_variant->delete();

        return redirect()->route('product-variant.index')->with('success', 'Delete data successfully');
    }
}
