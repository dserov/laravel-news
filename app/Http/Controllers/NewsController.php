<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', ['news' => News::query()->with(['category'])->get()]);
    }

    public function listByCategory(Category $category)
    {
        $news = $category->news;
        return view('news.list_by_category', [
            'category' => $category,
            'news' => $news
        ]);
    }

    public function show(News $news)
    {
        return view('news.show', [
            'news' => $news
        ]);
    }
}
