<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menu
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @mixin \Eloquent
 */
class Menu extends Model
{
    use HasFactory;

    private $menu = [
        [
            'title' => 'Новости',
            'alias' => 'news::index',
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
            'title' => 'Запрос выгрузки',
            'alias' => 'exportRequest::create',
        ],
        [
            'title' => 'Adminka',
            'alias' => 'admin::news::index',
        ],
    ];

    private $adminMenu = [
        [
            'title' => 'DB Info',
            'alias' => 'db::index',
        ],
        [
            'title' => 'Новости',
            'alias' => 'admin::news::index',
        ],
        [
            'title' => 'Запросы на выгрузку',
            'alias' => 'admin::exportRequest::index',
        ],
        [
            'title' => 'На сайт',
            'alias' => 'news::index',
        ],
    ];

    /**
     * @return array
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * @return array
     */
    public function getAdminMenu()
    {
        return $this->adminMenu;
    }
}
