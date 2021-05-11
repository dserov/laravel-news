<?php
/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 11.05.2021
 * Time: 9:07
 */

namespace App\Http\Services;


use App\Models\Category;
use App\Models\News;

class NewsParserService
{
    /**
     * @param string $source
     */
    public function update(string $source)
    {
        $xml = \XmlParser::load($source);
        $doc = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_description' => ['uses' => 'channel.description'],
            'items' => ['uses' => 'channel.item[title,description,category,pubDate,link,enclosure::url,guid]'],
        ]);

        foreach ($doc['items'] as $item) {
            $trimedItem = $this->trimStringFields($item);

            if (News::where(['guid' => $trimedItem['guid']])->first()) {
                continue;
            }

            // create category if not exists
            $category = Category::firstOrCreate(['name' => $trimedItem['category']]);

            $this->makeModel(new News(), $trimedItem, $category->id);
        }
    }

    protected function trimStringFields($item) {
        $data = $item;

        foreach ($item as $key => $value) {
            if (is_string($value)) {
                $data[$key] = trim($value);
            }
        }

        return $data;
    }

    protected function makeModel(News $model, array $item, int $category_id) {
        $model->category_id = $category_id;
        $model->spoiler = $item['description'];
        $model->content = $item['description'];
        $model->publish_date = date('Y-m-d H:i:s', strtotime($item['pubDate']));
        $model->source = $item['link'];
        $model->enclosure = $item['enclosure::url'];
        $model->title = $item['title'];
        $model->guid = $item['guid'];

        $model->save();
    }
}