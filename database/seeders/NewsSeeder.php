<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Seeder;
use Faker\Generator;

class NewsSeeder extends Seeder
{
    /**
     * @var Generator
     */
    protected $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $this->faker = $faker;

        News::query()->insert($this->generateData());
    }

    /**
     * @return array
     */
    protected function generateData(): array
    {
        $category = $this->faker->randomElement((new Category())->all());
        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(100),
            'source' => $this->faker->url,
            'publish_date' => $this->faker->dateTime,
            'category_id' => $category->id,
        ];
    }
}
