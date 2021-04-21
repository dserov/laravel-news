<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    private $menu = [
        [
            'title' => 'DB Info',
            'alias' => 'db::index',
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
            'title' => 'Обратная связь',
            'alias' => 'feedback::index',
        ],
        [
            'title' => 'Выгрузка',
            'alias' => 'uploadRequest::index',
        ],
        [
            'title' => 'Admin',
            'alias' => 'admin::news::index',
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
