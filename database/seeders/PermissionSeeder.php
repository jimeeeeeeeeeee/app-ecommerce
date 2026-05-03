<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions= [
            'view_user' => 'vista',
            'view_roles' => 'vista',
            'view_permissions' => 'vista',
            'view_products' => 'vista',
            'view_categories' => 'vista',
            'view_compras' => 'vista',
            'view_sales' => 'vista',
            'view_customers' => 'vista',
            
            'create_user' => 'crear',
            'create_roles' => 'crear',
            'create_permissions' => 'crear',
            'create_products' => 'crear',
            'create_categories' => 'crear',
            'create_compras' => 'crear',
            'create_sales' => 'crear',
            'create_customers' => 'crear',
            
            'edit_user' => 'editar',
            'edit_roles' => 'editar',
            'edit_permissions' => 'editar',
            'edit_products' => 'editar',
            'edit_categories' => 'editar',
            'edit_compras' => 'editar',
            'edit_sales' => 'editar',
            'edit_customers' => 'editar',
            
            'delete_user' => 'eliminar',
            'delete_roles' => 'eliminar',
            'delete_permissions' => 'eliminar',
            'delete_products' => 'eliminar',
            'delete_categories' => 'eliminar',
            'delete_compras' => 'eliminar',
            'delete_sales' => 'eliminar',
            'delete_customers' => 'eliminar',
             ];

            foreach($permissions as $slug => $desc) {
                Permission::updateOrCreate(
                    ['nombre' => $slug],
                    ['tipo' => $desc]
                );
            };
    }
}
