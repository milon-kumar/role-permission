<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Employee']);

        $all_permissions = [
            [
                'module' => 'Dashboard',
                'permissions' => [
                    'Dashboard.View',
                    "Setting.View"
                ]
            ],
            [
                'module' => 'User',
                'permissions' => [
                    'User.List',
                    'User.Create',
                    'User.Edit',
                    'User.Delete'
                ]
            ],
            [
                'module' => 'Role',
                'permissions' => [
                    'Role.List',
                    'Role.Create',
                    'Role.Edit',
                    'Role.Delete'
                ]
            ],
        ];

        foreach ($all_permissions as $permissions) {
            $module = $permissions['module'];
            foreach ($permissions['permissions'] as $permission) {
                $storePermission = Permission::create([
                    'name' => $permission,
                    'module' => $module,
                ]);
                $admin->givePermissionTo($storePermission);
                $storePermission->assignRole($admin);
            }
        }
        $user = User::where('type', 'admin')->first();
        $user->assignRole($admin);
    }
}
