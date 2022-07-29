<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\File;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($index = 1; $index < 2; $index++) {

            File::firstOrCreate([
                'note' => 'file',
                'file_path' => '/resouces/image' . strval($index) . '.jpg',
            ]);
        }
    }
}
