<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_accesses', function (Blueprint $table) {
            $table->bigIncrements('user_access_id');
            $table->unsignedBigInteger('user_level_id');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('user_access_stat');
            $table->integer('update_version');
            $table->integer('created_by');
            $table->integer('last_updated_by');
            $table->timestamps();

            // Foreign Key
            $table->foreign('user_level_id')->references('user_level_id')->on('user_levels');
            $table->foreign('module_id')->references('module_id')->on('modules');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_accesses');
    }
}
