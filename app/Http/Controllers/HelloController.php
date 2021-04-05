<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    public function index() {
        return '<H1>Страница приветствия!</H1>';
    }
}
