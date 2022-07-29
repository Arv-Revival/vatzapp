<?php

namespace Database\Seeders;

use App\Models\InvoiceGroup;
use App\Models\InvoiceItem;
use App\Models\InvoiceSubGroup;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            CountrySeeder::class,
            RegionSeeder::class,
            //FileSeeder::class,
            AdminUserSeeder::class,
            EntryStatusSeeder::class,
            InvoiceGroupSeeder::class,
            InvoiceSubGroupSeeder::class,
            InvoiceItemSeeder::class,
        ]);
    }
}
