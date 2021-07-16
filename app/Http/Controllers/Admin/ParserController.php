<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ParsingJob;
use App\Models\Rss3dnewsModel;
use App\Models\RssProcess;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function index()
    {
        $sources = [
            'https://3dnews.ru/news/rss/',
            'https://lenta.ru/rss/news/',
        ];

        foreach ($sources as $source) {
            ParsingJob::dispatch($source);
        }

        return redirect()->route('admin::news::index')->with('success', 'Парсинг запланирован!');
    }
}
