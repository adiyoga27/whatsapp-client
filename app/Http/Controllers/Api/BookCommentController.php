<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\BookCommentResource;
use App\Models\BookComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = BookComment::query()->paginate(10);

        return BookCommentResource::collection($data)
                ->additional([
                    'status' => true,
                    'message' => 'Data loaded successfully'
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $comment = BookComment::create($request->validated());

        return (new BookCommentResource($comment))->additional([
            'data' => $comment,
            'message' => "Create data successfully",
            'status' => true
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
    public function update(UpdateCommentRequest $request, BookComment $book_comment)
    {
        $book_comment->update($request->validated());

        // return (new BookCommentResource($update_comment))
        //             ->additional([
        //                 'status' => true,
        //                 'message' => "Data updated",
        //                 'data' => $update_comment
        //             ]);
        return response()->json([
            'status' => true,
            'message' => "Data updated",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookComment $book_comment)
    {
        $book_comment->delete($book_comment);

        return response()
                ->json([
                    'status' => true,
                    'message' => 'Data deleted'
                ]);
    }
}
