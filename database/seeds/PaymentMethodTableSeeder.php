<?php

use Illuminate\Database\Seeder;

use App\Models\PaymentMethod;

class PaymentMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		PaymentMethod::create([
            'name' => 'Credit Card',
        ]);

        PaymentMethod::create([
            'name' => 'Paypal',
        ]);

        PaymentMethod::create([
            'name' => 'Transferencia',
        ]);
    }
}
