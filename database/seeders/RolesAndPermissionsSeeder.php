<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions for Admin
        Permission::firstOrCreate(['name' => 'create user accounts']);
        Permission::firstOrCreate(['name' => 'edit user accounts']);
        Permission::firstOrCreate(['name' => 'deactivate user accounts']);
        Permission::firstOrCreate(['name' => 'monitor overall system performance']);
        Permission::firstOrCreate(['name' => 'assign user roles']);
        Permission::firstOrCreate(['name' => 'view dashboard reports']);

        // create permissions for Management
        Permission::firstOrCreate(['name' => 'monitor revenue generation']);
        Permission::firstOrCreate(['name' => 'monitor income against resource usage']);
        Permission::firstOrCreate(['name' => 'track operational costs']);
        Permission::firstOrCreate(['name' => 'generate management reports']);

        // create permissions for IT
        Permission::firstOrCreate(['name' => 'monitor cluster performance']);
        Permission::firstOrCreate(['name' => 'track running and queued jobs']);
        Permission::firstOrCreate(['name' => 'monitor node availability']);
        Permission::firstOrCreate(['name' => 'view utilization statistics']);

        // create Admin role and assign created permissions
        $roleAdmin = Role::firstOrCreate(['name' => 'Admin']);
        $roleAdmin->givePermissionTo([
            'create user accounts',
            'edit user accounts',
            'deactivate user accounts',
            'monitor overall system performance',
            'assign user roles',
            'view dashboard reports',
        ]);

        // create Management role and assign created permissions
        $roleManagement = Role::firstOrCreate(['name' => 'Management']);
        $roleManagement->givePermissionTo([
            'monitor revenue generation',
            'monitor income against resource usage',
            'track operational costs',
            'generate management reports',
        ]);

        // create IT role and assign created permissions
        $roleIT = Role::firstOrCreate(['name' => 'IT']);
        $roleIT->givePermissionTo([
            'monitor cluster performance',
            'track running and queued jobs',
            'monitor node availability',
            'view utilization statistics',
        ]);
    }
}
