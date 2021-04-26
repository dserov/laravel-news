<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
        //

        \DB::table('categories')
            ->insert($this->generateData());
    }

    /**
     * @return array
     */
    protected function generateData(): array
    {
        return [
            'name' => $this->faker->text(20)
        ];
    }
}
