<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', ['news' => (new News())->getAll()]);
    }

    public function listByCategory($category)
    {
        $news = News::query()->where('category_id', '=', $category)->get()->toArray();
        return view('news.list_by_category', [
            'news' => $news
        ]);
    }

    public function show($id)
    {
        $news = News::query()->where('id', '=', $id)->get()->toArray();
        $item = current($news);
        return view('news.show', [
            'news' => $item
        ]);
    }
}
