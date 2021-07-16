<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu
{
    private $menu = [];

    private $adminMenu = [];

    public function __construct(array $attributes = [])
    {
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
