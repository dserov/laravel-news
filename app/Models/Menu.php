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

    private $menu = [];

    private $adminMenu = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->menu = [
            [
                'title' => __('labels.news_as_many'),
                'alias' => 'news::index',
            ],
            [
                'title' => __('labels.categories'),
                'alias' => 'category::list',
            ],
            [
                'title' => __('labels.feedback'),
                'alias' => 'feedback::index',
            ],
            [
                'title' => __('labels.export_request'),
                'alias' => 'exportRequest::create',
            ],
            [
                'title' => __('labels.go_admin_panel'),
                'alias' => 'admin::news::index',
            ],
        ];

        $this->adminMenu = [
            [
                'title' => __('labels.news_as_many'),
                'alias' => 'admin::news::index',
            ],
            [
                'title' => __('labels.categories'),
                'alias' => 'admin::category::index',
            ],
            [
                'title' => __('labels.export_requests'),
                'alias' => 'admin::exportRequest::index',
            ],
            [
                'title' => __('labels.go_site'),
                'alias' => 'news::index',
            ],
        ];
    }


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
