<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EntryStatus;

class EntryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntryStatus::firstOrCreate([
            'id' => EntryStatus::ENTRY_PENDING,
            'name' => 'Pending',
            'description' => 'Wiating for checker reponse',
        ]);

        EntryStatus::firstOrCreate([
            'id' => EntryStatus::ENTRY_CHECKER_IN_PROGRESS,
            'name' => 'In progress',
            'description' => 'Wiating for checker reponse',
        ]);

        EntryStatus::firstOrCreate([
            'id' => EntryStatus::ENTRY_VALIDATOR_IN_PROGRESS,
            'name' => 'In progress',
            'description' => 'Wiating for validator reponse',
        ]);

        EntryStatus::firstOrCreate([
            'id' => EntryStatus::ENTRY_APPROVED,
            'name' => 'Approved',
            'description' => 'Approved',
        ]);

        EntryStatus::firstOrCreate([
            'id' => EntryStatus::ENTRY_VALIDATOR_REJECTED,
            'name' => 'In progress',
            'description' => 'Validator rejected',
        ]);
    }
}
