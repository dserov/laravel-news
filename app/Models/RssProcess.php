<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RssProcess
{
    public function update(array $items)
    {
        foreach ($items as $item) {
            $trimItem = $this->trimStringFields($item);

            if (News::where(['guid' => $trimItem['guid']])->first()) {
                continue;
            }

            // create category if not exists
            $category = Category::firstOrCreate(['name' => $trimItem['category']]);

            $this->makeModel(new News(), $trimItem, $category->id);
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
