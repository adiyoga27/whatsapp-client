<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookComment;
use Illuminate\Http\Request;

class BookCommentController extends Controller
{
    public function index()
    {

        $book = BookComment::with('Book', 'User')->get();
        $datas = [
            'book_comment' => $book
        ];
        return view('admin.book.comment.index', $datas);
    }
}
