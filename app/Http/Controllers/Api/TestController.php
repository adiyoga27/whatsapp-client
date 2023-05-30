<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BotTelegram;
use App\Http\Controllers\Controller;
use App\Jobs\SendWhatsapJob;
use App\Models\Article;
use App\Models\AttachmentMessage;
use App\Models\Product;
use App\Models\QueueMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Str;

class TestController extends Controller
{
    public function testBot()
    {
        try {
        (new BotTelegram)->info("coba cronjob");
        QueueMessage::where('status', 'progress')->limit(30)->get()->each(fn ($item) => Bus::dispatch(new SendWhatsapJob(
            queueID: $item->id
        )));

        } catch (\Throwable $th) {
            throw $th;
        }

    }
    public function syncSlugEmpty()
    {
        $articles = Article::all();
        foreach ($articles as $article) {
            $article->update([
                'slug' => Str::slug($article->title) . '-' . Str::random(3)
            ]);
        }

        $products = Product::all();
        foreach ($products as $product) {
            $product->update([
                'slug' => Str::slug($product->name) . '-' . Str::random(3)
            ]);
        }
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');

        $path = $file->store('attachment');

        return response()->json([
            'status' => 'success',
            'path' => $path
        ]);
    }
}
