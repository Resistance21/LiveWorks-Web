<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {

        $seedRoles = [
            ['name' => 'admin'],
            ['name' => 'staff'],
            ['name' => 'client']
        ];


        $seedPermissions = [
            ['permission' => 'user-add', 'roles' => ['admin']],
            ['permission' => 'user-edit', 'roles' => ['admin']],
            ['permission' => 'user-delete', 'roles' => ['admin']],
            ['permission' => 'user-browser', 'roles' => ['admin', 'staff']],

            [ 'permission' => 'activity-view', 'roles' => ['admin', 'staff', 'client']],
            [ 'permission' => 'activity-add', 'roles' => ['staff']],
            [ 'permission' => 'activity-edit', 'roles' => ['staff']],
            [ 'permission' => 'activity-delete', 'roles' => ['staff']],
            ['permission' => 'activity-upload', 'roles' => ['client', 'staff']],

            ['permission' => 'unit-view', 'roles' => ['admin', 'staff', 'client']],
            [ 'permission' => 'unit-add', 'roles' => ['admin', 'staff']],
            [ 'permission' => 'unit-edit', 'roles' => ['admin', 'staff']],
            [ 'permission' => 'unit-delete', 'roles' => ['admin', 'staff']],

            ['permission' => 'client-only', 'roles' => ['client']],
            ['permission' => 'staff-only', 'roles' => ['staff']],
            ['permission' => 'admin-only', 'roles' => ['admin']]
        ];

        // Create the Roles
        foreach ($seedRoles as $newRole) {
            $role = Role::findOrCreate($newRole['name']);
        }

        // Create the Permissions and assign to roles
        foreach ($seedPermissions as $seedPermission) {
            $permission = Permission::findOrCreate($seedPermission['permission']);
            $permission->syncRoles($seedPermission['roles']);
        }
    }
}
