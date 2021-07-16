<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->with(['category']);
        if (! \Auth::id()) {
            $news->where('is_private', false);
        }

        return view('news.index', ['news' => $news->paginate(10)]);
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
