<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleTableSeeder::class,
            UserTableSeeder::class,
            ProfileCompanyTableSeeder::class,
            SettingTopMenuTableSeeder::class,
            SliderTableSeeder::class,
        	CategoryTableSeeder::class,
        	BrandTableSeeder::class,
        	ProductTableSeeder::class,
            SettingTopCategoryTableSeeder::class,
            OfferLimitTableSeeder::class,
            ShippingCompanyTableSeeder::class,
            PaymentMethodTableSeeder::class,
            TaxTableSeeder::class,
            StatuTableSeeder::class,
            AdsIndexTableSeeder::class,
            AdsCategoryTableSeeder::class,
            AdsCheckoutTableSeeder::class,
        ]);
    }
}
