<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategories;
use App\Models\Book;
use App\Models\BookCategories;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class RecoveryController extends Controller
{
    protected $book;
    protected $book_category;
    protected $article;
    protected $article_category;

    public function __construct()
    {
        $this->book = new Book();
        $this->book_category = new BookCategories();
        $this->article = new Article();
        $this->article_category = new ArticleCategories();

        $this->middleware(['can:isSuperadmin']);
    }

    public function bookRecovery()
    {
        $data = [
            'book' => $this->book->onlyTrashed()->get()
        ];
        return view('admin.book.recovery', $data);
    }

    public function bookRestore($id)
    {
        $this->book->withTrashed()->where('id', $id)->restore();

        return redirect()->route('book.index')->with('success', 'Data restored successfully');
    }

    public function bookForceDelete($id)
    {
        $this->book->onlyTrashed()->find($id)->forceDelete();

        return redirect()->route('book-recovery')->with('success', 'Data has been deleted permanently');
    }

    public function bookcategoryRecovery()
    {
        $data = [
            'book_category' => $this->book_category->onlyTrashed()->get()
        ];
        return view('admin.book.category.recovery', $data);
    }

    public function bookcategoryRestore($id)
    {
        $this->book_category->withTrashed()->where('id', $id)->restore();

        return redirect()->route('book-categories.index')->with('success', 'Data restored successfully');
    }

    public function bookcategoryForceDelete($id)
    {
        $this->book_category->onlyTrashed()->find($id)->forceDelete();

        return redirect()->route('recovery.bookcategory')->with('success', 'Data has been deleted permanently');
    }

    // article
    public function recoveryArticle()
    {
        $data = [
            'article' => Article::query()->with('ArticleCategories', 'User')->onlyTrashed()->get()
        ];

        return view('admin.article.recovery', $data);
    }

    public function restoreArticle($id)
    {
        $this->article->withTrashed()->where('id', $id)->restore();

        return redirect()->route('article.index')->with('success', 'Data restored successfully');
    }

    public function forcedeleteArticle($id)
    {
        $article = Article::onlyTrashed()->find($id);

        Storage::delete($article->image);

        $article->forceDelete();

        return redirect()->route('recovery.article')->with('success', 'Data has been deleted permanently');
    }

    // article
    public function recoveryArticleCategory()
    {
        $data = [
            'article_category' => $this->article_category->onlyTrashed()->get()
        ];

        return view('admin.article.category.recovery', $data);
    }

    public function restoreArticleCategory($id)
    {
        $this->article_category->withTrashed()->where('id', $id)->restore();

        return redirect()->route('article-categories.index')->with('success', 'Data restored successfully');
    }

    public function forcedeleteArticleCategory($id)
    {
        $this->article_category->onlyTrashed()->where('id', $id)->forceDelete();

        return redirect()->route('recovery.article.category')->with('success', 'Data has been deleted permanently');
    }

    // product recovery
    public function recoveryProduct()
    {
        $data = [
            'product' => Product::with('product_categories')->onlyTrashed()->get()
        ];

        return view('admin.product.recovery', $data);
    }

    public function restoreProduct($id)
    {
        Product::withTrashed()->find($id)->restore();

        return redirect()->route('recovery.product')->with('success', 'Data Restored Successfully');
    }

    public function forceDeleteProduct($id)
    {
        $product = Product::query()->find($id);

        Storage::delete($product->image);

        Product::query()->onlyTrashed()->find($id)->forceDelete();

        return redirect()->route('recovery.product')->with('success', 'Data has been deleted permanently');
    }

    // product recovery
    public function recoveryProductCategory()
    {
        $data = [
            'product_category' => ProductCategory::onlyTrashed()->get()
        ];

        return view('admin.product.category.recovery', $data);
    }

    public function restoreProductCategory($id)
    {
        ProductCategory::withTrashed()->find($id)->restore();

        return redirect()->route('recovery.product.category')->with('success', 'Data Restored Successfully');
    }

    public function forceDeleteProductCategory($id)
    {
        ProductCategory::onlyTrashed()->find($id)->forceDelete();

        return redirect()->route('product-category.index')->with('success', 'Data has been deleted permanently');
    }
}
