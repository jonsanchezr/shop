<?php

use Illuminate\Database\Seeder;

use App\Models\Brand;


class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Brand::create([
            'name' => 'Samsung',
            'slug' => 'samsung',
            'logo' => 'samsung.jpg'
          ]);

          Brand::create([
            'name' => 'HP',
            'slug' => 'hp',
            'logo' => 'hp.jpg'
          ]);

          Brand::create([
            'name' => 'Kingston',
            'slug' => 'kingston',
            'logo' => 'kingston.jpg'
          ]);

          Brand::create([
            'name' => 'Toshiba',
            'slug' => 'toshiba',
            'logo' => 'toshiba.jpg'
          ]);

          Brand::create([
            'name' => 'LG',
            'slug' => 'lg',
            'logo' => 'lg.jpg'
          ]);

          Brand::create([
            'name' => 'Lenovo',
            'slug' => 'lenovo',
            'logo' => 'lenovo.jpg'
          ]);
    }
}
