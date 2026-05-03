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
        $permissions = [

            /*vistas*/
            'ver_usuarios'=> 'Vista',
            'ver_roles'=> 'Vista',
            'ver_permisos'=> 'Vista',
            'ver_productos'=> 'Vista',
            'ver_categorias'=> 'Vista',
            'ver_ventas'=> 'Vista',
            'ver_compras'=> 'Vista',
            'ver_clientes'=> 'Vista',

            /*crear*/
            'crear_permisos'=> 'Creación',
            'crear_usuarios'=> 'Creación',
            'crear_roles'=> 'Creación',
            'crear_productos'=> 'Creación',
            'crear_categorias'=> 'Creación',
            'crear_ventas'=> 'Creación',
            'crear_compras'=> 'Creación',
            'crear_clientes'=> 'Creación',

            /*Editar*/
            'editar_usuarios'=>'Edición',
            'editar_roles'=>'Edición',
            'editar_permisos'=>'Edición',
            'editar_productos'=>'Edición',
            'editar_categorias'=>'Edición',
            'editar_ventas'=>'Edición',
            'editar_compras'=>'Edición',
            'editar_clientes'=>'Edición',

            /*eliminacion*/
            'eliminar_usuarios'=>'Eliminar',            
            'eliminar_roles'=>'Eliminar',            
            'eliminar_permisos'=>'Eliminar',            
            'eliminar_productos'=>'Eliminar',                                    
            'eliminar_categorias'=>'Eliminar',                                    
            'eliminar_ventas'=>'Eliminar',            
            'eliminar_compras'=>'Eliminar',
            'eliminar_clientes'=>'Eliminar',   
        ];
    }
}
