<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate([
            'id' => Role::ROLE_SUPER_ADMIN,
            'name' => 'Super Administrator',
            'description' => 'Super Administrator',
        ]);

        Role::firstOrCreate([
            'id' => Role::ROLE_ADMIN,
            'name' => 'Administrator',
            'description' => 'Administrator',
        ]);

        Role::firstOrCreate([
            'id' => Role::ROLE_CHECKER,
            'name' => 'Checker',
            'description' => 'Checker',
        ]);

        Role::firstOrCreate([
            'id' => Role::ROLE_VALIDATOR,
            'name' => 'Validator',
            'description' => 'Validator',
        ]);

        Role::firstOrCreate([
            'id' => Role::ROLE_CLIENT,
            'name' => 'Client',
            'description' => 'Client',
        ]);

        Role::firstOrCreate([
            'id' => Role::ROLE_SUPPLIER,
            'name' => 'Supplier',
            'description' => 'Supplier',
        ]);
    }
}
