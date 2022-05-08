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
        Schema::create('topics', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('article_id');
            $table->boolean('healthy')->default(false);
            $table->boolean('sports')->default(false);
            $table->boolean('politics')->default(false);
            $table->boolean('entertainment')->default(false);
            $table->boolean('technology')->default(false);
            $table->boolean('science')->default(false);

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
        Schema::dropIfExists('topics');
    }
};