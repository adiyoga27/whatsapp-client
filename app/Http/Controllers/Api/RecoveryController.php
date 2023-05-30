<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ProductResource;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecoveryController extends Controller
{
    // article
    public function recoveryArticle()
    {
        $article = Article::query()->with('ArticleCategories', 'User')->onlyTrashed()->paginate(10);

        return ArticleResource::collection($article)
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }

    public function restoreArticle($id)
    {
        Article::query()->withTrashed()->where('id', $id)->restore();

        return response()->json([
            'status' => true,
            'message' => 'Data restored'
        ]);
    }

    public function forceDeleteArticle($id)
    {
        Article::query()->onlyTrashed()->where('id', $id)->forceDelete();

        return response()->json([
            'status' => true,
            'message' => 'Data deleted'
        ]);
    }

    // product
    public function productRecovery()
    {
        $product = Product::query()->onlyTrashed()->paginate(10);

        return ProductResource::collection($product)
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }

    public function restoreProduct($id)
    {
        Product::query()->withTrashed()->find($id)->restore();

        return response()->json([
            'status' => true,
            'message' => 'Data restored'
        ]);
    }

    public function forceDeleteProduct($id)
    {
        $product = Product::onlyTrashed()->find($id);

        Storage::delete($product->image);

        $product->forceDelete();

        return response()->json([
            'status' => true,
            'message' => 'Data deleted'
        ]);
    }
}
