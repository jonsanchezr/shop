<?php

use Illuminate\Database\Seeder;

use App\Models\AdsIndex;

class AdsIndexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
		AdsIndex::create([
            'title' => 'Ads Index',
            'image' => 'ads-index.jpg',
            'url' => '/',
          ]);
    }
}
