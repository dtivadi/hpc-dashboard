<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Get roles (must exist from RolesAndPermissionsSeeder)
        $adminRole = Role::where('name', 'Admin')->first();
        $itRole = Role::where('name', 'IT')->first();
        $managementRole = Role::where('name', 'Management')->first();

        // ADMIN USER (FULL ACCESS)
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@hpc.com',
            'password' => Hash::make('password'),
        ]);

        $admin->assignRole($adminRole);

        // IT USER
        $it = User::create([
            'name' => 'IT User',
            'email' => 'it@hpc.com',
            'password' => Hash::make('password'),
        ]);

        $it->assignRole($itRole);

        // MANAGEMENT USER
        $management = User::create([
            'name' => 'Management User',
            'email' => 'management@hpc.com',
            'password' => Hash::make('password'),
        ]);

        $management->assignRole($managementRole);
    }
}