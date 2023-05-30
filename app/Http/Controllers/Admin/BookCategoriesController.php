<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookCategories;

class BookCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    //  public function __construct() {
    //     $this->middleware(['can:isSuperadmin']);
    //  }

    public function index()
    {
        $data = [
            'categories' => BookCategories::latest()->get()
        ];
        return view('admin.book.category.view', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.category.create');
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
            'name' => 'required|string|max:100',
            'is_active' => 'required|integer'
        ]);

        BookCategories::create($data);

        return redirect(route('book-category.index'))->with('success', 'Added New Data Successfully');
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
            'categories' => BookCategories::find($id)
        ];

        return view('admin.book.category.edit', $data);
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
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'is_active' => 'required|integer'
        ]);

        BookCategories::where('id', $id)->update([
            'name' => $data['name'],
            'is_active' => $data['is_active']
        ]);

        return redirect(route('book-category.index'))->with('success', 'Edit Data Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BookCategories::where('id', $id)->delete();

        return redirect(route('book-category.index'))->with('success', 'Delete Data Successfully');
    }
}
