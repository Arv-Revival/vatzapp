<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('plan_name')->nullable();
            $table->string('ref')->nullable();
            $table->timestamp('from')->nullable();
            $table->timestamp('to')->nullable();
            $table->string('payment_type')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->float('payment_amount')->default(0);
            $table->string('payment_currency')->nullable();
            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_histories');
    }
}
