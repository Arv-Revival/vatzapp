<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('building_name')->nullable();
            $table->string('p_o_box')->nullable();
            $table->string('palce')->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->string('trade_license_number');
            $table->unsignedBigInteger('trade_license_image_id')->nullable();
            $table->string('trn_number');
            $table->string('fta_email')->nullable();
            $table->string('fta_password')->nullable();
            $table->timestamp('verified_on')->nullable();
            $table->string('country_code')->nullable();
            $table->string('mobile')->nullable();
            $table->string('l_country_code')->nullable();
            $table->string('landline')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('cp_country_code')->nullable();
            $table->string('cp_mobile')->nullable();
            $table->unsignedBigInteger('tran_certificate_id')->nullable();

            $table->unsignedBigInteger('checker_user_id')->nullable();
            // Will store count of month
            $table->integer('vat_period')->nullable();
            $table->float('vat_percentage')->nullable();
            $table->integer('start_month')->default(0);
            $table->integer('start_year')->default(0);

            $table->string('plan_name')->nullable();
            $table->string('ref')->nullable();
            $table->timestamp('from')->nullable();
            $table->timestamp('to')->nullable();
            $table->string('payment_type')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->float('payment_amount')->default(0);
            $table->string('payment_currency')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onCascade('delete');
            $table->foreign('checker_user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('set null');
            $table->foreign('trade_license_image_id')->references('id')->on('files')->onDelete('set null');
            $table->foreign('tran_certificate_id')->references('id')->on('files')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Client');
    }
}
