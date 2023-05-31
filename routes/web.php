<?php

use App\Http\Controllers\Admin\ArticleCategoriesController;
use App\Http\Controllers\Admin\ArticleCommentController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AttachmentController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BookCategoriesController;
use App\Http\Controllers\Admin\BookCommentController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\ContactPhoneBookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PhoneBookController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\QueueController;
use App\Http\Controllers\Admin\RecoveryController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\SosmedController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\Admin\WhatsappAccessController;
use App\Http\Controllers\Admin\WhatsappBroadcastController;
use App\Http\Controllers\Admin\WhatsAppController;
use App\Http\Controllers\Api\TinymceController;
use App\Jobs\SendWhatsapJob;
use App\Tasks\Message\SendMessage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function()
{
    return view('auth.login');
});

Route::get('/test', function()
{
    (new BotTelegram)->info($whatsappUrl . '/send-message');

    return (new SendMessage)->__invoke();
});



require __DIR__ . '/auth.php';

Route::post('tinymce/upload-img', [TinymceController::class, 'imageUpload']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {

    // reset password
    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('reset/password', 'index')->name('reset.password');
        Route::post('reset/password', 'resetPassword')->name('reset.password.store');
    });

    // dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });


    // profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'index')->name('profile-view');
        Route::get('edit/{id}', 'edit')->name('profile_edit');
        Route::post('update/{id}', 'update')->name('profile-update');
        Route::get('profile/create', 'create')->name('profile.create');
        Route::post('profile/store', 'store')->name('profile.store');
        Route::delete('profile/delete/{id}', 'delete')->name('profile.delete');
        Route::get('profile/show/{id}', 'show')->name('profile.show');
    })->middleware(['can:isAdmin', 'can:isSuperadmin']);

    // // Book
    // Route::resource('book', BookController::class);

    // // book catgories
    // Route::resource('book-category', BookCategoriesController::class)->except('show');

    // article
    Route::resource('article', ArticleController::class);

    // article categories
    Route::resource('article-category', ArticleCategoriesController::class)
        ->except('show')->middleware('auth', 'verified');

    // social media
    Route::controller(SosmedController::class)->group(function () {
        Route::get('social-media', 'index')->name('sosmed.index');
        Route::get('social-media/edit/{id}', 'edit')->name('sosmed.edit');
        Route::post('social-media/update/{id}', 'update')->name('sosmed.update');
    })->middleware(['can:isAdmin', 'can:isSuperadmin', 'auth', 'verified']);

    // recovery data
    Route::controller(RecoveryController::class)->group(function () {
        Route::get('recovery/book', 'bookRecovery')->name('book-recovery');
        Route::get('restore/book/{id}', 'bookRestore')->name('book-restore');
        Route::delete('/force-delete/book/{id}', 'bookForceDelete')->name('book-forcedelete');

        Route::get('book-category/recovery', 'bookcategoryRecovery')->name('recovery.bookcategory');
        Route::get('book-category/restore/{id}', 'bookcategoryRestore')->name('restore.bookcategory');
        Route::delete('book-category/forcedelete/{id}', 'bookcategoryForceDelete')->name('force-delete.bookcategory');

        Route::get('recovery/article', 'recoveryArticle')->name('recovery.article');
        Route::get('restore/article/{id}', 'restoreArticle')->name('restore.article');
        Route::delete('/forcedelete/article/{id}', 'forcedeleteArticle')->name('forcedelete.article');

        Route::get('recovery/article-category', 'recoveryArticleCategory')->name('recovery.article.category');
        Route::get('restore/article-category/{id}', 'restoreArticleCategory')->name('restore.article.category');
        Route::delete('/forcedelete/article-category/{id}', 'forcedeleteArticleCategory')->name('forcedelete.article.category');

        Route::get('recovery/product', 'recoveryProduct')->name('recovery.product');
        Route::get('restore/product/{id}', 'restoreProduct')->name('restore.product');
        Route::delete('forcedelete/product/{id}', 'forceDeleteProduct')->name('forcedelete.product');

        Route::get('recovery/product-category', 'recoveryProductCategory')->name('recovery.product.category');
        Route::get('restore/product-category/{id}', 'restoreProductCategory')->name('restore.product.category');
        Route::delete('forcedelete/product-category/{id}', 'forceDeleteProductCategory')->name('forcedelete.product.category');
    })->middleware(['can:isAdmin', 'can:isSuperadmin']);


    // user
    Route::resource('user', UserController::class)
        ->except(['show']);

    // book comment
    Route::controller(BookCommentController::class)->group(function () {
        Route::get('/comment/book', 'index')->name('book.comment.index');
    });

    // product
    Route::resource('product', ProductController::class);

    // product category
    Route::resource('product-category', ProductCategoryController::class);

    // testimonial
    Route::resource('testimonial', TestimonialController::class);

    // template
    Route::resource('template', TemplateController::class);

    // message
    Route::resource('message', MessageController::class);
    Route::delete('message/attach/{id}', [MessageController::class, 'deleteAttachment'])->name('message.attachment.delete');

    // whatsapp
    Route::resource('whatsapp', WhatsAppController::class);
    Route::get('whatsapp/qrcode/{id}', [WhatsAppController::class, 'setup']);
    // Phone Book
    Route::resource('phonebook', PhoneBookController::class)->except('show');

        // Phone Book
        Route::resource('permission', PermissionController::class)->except('show');

    // contact phonebook
    Route::controller(ContactPhoneBookController::class)->group(function () {
        Route::get('contact-phonebook/{id}', 'index')->name('contact-phonebook.index');
        Route::get('contact-phonebook/create/{id}', 'create')->name('contact-phonebook.create');
        Route::post('contact-phonebook/store', 'store')->name('contact-phonebook.store');
        Route::get('contact-phonebook/edit/{id}', 'edit')->name('contact-phonebook.edit');
        Route::put('contact-phonebook/update/{id}', 'update')->name('contact-phonebook.update');
        Route::delete('contact-phonebook/{id}', 'destroy')->name('contact-phonebook.destroy');
        Route::post('contact-phonebook/import-excel/{id}', 'importExcel')->name('contact-phonebook.import-excel');
    });

    // attachment
    Route::controller(AttachmentController::class)->group(function () {
        Route::get('attach/{id}', 'index')->name('attach.index');
        Route::post('attach/upload', 'upload')->name('attach.upload');
        Route::delete('attach/{id}', 'destroy')->name('attach.destroy');
        Route::get('attach/edit/{id}', 'edit')->name('attach.edit');
        Route::put('attach/update/{id}', 'update')->name('attach.update');
    });

    // queue
    Route::controller(QueueController::class)->group(function () {
        Route::get('queue/{message}', 'index')->name('queue.index');
        Route::post('queue/import-phonebook', 'importPhonebook')->name('queue.importphonebook');
        Route::post('queue/import-excel', 'importexcel')->name('queue.importexcel');
        Route::get('queue/edit/{id}', 'edit')->name('queue.edit');
        Route::put('queue/update/{id}', 'update')->name('queue.update');
        Route::delete('queue/destroy/{id}', 'destroy')->name('queue.destroy');
        Route::delete('queue/delete/{message_id}', 'delete')->name('queue.delete');
        Route::post('queue/', 'storeManual')->name('queue.store-manual');
        Route::get('queu/download-example', 'exportExcel')->name('queue.excel-download');
    });

    // add whatsapp access to user table
    Route::controller(WhatsappAccessController::class)->group(function () {
        Route::post('whtasapp-access/{user}', 'store')->name('whatsapp-access.store');
        Route::get('whatsapp-access', 'getWhatsapp')->name('whtasapp-access.get-whatsapp');
    });

    // whatsapp broadcast
    Route::controller(WhatsappBroadcastController::class)->group(function () {
        Route::get('whatsapp/send-message/{message}', 'sendMessage')->name('send-message');
    });

    // variant
    Route::resource('variant-blank', VariantController::class)->except('show');

    // product variant
    Route::resource('product-variant', ProductVariantController::class)->except('show');

    // bank
    Route::resource('bank', BankController::class)->except('show');

    // order
    Route::controller(OrderController::class)->group(function () {
        Route::get('order', 'index')->name('order.index');
        Route::get('order/{order}', 'show')->name('order.show');
        Route::put('order/approve/{order}', 'approve')->name('order.approve');
        Route::delete('order/{order}', 'destroy')->name('order.destroy');
        Route::post('orders/filter', 'filter')->name('order.filter');
    });


    Route::controller(StoreController::class)->group(function () {
        Route::get('store-expedition', 'index')->name('store.expedition.index');
        Route::post('store-expedition/{id}', 'update')->name('store.expedition.update');
        Route::get('store/get-city/{id}', 'getCity')->name('store.get-city');
        Route::get('store/get-subdistrict/{id}', 'getSubdistrict')->name('store.get-subdistrict');
    });

    // invoice
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('invoice/download/{uuid}', 'invoice')->name('invoice.download');
    });
});
