<?php

use Illuminate\Database\Seeder;

use App\Models\SettingTopmenu;

class SettingTopMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingTopmenu::create([
            'title' => 'Home',
            'url' => ''
        ]);

        SettingTopmenu::create([
            'title' => 'Categories',
            'url' => 'categories'
        ]);

        SettingTopmenu::create([
            'title' => 'Products',
            'url' => 'products'
        ]);

        SettingTopmenu::create([
            'title' => 'About',
            'url' => 'abouts'
        ]);

        SettingTopmenu::create([
            'title' => 'Contact us',
            'url' => 'contacts'
        ]);

    }
}
