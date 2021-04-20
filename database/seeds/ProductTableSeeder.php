<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Product;


class ProductTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {  
     $description = '<div class="row">
        <div class="col-md-6">
          <h3 class="h6">Details</h3>
          <p class="mb-4 pb-2">ZRXOm7siAO</p>
          <h3 class="h6">Features</h3>
          <ul class="list-icon mb-4 pb-2">
            <li><i class="fe-icon-check text-success"></i>Capture 4K30 Video and 12MP Photos</li>
            <li><i class="fe-icon-check text-success"></i>Game-Style Controller with Touchscreen</li>
            <li><i class="fe-icon-check text-success"></i>View Live Camera Feed</li>
            <li><i class="fe-icon-check text-success"></i>Full Control of HERO6 Black</li>
            <li><i class="fe-icon-check text-success"></i>Use App for Dedicated Camera Operation</li>
          </ul>
        </div>
        <div class="col-md-6">
          <h3 class="h6">Specifications</h3>
          <ul class="list-unstyled mb-4 pb-2">
            <li><strong>Weight:</strong> 35.5oz (1006g)</li>
            <li><strong>Maximum Speed:</strong>   35 mph (15 m/s)</li>
            <li><strong>Maximum Distance:</strong>    Up to 9,840ft (3,000m)</li>
            <li><strong>Operating Frequency:</strong> 2.4GHz</li>
            <li><strong>Manufacturer:</strong> GoPro, USA</li>
          </ul>
          <h3 class="h6">Shipping Options:</h3>
          <ul class="list-unstyled mb-4 pb-2">
            <li><strong>Courier:</strong> 2 - 4 days, $22.50</li>
            <li><strong>Local Shipping:</strong> up to one week, $10.00</li>
            <li><strong>UPS Ground Shipping:</strong> 4 - 6 days, $18.00</li>
            <li><strong>Unishop Global Export:</strong> 3 - 4 days, $25.00</li>
          </ul>
        </div>
      </div>';

      $short_description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta voluptatibus quos ea dolore rem, molestias laudantium et explicabo...';


   Product::create([
      'category_id' => 2,
      'brand_id' => 3,
      'title' => 'Tarjeta SD 16GB',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'tarjeta-sd-16gb',
      'slot_image_1' => 'tarjeta-sd16.jpg'
    ]);

   Product::create([
      'category_id' => 4,
      'brand_id' => 2,
      'title' => 'Mause USB para computadora',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'mause-usb',
      'slot_image_1' => 'mause-usb.jpg'
    ]);

   Product::create([
      'category_id' => 3,
      'brand_id' => rand(1, 6),
      'title' => 'Cables USB para Telefonos',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'cable-usb-telefono',
      'slot_image_1' => 'cable-usb.jpg'
    ]);

   Product::create([
      'category_id' => 1,
      'brand_id' => rand(1, 6),
      'title' => 'Audifonos Bluetooth Gamer',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'audifono-bluetooth',
      'slot_image_1' => 'audifono-bluetooth.jpg'
    ]);

   Product::create([
      'category_id' => 3,
      'brand_id' => rand(1, 6),
      'title' => 'Cable Plugs de Audio para Audifonos',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'cable-plug-audio',
      'slot_image_1' => 'cable-plugs.jpg'
    ]);

   Product::create([
      'category_id' => 1,
      'brand_id' => rand(1, 6),
      'title' => 'Audifonos Manos Libre Inalambrico',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'audifono-manos-libres',
      'slot_image_1' => 'audifonos-manos-libres.jpg'
    ]);

   Product::create([
      'category_id' => 3,
      'brand_id' => rand(1, 6),
      'title' => 'Cable VGA para Monitores',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'cable-vga',
      'slot_image_1' => 'cable-vga.jpg'
    ]);

   Product::create([
      'category_id' => 4,
      'brand_id' => rand(1, 6),
      'title' => 'Teclado USB Gamer para Computadoras',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'teclado-usb',
      'slot_image_1' => 'teclado-gamer.jpg'
    ]);

   Product::create([
      'category_id' => 2,
      'brand_id' => rand(1, 6),
      'title' => 'Adaptador USB para Tarjeta SD',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'adaptador-usb',
      'slot_image_1' => 'adaptador-micro-usb.jpg'
    ]);

   Product::create([
      'category_id' => 5,
      'brand_id' => rand(1, 6),
      'title' => 'Regleta de 5 Metros',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'regleta-5-metros',
      'slot_image_1' => 'regleta.jpg'
    ]);

   Product::create([
      'category_id' => 2,
      'brand_id' => rand(1, 6),
      'title' => 'Pendrive USB y para Telefono',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'pendrive-telefono',
      'slot_image_1' => 'pendrive-telefono.jpg'
    ]);

   Product::create([
      'category_id' => 3,
      'brand_id' => rand(1, 6),
      'title' => 'Hubs USB de 6 Conexiones',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'hobs-6-conexione',
      'slot_image_1' => 'hubs.jpg'
    ]);

   Product::create([
      'category_id' => 4,
      'brand_id' => rand(1, 6),
      'title' => 'Pack Mouse y Teclado Gamers',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'pack-mouse-teclado-gamers',
      'slot_image_1' => 'mouse-teclado.jpg'
    ]);

   Product::create([
      'category_id' => 5,
      'brand_id' => rand(1, 6),
      'title' => 'Cornetas para Computadoras',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'cornetas-computadora',
      'slot_image_1' => 'Cornetas-Computadora.jpg'
    ]);

   Product::create([
      'category_id' => 1,
      'brand_id' => 1,
      'title' => 'Audifonos Samsumg Buds',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'audifonos-samsumg-buds',
      'slot_image_1' => 'buds-samsumg.jpg'
    ]);

   Product::create([
      'category_id' => 5,
      'brand_id' => rand(1, 6),
      'title' => 'Targeta de Video para Computadora de 4GB',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'tarjeta-video',
      'slot_image_1' => 'tarjeta-video.jpg'
    ]);

   Product::create([
      'category_id' => 3,
      'brand_id' => rand(1, 6),
      'title' => 'Adaptador USB para SATA',
      'short_description' => $short_description,
      'large_description' => $description,
      'amount' => rand(1, 999),
      'unit' => rand(0, 5),
      'slug' => 'adaptador-sata',
      'slot_image_1' => 'adaptador-usb-sata.jpg'
    ]);
  }
}
