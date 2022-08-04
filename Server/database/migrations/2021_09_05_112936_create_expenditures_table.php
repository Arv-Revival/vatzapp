<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpendituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenditures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entry_id');
            $table->timestamp('invoice_date');
            $table->float('amount')->default(0);
            $table->string('comments')->nullable();
            $table->float('vat_amount')->default(0);
            $table->string('invoice_number');
            $table->unsignedBigInteger('invoice_group_id')->nullable();
            $table->unsignedBigInteger('invoice_sub_group_id')->nullable();
            $table->unsignedBigInteger('invoice_item_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('entry_id')->references('id')->on('entries')->onCascade('delete');
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
        Schema::dropIfExists('expenditures');
    }
}
