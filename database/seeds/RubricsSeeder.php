<?php

use Illuminate\Database\Seeder;

class RubricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = "
            INSERT INTO rubrics (name) VALUES
                ('Политика'),
                ('Бизнес'),
                ('Спорт'),
                ('Игры');
         ";

        DB::statement($sql);
    }
}
