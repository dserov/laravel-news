<?php

namespace App\Http\Controllers;

use App\Models\Category;

class DbController extends Controller
{
    //
    public function index() {
        $db = [
            'db_name' => \DB::getDatabaseName(),
            'db_config' => \DB::getConfig(),
            'name' => \DB::getName(),
            'driver' => \DB::getDriverName(),
            'connection' => \DB::getDefaultConnection(),
        ];

        $db['table_list'] = array_map("reset", \DB::select("SHOW TABLES;"));

        $db['categories content'] = [];
        $all = Category::all();
        foreach ($all as $item) {
            $db['categories content'][] = [
                'id' => $item->id,
                'name' => $item->name,
            ];
        }


        return view('db.index', ['db' => $db]);
    }
}
