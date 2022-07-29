<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::firstOrCreate([
            'name' => 'United Arab Emirates',
            'phone_code' => '+971',
            'currency_code' => 'AED',
        ]);

        Country::firstOrCreate([
            'name' => 'India',
            'phone_code' => '+91',
            'currency_code' => 'INR',
        ]);

        Country::firstOrCreate([
            'name' => 'Saudi Arabia',
            'phone_code' => '+966',
            'currency_code' => 'SAR',
        ]);

        Country::firstOrCreate([
            'name' => 'Bahrain',
            'phone_code' => '+973',
            'currency_code' => 'BD',
        ]);

        Country::firstOrCreate([
            'name' => 'Qatar',
            'phone_code' => '+974',
            'currency_code' => 'QR',
        ]);

        Country::firstOrCreate([
            'name' => 'Kuwait',
            'phone_code' => '+965',
            'currency_code' => 'KWD',
        ]);       
    }
}
