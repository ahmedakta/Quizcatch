<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_users_class', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->unsigned();
            $table->unsignedInteger('users_class_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('users_class_id')->references('id')->on('users_classes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_users_class');
    }
};
