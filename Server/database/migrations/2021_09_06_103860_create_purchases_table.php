<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entry_id');
            $table->unsignedBigInteger('supplier_id');
            $table->timestamp('invoice_date');
            $table->string('invoice_number');
            $table->float('sub_total')->default(0);
            $table->float('discount')->default(0);
            $table->float('vat_amount')->default(0);
            $table->float('total_amount')->default(0);
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('entry_id')->references('id')->on('entries')->onCascade('delete');
            $table->foreign('supplier_id')->references('id')->on('users')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
