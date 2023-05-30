<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\map;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::query()
            ->with('ArticleCategories', 'user')
            ->paginate(10);

        return ArticleResource::collection($data)
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
    public function store(Request $request, Article $article)
    {
        $payload = $request->validate(
            [
                'title' => ['required', 'string'],
                'user_id' => ['sometimes', 'numeric'],
                'category_id' => ['required', 'numeric'],
                'description' => ['required', 'string'],
                'image' => ['required', 'image', 'mimes:png,jpg,jpeg'],
                'is_active' => ['required', 'numeric'],
                'keyword' => ['required', 'string']
            ],
            [
                'is_active' => [
                    'required' => 'This field is required'
                ]
            ]
        );

        $payload['user_id'] = Auth::user()->id;

        $img = $request->file('image');

        if ($img) {
            $payload['image'] = $img->store('article-img', ['disk' => 'public']);
        }
        $val = $article->query()->create($payload);

        return (new ArticleResource($val))
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
    public function show(Request $request, Article $article)
    {
        return (new ArticleResource($article))
            ->additional([
                'status' => true,
                'message' => 'success'
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
        $payload = $request->validate(
            [
                'title' => ['sometimes', 'string'],
                'user_id' => ['sometimes', 'numeric'],
                'category_id' => ['sometimes'],
                'description' => ['sometimes', 'string'],
                'image' => ['sometimes', 'image', 'max:1024', 'mimes:png,jpg,jpeg'],
                'is_active' => ['required', 'numeric'],
                'keyword' => ['required', 'string']
            ],
            [
                'is_active' => [
                    'required' => 'This field is required'
                ]
            ]
        );

        $img = $request->file('image');
        $articleData = Article::query()->find($id);
        $oldImg = $articleData->image;

        if ($img) {
            $payload['image'] = $img->store('article-img', ['disk' => 'public']);
            Storage::delete($oldImg);
        } else {
            $payload['image'] = $oldImg;
        }

        Article::query()->find($id)->update($payload);

        return (new ArticleResource($articleData))
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
    public function destroy(Article $article)
    {
        Storage::delete($article->image);

        $article->delete();

        return response()
            ->json([
                'status' => true,
                'message' => 'Data deleted',
            ], 200);
    }
}
