<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvoiceGroup;

class InvoiceGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Purchase
        InvoiceGroup::firstOrCreate(['id' => 1, 'name' => 'Packing Items', 'invoice_type' => 2]); // 2 for purchase
        InvoiceGroup::firstOrCreate(['id' => 2, 'name' => 'Vegetables', 'invoice_type' => 2]); // 2 for purchase
        InvoiceGroup::firstOrCreate(['id' => 3, 'name' => 'Electronics', 'invoice_type' => 2]); // 2 for purchase
        InvoiceGroup::firstOrCreate(['id' => 4, 'name' => 'Home Appliances', 'invoice_type' => 2]); // 2 for purchase
        
        
        //Expenditure
        InvoiceGroup::firstOrCreate(['id' => 5, 'name' => 'Salary', 'invoice_type' => 3]); // 3 for expediture
        InvoiceGroup::firstOrCreate(['id' => 6, 'name' => 'Utility', 'invoice_type' => 3]); // 3 for expediture
    }
}
