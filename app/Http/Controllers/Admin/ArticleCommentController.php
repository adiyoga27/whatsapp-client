<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleComment;
use Illuminate\Http\Request;

class ArticleCommentController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'article_comment' => ArticleComment::with('User', 'Article')->get()
        ];

        return view('admin.article.comment.index', $data);
    }
}
