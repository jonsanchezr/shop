<?php

use Illuminate\Database\Seeder;

use App\Models\Statu;

class StatuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		Statu::create([
            'name' => 'En Proceso',
          ]);

		Statu::create([
            'name' => 'Cancelado',
          ]);

		Statu::create([
            'name' => 'Entregado',
          ]);
    }
}
