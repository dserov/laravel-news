<?php

namespace App\Http\Controllers;

class NewsController extends Controller
{
    private $news = [
        1 => ['id' => 1, 'title' => 'news 1', 'category_id' => 1],
        2 => ['id' => 2, 'title' => 'news 2', 'category_id' => 1],
        3 => ['id' => 3, 'title' => 'news 3', 'category_id' => 2],
        4 => ['id' => 4, 'title' => 'news 4', 'category_id' => 2],
        5 => ['id' => 5, 'title' => 'news 5', 'category_id' => 3],
        6 => ['id' => 6, 'title' => 'news 6', 'category_id' => 3],
    ];

    //
    public function index()
    {
        return view('news_list', ['news' => $this->news]);
    }

    public function listByCategory($category)
    {
        $news = array_filter($this->news, function ($item) use ($category) {
            return $item['category_id'] == $category;
        });
        return view('news_list', ['news' => $news]);
    }

    public function show($id)
    {
        return view('news_show', [
            'news' => $this->news[$id]
        ]);
    }

    public function add_news()
    {
        $categoryController = new CategoryController();
        return view('add_news', [
            'categoryes' => $categoryController->getCategoryes()
        ]);
    }
}
