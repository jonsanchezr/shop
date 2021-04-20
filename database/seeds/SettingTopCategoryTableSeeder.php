<?php

use Illuminate\Database\Seeder;

use App\Models\SettingTopCategory;

class SettingTopCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingTopCategory::create([
            'category_id' => 3
          ]);

        SettingTopCategory::create([
            'category_id' => 2
          ]);

        SettingTopCategory::create([
            'category_id' => 1
          ]);
    }
}
