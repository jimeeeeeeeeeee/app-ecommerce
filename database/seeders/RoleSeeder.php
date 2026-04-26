<?php

namespace Database\Seeders;

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
        $roles = ['super_admin', 'admin', 'user', 'vendedor', 'marketing', 'atencion_cliente'];

        /*Crear si no existe*/
        foreach($roles as $roleName)
            {
                Role::UpdateOrCreate(['nombre' => $roleName]);
            }
    }
}
