<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    private $menu = [
        [
            'title' => 'Hello',
            'alias' => 'hello::page',
        ],
        [
            'title' => 'Новости',
            'alias' => 'news::list',
        ],
        [
            'title' => 'Категории',
            'alias' => 'category::list',
        ],
        [
            'title' => 'Новая новость',
            'alias' => 'news::add_new',
        ],
    ];

    /**
     * @return array
     */
    public function getMenu()
    {
        return $this->menu;
    }
}
