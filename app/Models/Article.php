<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    public function ArticleComment()
    {
        return $this->hasMany(ArticleComment::class);
    }

    public function ArticleCategories()
    {
        return $this->belongsTo(ArticleCategories::class, 'category_id')->withDefault();
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function getArticle()
    {
        return DB::table('articles')
            ->join('users', 'users.id', '=', 'articles.user_id')
            ->join('article_categories', 'article_categories.id', '=', 'articles.category_id')
            ->select('articles.*', 'users.username', 'article_categories.name')
            ->where('articles.deleted_at', '=', null)
            ->latest()
            ->get();
    }
    public function getArticleDetail($id)
    {
        return DB::table('articles')
            ->join('users', 'users.id', '=', 'articles.user_id')
            ->join('article_categories', 'article_categories.id', '=', 'articles.category_id')
            ->select('articles.*', 'users.username', 'article_categories.name')
            ->where('articles.deleted_at', '=', null)
            ->where('articles.id', $id)
            ->get();
    }
}
