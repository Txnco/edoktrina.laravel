<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = ['view_dashboard', 'manage_users', 'create_courses', 'delete_courses'];
        foreach ($permissions as $perm) {
            Permission::create(['name' => $perm]); 
        }

        // Create roles and assign permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo($permissions); // Admin gets all permissions

        $tutor = Role::create(['name' => 'tutor']);
        $tutor->givePermissionTo(['view_dashboard', 'create_courses']);

        $user = Role::create(['name' => 'user']); // No specific permissions
    }
}
