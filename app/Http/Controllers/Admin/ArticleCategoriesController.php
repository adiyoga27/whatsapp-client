<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategories;
use Illuminate\Http\Request;

class ArticleCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected $article;

    public function __construct()
    {
        $this->article = new ArticleCategories();
    }

    public function index()
    {
        $data = [
            'article' => $this->article->latest()->get()
        ];
        return view('admin.article.category.view', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.category.create');
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
                'name' => 'required|string|max:255',
                'is_active' => 'required'
            ],
            [
                'is_active' => [
                    'required' => 'This field is required'
                ]
            ]
        );

        if ($data['is_active'] == 2) {
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }

        $this->article->create([
            'name' => $data['name'],
            'is_active' => $data['is_active']
        ]);

        return redirect()->route('article-category.index')->with('success', 'New Data Added Successfully');
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
            'article' => $this->article->find($id)
        ];

        return view('admin.article.category.edit', $data);
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
        $data = $request->validate(
            [
                'name' => 'required|string|max:255',
                'is_active' => 'required'
            ],
            [
                'is_active' => [
                    'required' => 'This field is required'
                ]
            ]
        );

        if ($data['is_active'] == 2) {
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }

        $this->article->where('id', $id)->update([
            'name' => $data['name'],
            'is_active' => $data['is_active']
        ]);

        return redirect()->route('article-category.index')->with('success', 'Edit Data Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->article->where('id', $id)->delete();

        return redirect()->route('article-category.index')->with('success', 'Delete Data Successfully');
    }
}
