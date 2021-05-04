<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ExportRequestController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
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

// e. Страницу авторизации.
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth::login');

Route::group([
    'prefix' => '/admin/news',
    'as' => 'admin::news::'
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
    'prefix' => '/admin/categories',
    'as' => 'admin::category::'
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

Route::group([
    'prefix' => '/feedback',
    'as' => 'feedback::'
], function (){
    Route::get('/', [FeedbackController::class, 'index'])
        ->name('index');
    Route::post('/save', [FeedbackController::class, 'save'])
        ->name('save');
});

Route::get('/admin/exportRequest', [ExportRequestController::class, 'index'])
    ->name('admin::exportRequest::index');

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
