<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UploadRequestController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DbController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
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

// a. Страницу инфо про БД.
Route::get('/db', [DbController::class, 'index'])->name('db::index');

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
    Route::get('/{id}', [NewsController::class, 'show'])
        ->name('show')
        ->where(['id' => '\d+']);

    // Отображение списка новостей
    Route::get('/', [NewsController::class, 'index'])
        ->name('list');
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
    Route::get('/update', [AdminNewsController::class, 'update'])
        ->name('update');
    Route::get('/delete', [AdminNewsController::class, 'delete'])
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

Route::group([
    'prefix' => '/uploadRequest',
    'as' => 'uploadRequest::'
], function (){
    Route::get('/', [UploadRequestController::class, 'index'])
        ->name('index');
    Route::post('/save', [UploadRequestController::class, 'save'])
        ->name('save');
});
