<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = \App\Models\Category::all();

        if ($categories->count() === 0) {
            $this->command->info('No hay categorías. Por favor, ejecuta el seeder de categorías primero.');
            return;
        }

        $products = [
            ['nombre' => 'Smartphone', 'descripcion' => 'Un teléfono inteligente con pantalla táctil', 'precio' => 299.99, 'category_id' => $categories->where('nombre', 'Electrónica')->first()->id, 'status' => 'activo'],
            ['nombre' => 'Camiseta', 'descripcion' => 'Una camiseta de algodón suave', 'precio' => 19.99, 'category_id' => $categories->where('nombre', 'Ropa')->first()->id, 'status' => 'activo'],
            ['nombre' => 'Sofá', 'descripcion' => 'Un cómodo sofá para tu sala de estar', 'precio' => 499.99, 'category_id' => $categories->where('nombre', 'Hogar')->first()->id, 'status' => 'activo'],
            ['nombre' => 'Muñeca', 'descripcion' => 'Una muñeca de trapo para niños', 'precio' => 14.99, 'category_id' => $categories->where('nombre', 'Juguetes')->first()->id, 'status' => 'activo'],
            ['nombre' => 'Libro de aventuras', 'descripcion' => 'Un emocionante libro de aventuras para jóvenes lectores', 'precio' => 9.99, 'category_id' => $categories->where('nombre', 'Libros')->first()->id, 'status' => 'activo'],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }

    }
}
