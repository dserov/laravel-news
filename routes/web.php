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

Route::get('/', function () {
    return view('home');
});


Route::get('/news', function () {
    return view('news');
});

Route::get('/about', function () {
    return view('about');
});

// a. Страницу приветствия.
Route::get('/hello', [HelloController::class, 'index'])->name('hello::page');

// b. Страницу категорий новостей.
Route::get('/category', [CategoryController::class, 'index'])
    ->name('category::list');

// c. Страницу вывода новостей по конкретной категории.
Route::get('/news/category/{category}', [NewsController::class, 'listByCategory'])
    ->name('news::bycategory')
    ->where(['category' => '\d+']);

// d. Страницу вывода конкретной новости.
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->name('news::show')
    ->where(['id' => '\d+']);

// e. Страницу авторизации.
Route::get('/auth', [AuthController::class, 'index'])->name('auth::login');

// f. Страницу добавления новости.
Route::get('/news/add', [NewsController::class, 'add_news'])->name('news::add_new');

// Отображение списка новостей
Route::get('/news', [NewsController::class, 'index'])
    ->name('news::list');


