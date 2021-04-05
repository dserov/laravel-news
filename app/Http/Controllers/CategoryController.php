<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    private $categoryes = [
        ['id' => 1, 'name' => 'category1'],
        ['id' => 2, 'name' => 'category2'],
        ['id' => 3, 'name' => 'category3'],
    ];

    //
    public function index()
    {
        return view('category_list', ['categoryes' => $this->categoryes]);
    }

    /**
     * @return array
     */
    public function getCategoryes()
    {
        return $this->categoryes;
    }
}
