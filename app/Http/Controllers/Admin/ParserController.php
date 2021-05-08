<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rss3dnewsModel;
use App\Models\RssProcess;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    //
    public function rss3dnews()
    {
        $xml = \XmlParser::load('https://3dnews.ru/news/rss/');
        $doc = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_description' => ['uses' => 'channel.description'],
            'items' => ['uses' => 'channel.item[title,description,category,pubDate,link,enclosure::url,guid]'],
        ]);

        $news = new Rss3dnewsModel();
        $news->update($doc['items']);

        return redirect()->route('admin::news::index')->with('success', 'Обновление закончено');
    }
    //
    public function rsslentaru()
    {
        $xml = \XmlParser::load('https://lenta.ru/rss/news');
        $doc = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_description' => ['uses' => 'channel.description'],
            'items' => ['uses' => 'channel.item[title,description,category,pubDate,link,enclosure::url,guid]'],
        ]);

        dd($doc);
        $news = new RssProcess();
        $news->update($doc['items']);

        return redirect()->route('admin::news::index')->with('success', 'Обновление закончено');
    }

    public function rss($url_encoded)
    {
        $xml = \XmlParser::load(base64_decode($url_encoded));
        $doc = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_description' => ['uses' => 'channel.description'],
            'items' => ['uses' => 'channel.item[title,description,category,pubDate,link,enclosure::url,guid]'],
        ]);

        $news = new RssProcess();
        $news->update($doc['items']);

        return redirect()->route('admin::news::index')->with('success', 'Обновление закончено');
    }
}
