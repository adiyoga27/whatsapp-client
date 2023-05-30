<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ArticleCategories extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function Article(){
        return $this->hasMany(Article::class);
    }

    public function getArticleDetail()
    {
        DB::table('article_categories')
        ->join('articles', 'articles.category_id', 'article_categories.id')
        ->get();
    }
}
