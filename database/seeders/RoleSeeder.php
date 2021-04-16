<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $member = Role::create(['name' => 'member']);

        $create_organization = Permission::create(['name' => 'create_organization']);
        $edit_organization = Permission::create(['name' => 'edit_organization']);
        $view_organization = Permission::create(['name' => 'view_organization']);
        $delete_organization = Permission::create(['name' => 'delete_organization']);

        $create_user = Permission::create(['name' => 'create_user']);
        $edit_user = Permission::create(['name' => 'edit_user']);
        $view_user = Permission::create(['name' => 'view_user']);
        $delete_user = Permission::create(['name' => 'delete_user']);

        $admin->givePermissionTo($create_organization);
        $admin->givePermissionTo($edit_organization);
        $admin->givePermissionTo($view_organization);
        $admin->givePermissionTo($delete_organization);
        $admin->givePermissionTo($create_user);
        $admin->givePermissionTo($edit_user);
        $admin->givePermissionTo($view_user);
        $admin->givePermissionTo($delete_user);

        $member->givePermissionTo($view_organization);
        $member->givePermissionTo($view_user);

        $user = User::where('email', 'khaclamvna@gmail.com')->first();
        $user->assignRole('admin');

        $user2 = User::where('email', 'thanhvan@gmail.com')->first();
        $user2->assignRole('admin');

        $user3 = User::where('email', 'vana@gmail.com')->first();
        $user3->assignRole('member');
    }
}
