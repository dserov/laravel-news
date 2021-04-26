<?php

namespace Database\Seeders;

use App\Models\ExportRequest;
use Faker\Generator;
use Illuminate\Database\Seeder;

class ExportRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        //
        $model = new ExportRequest();
        $model->fill([
            'name' => $faker->firstName . ' ' . $faker->lastName,
            'phone' => $faker->phoneNumber,
            'email' => $faker->email,
            'message' => $faker->text(200),
        ]);
        $model->save();
    }
}
