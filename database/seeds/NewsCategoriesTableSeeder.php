<?php

use Illuminate\Database\Seeder;
use App\NewsCategory;

class NewsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewsCategory::create([
            'uid' => strtolower(str_random(11)),
            'title' => 'Event',
            'created_by' => 1,
            'updated_by' => 2,
        ]);
        NewsCategory::create([
            'uid' => strtolower(str_random(11)),
            'title' => 'Academic',
            'created_by' => 1,
            'updated_by' => 2,
        ]);
    }
}
