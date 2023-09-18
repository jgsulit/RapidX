<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_levels', function (Blueprint $table) {
            $table->bigIncrements('user_level_id');
            $table->string('user_level_name');
            $table->integer('user_level_stat');
            $table->integer('update_version');
            $table->timestamps();
        });

        // FOR MULTIPLE DATABASE CONNECTION
        // Schema::create('mysql', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('name',100);
        //     $table->string('email')->unique();
        //     $table->string('password',255);
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_levels');
    }
}
