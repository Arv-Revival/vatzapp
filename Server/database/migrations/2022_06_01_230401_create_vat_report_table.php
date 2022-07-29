<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVatReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vat_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('status')->nullable();
            $table->string('trn')->nullable();
            $table->string('name')->nullable();
            $table->string('building_name')->nullable();
            $table->string('p_o_box')->nullable();
            $table->string('palce')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->timestamp('vat_return_start_period')->nullable();
            $table->timestamp('vat_return_end_period')->nullable();
            $table->timestamp('vat_return_due_date')->nullable();
            $table->float('sale_amount')->nullable();
            $table->float('sale_vat_amount')->nullable();
            $table->float('purchase_amount')->nullable();
            $table->float('purchase_vat_amount')->nullable();
            $table->float('expenditure_amount')->nullable();
            $table->float('expenditure_vat_amount')->nullable();
            $table->float('net_vat_sale_due')->nullable();
            $table->float('net_vat_purchase_due')->nullable();
            $table->float('payable_tax_for_the_period')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vat_reports');
    }
}
