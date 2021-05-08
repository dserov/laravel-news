<?php

use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ExportRequestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\ProfileController as AdminProfileController;
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

Route::redirect('/', '/news');
//Route::redirect('/admin', '/admin/news');

Route::get('/about', function () {
    return view('about');
});

// b. Страницу категорий новостей.
Route::get('/category', [CategoryController::class, 'index'])
    ->name('category::list');

Route::group([
    'prefix' => 'news',
    'as' => 'news::'
], function () {
    // c. Страницу вывода новостей по конкретной категории.
    Route::get('/category/{category}', [NewsController::class, 'listByCategory'])
        ->name('bycategory')
        ->where(['category' => '\d+']);

    // d. Страницу вывода конкретной новости.
    Route::get('/{news}', [NewsController::class, 'show'])
        ->name('show');

    // Отображение списка новостей
    Route::get('/', [NewsController::class, 'index'])
        ->name('index');
});

Route::group([
    'prefix' => 'social',
    'as' => 'social::'
], function (){
    Route::get('login-vk', [SocialController::class, 'loginVk'])->name('login-vk');
    Route::get('response-vk', [SocialController::class, 'responseVk'])->name('response-vk');
    Route::get('login-facebook', [SocialController::class, 'loginFacebook'])->name('login-facebook');
    Route::get('response-facebook', [SocialController::class, 'responseFacebook'])->name('response-facebook');
});

Route::group([
    'prefix' => '/admin',
    'as' => 'admin::',
    'middleware' => 'auth.admin',
], function () {
    Route::get('/exportRequest', [ExportRequestController::class, 'index'])
        ->name('exportRequest::index');


    Route::group([
        'prefix' => 'parser',
        'as' => 'parser::',
    ], function () {
        Route::get('rss/{url}', [ParserController::class, 'rss'])
            ->name('rss');
    });

    Route::group([
        'prefix' => '/news',
        'as' => 'news::',
    ], function () {
        Route::get('/', [AdminNewsController::class, 'index'])
            ->name('index');
        Route::get('/create', [AdminNewsController::class, 'create'])
            ->name('create');
        Route::post('/save', [AdminNewsController::class, 'save'])
            ->name('save');
        Route::get('/update/{news}', [AdminNewsController::class, 'update'])
            ->name('update');
        Route::get('/delete/{news}', [AdminNewsController::class, 'delete'])
            ->name('delete');
    });

    Route::group([
        'prefix' => '/categories',
        'as' => 'category::',
    ], function () {
        Route::get('/', [AdminCategoryController::class, 'index'])
            ->name('index');
        Route::get('/create', [AdminCategoryController::class, 'create'])
            ->name('create');
        Route::post('/save', [AdminCategoryController::class, 'save'])
            ->name('save');
        Route::get('/update/{category}', [AdminCategoryController::class, 'update'])
            ->name('update');
        Route::get('/delete/{category}', [AdminCategoryController::class, 'delete'])
            ->name('delete');
    });
});

Route::group([
    'prefix' => '/admin/profile',
    'as' => 'admin::profile::',
    'middleware' => ['auth', 'auth.admin'],
], function () {
    Route::get('/', [AdminProfileController::class, 'index'])->name('index');
    Route::get('/create', [AdminProfileController::class, 'create'])->name('create');
    Route::get('/update/{user}', [AdminProfileController::class, 'update'])->name('update');
    Route::get('/delete/{user}', [AdminProfileController::class, 'destroy'])->name('delete');
    Route::post('/save', [AdminProfileController::class, 'save'])->name('save');
});

Route::group([
    'prefix' => '/profile',
    'as' => 'profile::',
    'middleware' => 'auth',
], function () {
    Route::get('/update', [ProfileController::class, 'update'])->name('update');
    Route::post('/save', [ProfileController::class, 'save'])->name('save');
});

Route::group([
    'prefix' => '/feedback',
    'as' => 'feedback::'
], function (){
    Route::get('/', [FeedbackController::class, 'index'])
        ->name('index');
    Route::post('/save', [FeedbackController::class, 'save'])
        ->name('save');
});

Route::group([
    'prefix' => '/exportRequest',
    'as' => 'exportRequest::'
], function (){
    Route::get('/create', [ExportRequestController::class, 'create'])
        ->name('create');
    Route::post('/save', [ExportRequestController::class, 'save'])
        ->name('save');
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        request()->session()->put('locale', $locale);
    }

    return redirect()->back();
});


//
// Login Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Logout Routes...
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Password Confirmation Routes...
Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

// Email Verification Routes...
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
