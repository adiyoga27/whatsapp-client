<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'book_id', 'comment'
    ];

    public function Book(){
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bookCommentDetail()
    {
        return DB::table('book_comments')
                ->join('users', 'users.id', '=', 'book_comments.user_id')
                ->join('books', 'books.id', '=', 'book_comments.book_id')
                ->select('book_comments.*', 'books.title', 'users.username', 'users.email')
                ->get();
    }


}
