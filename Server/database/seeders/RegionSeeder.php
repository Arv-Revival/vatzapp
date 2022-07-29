<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // UAE
        Region::firstOrCreate([
            'name' => 'Abu Dhabi',
            'country_id' => 1,
        ]);

        Region::firstOrCreate([
            'name' => 'Dubai',
            'country_id' => 1,
        ]);

        Region::firstOrCreate([
            'name' => 'Ajman',
            'country_id' => 1,
        ]);

        Region::firstOrCreate([
            'name' => 'Sharjah',
            'country_id' => 1,
        ]);

        Region::firstOrCreate([
            'name' => 'Umm-Al-Quwain',
            'country_id' => 1,
        ]);

        Region::firstOrCreate([
            'name' => 'Ras-Al-Khaimah',
            'country_id' => 1,
        ]);

        Region::firstOrCreate([
            'name' => 'Fujairah',
            'country_id' => 1,
        ]);

        // India
        Region::firstOrCreate([
            'name' => 'Andhra Pradesh',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Arunachal Pradesh',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Assam',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Bihar',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Chhattisgarh',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Goa',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Gujarat',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Haryana',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Himachal Pradesh',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Jharkhand',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Karnataka',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Kerala',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Madhya Pradesh',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Maharashtra',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Manipur',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Meghalaya',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Mizoram',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Nagaland',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Odisha',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Punjab',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Rajasthan',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Sikkim',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Tamil Nadu',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Telangana',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Tripura',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Uttarakhand',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'Uttar Pradesh',
            'country_id' => 2,
        ]);
        Region::firstOrCreate([
            'name' => 'West Bengal',
            'country_id' => 2,
        ]);

        // Soudi
        Region::firstOrCreate([
            'name' => 'Mecca',
            'country_id' => 3,
        ]);
        Region::firstOrCreate([
            'name' => 'Riyadh',
            'country_id' => 3,
        ]);
        Region::firstOrCreate([
            'name' => 'Eastern',
            'country_id' => 3,
        ]);
        Region::firstOrCreate([
            'name' => 'Asir',
            'country_id' => 3,
        ]);
        Region::firstOrCreate([
            'name' => 'Jizan',
            'country_id' => 3,
        ]);
        Region::firstOrCreate([
            'name' => 'Medina',
            'country_id' => 3,
        ]);
        Region::firstOrCreate([
            'name' => 'Al-Qassim',
            'country_id' => 3,
        ]);
        Region::firstOrCreate([
            'name' => 'Tabuk',
            'country_id' => 3,
        ]);
        Region::firstOrCreate([
            'name' => 'Hail',
            'country_id' => 3,
        ]);
        Region::firstOrCreate([
            'name' => 'Najran',
            'country_id' => 3,
        ]);
        Region::firstOrCreate([
            'name' => 'Al-Jawf',
            'country_id' => 3,
        ]);
        Region::firstOrCreate([
            'name' => 'Al-Bahah',
            'country_id' => 3,
        ]);
        Region::firstOrCreate([
            'name' => 'Northern Borders',
            'country_id' => 3,
        ]);

        // Bahrin
        Region::firstOrCreate([
            'name' => 'Al Manamah',
            'country_id' => 4,
        ]);
        Region::firstOrCreate([
            'name' => 'Sitrah',
            'country_id' => 4,
        ]);
        Region::firstOrCreate([
            'name' => 'Al Mintaqah al Gharbiyah',
            'country_id' => 4,
        ]);
        Region::firstOrCreate([
            'name' => 'Al Mintaqah al Wusta',
            'country_id' => 4,
        ]);
        Region::firstOrCreate([
            'name' => 'Al Mintaqah ash Shamaliyah',
            'country_id' => 4,
        ]);
        Region::firstOrCreate([
            'name' => 'Al Muharraq',
            'country_id' => 4,
        ]);
        Region::firstOrCreate([
            'name' => 'Al Asimah',
            'country_id' => 4,
        ]);
        Region::firstOrCreate([
            'name' => 'Ash Shamaliyah',
            'country_id' => 4,
        ]);
        Region::firstOrCreate([
            'name' => 'Jidd Hafs',
            'country_id' => 4,
        ]);
        Region::firstOrCreate([
            'name' => 'Madinat',
            'country_id' => 4,
        ]);
        Region::firstOrCreate([
            'name' => 'Madinat Hamad',
            'country_id' => 4,
        ]);
        Region::firstOrCreate([
            'name' => 'Mintaqat Juzur Hawar',
            'country_id' => 4,
        ]);
        Region::firstOrCreate([
            'name' => 'Ar Rifa',
            'country_id' => 4,
        ]);
        Region::firstOrCreate([
            'name' => 'Al Hadd',
            'country_id' => 4,
        ]);

        // Qatar
        Region::firstOrCreate([
            'name' => 'Ad Dawhah',
            'country_id' => 5,
        ]);

        //Kuwait
        Region::firstOrCreate([
            'name' => 'Ahmadi',
            'country_id' => 6,
        ]);
        Region::firstOrCreate([
            'name' => 'Al-Asimah',
            'country_id' => 6,
        ]);
        Region::firstOrCreate([
            'name' => 'Farwaniya',
            'country_id' => 6,
        ]);
        Region::firstOrCreate([
            'name' => 'Hawalli',
            'country_id' => 6,
        ]);
        Region::firstOrCreate([
            'name' => 'Jahra',
            'country_id' => 6,
        ]);
        Region::firstOrCreate([
            'name' => 'Mubarak Al-Kabeer',
            'country_id' => 6,
        ]);
    }
}
