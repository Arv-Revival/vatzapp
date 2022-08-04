<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_user_id');
            $table->unsignedBigInteger('file_id')->nullable();
            $table->unsignedBigInteger('entry_status_id')->default(1);
            $table->unsignedInteger('entry_type')->nullable();
            $table->string('comment')->nullable();
            $table->boolean('requested_for_delete')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_user_id')->references('id')->on('users')->onCascade('delete');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('set null');
            $table->foreign('entry_status_id')->references('id')->on('entry_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
