<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class BookCategories extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function Book()
    {
        return $this->hasMany(Book::class);
    }

    public function getBookData()
    {
        return DB::table('book_categories')
        ->join('books', 'books.category_id', '=', 'book_categories.id')
        ->where('books.deleted_at', '=', null)
        ->select('books.*', 'book_categories.name')
        ->latest()
        ->get();
    }
}
