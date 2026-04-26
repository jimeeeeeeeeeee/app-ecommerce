<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'sa@gmail.com'],
            ['name' => 'Super Admin'],
            ['password' => bcrypt('12345678')]
        );

        $superAdminRole = Role::where('name', 'Super Admin')->first();

        $user -> roles() ->syncWithoutDetaching($superAdminRole);
    }
}
