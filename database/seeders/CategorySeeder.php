<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['nombre' => 'Electrónica'],
            ['nombre' => 'Ropa'],
            ['nombre' => 'Hogar'],
            ['nombre' => 'Juguetes'],
            ['nombre' => 'Libros'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
