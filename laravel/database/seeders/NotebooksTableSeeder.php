<?php

namespace Database\Seeders;

use App\Models\Notebook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotebooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ru_RU');
        for ($i = 0; $i < 25; $i++) {
            Notebook::create([
                'full_name' => $faker->name,
                'company' => $faker->company,
                'tel' => $faker->phoneNumber,
                'email' => $faker->email,
                'date_birth' => $faker->date('Y-m-d','now'),
                'photo' => $faker->imageUrl()
            ]);
        }

    }
}
