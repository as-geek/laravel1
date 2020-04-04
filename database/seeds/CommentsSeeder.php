<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')
            ->insert($this->generateData());

    }

    protected function generateData()
    {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'name' => $faker->firstName(),
                'content' => $faker->realText(300),
                'news_id' => $faker->numberBetween($min = 1, $max = 30),
                'publish_date' => $faker->dateTime(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ];
        }
        return $data;
    }
}
