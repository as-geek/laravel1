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
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->firstName(),
                'content' => $faker->realText(300),
                'news_id' => $faker->numberBetween($min = 1, $max = 10),
                'created_at' => $faker->date('Y-m-d'),
                'updated_at' => $faker->date('Y-m-d'),
            ];
        }
        return $data;
    }
}
