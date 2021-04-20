<?php

use Illuminate\Database\Seeder;

use App\Models\AdsCategory;

class AdsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		AdsCategory::create([
            'title' => 'Ads Category',
            'image' => 'ads-category.png',
            'url' => '/',
          ]);
    }
}
