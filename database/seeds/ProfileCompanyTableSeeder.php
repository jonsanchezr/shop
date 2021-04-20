<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\ProfileCompany;

class ProfileCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfileCompany::create([
            'name_trade' => 'Estudio2B',
            'name_legal' => 'RoboticGames',
            'email' => 'estudio2b@estudio2b.net',
            'phone_local' => '(0281)-266-36-43',
            'phone_mobile' => '+58-4148707702',
            'address_1' => 'c/a conscrito',
            'address_2' => Str::random(5),
            'city' => 'Barcelona',
            'region' => 'Anzoategi',
            'country' => 'Venezuela',
            'logo' => 'logo.png',
            'favicon' => 'logo.png'
          ]);
    }
}
