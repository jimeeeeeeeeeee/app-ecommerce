<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*Definicion de roles*/
        $roles = ['super_admin', 'admin', 'user', 'vendedor', 'atencion_cliente'];

        /*Crear si no existe*/
        foreach($roles as $roleName)
            {
                Role::UpdateOrCreate(['nombre' => $roleName]);
            }

        /*Obtener todos los roles*/
        $allRoles = Role::all();

        $permissions = Permission::all();
        
        foreach($allRoles as $role){
            switch($role->nombre)
            {
                case 'super_admin':
                    $role -> permissions()->sync($permissions->pluck('id'));
                break;

                case 'admin':
                    $role -> permissions()->sync($permissions->whereIn('nombre', [
                        'ver_usuarios',
                        'crear_usuarios',
                        'editar_usuarios',
                        'eliminar_usuarios',

                        'ver_roles',
                        'crear_roles',
                        'editar_roles',
                        'eliminar_roles',

                        'ver_permisos',
                        'crear_permisos',
                        'editar_permisos',
                        'eliminar_permisos',

                        'ver_productos',
                        'crear_productos',
                        'editar_productos',
                        'eliminar_productos',
                        
                        'ver_categorias',
                        'crear_categorias',
                        'editar_categorias',
                        'eliminar_categorias',
                        
                        'ver_ventas',
                        'crear_ventas',
                        'editar_ventas',
                        'eliminar_ventas',

                        'ver_compras',
                        'crear_compras',
                        'editar_compras',
                        'eliminar_compras',

                        'ver_clientes',
                        'crear_clientes',
                        'editar_clientes',
                        'eliminar_clientes',

                    ])->pluck('id')); 
                break;

                case 'user':
                    $role->permissions()->sync($permissions->whereIn('nombre', [

                        'ver_productos',
                        'ver_categorias',
                        'ver_compras',
                    ])->pluck('id'));
                break;

                case 'vendedor':
                    $role->permissions()->sync($permissions->whereIn('nombre', [

                        'ver_productos',
                        'ver_categorias',
                        'ver_ventas',
                        'ver_clientes'
                    ])->pluck('id'));
                break;

                case 'atencion_cliente':
                    $role->permissions()->sync($permissions->whereIn('nombre', [

                        'ver_productos',
                        'ver_categorias',
                        'ver_ventas',
                        'ver_compras',
                        'ver_clientes',

                    ])->pluck('id'));
                break;


            }
        }
    }
}
