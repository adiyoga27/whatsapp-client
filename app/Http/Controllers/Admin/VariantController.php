<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
    public function index()
    {
        $data = [
            'variant' => Variant::query()->with('product')->latest()->get(),
            'product' => Product::all()
        ];

        return view('admin.variant.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'product' => Product::all()
        ];
        return view('admin.variant.create', $data);
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
            'product_id' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        Variant::query()->create($data);

        return redirect()->route('variant.index')->with('success', 'Add new data successfully');
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
    public function edit(Variant $variant)
    {
        $data = [
            'variant' => $variant,
            'product' => Product::all()
        ];

        return view('admin.variant.edit', $data);
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
        $data = $request->validate([
            'product_id' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $variant->update($data);

        return redirect()->route('variant.index')->with('success', 'Update data successfully');
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

        return redirect()->route('variant.index')->with('success', 'Delete data successfully');
    }
}
