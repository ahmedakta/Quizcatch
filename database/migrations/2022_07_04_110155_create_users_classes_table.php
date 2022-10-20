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
        Schema::create('users_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('description');
            $table->boolean('private')->default(0);
            $table->string('password')->nullable();
            $table->integer('limit')->nullable();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('users_classes');
    }
};
