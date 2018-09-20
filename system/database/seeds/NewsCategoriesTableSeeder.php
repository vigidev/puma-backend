<?php

use Illuminate\Database\Seeder;
use App\NewsCategory;
use App\DownloadCategory;

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
        DownloadCategory::create([
            'uid' => strtolower(str_random(11)),
            'title' => 'IT Information',
            'created_by' => 1,
            'updated_by' => 2,
        ]);
        DownloadCategory::create([
            'uid' => strtolower(str_random(11)),
            'title' => 'IS Information',
            'created_by' => 1,
            'updated_by' => 2,
        ]);
    }
}
