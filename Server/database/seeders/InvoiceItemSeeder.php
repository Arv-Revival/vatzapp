<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvoiceItem;

class InvoiceItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Invoice item seed data

        InvoiceItem::firstOrCreate(['name' => 'Plates', 'invoice_sub_group_id' => 1,]);
        InvoiceItem::firstOrCreate(['name' => 'Glasses', 'invoice_sub_group_id' => 1,]);
        InvoiceItem::firstOrCreate(['name' => 'Spoons', 'invoice_sub_group_id' => 1,]);

        InvoiceItem::firstOrCreate(['name' => 'Cello', 'invoice_sub_group_id' => 2,]);
        InvoiceItem::firstOrCreate(['name' => '3M', 'invoice_sub_group_id' => 2,]);
        InvoiceItem::firstOrCreate(['name' => 'Stick', 'invoice_sub_group_id' => 2,]);
        InvoiceItem::firstOrCreate(['name' => 'Zajel', 'invoice_sub_group_id' => 2,]);

        InvoiceItem::firstOrCreate(['name' => 'Tomato', 'invoice_sub_group_id' => 3,]);
        InvoiceItem::firstOrCreate(['name' => 'Potato', 'invoice_sub_group_id' => 3,]);
        InvoiceItem::firstOrCreate(['name' => 'Carrot', 'invoice_sub_group_id' => 3,]);

        InvoiceItem::firstOrCreate(['name' => 'Mint', 'invoice_sub_group_id' => 4,]);
        InvoiceItem::firstOrCreate(['name' => 'Coriander', 'invoice_sub_group_id' => 4,]);
        InvoiceItem::firstOrCreate(['name' => 'Curry Leaves', 'invoice_sub_group_id' => 4,]);

        InvoiceItem::firstOrCreate(['name' => 'Cashew', 'invoice_sub_group_id' => 5,]);
        InvoiceItem::firstOrCreate(['name' => 'Apricot', 'invoice_sub_group_id' => 5,]);
        InvoiceItem::firstOrCreate(['name' => 'Almond', 'invoice_sub_group_id' => 5,]);

        InvoiceItem::firstOrCreate(['name' => 'Samsung', 'invoice_sub_group_id' => 6,]);
        InvoiceItem::firstOrCreate(['name' => 'Oppo', 'invoice_sub_group_id' => 6,]);
        InvoiceItem::firstOrCreate(['name' => 'Apple', 'invoice_sub_group_id' => 6,]);

        InvoiceItem::firstOrCreate(['name' => 'Bosch', 'invoice_sub_group_id' => 7,]);
        InvoiceItem::firstOrCreate(['name' => 'OneOdio', 'invoice_sub_group_id' => 7,]);
        InvoiceItem::firstOrCreate(['name' => 'boAT', 'invoice_sub_group_id' => 7,]);

        InvoiceItem::firstOrCreate(['name' => 'LG', 'invoice_sub_group_id' => 8,]);
        InvoiceItem::firstOrCreate(['name' => 'Panasonic', 'invoice_sub_group_id' => 8,]);

        InvoiceItem::firstOrCreate(['name' => 'Samsung', 'invoice_sub_group_id' => 9,]);
        InvoiceItem::firstOrCreate(['name' => 'Panasonic', 'invoice_sub_group_id' => 9,]);

        InvoiceItem::firstOrCreate(['name' => 'Supervisor', 'invoice_sub_group_id' => 10,]);
        InvoiceItem::firstOrCreate(['name' => 'Field operator', 'invoice_sub_group_id' => 10,]);
        InvoiceItem::firstOrCreate(['name' => 'Fire fighter', 'invoice_sub_group_id' => 10,]);

        InvoiceItem::firstOrCreate(['name' => 'Manager Salary', 'invoice_sub_group_id' => 11,]);
        InvoiceItem::firstOrCreate(['name' => 'Cook Salary', 'invoice_sub_group_id' => 11,]);
        InvoiceItem::firstOrCreate(['name' => 'Admin Salary', 'invoice_sub_group_id' => 11,]);

        InvoiceItem::firstOrCreate(['name' => 'DEWA Bill', 'invoice_sub_group_id' => 12,]);
        InvoiceItem::firstOrCreate(['name' => 'SEWA Bill', 'invoice_sub_group_id' => 12,]);
        InvoiceItem::firstOrCreate(['name' => 'FEWA Bill', 'invoice_sub_group_id' => 12,]);

        InvoiceItem::firstOrCreate(['name' => 'Etisalat', 'invoice_sub_group_id' => 13,]);
        InvoiceItem::firstOrCreate(['name' => 'Du', 'invoice_sub_group_id' => 13,]);
        InvoiceItem::firstOrCreate(['name' => 'Orange', 'invoice_sub_group_id' => 13,]);
    }
}
