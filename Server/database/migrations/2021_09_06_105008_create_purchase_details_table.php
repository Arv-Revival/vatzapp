<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id');

            $table->unsignedBigInteger('invoice_group_id')->nullable();
            $table->unsignedBigInteger('invoice_sub_group_id')->nullable();
            $table->unsignedBigInteger('invoice_item_id')->nullable();

            $table->float('price')->default(0);
            $table->float('qty')->default(0);
            $table->float('vat_percentage')->default(5);
            $table->float('amount')->default(0);

            $table->timestamps();

            $table->foreign('purchase_id')->references('id')->on('purchases')->onCascade('delete');
            $table->foreign('invoice_group_id')->references('id')->on('invoice_groups')->onDelete('set null');
            $table->foreign('invoice_sub_group_id')->references('id')->on('invoice_sub_groups')->onDelete('set null');
            $table->foreign('invoice_item_id')->references('id')->on('invoice_items')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_details');
    }
}
