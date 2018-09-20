<?php

use Illuminate\Database\Seeder;
use App\DownloadCategory;

class DownloadCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
