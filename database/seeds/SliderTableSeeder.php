<?php

use Illuminate\Database\Seeder;

use App\Models\Slider;


class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'brand_id' => 5,
            'title' => 'Cornetas para Computadora',
            'amount' => rand(1,999),
            'url' => '/',
            'image' => 'corneta.jpg'
          ]);

        Slider::create([
            'brand_id' => 3,
            'title' => 'Pendrive USB de 500GB',
            'amount' => rand(1,999),
            'url' => '/',
            'image' => 'pendrive-500.jpg'
          ]);

        Slider::create([
            'brand_id' => 6,
            'title' => 'Tarjeta de WIFI para Computadora',
            'amount' => rand(1,999),
            'url' => '/',
            'image' => 'tarjeta-wifi.jpg'
          ]);
    }
}
