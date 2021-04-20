<?php

use Illuminate\Database\Seeder;

use App\Models\Tax;

class TaxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
 		Tax::create([
            'amount' => 16,
          ]);
    }
}
