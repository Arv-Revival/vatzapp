<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvoiceSubGroup;

class InvoiceSubGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Invoice sub group seed data

        InvoiceSubGroup::firstOrCreate(['id' => 1, 'name' => 'Disposable', 'invoice_group_id' => 1,]);
        InvoiceSubGroup::firstOrCreate(['id' => 2, 'name' => 'Adhesive Tapes', 'invoice_group_id' => 1,]);

        InvoiceSubGroup::firstOrCreate(['id' => 3, 'name' => 'Fresh Vegetable', 'invoice_group_id' => 2,]);
        InvoiceSubGroup::firstOrCreate(['id' => 4, 'name' => 'Leaves', 'invoice_group_id' => 2,]);
        InvoiceSubGroup::firstOrCreate(['id' => 5, 'name' => 'Dry Fruits', 'invoice_group_id' => 2,]);

        InvoiceSubGroup::firstOrCreate(['id' => 6, 'name' => 'Mobile Phones', 'invoice_group_id' => 3,]);
        InvoiceSubGroup::firstOrCreate(['id' => 7, 'name' => 'Head Phones', 'invoice_group_id' => 3,]);

        InvoiceSubGroup::firstOrCreate(['id' => 8, 'name' => 'Television', 'invoice_group_id' => 4,]);
        InvoiceSubGroup::firstOrCreate(['id' => 9, 'name' => 'Fridge', 'invoice_group_id' => 4,]);

        InvoiceSubGroup::firstOrCreate(['id' => 10, 'name' => 'Field Staff', 'invoice_group_id' => 5,]);
        InvoiceSubGroup::firstOrCreate(['id' => 11, 'name' => 'Office Staff', 'invoice_group_id' => 5,]);

        InvoiceSubGroup::firstOrCreate(['id' => 12, 'name' => 'Electricity Bill', 'invoice_group_id' => 6,]);
        InvoiceSubGroup::firstOrCreate(['id' => 13, 'name' => 'Telephone Bill', 'invoice_group_id' => 6,]);
    }
}
