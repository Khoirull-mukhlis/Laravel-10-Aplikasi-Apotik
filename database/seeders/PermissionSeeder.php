<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role_admin = Role::updateOrCreate(
            [
                'name' => 'admin',
            ],
            ['name' => 'admin']
        );

        $role_seller = Role::updateOrCreate(
            [
                'name' => 'seller',
            ],
            ['name' => 'seller']
        );

        $role_user = Role::updateOrCreate(
            [
                'name' => 'user',
            ],
            ['name' => 'user']
        );

        $permission = Permission::updateOrCreate(
            [
                'name' => 'view_dashboard',
            ],
            [
                'name' => 'view_dashboard'
            ]
        );

        $permission2 = Permission::updateOrCreate(
            [
                'name' => 'view_chart_on_dashboard',
            ],
            [
                'name' => 'view_chart_on_dashboard'
            ]
        );
        
        $role_admin->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission2);
        $role_seller->givePermissionTo($permission2);

        $user = User::find(1);
        $user2 = User::find(2);


        $user->assignRole('admin');
        $user2->assignRole('seller');
    }
}