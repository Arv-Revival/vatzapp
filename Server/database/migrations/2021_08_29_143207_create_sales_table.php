<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entry_id');
            $table->timestamp('invoice_date');
            $table->float('amount')->default(0);
            $table->string('comments')->nullable();
            $table->string('invoice_number');
            $table->float('amount_exclude_vat')->default(0);
            $table->float('vat_amount')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('entry_id')->references('id')->on('entries')->onCascade('delete');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
