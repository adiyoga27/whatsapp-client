<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    protected $fillable = [
        'category_id', 'variant_id', 'name', 'price', 'description', 'is_active', 'image', 'slug', 'keyword'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

    public function product_categories()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id')->withDefault();
    }

    public function variant()
    {
        return $this->hasMany(Variant::class);
    }
}
