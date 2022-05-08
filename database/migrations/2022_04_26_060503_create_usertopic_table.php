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
        Schema::create('usertopic', function (Blueprint $table) {
            $table->string('user_id');
            $table->string('healthy');
            $table->string('sports');
            $table->string('politics');
            $table->string('entertainment');
            $table->string('technology');
            $table->string('science');

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
        Schema::dropIfExists('usertopic');
    }
};