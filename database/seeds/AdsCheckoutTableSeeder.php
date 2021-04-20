<?php

use Illuminate\Database\Seeder;

use App\Models\AdsCheckout;


class AdsCheckoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
		AdsCheckout::create([
            'title' => 'Ads Index',
            'image' => 'ads-checkout.jpg',
            'url' => '/',
          ]);
    }
}
