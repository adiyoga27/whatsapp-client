<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected $article;
    protected $article_categories;


    public function __construct()
    {
        $this->article = new Article();
        $this->article_categories = new ArticleCategories();
    }

    public function index()
    {
        $article_detail = Article::query()->with('User', 'ArticleCategories')->latest()->get();

        $data = [
            'article' => $article_detail
        ];

        return view('admin.article.view', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'article_categories' => ArticleCategories::all()
        ];

        return view('admin.article.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|string',
                'category_id' => 'required',
                'description' => 'required|string',
                'image' => 'required|image|mimes:png,jpg,jpeg',
                'is_active' => 'required',
                'keyword' => 'required|string|max:255',
                'slug' => 'string|max:255'
            ],
            [
                'is_active' => [
                    'required' => 'This field is required'
                ]
            ]
        );

        $image = $request->file('image');

        if ($image) {
            $data['image'] = $image->store('article-img', ['disk' => 'public']);
        }

        if ($data['is_active'] == 2) {
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }

        $article = $this->article->create([
            'title' => $data['title'],
            'category_id' => $data['category_id'],
            'is_active' => $data['is_active'],
            'user_id' => auth()->user()->id,
            'description' => $data['description'],
            'image' => $data['image'],
            'keyword' => $data['keyword']
        ]);
        $article->slug;

        return redirect()->route('article.index')->with('success', 'Add New Data Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->article->getArticleDetail($id)[0];

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $data = [
            'article' => $article,
            'article_categories' => ArticleCategories::all()

        ];

        return view('admin.article.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->validate(
            [
                'title' => 'required|string',
                'category_id' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg',
                'is_active' => 'required',
                'description' => 'required',
                'keyword' => 'required|string|max:255'
            ],
            [
                'is_active' => [
                    'required' => 'This field is required'
                ]
            ]
        );

        $oldImage = $request->input('old_img');
        $newImage = $request->file('image');

        if ($newImage) {
            $data['image'] = $newImage->store('article-img', ['disk' => 'public']);
            Storage::delete($oldImage);
        } else {
            $data['image'] = $oldImage;
        }

        if ($data['is_active'] == 2) {
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }
        $data['user_id'] = $request->input('user_id');

        $article->update($data);

        return redirect()->route('article.index')->with('success', 'Edit Data Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('article.index')->with('success', 'Delete Data Successfully');
    }
}
