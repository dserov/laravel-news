<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $newsModel = new News();
        return view('news.index', ['news' => $newsModel->getAll()]);
    }

    public function listByCategory($category)
    {
        $newsModel = new News();
        return view('news.list_by_category', [
            'news' => $newsModel->getByCategoryId($category)]);
    }

    public function show($id)
    {
        $newsModel = new News();
        return view('news.show', [
            'news' => $newsModel->getById($id)
        ]);
    }
}
