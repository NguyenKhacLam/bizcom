<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            'uk' => Str::random(10),
            'name' => 'Câu lạc bộ thanh niên khởi nghiệp Hà Nội',
            'short_name' => 'HYS',
            'description' => 'Demo',
            'email' => 'hys@gmail.com',
            'address' => 'Hanoi',
            'website' => 'www.thanhnienkhoinghiep.com',
            'phone' => '0123456789',
            'founding' => date('d-m-Y', '01-09-2010'),
            'rep_by' => 'Tran Thanh Huy',
            'fields' => 'Tình nguyện, Giáo dục',
            'status' => 'ACTIVED',
            'type' => 0
        ]);

        DB::table('organizations')->insert([
            'uk' => Str::random(10),
            'name' => 'Công ty đào tạo nguồn nhân lực chất lượng cao CiT edu',
            'short_name' => 'CiT',
            'description' => 'Demo',
            'email' => 'Cit@gmail.com',
            'address' => 'Hanoi',
            'phone' => '0123456789',
            'founding' => date('d-m-Y', '01-09-2010'),
            'rep_by' => 'Tran Thanh Huy',
            'fields' => 'Tình nguyện, Giáo dục',
            'status' => 'ACTIVED',
            'type' => 0
        ]);

        DB::table('user_organization')->insert([
            'user_id' => 1,
            'organization_id' => 1,
        ]);

        DB::table('user_organization')->insert([
            'user_id' => 1,
            'organization_id' => 2,
        ]);

        DB::table('user_organization')->insert([
            'user_id' => 2,
            'organization_id' => 2,
        ]);

        DB::table('user_organization')->insert([
            'user_id' => 3,
            'organization_id' => 1,
        ]);
    }
}
