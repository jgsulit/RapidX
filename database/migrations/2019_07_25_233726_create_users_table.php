<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('is_password_changed');
            $table->integer('user_stat');
            $table->unsignedBigInteger('user_level_id');
            $table->unsignedBigInteger('department_id');
            $table->rememberToken();
            $table->integer('update_version');
            $table->timestamps();

            // Foreign key
            $table->foreign('user_level_id')->references('user_level_id')->on('user_levels');
            $table->foreign('department_id')->references('department_id')->on('departments');
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
