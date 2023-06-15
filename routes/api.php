<?php

use App\Events\sendWhatsAppMessage;
use App\Http\Controllers\Api\ArticleCommentController;
use App\Http\Controllers\Api\BookCommentController;
use App\Http\Controllers\Api\ArticleCategoryController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BankController;
use App\Http\Controllers\Api\BookCategoryController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\BroadcastController;
use App\Http\Controllers\Api\ContactPhoneBookController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderDetailController;
use App\Http\Controllers\Api\PhoneBookController;
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductVariantController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\QueueController;
use App\Http\Controllers\Api\RecoveryController;
use App\Http\Controllers\Api\SosmedController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\TemplateController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\TinymceController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VariantController;
use App\Http\Controllers\Api\WhatsappController;
use App\Http\Controllers\HomeController;
use App\Models\Bank;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Tasks\Message\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('test', [TestController::class, 'testBot']);
Route::get('sync-slug', [TestController::class, 'syncSlugEmpty']);

Route::post('tinymce/upload-img', [TinymceController::class, 'imageUpload']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum'])->group(function () {

    // books
    Route::apiResource('books', BookController::class);

    // book category
    Route::apiResource('book-categories', BookCategoryController::class);

    // article
    Route::apiResource('articles', ArticleController::class);

    // article category
    Route::apiResource('article-categories', ArticleCategoryController::class);

    // profile
    Route::get('profiles', [ProfileController::class, 'index']);
    Route::put('profiles', [ProfileController::class, 'update']);

    // sosial media
    Route::get('social-medias', [SosmedController::class, 'index']);
    Route::put('social-medias', [SosmedController::class, 'update']);


    // book comment
    Route::apiResource('book-comments', BookCommentController::class);

    // article comment
    Route::apiResource('article-comments', ArticleCommentController::class);

    // product
    Route::apiResource('products', ProductController::class);

    // product category
    Route::apiResource('product-categories', ProductCategoryController::class);

    Route::apiResource('testimonials', TestimonialController::class);

    Route::apiResource('templates', TemplateController::class);

    Route::apiResource('users', UserController::class);

    Route::get('orders', [OrderController::class, 'index']);

    Route::apiResource('testimonials', TestimonialController::class);


    // recovery

    Route::controller(RecoveryController::class)->group(function () {
        // article -----------------
        Route::get('recovery/article', 'recoveryArticle');
        Route::get('recovery/article/{article}', 'restoreArticle');
        Route::delete('recovery/article/{article}', 'forceDeleteArticle');
        // product -----------------
        Route::get('recovery/product', 'productRecovery');
        Route::get('recovery/product/{product}', 'restoreProduct');
        Route::delete('recovery/product/{product}', 'forceDeleteProduct');
    });

    Route::apiResource('variants', VariantController::class);
    Route::apiResource('phonebooks', PhoneBookController::class)->except('show');
    Route::apiResource('contact-phonebooks', ContactPhoneBookController::class)->except('show');
    Route::post('contact-phonebooks/import/{id}', [ContactPhoneBookController::class, 'importExcel']);

    // whatsapp
    Route::apiResource('whatsapps', WhatsappController::class);
    Route::get('whatsapps/scan/{whatsapp}', [WhatsappController::class, 'setup']);

    // message
    Route::apiResource('messages', MessageController::class);

    // queue message
    Route::controller(QueueController::class)->group(function () {

        Route::get('queue-message/{message_id}', 'index');
        Route::post('queue-messages/store-manual', 'StoreManualQueue');
        Route::put('queue-messages/update/{queue_id}', 'update');
        Route::post('queue-message/import-phonebook', 'importPhonebook');
        Route::post('queue-message/import-phonebook', 'importPhonebook');
        Route::delete('queue-message/delete-queue/{message_id}', 'deleteAllQueue');
        Route::delete('queue-message/delete/{message_id}', 'destroy');
    });

    // send message
    Route::get('whatsapp/send-message/{message_id}', [BroadcastController::class, 'sendMessage']);

    // variant
    Route::apiResource('variants', VariantController::class);

    // product variant
    Route::apiResource('product-variants', ProductVariantController::class);

    // bank
    Route::apiResource('banks', BankController::class);

    // store and expedition
    Route::controller(StoreController::class)->group(function () {
        Route::get('store-expedition', 'index');
        Route::get('store-expedition/expedition', 'expedition');
        Route::put('store-expedition', 'update');
    });

    Route::post('logout', [AuthController::class, 'logout']);
});


// authentication
// Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


// order
Route::apiResource('orders', OrderController::class);
Route::post('orders/checkout', [OrderController::class, 'checkout']);
Route::get('get-cost', [OrderController::class, 'getCost']);
// invoice
Route::get('order/invoice', [OrderController::class, 'getInvoice']);


// order detail
Route::apiResource('order-details', OrderDetailController::class);

Route::post('upload/', [TestController::class, 'upload'])->name('upload.file');

Route::get('testting-whatsapp', function () {

    $bank = collect(Bank::query()->where('is_active', true)->get());
    sendWhatsAppMessage::dispatch(Order::query()->with('order_detail')->find(35), $bank);

    return response()->json([
        'status' => true,
        'message' => 'success'
    ]);
});
