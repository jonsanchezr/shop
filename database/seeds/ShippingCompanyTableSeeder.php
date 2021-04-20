<?php

use Illuminate\Database\Seeder;

use App\Models\ShippingCompany;

class ShippingCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingCompany::create([
            'name' => 'Sin Delivery',
            'description' => 'Al elegir esta opcion no tendras ninguna empresa asociada a la forma de envio del producto que estas adquiriendo',
            'delivery_time' => '-',
            'price' => 0
          ]);

        ShippingCompany::create([
            'name' => 'MRW',
            'description' => 'MRW es una empresa de envíos española con sede operativa en Barcelona y, desde el 9 de octubre de 2017, sede social en Valencia. Cuenta con unas 501 franquicias y 60 plataformas logísticas distribuidas en Andorra, España, Gibraltar, Portugal y Venezuela.',
            'delivery_time' => '2 Days',
            'price' => rand(1, 999)
          ]);

        ShippingCompany::create([
            'name' => 'TEALCA',
            'description' => 'TEALCA ofrecemos a las personas naturales y jurídicas las soluciones de transporte de sobres, encomiendas y carga con la mayor efectividad en la entrega del mercado venezolano y con las tarifas más convenientes en función de las necesidades de nuestros clientes.',
            'delivery_time' => '5 Days',
            'price' => rand(1, 999)
          ]);

        ShippingCompany::create([
            'name' => 'DOMESA',
            'description' => 'DOMESA Ofrecemos un servicio de calidad, provisto de alta tecnología, el cual cuenta con un personal capacitado y comprometido con la innovación constante, que garantiza la satisfacción de los clientes.',
            'delivery_time' => '5 Days',
            'price' => rand(1, 999)
          ]);

    }
}
