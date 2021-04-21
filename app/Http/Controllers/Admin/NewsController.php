<?php
/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 18.04.2021
 * Time: 19:52
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return view('admin.news.index');
    }

    public function create() {
        return view('admin.news.create', ['categories' => Category::all()]);
    }

    public function save(Request $request) {
        return redirect()->route('admin::news::create')->with('success', 'Новость добавлена!');
    }

    public function delete() {
    }

    public function update() {
    }
}