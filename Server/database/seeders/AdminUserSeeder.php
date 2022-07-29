<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'w_country_code' => '+91',
            'whatsapp_no' => '9999900000',
            'password' => '$2y$10$HusBxGyKS03m0jXC0OFhN.x8BGZHa84y4wllXEJdslRPyd8Xq/SdS',
            'primary_role' => 1,
            'email_verified_at' => date("Y-m-d")
        ]);

        Admin::create(
            array_merge(
                [
                    'user_id' => $user->id,
                    'building_name'  => 'building',
                    'p_o_box' => "p_o_box",
                    'palce' => "palce",
                    'city' => "city",
                    'country_id'  => 1,
                    'region_id'  => 1,
                    'country_code' => "+971", 
                    'mobile'  => '9999900000',
                    'join_date' => date('Y-m-d H:i:s'),
                    'salary' => 10000,
                ]
            )
        );
    }
}
