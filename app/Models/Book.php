<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function BookComment(){
        return $this->hasMany(BookComment::class);
    }

    public function BookCategories()
    {
        return $this->belongsTo(BookCategories::class, 'category_id');
    }

    // join book and book categories
    public function joinBookCategories($id){
        return DB::table('books')
        ->join('book_categories', 'book_categories.id', '=', 'books.category_id')
        ->where('book_categories.id', $id)
        ->select('books.*', 'book_categories.name')
        ->get();
    }

    public function getBookDetail($id)
    {
        return DB::table('books')
        ->join('book_categories', 'book_categories.id', '=', 'books.category_id')
        ->where('books.id', $id)
        ->select('books.*', 'book_categories.name')
        ->get();
    }



}
