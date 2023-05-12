<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\NewsSourceController as AdminNewsSourceController;
use App\Http\Controllers\Admin\MailController as AdminMailController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Forms\MailController as MailController;
use App\Http\Controllers\Forms\OrderController as OrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\SocialProvidersController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::group(['middleware' => 'auth'], static function () {
    Route::get('/account', AccountController::class)
        ->name('account');
    Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is.admin'], static function () {

        Route::get('/', [AdminIndexController::class, 'index'])
            ->name('admin');

        Route::get('/home', [AdminIndexController::class, 'home'])
            ->name('admin.home');
        Route::get('/parser', ParserController::class, 'index')->name('parser');

        Route::resource('categories', AdminCategoryController::class);

        Route::resource('news', AdminNewsController::class);

        Route::resource('newssources', AdminNewsSourceController::class);

        Route::resource('users', AdminUserController::class);

        Route::resource('mails', AdminMailController::class);

        Route::resource('orders', AdminOrderController::class);

        Route::get('/about', [AdminIndexController::class, 'about'])
            ->name('admin.about');
    });
});

Route::group(['prefix' => 'about'], static function () {

    Route::get('/', [AboutController::class, 'index'])
        ->name('about');

    Route::resource('mail', MailController::class);

    Route::resource('order', OrderController::class);
});

Route::group(['prefix' => ''], static function () {

    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');

    Route::get('/news/one/{id}', [NewsController::class, 'show'])
        ->where(name: 'id', expression: '\d+')->name("newsId");
});

Route::group(['prefix' => ''], static function () {

    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('category.index');

    Route::get('/category/{slug}', [CategoryController::class, 'show'])
        ->where(name: 'category_id', expression: '\d+')->name("category.show");
});

Route::get('session', function () {
    $sessionName = 'test';
    if (session()->has($sessionName)) {
        session()->forget($sessionName);
    }

    dd(session()->all());
    session()->put($sessionName, 'example');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/redirect/{driver}', [SocialProvidersController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social.auth.redirect');

    Route::get('/auth/callback/{driver}', [SocialProvidersController::class, 'callback'])
        ->where('driver', '\w+');
});
