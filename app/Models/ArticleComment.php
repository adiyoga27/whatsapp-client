<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'user_id',
        'comment',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Article()
    {
        return $this->belongsTo(Article::class);
    }
}
