<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HelloController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\AuthController;

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

// a. Страницу приветствия.
Route::get('/hello', [HelloController::class, 'index'])->name('hello::page');

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

    // f. Страницу добавления новости.
    Route::get('/add', [NewsController::class, 'addNews'])
        ->name('add_new');
});

// e. Страницу авторизации.
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth::login');


