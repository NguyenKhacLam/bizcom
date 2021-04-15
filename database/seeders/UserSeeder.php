<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'uk' => Str::random(10),
            'first_name' => 'Nguyen',
            'last_name' => 'Khac Lam',
            'username' => 'khaclamvna',
            'email' => 'khaclamvna@gmail.com',
            'phone' => '0123456789',
            'dob' => Carbon::createFromDate(2000, 9, 24, 7),
            'gender' => 0,
            'address' => 'Hanoi',
            'company' => 'HYS',
            'password' => Hash::make('123456789'),
            'status' => 'ACTIVED',
        ]);

        DB::table('users')->insert([
            'uk' => Str::random(10),
            'first_name' => 'Nguyen',
            'last_name' => 'Van Thanh',
            'username' => 'thanhvan',
            'email' => 'thanhvan@gmail.com',
            'phone' => '188451324645',
            'dob' => Carbon::createFromDate(2000, 9, 24, 7),
            'gender' => 0,
            'address' => 'Hanoi',
            'company' => 'CiT',
            'password' => Hash::make('123456789'),
            'status' => 'ACTIVED',
        ]);

        DB::table('users')->insert([
            'uk' => Str::random(10),
            'first_name' => 'Nguyen',
            'last_name' => 'Van A',
            'username' => 'vana',
            'email' => 'vana@gmail.com',
            'phone' => '1348451485',
            'dob' => Carbon::createFromDate(2000, 9, 24, 7),
            'gender' => 0,
            'address' => 'Hanoi',
            'company' => 'asd',
            'password' => Hash::make('123456789'),
            'status' => 'ACTIVED',
        ]);

        // $permissions_data = [
        //     ['name' => 'view organization'],
        //     ['name' => 'create organization'],
        //     ['name' => 'edit organization'],
        //     ['name' => 'delete organization'],
        //     ['name' => 'view user'],
        //     ['name' => 'edit user'],
        //     ['name' => 'delete user']
        // ];

        // $permissions = Permission::create($permissions_data);
        
        // $roles_data = [
        //     ['name' => 'admin'],
        //     ['name' => 'member'],
        // ];

        // $roles = Role::create($role_data);

        // // Assign permissions
        // $admin = Role::where('name', 'admin')->first();
        // $admin->givePermissionTo($permissions);

        // $member = Role::where('name', '')->first();
        // $member->givePermissionTo('view organization');
        // $member->givePermissionTo('view user');

        // // Assign role
        // $user = User::where('email', 'khaclamvna@gmail.com')->first();
        // $user->assignRole('admin');

        // $user2 = User::where('email', 'thanhvan@gmail.com')->first();
        // $user2->assignRole('admin');

        // $user3 = User::where('email', 'vana@gmail.com')->first();
        // $user3->assignRole('member');
    }
}
