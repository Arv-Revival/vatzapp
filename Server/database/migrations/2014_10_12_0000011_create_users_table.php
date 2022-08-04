<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('w_country_code');
            $table->string('whatsapp_no')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('whatsapp_no_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('primary_role')->nullable();
            $table->unsignedBigInteger('profile_image_id')->nullable();
            $table->boolean('is_active')->default(true);

            $table->foreign('primary_role')->references('id')->on('roles')->onDelete('set null');
            $table->foreign('profile_image_id')->references('id')->on('files')->onDelete('set null');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
