<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'user_create',
            'user_read',
            'user_update',
            'user_delete',
            'role_create',
            'role_read',
            'role_update',
            'role_delete',
            'permission_create',
            'permission_read',
            'permission_update',
            'permission_delete',
            'chat_read_all',
            'chat_manage'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->syncPermissions($permissions);

        $userRole = Role::create(['name' => 'user']);
        $userRole->syncPermissions([
            'user_read',
            'chat_read_all'
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'senafrakara@gmail.com',
            'password' => Hash::make('password')
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User User',
            'email' => 'useruser@gmail.com',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('user');
    }
}
