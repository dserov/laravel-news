<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    private $news = [
        1 => ['id' => 1, 'title' => 'news 1', 'category_id' => 1, 'content' => 'News content'],
        2 => ['id' => 2, 'title' => 'news 2', 'category_id' => 1, 'content' => 'News content'],
        3 => ['id' => 3, 'title' => 'news 3', 'category_id' => 2, 'content' => 'News content'],
        4 => ['id' => 4, 'title' => 'news 4', 'category_id' => 2, 'content' => 'News content'],
        5 => ['id' => 5, 'title' => 'news 5', 'category_id' => 3, 'content' => 'News content'],
        6 => ['id' => 6, 'title' => 'news 6', 'category_id' => 3, 'content' => 'News content'],
    ];

    public function getAll()
    {
        return $this->news;
    }

    public function getById($id)
    {
        return $this->news[$id];
    }

    public function getByCategoryId($categoryId)
    {
        return array_filter($this->news, function ($item) use ($categoryId) {
            return $item['category_id'] == $categoryId;
        });
    }
}
