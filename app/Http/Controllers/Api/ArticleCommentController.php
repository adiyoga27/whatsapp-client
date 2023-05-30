<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateArticleCommentRequest;
use App\Http\Resources\ArticleCommentResource;
use App\Models\ArticleComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ArticleComment::query()->paginate(10);

        return ArticleCommentResource::collection($data)
                ->additional([
                    'status' => true,
                    'message' => 'Data loaded'
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
            $validate = Validator::make($request->all(), [
                'user_id' => 'required',
                'article_id' => 'required',
                'comment' => 'required'
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'msg' => $validate->errors()
                ]);
            } else {
                ArticleComment::query()->create($request->all());

                    return response()->json([
                        'status' => true,
                        'message' => 'New Data Added!',
                    ]);
                }
            } catch (\Throwable $th) {
                return response()
                        ->json([
                            'status' => false,
                            'message' => $th->getMessage()
                        ]);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ArticleComment $article_comment)
    {
        return (new ArticleCommentResource($article_comment))
                        ->additional([
                            'status' => true,
                            'message' => 'Data loaded',
                            'data' => $article_comment
                        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleCommentRequest $request, ArticleComment $article_comment)
    {
        $article_comment->update($request->validated());

        return response()
                ->json([
                    'status' => true,
                    'message' => 'Data updated',
                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleComment $article_comment)
    {
        $article_comment->delete($article_comment);

        return response()
                ->json([
                    'status' => true,
                    'message' => 'Data deleted'
                ]);
    }
}
