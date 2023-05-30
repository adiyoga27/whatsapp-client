<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::query()->paginate(10);

        return BookResource::collection($books)
            ->additional([
                'status' => true,
                'message' => "Resource loaded"
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
        try {
            $validated = Validator::make($request->all(), [
                'category_id' => ['required', 'integer'],
                'title' => ['required', 'string', 'max:255'],
                'price' => ['required', 'integer'],
                'description' => ['required'],
                'is_active' => ['integer', 'required'],
                'image' => ['required', 'max:1024', 'image', 'mimes:png,jpg,jpeg']
            ],
            [
                'is_active' => [
                    'required' => 'This field is required'
                ]
            ]);

            $data = $validated->getData();

            if ($validated->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validated->errors()
                ]);
            } else {
                $img = $request->file('image');

                if ($img) {
                    $data['image'] = $img->store('book-img');
                }

                Book::create($data);

                return response()->json([
                    'status' => true,
                    'message' => 'Data created',
                    'data' => $data
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Book $book)
    {
        return (new BookResource($book))
            ->additional([
                'status' => true,
                'message' => "Resource loaded",
            ]);
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
        try {
            $validated = Validator::make($request->all(), [
                'category_id' => ['sometimes', 'integer'],
                'title' => ['sometimes', 'string', 'max:255'],
                'price' => ['sometimes', 'integer'],
                'description' => ['sometimes'],
                'is_active' => ['integer', 'sometimes'],
                'image' => ['sometimes', 'max:1024', 'image', 'mimes:png,jpg,jpeg']
            ]);

            $data = $validated->getData();
            if($validated->fails()){
                return response()->json([
                    'status' => false,
                    'message' => $validated->errors()
                ]);
            }else{

                $img = $request->file('image');
                $bookData = Book::query()->find($id);
                $oldImage = $bookData->image;

                if($img){
                    $data['image'] = $img->store('book-img');
                    Storage::delete($oldImage);
                }else{
                    $data['image'] = $oldImage;
                }
                dd($data);
                Book::query()->find($id)->update($data);

                return response()->json([
                    'status' => true,
                    'message' => 'Data updated',
                    'data' => $data
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Book $book)
    {
        $data = $book->delete($request->all());

        return response()
                ->json([
                    'status' => true,
                    'data' => $data,
                    'message' => 'data deleted!',
                ]);
    }
}
