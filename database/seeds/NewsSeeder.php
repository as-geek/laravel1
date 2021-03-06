<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')
            ->insert($this->generateData());

    }

    protected function generateData()
    {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(10, 50)),
                'content' => $faker->realText(1000),
                'rubrics_id' => $faker->numberBetween($min = 1, $max = 4),
                'publish_date' => $faker->dateTime(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ];
        }
        return $data;
    }
}
