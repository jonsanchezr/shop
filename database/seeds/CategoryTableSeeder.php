<?php

use Illuminate\Database\Seeder;

use App\Models\Category;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
          'title' => 'Audifonos',
          'description' => 'Audifonos para Entretener y Escuchar Musica',
          'slug' => 'audifono',
          'image' => 'audifonos.jpg'
        ]);

          Category::create([
            'title' => 'Pendrive',
            'description' => 'Pendrives y Tarjetas SD para Almacenar Informacion',
            'slug' => 'pendrive',
            'image' =>'pendrives.jpg'
          ]);

          Category::create([
            'title' => 'Cables USB y Hubs',
            'description' => 'Cables de Coneccion para Computadoras y Hobs ',
            'slug' => 'cable',
            'image' => 'cables-y-conectores.jpg'
          ]);

          Category::create([
            'title' => 'Mouse y Teclado',
            'description' => 'Mouse y Teclado para Computadoras De Todo Tipo ',
            'slug' => 'mouse-teclado',
            'image' => 'mause-y-teclado.jpg'
          ]);

          Category::create([
            'title' => 'Accesorios',
            'description' => 'Accesorios para Todo Tipo ',
            'slug' => 'accesorio',
            'image' => 'accesorio.jpg'
          ]);
    }
}
