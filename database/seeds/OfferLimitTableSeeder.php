<?php

use Illuminate\Database\Seeder;

use App\Models\OfferLimit;

class OfferLimitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OfferLimit::create([
          'title' => 'All New Promo',
          'subtitle' => 'Audifonos Gamers Rojos',
          'description' => 'Lleva Estos Increibles Audifonos Gamers YA!',
          'url' => '/',
          'image' => 'offer-audifonos.jpg'
        ]);
    }
}
