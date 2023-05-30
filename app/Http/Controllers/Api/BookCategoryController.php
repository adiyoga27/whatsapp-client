<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCategoryResource;
use App\Models\BookCategories;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $book_category = BookCategories::query()
                        ->paginate(10);

        return BookCategoryResource::collection($book_category)
        ->additional([
            'status' => true,
            'message' => "Data loaded successfully"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, BookCategories $book_category)
    {
        $data = $book_category->query()->create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'New data added!',
            'data' => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BookCategories $book_category)
    {

        return (new BookCategoryResource($book_category))
                ->additional([
                    'status' => true,
                    'message' => 'Data loaded',
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookCategories $book_category)
    {
        $data = $book_category->update($request->all());

        return response()->json([
            'data' => $data,
            'status' => true,
            'message' => 'Data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BookCategories $book_category)
    {
        $book_category->delete($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Data deleted'
        ], 200);
    }
}
