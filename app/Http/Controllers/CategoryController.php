<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    private $categories = [
        ['id' => 1, 'name' => 'category1'],
        ['id' => 2, 'name' => 'category2'],
        ['id' => 3, 'name' => 'category3'],
    ];

    //
    public function index()
    {
        return view('category.list', ['categories' => $this->categories]);
    }

    /**
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
